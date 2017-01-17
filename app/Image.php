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
    
    /**
     * Get the poster for one image
     */
     public function poster()
     {
         return $this->belongsTo("App\Poster");
     }
}
