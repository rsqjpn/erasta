<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServoController;


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

// Menampilkan halaman kontrol AC
Route::get('/temp', [ServoController::class, 'index']);
Route::post('/set-temperature', [ServoController::class, 'setTemperature']);
Route::get('/get-mode', [ServoController::class, 'getMode']);
Route::post('/set-mode', [ServoController::class, 'setMode']);
Route::post('/set-angle', [ServoController::class, 'setAngle']);

