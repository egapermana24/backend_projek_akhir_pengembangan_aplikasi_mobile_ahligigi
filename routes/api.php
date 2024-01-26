<?php

use App\Http\Controllers\api\LayananController;
use App\Http\Controllers\api\PemesananController;
use App\Http\Controllers\api\UlasanController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('Layanan', LayananController::class);
Route::apiResource('Ulasan', UlasanController::class);
Route::apiResource('Pemesanan', PemesananController::class);
