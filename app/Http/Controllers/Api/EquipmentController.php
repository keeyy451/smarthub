<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EquipmentController extends Controller
{
    public function index()
    {
        return response()->json(Equipment::all());
    }

    public function checkin(Request $request, Equipment $equipment)
    {
        if ($equipment->status !== 'checked_out') {
            return response()->json(['message' => 'Equipment is not checked out.'], 400);
        }

        $booking = $equipment->bookings()->where('status', 'active')->first();
        if ($booking) {
            $booking->update([
                'status' => 'returned',
                'return_time' => Carbon::now()
            ]);
        }

        $equipment->update(['status' => 'available']);

        return response()->json([
            'message' => 'Equipment checked in successfully',
            'equipment' => $equipment
        ]);
    }

    public function checkout(Request $request, Equipment $equipment)
    {
        if ($equipment->status !== 'available') {
            return response()->json(['message' => 'Equipment is currently unavailable.'], 400);
        }

        $booking = $equipment->bookings()->create([
            'user_id' => $request->user()->id,
            'checkout_time' => Carbon::now(),
            'status' => 'active'
        ]);

        $equipment->update(['status' => 'checked_out']);

        return response()->json([
            'message' => 'Equipment checked out successfully',
            'booking' => $booking,
            'equipment' => $equipment
        ]);
    }
}
