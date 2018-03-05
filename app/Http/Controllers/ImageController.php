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
        $this->middleware('ajax', ['only' => ['destroy', 'store']]);

    }


    /**
     * Store an image
     * @param Request $request
     * @return bool|mixed
     */
    public function store(Request $request)
    {

        $user = auth()->user();
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


        $image = \App\Image::create([
            'filepath' => $this->suffix.$filename,
            'level' => 1,
            'user_id' => $user->id,
        ]);

        $view = View::make('poster.elements.singleimage', compact('image'));

        return json_encode($view->render());
    }

    /**
     * Destroy the provided resource
     * @param \App\Image $image
     */
    public function destroy(Request $request, \App\Image $image)
    {
            // We no more delete the images since the posters may fall imageless
            // Instead we return the image id so we could "delete" the image on frontend and just
            // detach the relation between the image and its poster after saving the poster.
            // The image will be really destroyed by the daily CRON searching for posterless images
            return json_encode($image->id);
    }
}
