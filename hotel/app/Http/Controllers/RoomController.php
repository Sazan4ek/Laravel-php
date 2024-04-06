<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();

        return view('rooms.index',[
            'rooms' => $rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        Room::create($request->all());

        return to_route('rooms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('rooms.show', [
            'room' => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', [
            'room' => $room
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, Room $room)
    {
        $room->update($request->all());

        return to_route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return to_route('rooms.index');
    }
}
