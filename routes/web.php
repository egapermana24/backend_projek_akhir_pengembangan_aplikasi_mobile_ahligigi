<?php

use App\Http\Controllers\LayananController;
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
Route::resource('pelayanan', LayananController::class);
Route::view('add-kategori', 'Kategori.add');
Route::view('add-pelayanan', 'Pelayanan.add');
Route::view('pemesanan', 'Pemesanan.index');
Route::view('user', 'User.index');
Route::view('ulasan', 'Ulasan.index');
Route::view('profil', 'Profil.index');
Route::view('login', 'Login.index');
