@extends('layouts.app')

@section('content')

<div class="row justify-content-md-center">
    <div class="col-6">
        <h2>New Appointment</h2>
        {!! Form::model($appointment = new \App\Appointment, ['url' => 'appointments']) !!}
            @include('appointments._form')
        {!! Form::close() !!}
    </div>
</div>

@stop
