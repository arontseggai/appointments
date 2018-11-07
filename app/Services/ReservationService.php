<?php

namespace App\Services;

use App\Appointment;
use App\Bed;
use Illuminate\Http\Request;

class ReservationService
{
    public function getAllBeds()
    {
        return Bed::all();
    }


    public function getAllAppointments() {
        return Appointment::all();
    }

    public function createBed(Request $request)
    {
        $bed = Bed::create($request->input());
    }

    public function createAppointment(Request $request)
    {
        $appointment = Appointment::create($request->input());
        $bedId = $request->input('bed_id');

        if( $bedId !== null) {
            $bed = (Bed::findOrFail($bedId));

            $bed ? $appointment->bed()->associate($bed)->save() : null ;
        }

        return $appointment;
    }

    public function updateAppointment(Request $request, Appointment $appointment)
    {
        $bedId = $request->input('bed_id');
        $appointment->bed()->associate($bedId);
        $appointment->save();
        $appointment->update($request->input());
    }



    /**
    * Return a list of bed id's and fake bed names for usability.
    *
    * @param mixed $beds
    * @return void
    */
    public function getBedsList()
    {

        $bedsList = $this->getAllBeds()->mapWithKeys(function ($resource) {
            return [$resource->id => "B{$resource->id}"];
        });

        return $bedsList;
    }

}
