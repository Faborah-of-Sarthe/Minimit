<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return the is_admin value
     */
    public function isAdmin()
    {
        return $this->is_admin;
    }

    /**
     * Get the posters for one user
     */
     public function posters()
     {
         return $this->hasMany("App\Poster");
     }

    /**
     * Get the selections for one user
     */
     public function selections()
     {
         return $this->hasMany("App\Selection");
     }

    /**
     * Get the favourites for one user
     */
     public function favourites()
     {
         return $this->hasMany("App\Favourite");
     }

    /**
     * Get the notes for one user
     */
     public function notes()
     {
         return $this->hasMany("App\Note");
     }

}
