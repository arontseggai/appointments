@extends('layouts.app')

@section('content')

<div class="row justify-content-md-center">
    <div class="col-6">
        <h2>Edit  User {{$user->name}}</h2>
        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
            @include('users._form')
        {!! Form::close() !!}
    </div>
</div>

@stop
