<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Services\ReservationService;
use Illuminate\Http\Request;


class AppointmentController extends Controller
{
    protected $reservationService;

    /**
     * __construct
     *
     * @param ReservationService $reservationService
     * @return void
     *
     * Loads reservation service Api dependency
     *
     */
    public function __construct (ReservationService $reservationService) {
        $this->reservationService = $reservationService;
      }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $appointments = $this->reservationService->getAllAppointments();

        return view('appointments.index', compact('appointments'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $bedsList = $this->reservationService->getBedsList();
        $employeesList = $this->reservationService->getEmployeesList();

        return view('appointments.create', compact('bedsList', 'employeesList'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $appointment = $this->reservationService->createAppointment($request);

        return redirect()->action('AppointmentController@index');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Appointment  $appointment
    * @return \Illuminate\Http\Response
    */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Appointment  $appointment
    * @return \Illuminate\Http\Response
    */
    public function edit(Appointment $appointment)
    {
        $bedsList = $this->reservationService->getBedsList($appointment);
        $employeesList = $this->reservationService->getEmployeesList();

        return view('appointments.edit', compact('appointment', 'bedsList', 'employeesList'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Appointment  $appointment
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Appointment $appointment)
    {
        $this->reservationService->updateAppointment($request, $appointment);

        return redirect()->route('appointments.index');
    }


    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Appointment  $appointment
    * @return \Illuminate\Http\Response
    */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index');
    }
}
