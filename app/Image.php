<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filepath', 'level', 'poster_id'
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
}
