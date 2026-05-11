<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentWebController;
use App\Http\Controllers\BookingWebController;
use App\Http\Controllers\CheckinWebController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('equipments', EquipmentWebController::class);
    Route::get('bookings', [BookingWebController::class, 'index'])->name('bookings.index');
    Route::patch('bookings/{booking}/status', [BookingWebController::class, 'updateStatus'])->name('bookings.updateStatus');
    Route::get('checkins', [CheckinWebController::class, 'index'])->name('checkins.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
