<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;
Route::group([
 'middleware' => 'api',
 'prefix' => 'auth'
], function ($router) {
 Route::post('/login', [AuthController::class, 'login']);
 Route::post('/register', [AuthController::class, 'register']);
 Route::post('/logout', [AuthController::class, 'logout']);
 Route::post('/refresh', [AuthController::class, 'refresh']);
 Route::get('/user-profile', [AuthController::class, 'userProfile']);
}); 


Route::middleware('api')->group(function () {
            Route::resource('reservations', ReservationController::class);        
});

Route::get('/res/{idcha}', [ReservationController::class,'showReservationBycha']);





Route::middleware('api')->group(function () {
    Route::resource('chambres',ChambreController::class);
});


Route::middleware('api')->group(function () {
    Route::resource('clients', ClientController::class);
});


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