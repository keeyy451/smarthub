<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Http\Requests\EquipmentRequest;

class EquipmentApiController extends Controller
{
    public function index()
    {
        $equipments = Equipment::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Success fetch equipments',
            'data' => $equipments
        ]);
    }

    public function store(EquipmentRequest $request)
    {
        $equipment = Equipment::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Equipment created successfully',
            'data' => $equipment
        ], 201);
    }

    public function update(EquipmentRequest $request, $id)
    {
        $equipment = Equipment::find($id);

        if (!$equipment) {
            return response()->json([
                'success' => false,
                'message' => 'Equipment not found',
                'errors' => []
            ], 404);
        }

        $equipment->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Equipment updated successfully',
            'data' => $equipment
        ]);
    }

    public function destroy($id)
    {
        $equipment = Equipment::find($id);

        if (!$equipment) {
            return response()->json([
                'success' => false,
                'message' => 'Equipment not found',
                'errors' => []
            ], 404);
        }

        $equipment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Equipment deleted successfully',
            'data' => []
        ]);
    }
}
