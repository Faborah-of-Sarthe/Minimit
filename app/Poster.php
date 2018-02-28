<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    protected static function boot()
    {
        // Delete the images and files related to the poster
        // Using $poster->images()->delete() will not trigger the file deletion, so we loop over each image
        Poster::deleting(function($poster) {
            $images = $poster->images;
            foreach ($images as $image) {
                $image->delete();
            }
        });
    }
    /**
     * Get the user for one poster
     */
    public function user()
    {
     return $this->belongsTo("App\User");
    }

    /**
     * Get the selections for one poster
     */
    public function selections()
    {
     return $this->belongsToMany("App\Selection");
    }

    /**
     * Get the oeuvre for one poster
     */
    public function oeuvre()
    {
      return $this->belongsTo("App\Oeuvre");
    }

    public function getThumbnail()
    {
        $image = $this->images->first();
        return $image->getThumbnailPath();
    }

    /**
     * Get the images for one poster
     */
    public function images()
    {
       return $this->belongsToMany("App\Image")->withPivot('order')->orderBy('order');
    }

    /**
     * Return the poster details
     * @return array $details
     */
    public function getPosterDetails()
    {
        $details = [];
        $details['images'] = $this->images()->orderBy('level')->get();
        $details['oeuvre'] = $this->oeuvre;
        $details['author'] = $this->user->name;

        return $details;
    }
}
