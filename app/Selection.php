<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'active',
    ];


    /**
     * Get the user for one selection
     */
     public function user()
     {
         return $this->belongsTo("App\User");
     }

    /**
     * Get the notes for one selection
     */
     public function notes()
     {
         return $this->hasMany("App\Note");
     }

    /**
     * Get the favourites for one selection
     */
     public function favourites()
     {
         return $this->hasMany("App\Favourite");
     }

    /**
     * Get the posters for one selection
     */
     public function posters()
     {
         return $this->belongsToMany("App\Poster")->withPivot('order')->orderBy('order');
     }

    /**
     * Get the tags for one selection
     */
     public function tags()
     {
         return $this->belongsToMany("App\Tag");
     }

    /**
     * Get the home selections for one selection
     */
     public function selectionsHome()
     {
         return $this->hasMany("App\SelectionHome");
     }
}
