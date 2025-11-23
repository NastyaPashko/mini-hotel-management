<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create(Room $room)
    {

        return view('booking.create', compact('room'));
    }

    public function store(Request $request, Room $room)
    {
        $validated = $request->validate([
            'date_from' => 'required|date|after_or_equal:today',
            'date_to' => 'required|date|after:date_from',
            'guests_count' => 'required|integer|min:1'
        ]);

        $hasConflict = Booking::where('room_id', $room->id)
            ->where(function ($q) use ($validated) {
                $q->where('date_from', '<', $validated['date_to'])
                    ->where('date_to', '>', $validated['date_from']);
            })
            ->exists();

        if ($hasConflict) {
            return back()->withErrors(['date_from' => 'Room is not available for selected dates']);
        }

        $days = (new \Carbon\Carbon($validated['date_from']))
            ->diffInDays(new \Carbon\Carbon($validated['date_to']));

        $total = $days * $room->base_price;

        $booking = Booking::create([
            'room_id' => $room->id,
            'user_id' => Auth::id(),
            'date_from' => $validated['date_from'],
            'date_to' => $validated['date_to'],
            'guests_count' => $validated['guests_count'],
            'total_amount' => $total,
            'status' => 'pending'
        ]);

        return redirect()->route('booking.services', $booking->id)
            ->with('success', 'Booking created! Now you can add services.');
    }
}
