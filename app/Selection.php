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
}
