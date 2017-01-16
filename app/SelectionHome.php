<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectionHome extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_fr', 'title_en', 'filepath', 'order', 'active',
    ];
}
