<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\AutomobilController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ParkingTerminController;
use App\Http\Controllers\ZaposleniController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/zaposleni', function (Request $request) {
    return $request->user();
});

Route::resource('automobili',AutomobilController::class);
Route::resource('parking',ParkingController::class);
Route::resource('zaposleni',ZaposleniController::class);
Route::resource('parkingTermin',ParkingTerminController::class);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::resource('parkingTermin', ParkingTerminController::class)->only(['show','update','store','destroy']);
    Route::resource('automobili',AutomobilController::class)->only(['update','store','destroy']);
    Route::resource('parking',ParkingController::class)->only(['update','store','destroy']);
    Route::resource('zaposleni',ZaposleniController::class)->only(['show','update','store','destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
