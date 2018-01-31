<?php

namespace App\Http\Controllers;

use App\Image;
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
        $image = New Image;
        $this->suffix = date('Y') . '/' . date('m') . '/' . date('d');

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
    }

    public function store(Request $request)
    {
        if (!$request->ajax())
            return false;

        $this->validate($request, [
            'image' => 'image|dimensions:max_width=1920,ratio:0.7'
        ]);

        return $request->image;
    }
}
