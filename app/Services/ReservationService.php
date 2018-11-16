<?php

namespace App\Services;

use App\Appointment;
use App\Bed;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getAvailableRooms()
    {
        return Room::doesnthave('beds')->get();
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
        $employeeId = $request->input('employee_id');

        if( $bedId !== null) {
            $bed = (Bed::findOrFail($bedId));

            $bed ? $appointment->bed()->associate($bed)->save() : null ;
        }

        if( $employeeId !== null) {
            $employee = (User::findOrFail($employeeId));

            $employee ? $appointment->employee()->associate($employee)->save() : null ;
        }

        return $appointment;
    }

    public function updateAppointment(Request $request, Appointment $appointment)
    {
        $bedId = $request->input('bed_id');
        $employeeId = $request->input('employee_id');
        $appointment->bed()->associate($bedId);
        $appointment->employee()->associate($employeeId);
        $appointment->save();
        $appointment->update($request->input());
    }

    public function updateUser(Request $request, User $user)
    {
        $user->update($request->all());
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

    public function getRoomsList(Bed $bed = NULL)
    {
        $roomsList = $this->getAvailableRooms()->mapWithKeys(function ($resource) {
            return [$resource->id => "R{$resource->id}"];
        });

        if($bed !== NULL && $bed->room !== NULL) {
            $room = $bed->room;

            $roomsList[$room->id] = "R{$room->id}";
        }

        return $roomsList;
    }

    public function getEmployeesList()
    {
        $user = Auth::user();
        $employees = User::role('employee')->get()->pluck('name', 'id');
        $employees[$user->id] = $user->name . ' (assign to self)';

        return $employees;
    }
}
