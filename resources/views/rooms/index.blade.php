@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col col-sm-6">
            <ul class="list-group">
                @foreach ($rooms as $room)
                <li class="list-group-item">Room R{{ $room->id }} <a href="{!! action('RoomController@show', $room); !!}"><i class="fas fa-chevron-right float-right"></i></a> </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@stop
