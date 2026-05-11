<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EquipmentApiController;
use App\Http\Controllers\Api\BookingApiController;
use App\Http\Controllers\Api\CheckinApiController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Equipments
    Route::get('/equipments', [EquipmentApiController::class, 'index']);
    Route::post('/equipments', [EquipmentApiController::class, 'store']);
    Route::put('/equipments/{id}', [EquipmentApiController::class, 'update']);
    Route::delete('/equipments/{id}', [EquipmentApiController::class, 'destroy']);

    // Bookings
    Route::get('/bookings', [BookingApiController::class, 'index']);
    Route::post('/bookings', [BookingApiController::class, 'store']);

    // Checkin
    Route::post('/checkin', [CheckinApiController::class, 'store']);
});
