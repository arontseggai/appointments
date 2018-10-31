<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Bed;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bedsList = $this->getBedsList(Bed::all());

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
        dd($request->input());
        $this->createAppointment($request);

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
        return view('appointments.edit', compact('appointment'));
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
        $this->updateAppointment($request, $appointment);

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

    private function createAppointment(Request $request)
    {
        return Appointment::create($request->input());
    }

    private function updateAppointment(Request $request, Appointment $appointment)
    {
        return $appointment->update($request->input());
    }

    private function getBedsList($beds)
    {
        $bedsList = $beds->mapWithKeys(function ($resource) {
            return [$resource->id => "B{$resource->id}"];
        });

        return $bedsList;
    }
}
