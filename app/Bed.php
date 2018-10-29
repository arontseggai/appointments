<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * A User can have many articles.
     *
     * @return void
     */
    public function room()
    {
        return $this->belongsTo('App\Room');
    }
}
