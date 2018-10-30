@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-md-8">
            <div class="content-container">
                <h3>Appointments</h3>
                <a href="{!! action('AppointmentController@create'); !!}"><button class="btn btn-outline-primary btn-sm">New</button></a>
            </div>
            <div class="card">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Patient</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $indexKey =>$appointment)
                        <tr>
                            <th scope="row">{{ $indexKey + 1 }}</th>
                            <td>Bert Broodje</td>
                            <td>01-01-2019</td>
                            <td>01-03-2019</td>
                            <td>New</td>
                            <td class="right">
                                <a href="{!! action('AppointmentController@show', $appointment); !!}" class="card-link"><button class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></button></a>
                                <a href="{!! action('AppointmentController@edit', $appointment); !!}" class="card-link"><button class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button></a>
                                <form action="{{ route('appointments.destroy', $appointment) }}" method="POST">
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
