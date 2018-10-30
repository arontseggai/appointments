<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    /**
     * The different life stages of an appointment
     *
     *
     */
    const STATUS_UNCONFIRMED    = 0;
    const STATUS_CONFIRMED      = 1;
    const STATUS_ACTIVE         = 2;
    const STATUS_INACTIVE       = 3;
    const STATUS_CANCELLED      = 4;

    /**
     * Return list of status codes and labels

     * @return array
     */
    public static function listStatus()
    {
        return [
            self::STATUS_UNCONFIRMED   => 'Unconfirmed',
            self::STATUS_CONFIRMED => 'Confirmed',
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_INACTIVE  => 'Inactive',
            self::STATUS_CANCELLED  => 'Cancelled'
        ];
    }

    /**
     * Returns label of actual status

     * @param string
     */
    public function statusLabel()
    {
        $list = self::listStatus();

        // Validation incase somebody messes up and saves a faulty status in the DB
        return isset($list[$this->status])
            ? $list[$this->status]
            : $this->status;
    }

    public function isConfirmed()
    {
        return $this->status == self::STATUS_CONFIRMED;
    }

    public function isActive()
    {
        return $this->status == self::STATUS_ACTIVE;
    }

    public function statusUnconfirmed()
    {
        return $this->status = self::STATUS_UNCONFIRMED;
    }

    public function statusConfirmed()
    {
        return $this->status = self::STATUS_CONFIRMED;
    }

    public function statusActive()
    {
        return $this->status = self::STATUS_ACTIVE;
    }


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
