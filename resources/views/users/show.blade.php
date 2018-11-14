@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>{{ $role }}</p>
                    <p>{{ $user->name }}</p>
                    <p>{{ $user->email }}</p>
                    <p>{{ $user->created_at }}</p>
                    <a href="{!! action('UserController@edit', $user); !!}" class="card-link"><i class="fas fa-edit"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
