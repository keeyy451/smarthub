<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use Illuminate\Http\Request;

class BookingWebController extends Controller
{
    public function index()
    {
        $bookings = RoomBooking::with('user')->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateStatus(Request $request, RoomBooking $booking)
    {
        $request->validate(['status' => 'required|in:pending,approved,rejected,selesai']);
        $booking->update(['status' => $request->status]);
        
        return redirect()->route('admin.bookings.index')->with('success', 'Booking status updated.');
    }
}
