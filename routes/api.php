<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\AutomobilController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ParkingTerminController;
use App\Http\Controllers\KorisnikController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('automobili',AutomobilController::class);
Route::resource('parking',ParkingController::class);
Route::resource('korisnik',KorisnikController::class);
Route::resource('parkingTermin',ParkingTerminController::class);

Route::post('/register',[AuthController::class,'register']);

