@extends('layouts.app')

@section('content')

<div class="row justify-content-md-center">
    <div class="col-6">
        <h2>Edit  Room R{{$room->id}}</h2>
        {!! Form::model($room, ['url' => 'rooms']) !!}
            @include('rooms._form')
        {!! Form::close() !!}
    </div>
</div>

@stop
