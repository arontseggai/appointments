<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Bed;
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
        $appointments = Appointment::all();

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

        return view('appointments.create', compact('bedsList'));
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
        $bedsList = $this->reservationService->getBedsList();

        return view('appointments.edit', compact('appointment', 'bedsList'));
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
