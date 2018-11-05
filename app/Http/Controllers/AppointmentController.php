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
        $appointment = $this->createAppointment($request);
        $bedId = $request->input('bed_id');

        if( $bedId !== null) {
            $bed = (Bed::findOrFail($bedId));

            $bed ? $this->asssociateBed($bed, $appointment) : null ;
        }

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
        $bedsList = $this->getBedsList(Bed::all());

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
    private function getBedsList($beds)
    {
        $bedsList = $beds->mapWithKeys(function ($resource) {
            return [$resource->id => "B{$resource->id}"];
        });

        return $bedsList;
    }

    /**
    * Asssociate Appointment with Bed
    *
    * @param Bed $bed
    * @param Appointment $appointment
    * @return void
    */
    private function asssociateBed(Bed $bed, Appointment $appointment)
    {
        $appointment->bed()->associate($bed)->save();;
    }
}
