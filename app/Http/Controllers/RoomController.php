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
        return view('staff.accommodation.rooms-index', compact('rooms', 'roomTypes'));
    }
    public function showRoomsPage(Request $request)
    {
        $query = Room::query()->with('roomType');

        if ($request->filled('room_type')) {
            $query->whereHas('roomType', function ($q) use ($request) {
                $q->where('name', strtolower($request->room_type));
            });
        }
        if ($request->filled('available')) {
            $query->where('is_available', $request->available);
        }
        if ($request->filled('capacity')) {
            $query->where('places', '>=', $request->capacity);
        }
        if ($request->filled('price')) {
            $query->where('base_price', '<=', $request->price);
        }

        if ($request->filled(['check_in', 'check_out'])) {

            $checkIn  = $request->check_in;
            $checkOut = $request->check_out;
            $query->whereDoesntHave('bookings', function ($q) use ($checkIn, $checkOut) {

                $q->whereIn('status', ['confirmed', 'pending'])
                    ->where(function ($overlap) use ($checkIn, $checkOut) {
                        $overlap->where('check_in', '<', $checkOut)
                            ->where('check_out', '>', $checkIn);
                    });
            });
        }

        $rooms = $query->get();

        $roomTypes = RoomType::all();

        return view('hotel-rooms', compact('rooms', 'roomTypes'));
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
    public function update(Room $room, Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|string',
            'room_type_id' => 'required|integer|exists:room_types,id',
            'places' => 'required|integer|min:1',
            'base_price' => 'required|numeric|min:0',
            'photo' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('photo')) {

            if ($room->photo) {
                Storage::disk('public')->delete($room->photo);
            }
            $validated['photo'] = $request->file('photo')->store('rooms', 'public');
        }
        $room->update($validated);
        return redirect()->back()->with('success', 'Room updated successfully!');
    }
}
