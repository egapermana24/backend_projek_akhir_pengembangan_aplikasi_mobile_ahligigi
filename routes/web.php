<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'dashboard'); // Mengarahkan '/' ke 'dashboard'
Route::view('dashboard', 'Dashboard.index'); // Menampilkan view 'Dashboard.index' untuk rute 'dashboard'
Route::view('pelayanan', 'Pelayanan.index'); 

