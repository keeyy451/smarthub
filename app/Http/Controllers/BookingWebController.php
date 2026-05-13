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

<<<<<<< HEAD
=======
    public function create()
    {
        $users = \App\Models\User::all();
        return view('admin.bookings.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_ruangan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'status' => 'required|in:pending,approved,rejected,selesai'
        ]);

        RoomBooking::create($validated);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking created successfully.');
    }

    public function edit(RoomBooking $booking)
    {
        $users = \App\Models\User::all();
        return view('admin.bookings.edit', compact('booking', 'users'));
    }

    public function update(Request $request, RoomBooking $booking)
    {
        $validated = $request->validate([
            'nama_ruangan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'status' => 'required|in:pending,approved,rejected,selesai'
        ]);

        $booking->update($validated);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully.');
    }

>>>>>>> development
    public function updateStatus(Request $request, RoomBooking $booking)
    {
        $request->validate(['status' => 'required|in:pending,approved,rejected,selesai']);
        $booking->update(['status' => $request->status]);
        
        return redirect()->route('admin.bookings.index')->with('success', 'Booking status updated.');
    }
<<<<<<< HEAD
=======

    public function destroy(RoomBooking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
    }
>>>>>>> development
}
