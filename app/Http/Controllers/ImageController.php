<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    protected $pathImages;
    protected $pathImagesLight;
    protected $pathImagesThumb;
    protected $suffix;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $image = New \App\Image;
        $this->suffix = date('Y') . '/' . date('m') . '/' . date('d'). '/';

        $this->pathImages = $image->prefixPathImages . $this->suffix;
        $this->pathImagesLight = $image->prefixPathImagesLight . $this->suffix;
        $this->pathImagesThumb = $image->prefixPathImagesThumb . $this->suffix;

        if(!File::isDirectory($this->pathImages))
            File::makeDirectory($this->pathImages,  0775, true);
        if(!File::isDirectory($this->pathImagesLight))
            File::makeDirectory($this->pathImagesLight,  0775, true);
        if(!File::isDirectory($this->pathImagesThumb))
            File::makeDirectory($this->pathImagesThumb,  0775, true);

        $this->middleware('auth', ['except' => ['show']]);
        $this->middleware('owner:image', ['only' => ['destroy']]);
    }


    /**
     * Store an image
     * @param Request $request
     * @return bool|mixed
     */
    public function store(Request $request)
    {
        if (!$request->ajax())
            return false;

        $this->validate($request, [
            'image' => 'image|dimensions:max_width=3020,min_width=700,min_height=1000'
        ]);

        $image = $request->file('image');
        $extension = $image->extension();
        $filename = sha1(time().uniqid()).".{$extension}";

        // Saving "Full size" image
        $image_full = Image::make($image);
        $image_full->fit(1050, 1500, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image_full->save($this->pathImages.$filename);


        // Saving "Light size" image
        $image_light = Image::make($image);
        $image_light->fit(700, 1000, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image_light->save($this->pathImagesLight.$filename);


        // Saving "Thumbnail" image
        $image_thumb = Image::make($image);
        $image_thumb->fit(200, 285);
        $image_thumb->save($this->pathImagesThumb.$filename);

        if(isset($request->poster_id) && null !== $request->poster_id && '' !== $request->poster_id) {
            //TODO Bind poster to image and add the proper level
        }else {
            $poster_id = null;
            $level = 1;
        }

        $image = \App\Image::create([
            'filepath' => $this->suffix.$filename,
            'poster_id' =>  $poster_id,
            'level' => $level
        ]);

        $view = View::make('poster.singleimage', compact('image'));

        return json_encode($view->render());
    }

    /**
     * Destroy the provided resource
     * @param \App\Image $image
     */
    public function destroy(Request $request, \App\Image $image)
    {
        if (!$request->ajax())
            return false;

        $image->delete();

        return json_encode($image->id);
    }
}
