<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filepath', 'level', 'poster_id', 'user_id'
    ];

    public $prefixPathImages = 'uploads/posters/HD/';
    public $prefixPathImagesLight = 'uploads/posters/LD/';
    public $prefixPathImagesThumb = 'uploads/posters/thumb/';

    /**
     * Get the poster for one image
     */
     public function poster()
     {
         return $this->belongsTo("App\Poster");
     }

    /**
     * Return the path for the "Thumbnail" version of an image
     */
    public function getThumbnailPath()
    {
        return $this->prefixPathImagesThumb . $this->filepath;
    }

    /**
     * Return the path for the "Fullsize" version of an image
     */
    public function getFullPath()
    {
        return $this->prefixPathImages . $this->filepath;
    }

    /**
     * Return the path for the "Light" version of an image
     */
    public function getLightPath()
    {
        return $this->prefixPathImagesLight . $this->filepath;
    }


    /**
     * Override the delete function to remove the related files of an image
     */
    public function delete()
    {
        if(File::isFile(public_path(). '/' . $this->getFullPath()))
            File::delete(public_path(). '/' . $this->getFullPath());
        if(File::isFile(public_path(). '/' . $this->getLightPath()))
            File::delete(public_path(). '/' . $this->getLightPath());
        if(File::isFile(public_path(). '/' . $this->getThumbnailPath()))
            File::delete(public_path(). '/' . $this->getThumbnailPath());

        parent::delete();
    }
}
