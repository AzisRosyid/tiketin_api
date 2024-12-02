<?php

use App\Http\Controllers\BusDepartureController;
use App\Http\Controllers\BusScheduleController;
use App\Http\Controllers\CheckpointController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SeatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\BusSchedule;
use App\Models\Checkpoint;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('refresh', [UserController::class, 'refreshToken']);
Route::post('auth', [UserController::class, 'auth']);
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::get('checkpoint', [CheckpointController::class, 'index']);
Route::get('bus/schedule', [BusScheduleController::class, 'index']);
Route::get('bus/departure', [BusDepartureController::class, 'index']);
Route::post('bus/departure', [BusDepartureController::class, 'store']);
Route::get('bus/departure/{id}', [BusDepartureController::class, 'show']);
Route::get('seat', [SeatController::class, 'index']);
Route::get('ticket', [OrderController::class, 'index']);
Route::post('order', [OrderController::class, 'store']);
Route::post('order/detail', [OrderController::class, 'storeDetail']);

Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'
], function ($router) {});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
