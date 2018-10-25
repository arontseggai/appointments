@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-md-4">
            <div class="card">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Room</th>
                            <th scope="col">Capacity</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $indexKey =>$room)
                        <tr>
                            <th scope="row">{{ $indexKey + 1 }}</th>
                            <td>R{{ $room->id }}</td>
                            <td>{{ $room->capacity }}</td>
                            <td class="right">
                                <a href="{!! action('RoomController@show', $room); !!}" class="card-link"><i class="fas fa-eye"></i></a>
                                <a href="{!! action('RoomController@edit', $room); !!}" class="card-link"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('rooms.destroy', $room) }}" method="POST" onclick="confirm('Are you sure?')">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm margin-left-20">Delete</button>
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
