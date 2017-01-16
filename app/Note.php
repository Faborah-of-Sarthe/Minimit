<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'note',
    ];

   /**
    * Get the user for the note
    */
    public function user()
    {
        return $this->belongsTo("App\User");
    }

    /**
     * Get the selection for the note
     */
     public function selection()
     {
         return $this->belongsTo("App\Selection");
     }
}
