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
        'filepath', 'level',
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

    public function getThumbnailPath()
    {
        return $this->prefixPathImagesThumb . $this->filepath;
    }
}
