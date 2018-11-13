@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-md-8">
            <div class="content-container">
                <h3>Beds</h3>
                <a href="{!! action('BedController@create'); !!}"><button class="btn btn-outline-primary btn-sm">New</button></a>
            </div>
            <div class="card">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Bed</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beds as $indexKey =>$bed)
                        <tr>
                            <th scope="row">{{ $indexKey + 1 }}</th>
                            <td>B{{ $bed->id }}</td>
                            <td class="right">
                                <a href="{!! action('BedController@show', $bed); !!}" class="card-link"><button class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></button></a>
                                <a href="{!! action('BedController@edit', $bed); !!}" class="card-link"><button class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button></a>
                                <form action="{{ route('beds.destroy', $bed) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger btn-sm margin-left-20"><i class="fas fa-trash-alt"></i></button>
                                </form>
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
