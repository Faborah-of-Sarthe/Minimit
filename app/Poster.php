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

}
