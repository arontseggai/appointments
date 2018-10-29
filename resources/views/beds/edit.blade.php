@extends('layouts.app')

@section('content')

<div class="row justify-content-md-center">
    <div class="col-6">
        <h2>Edit  Bed B{{$bed->id}}</h2>
        {!! Form::model($bed, ['method' => 'PATCH', 'action' => ['BedController@update', $bed->id]]) !!}
            @include('beds._form')
        {!! Form::close() !!}
    </div>
</div>

@stop
