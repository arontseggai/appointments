@extends('layouts.app')

@section('content')

<div class="row justify-content-md-center">
    <div class="col-6">
        <h2>New Bed</h2>
        {!! Form::model($bed = new \App\Bed, ['url' => 'beds']) !!}
            @include('beds._form')
        {!! Form::close() !!}
    </div>
</div>

@stop
