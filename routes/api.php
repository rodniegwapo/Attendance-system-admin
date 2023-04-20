<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TimeInOutController;
use App\Http\Controllers\YearLevelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::get('/yearLevels', [YearLevelController::class, 'index']);
Route::post('/generateQRCode', [AuthController::class, 'generateQRCode']);
Route::get('/events', [EventController::class, 'index']);
// Route::post('/setTimeIn', [TimeInOutController::class, 'setTimeIn']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/setTimeIn', [TimeInOutController::class, 'setTimeIn']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
