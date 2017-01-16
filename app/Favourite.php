<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{

    /**
     * Get the user for the favourite
     */
     public function user()
     {
         return $this->belongsTo("App\User");
     }

    /**
     * Get the selection for the favourite
     */
     public function selection()
     {
         return $this->belongsTo("App\Selection");
     }
}
