@extends('layouts.app')

@section('content')

<div class="row justify-content-md-center">
    <div class="col-6">
        <h2>Edit  Appointment A{{$appointment->id}}</h2>
        {!! Form::model($appointment, ['method' => 'PATCH', 'action' => ['AppointmentController@update', $appointment->id]]) !!}
            @include('appointments._form')
        {!! Form::close() !!}
    </div>
</div>

@stop
