<?php

use App\Http\Controllers\PacketDataController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/', fn() => "Application is running!");

Route::post('/task1/packet-data', [PacketDataController::class, 'store']);
Route::get('/task1/packet-data', [PacketDataController::class, 'index']);

Route::get('/task2/packet-data', [PacketDataController::class, 'packetT2Data']);
Route::post('/task2/packet-data', [PacketDataController::class, 'storeT2PacketData']);
