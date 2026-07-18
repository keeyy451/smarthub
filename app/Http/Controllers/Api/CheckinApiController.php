<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EquipmentCheckin;
use App\Models\Equipment;
use App\Http\Requests\CheckinRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckinApiController extends Controller
{
    public function store(CheckinRequest $request)
    {
        $data = $request->validated();
        
        $equipment = Equipment::find($data['equipment_id']);
        
        if ($data['status'] == 'checked_in') {
            if ($equipment->status != 'dipinjam') {
                return response()->json([
                    'success' => false,
                    'message' => 'Equipment is not checked out',
                    'errors' => []
                ], 400);
            }
            $equipment->update(['status' => 'tersedia']);
        } else {
            if ($equipment->status != 'tersedia') {
                return response()->json([
                    'success' => false,
                    'message' => 'Equipment is not available',
                    'errors' => []
                ], 400);
            }
            $equipment->update(['status' => 'dipinjam']);
        }

        $checkin = EquipmentCheckin::create([
            'user_id' => Auth::id(),
            'equipment_id' => $data['equipment_id'],
            'waktu_checkin' => Carbon::now(),
            'status' => $data['status']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Equipment checkin processed successfully',
            'data' => $checkin
        ], 201);
    }
}
