<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_date',
        'end_date',
        'status'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    /**
     * An appointment belongs to an user (patient)
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * An appointment belongs to an bed (patient)
     *
     * @return void
     */
    public function bed()
    {
        return $this->belongsTo('App\Bed');
    }
}
