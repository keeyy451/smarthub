<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\EquipmentCheckin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MemberEquipmentController extends Controller
{
    /**
     * Display list of all equipment for member
     */
    public function index(Request $request)
    {
        $query = Equipment::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_peralatan', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        $equipments = $query->paginate(12);
        $categories = Equipment::select('kategori')->distinct()->pluck('kategori');

        return view('member.equipment.index', compact('equipments', 'categories'));
    }

    /**
     * Checkout (pinjam) equipment
     */
    public function checkout(Equipment $equipment)
    {
        if ($equipment->status !== 'tersedia') {
            return redirect()->route('member.equipment.index')
                ->with('error', 'Equipment tidak tersedia untuk dipinjam.');
        }

        $equipment->update(['status' => 'dipinjam']);

        EquipmentCheckin::create([
            'user_id' => Auth::id(),
            'equipment_id' => $equipment->id,
            'waktu_checkin' => Carbon::now(),
            'status' => 'checked_out',
        ]);

        return redirect()->route('member.equipment.index')
            ->with('success', 'Equipment berhasil dipinjam!');
    }

    /**
     * Checkin (kembalikan) equipment
     */
    public function checkin(Equipment $equipment)
    {
        if ($equipment->status !== 'dipinjam') {
            return redirect()->route('member.equipment.index')
                ->with('error', 'Equipment tidak dalam status dipinjam.');
        }

        // Verify that the current user is the one who borrowed it
        $lastCheckout = EquipmentCheckin::where('equipment_id', $equipment->id)
            ->where('status', 'checked_out')
            ->latest('waktu_checkin')
            ->first();

        if (!$lastCheckout || $lastCheckout->user_id !== Auth::id()) {
            return redirect()->route('member.equipment.index')
                ->with('error', 'Anda tidak memiliki otoritas untuk mengembalikan equipment ini karena dipinjam oleh user lain.');
        }

        $equipment->update(['status' => 'tersedia']);

        EquipmentCheckin::create([
            'user_id' => Auth::id(),
            'equipment_id' => $equipment->id,
            'waktu_checkin' => Carbon::now(),
            'status' => 'checked_in',
        ]);

        return redirect()->route('member.equipment.index')
            ->with('success', 'Equipment berhasil dikembalikan!');
    }

    /**
     * Show member's checkin/checkout history
     */
    public function history()
    {
        $checkins = EquipmentCheckin::with('equipment')
            ->where('user_id', Auth::id())
            ->latest('waktu_checkin')
            ->paginate(10);

        return view('member.equipment.history', compact('checkins'));
    }
}
