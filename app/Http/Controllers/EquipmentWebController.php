<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Http\Requests\EquipmentRequest;

class EquipmentWebController extends Controller
{
    public function index(Request $request)
    {
        $query = Equipment::query();

        if ($request->has('search')) {
            $query->where('nama_peralatan', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $equipments = $query->paginate(10);

        return view('admin.equipments.index', compact('equipments'));
    }

    public function create()
    {
        return view('admin.equipments.create');
    }

    public function store(EquipmentRequest $request)
    {
        Equipment::create($request->validated());
        return redirect()->route('admin.equipments.index')->with('success', 'Equipment created successfully.');
    }

    public function edit(Equipment $equipment)
    {
        return view('admin.equipments.edit', compact('equipment'));
    }

    public function update(EquipmentRequest $request, Equipment $equipment)
    {
        $equipment->update($request->validated());
        return redirect()->route('admin.equipments.index')->with('success', 'Equipment updated successfully.');
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect()->route('admin.equipments.index')->with('success', 'Equipment deleted successfully.');
    }
}
