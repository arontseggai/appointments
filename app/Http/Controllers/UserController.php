<?php

namespace App\Http\Controllers;

use App\User;
use App\Room;
use App\Bed;
use App\Services\ReservationService;
use Illuminate\Http\Request;

class userController extends Controller
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
    public function index(Request $request)
    {
        $users = User::role($request->role)->get();
        $title = ucfirst($request->role) . 's';

        return view('users.index', compact('users', 'title'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('rooms.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $this->createRoom($request);

    //     return redirect()->action('RoomController@index');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $role = ucfirst($user->roles[0]->name);

        return view('users.show', compact('user', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->reservationService->updateUser($request, $user);

        return redirect()->route('users.show', $user);
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\User  $user
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(User $user)
    // {
    //     $room->delete();

    //     return redirect()->route('rooms.index');
    // }

}



