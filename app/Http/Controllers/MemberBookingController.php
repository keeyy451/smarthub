<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberBookingController extends Controller
{
    /**
     * Display member's booking list
     */
    public function index()
    {
        $bookings = RoomBooking::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return \Inertia\Inertia::render('Member/Booking/Index', [
            'bookings' => $bookings
        ]);
    }

    /**
     * Show create booking form
     */
    public function create()
    {
        return \Inertia\Inertia::render('Member/Booking/Create');
    }

    /**
     * Store a new booking
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required|string|max:255',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);

        // Check for overlapping bookings
        $exists = RoomBooking::where('nama_ruangan', $request->nama_ruangan)
            ->where('tanggal', $request->tanggal)
            ->where('status', '!=', 'rejected')
            ->where(function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('jam_mulai', '>=', $request->jam_mulai)
                      ->where('jam_mulai', '<', $request->jam_selesai);
                })->orWhere(function ($q) use ($request) {
                    $q->where('jam_selesai', '>', $request->jam_mulai)
                      ->where('jam_selesai', '<=', $request->jam_selesai);
                })->orWhere(function ($q) use ($request) {
                    $q->where('jam_mulai', '<=', $request->jam_mulai)
                      ->where('jam_selesai', '>=', $request->jam_selesai);
                });
            })
            ->exists();

        if ($exists) {
            return back()->withInput()->withErrors(['jam_mulai' => 'Ruangan sudah di-booking pada jam tersebut. Silakan pilih waktu lain.']);
        }

        RoomBooking::create([
            'user_id' => Auth::id(),
            'nama_ruangan' => $request->nama_ruangan,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => 'pending',
        ]);

        return redirect()->route('member.booking.index')
            ->with('success', 'Booking ruangan berhasil dibuat! Menunggu persetujuan admin.');
    }

    /**
     * Cancel a pending booking
     */
    public function cancel(RoomBooking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        if ($booking->status !== 'pending') {
            return redirect()->route('member.booking.index')
                ->with('error', 'Hanya booking dengan status pending yang bisa dibatalkan.');
        }

        $booking->delete();

        return redirect()->route('member.booking.index')
            ->with('success', 'Booking berhasil dibatalkan.');
    }
}
