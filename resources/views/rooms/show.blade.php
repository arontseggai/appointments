@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Capacity: {{ $room->capacity }}</h6>
                    <a href="{!! action('RoomController@destroy', $room); !!}" class="card-link">Delete Room</a>
                    <a href="{!! action('RoomController@edit', $room); !!}" class="card-link"><i class="fas fa-edit"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
