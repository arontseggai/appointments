<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['capacity'];

    /**
     * A User can have many articles.
     *
     * @return void
     */
    public function beds()
    {
        return $this->hasMany('App\Bed');
    }
}
