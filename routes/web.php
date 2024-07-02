<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\ProfilAhliGigiController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\UserController;
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
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('Login.index'); // Ubah sesuai dengan struktur folder Anda
    });

    Route::get('/login', [UserController::class, 'index'])->name('login');
    Route::post('/login', [UserController::class, 'authenticate']);
});


// Rute yang hanya bisa diakses oleh pengguna yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/Dashboard/index', function () {
        return view('Dashboard.index');
    });

    Route::view('dashboard', 'Dashboard.index'); // Menampilkan view 'Dashboard.index' untuk rute 'dashboard'
    Route::resource('pelayanan', LayananController::class);
    Route::put('/pemesanan-update/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
    Route::resource('pemesanan', PemesananController::class);
    Route::resource('pengunjung', PengunjungController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('user', PenggunaController::class);
    Route::resource('ulasan', UlasanController::class);
    Route::resource('profil', ProfilAhliGigiController::class);
    Route::view('add-kategori', 'Kategori.add');
    Route::view('add-pelayanan', 'Pelayanan.add');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});
