<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\RoomBooking;
use App\Models\EquipmentCheckin;
use Illuminate\Support\Facades\Auth;

class MemberDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $stats = [
            'my_bookings' => RoomBooking::where('user_id', $user->id)->count(),
            'booking_pending' => RoomBooking::where('user_id', $user->id)->where('status', 'pending')->count(),
            'booking_approved' => RoomBooking::where('user_id', $user->id)->where('status', 'approved')->count(),
            'my_checkins' => EquipmentCheckin::where('user_id', $user->id)->count(),
            'equipment_tersedia' => Equipment::where('status', 'tersedia')->count(),
        ];

        $recent_bookings = RoomBooking::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        $recent_checkins = EquipmentCheckin::with('equipment')
            ->where('user_id', $user->id)
            ->latest('waktu_checkin')
            ->take(5)
            ->get();

        // Get equipment currently borrowed by this user
        // We find equipments where the LATEST checkin record for that equipment is 'checked_out' by this user
        $borrowed_equipments = Equipment::where('status', 'dipinjam')
            ->whereHas('equipmentCheckins', function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->where('status', 'checked_out')
                    ->whereRaw('waktu_checkin = (select max(waktu_checkin) from equipment_checkins where equipment_id = equipments.id)');
            })->get();

        return \Inertia\Inertia::render('Member/Dashboard', [
            'stats' => $stats,
            'recent_bookings' => $recent_bookings,
            'recent_checkins' => $recent_checkins,
            'borrowed_equipments' => $borrowed_equipments
        ]);
    }
}
