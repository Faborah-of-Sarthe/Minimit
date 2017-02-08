<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{

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

    /**
     * Get the images for one poster
     */
    public function images()
    {
       return $this->hasMany("App\Image");
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
