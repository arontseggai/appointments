@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Appointment A{{ $appointment->id }}</h5>
                    <a href="{!! action('AppointmentController@destroy', $appointment); !!}" class="card-link">Delete appointment</a>
                    <a href="{!! action('AppointmentController@edit', $appointment); !!}" class="card-link"><i class="fas fa-edit"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
