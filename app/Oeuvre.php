<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

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
  * Return the title of an oeuvre according to the user's locale
  * @return string $title
  */
    public function getTitleAttribute()
    {
        $lang = \App::getLocale();
        $field = "title_".$lang;
        return $this->{$field};
    }

    /**
     * Get the posters for one oeuvre
     */
     public function posters()
     {
         return $this->hasMany("App\Poster");
     }
}
