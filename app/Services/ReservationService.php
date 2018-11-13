<?php

namespace App\Services;

use App\Appointment;
use App\Bed;
use App\Room;
use Illuminate\Http\Request;

class ReservationService
{
    public function getAllBeds()
    {
        return Bed::all();
    }

    public function getAvailableBeds()
    {
        return Bed::doesnthave('appointments')->get();
    }

    public function getAllRooms()
    {
        return Room::all();
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
    public function getBedsList(Appointment $appointment = NULL)
    {
        $bedsList = $this->getAvailableBeds()->mapWithKeys(function ($resource) {
            return [$resource->id => "B{$resource->id}"];
        });

        if($appointment !== NULL && $appointment->bed !== NULL) {
            $bed = $appointment->bed;

            $bedsList[$bed->id] = "B{$bed->id}";
        }

        return $bedsList;
    }

    public function getRoomsList()
    {
        $roomsList = $this->getAllRooms()->mapWithKeys(function ($resource) {
            return [$resource->id => "R{$resource->id}"];
        });

        return $roomsList;
    }
}
