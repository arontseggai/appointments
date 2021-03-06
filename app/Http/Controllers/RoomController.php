<?php

namespace App\Http\Controllers;

use App\Room;
use App\Bed;
use App\Services\ReservationService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $reservationService;

    /**
     * __construct
     *
     * @param ReservationService $reservationService
     * @return void
     *
     * Loads reservation service Api dependency
     *
     */
    public function __construct (ReservationService $reservationService) {
        $this->reservationService = $reservationService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->createRoom($request);

        return redirect()->action('RoomController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $this->updateRoom($request, $room);

        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index');
    }

    public function createRoom(Request $request)
    {
        $room = Room::create($request->input());
    }

    public function updateRoom(Request $request, Room $room)
    {
        $room->update($request->all());
    }

}



