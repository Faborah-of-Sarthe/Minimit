<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_fr', 'title_en', 'description_fr', 'description_en', 'code',
    ];

    /**
     * Get the selections for one tag
     */
     public function selections()
     {
         return $this->belongsToMany("App\Selection");
     }

    /**
     * Return the title of a tag according to the user's locale
     * @return string $title
     */
    public function getTitleAttribute()
    {
        $lang = \App::getLocale();
        $field = "title_".$lang;
        return $this->{$field};
    }
}
