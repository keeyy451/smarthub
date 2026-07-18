<?php

namespace App\Http\Controllers;

use App\Models\EquipmentCheckin;
use Illuminate\Http\Request;

class CheckinWebController extends Controller
{
    public function index()
    {
        $checkins = EquipmentCheckin::with(['user', 'equipment'])->latest('waktu_checkin')->paginate(10);
        return \Inertia\Inertia::render('Admin/Checkins/Index', [
            'checkins' => $checkins
        ]);
    }
}
