<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipmentWebController;
use App\Http\Controllers\BookingWebController;
use App\Http\Controllers\CheckinWebController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberDashboardController;
use App\Http\Controllers\MemberEquipmentController;
use App\Http\Controllers\MemberBookingController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('equipments', EquipmentWebController::class);
    Route::resource('bookings', BookingWebController::class);
    Route::patch('bookings/{booking}/status', [BookingWebController::class, 'updateStatus'])->name('bookings.updateStatus');
    Route::get('checkins', [CheckinWebController::class, 'index'])->name('checkins.index');
});

// Member Routes
Route::middleware(['auth'])->prefix('member')->name('member.')->group(function () {
    Route::get('/', [MemberDashboardController::class, 'index'])->name('dashboard');

    // Equipment
    Route::get('equipment', [MemberEquipmentController::class, 'index'])->name('equipment.index');
    Route::post('equipment/{equipment}/checkout', [MemberEquipmentController::class, 'checkout'])->name('equipment.checkout');
    Route::post('equipment/{equipment}/checkin', [MemberEquipmentController::class, 'checkin'])->name('equipment.checkin');
    Route::get('equipment/history', [MemberEquipmentController::class, 'history'])->name('equipment.history');

    // Booking
    Route::get('booking', [MemberBookingController::class, 'index'])->name('booking.index');
    Route::get('booking/create', [MemberBookingController::class, 'create'])->name('booking.create');
    Route::post('booking', [MemberBookingController::class, 'store'])->name('booking.store');
    Route::delete('booking/{booking}', [MemberBookingController::class, 'cancel'])->name('booking.cancel');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
