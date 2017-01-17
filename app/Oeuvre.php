<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oeuvre extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_ov', 'title_fr', 'title_en', 'year', 'active',
    ];

    /**
     * Get the posters for one oeuvre
     */
     public function posters()
     {
         return $this->hasMany("App\Poster");
     }
}
