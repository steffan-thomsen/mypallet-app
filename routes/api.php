<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TransportUnitController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/transport-units', [TransportUnitController::class, 'index']);

Route::get('/transport-units/{type}', [TransportUnitController::class, 'filterByType']);

Route::get('/search-transport-units', [TransportUnitController::class, 'search']);

Route::post('/transport-units', [TransportUnitController::class, 'store']);
