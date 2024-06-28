<?php

use App\Http\Controllers\LayananController;
use App\Http\Controllers\PemesananController;
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

// routes/web.php
Route::get('/Dashboard/index', function () {
    return view('Dashboard.index');
});

Route::get('/', function () {
    return view('Login.index'); // Ubah sesuai dengan struktur folder Anda
});

// Route::redirect('/', 'dashboard'); // Mengarahkan '/' ke 'dashboard'
Route::get('/login', [App\Http\Controllers\UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\UserController::class, 'authenticate']);
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
Route::view('dashboard', 'Dashboard.index'); // Menampilkan view 'Dashboard.index' untuk rute 'dashboard'
Route::resource('pelayanan', LayananController::class);
Route::put('/pemesanan-update/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
Route::resource('pemesanan', PemesananController::class);
Route::view('add-kategori', 'Kategori.add');
Route::view('add-pelayanan', 'Pelayanan.add');
Route::view('user', 'User.index');
Route::view('ulasan', 'Ulasan.index');
Route::view('profil', 'Profil.index');
Route::view('login', 'Login.index');
Route::view('dokter', 'Dokter.index');
Route::view('pengunjung', 'Pengunjung.index');
