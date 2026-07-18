<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RoomBooking;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Facades\Auth;

class BookingApiController extends Controller
{
    public function index()
    {
        $bookings = RoomBooking::with('user')->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Success fetch bookings',
            'data' => $bookings
        ]);
    }

    public function store(BookingRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';

        $booking = RoomBooking::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Room booking created successfully',
            'data' => $booking
        ], 201);
    }
}
