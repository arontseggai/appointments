@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-md-8">
            <div class="content-container">
                <h3>{{ $title }}</h3>
            </div>
            <div class="card">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $indexKey =>$user)
                        <tr>
                            <th scope="row">{{ $indexKey + 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->getRoleNames()[0] }}</td>
                            <td class="right">
                                <a href="{!! action('UserController@show', $user); !!}" class="card-link"><button class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></button></a>
                                <a href="{!! action('UserController@edit', $user); !!}" class="card-link"><button class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop
