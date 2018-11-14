@extends('layouts.app')

@section('content')

<div class="row justify-content-md-center">
    <div class="col-6">
        <h2>New Room</h2>
        {!! Form::model($room = new \App\Room, ['url' => 'rooms']) !!}
            @include('rooms._form')
        {!! Form::close() !!}
    </div>
</div>

@stop
