@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-6">
        <h2>New Room</h2>
        {!! Form::model($room = new \App\Room, ['url' => 'rooms']) !!}
        <div class="form-group">
            {!! Form::label('capacity', 'Capacity:') !!}
            {!! Form::selectRange('capacity', 1, 32, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>

@stop
