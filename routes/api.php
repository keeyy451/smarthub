<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/equipment', [\App\Http\Controllers\Api\EquipmentController::class, 'index']);
    Route::post('/equipment/{equipment}/checkout', [\App\Http\Controllers\Api\EquipmentController::class, 'checkout']);
    Route::post('/equipment/{equipment}/checkin', [\App\Http\Controllers\Api\EquipmentController::class, 'checkin']);
});
