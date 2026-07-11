<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\RoomBooking;
use App\Models\EquipmentCheckin;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'member') {
            return redirect()->route('member.dashboard');
        }

        $stats = [
            'total_equipment' => Equipment::count(),
            'tersedia' => Equipment::where('status', 'tersedia')->count(),
            'dipinjam' => Equipment::where('status', 'dipinjam')->count(),
            'maintenance' => Equipment::where('status', 'maintenance')->count(),
            'total_bookings' => RoomBooking::count(),
            'booking_pending' => RoomBooking::where('status', 'pending')->count(),
            'total_checkins' => EquipmentCheckin::count(),
            'total_members' => User::where('role', 'member')->count(),
        ];

        $recent_checkins = EquipmentCheckin::with(['user', 'equipment'])
            ->latest('waktu_checkin')
            ->take(5)
            ->get();

        $recent_bookings = RoomBooking::with('user')
            ->latest()
            ->take(5)
            ->get();

        $recent_users = User::where('role', 'member')
            ->latest()
            ->take(5)
            ->get();

        return \Inertia\Inertia::render('Admin/Dashboard', [
            'stats' => $stats,
            'recent_checkins' => $recent_checkins,
            'recent_bookings' => $recent_bookings,
            'recent_users' => $recent_users
        ]);
    }
}
