@extends('layouts.app')

@section('content')

<div class="row justify-content-md-center">
    <div class="col-6">
        <h2>Edit  Room R{{$room->id}}</h2>
        {!! Form::model($room, ['method' => 'PATCH', 'action' => ['RoomController@update', $room->id]]) !!}
            @include('rooms._form')
        {!! Form::close() !!}
    </div>
</div>

@stop
