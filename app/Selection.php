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
}
