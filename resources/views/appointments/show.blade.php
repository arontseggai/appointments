@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bed title</h5>
                    <a href="{!! action('BedController@destroy', $bed); !!}" class="card-link">Delete Bed</a>
                    <a href="{!! action('BedController@edit', $bed); !!}" class="card-link"><i class="fas fa-edit"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
