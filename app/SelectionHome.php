<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectionHome extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'selections_home';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_fr', 'title_en', 'filepath', 'order', 'active',
    ];

   /**
    * Get the selection for one home selection
    */
    public function selection()
    {
        return $this->belongsTo("App\Selection");
    }
}
