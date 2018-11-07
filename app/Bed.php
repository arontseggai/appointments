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
     * A Bed can belong to A Room
     *
     * @return void
     */
    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    /**
     * A Bed can have many appointments.
     *
     * @return void
     */
    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
