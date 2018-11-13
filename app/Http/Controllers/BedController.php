<?php

namespace App\Http\Controllers;

use App\Bed;
use App\Room;
use App\Services\ReservationService;
use Illuminate\Http\Request;

class BedController extends Controller
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
        $beds = $this->reservationService->getAllBeds();
        return view('beds.index', compact('beds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = $this->reservationService->getRoomsList();

        return view('beds.create', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->reservationService->createBed($request);

        return redirect()->action('BedController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function show(Bed $bed)
    {
        return view('beds.show', compact('bed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function edit(Bed $bed)
    {
        $rooms = $this->reservationService->getRoomsList($bed);

        return view('beds.edit', compact('bed', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bed $bed)
    {
        $bed->update($request->all());

        return redirect()->route('beds.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bed $bed)
    {
        $bed->delete();


        return redirect()->route('beds.index');
    }
}
