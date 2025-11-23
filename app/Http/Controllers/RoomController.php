<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{

    public function index()
    {

        $rooms = Room::all();
        $roomTypes = RoomType::all();
        return view('staff.accommodation.index', compact('rooms', 'roomTypes'));
    }
    public function showRoomsPage()
    {


        return view('hotel-rooms');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|string',
            'room_type_id' => 'required|integer',
            'places' => 'required|integer|min:1',
            'base_price' => 'required|numeric|min:0',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('rooms', 'public');
        }
        Room::create($validated);

        return redirect()->back()->with('success', 'Room created successfully!');
    }
    public function delete(Room $room)
    {
        
        if ($room->photo) {
            Storage::disk('public')->delete($room->photo);
        }
        $room->delete();
        return redirect()->back()->with('success', 'Room deleted successfully!');
    }
}
