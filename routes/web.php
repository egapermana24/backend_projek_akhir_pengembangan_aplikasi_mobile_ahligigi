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

    // DASHBOARD
    Route::view('dashboard', 'Dashboard.index');
    // PELAYANAN
    Route::resource('pelayanan', LayananController::class);
    Route::view('add-pelayanan', 'Pelayanan.add');
    Route::post('/pelayanan-add', [LayananController::class, 'store'])->name('pelayanan.store');
    Route::get('/pelayanan-edit/{layanan}', [LayananController::class, 'edit'])->name('pelayanan.edit');
    Route::get('/pelayanan-delete/{layanan}', [LayananController::class, 'destroy'])->name('pelayanan.destroy');
    Route::put('/pelayanan-update/{layanan}', [LayananController::class, 'update'])->name('pelayanan.update');
    // PEMESANAN
    Route::resource('pemesanan', PemesananController::class);
    Route::put('/pemesanan-update/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
    Route::get('/pemesanan-delete/{pemesanan}', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');
    // PENGUNJUNG
    Route::resource('pengunjung', PengunjungController::class);
    // DOKTER
    Route::resource('dokter', DokterController::class);
    // PENGGUNA APLIKASI
    Route::resource('user', PenggunaController::class);
    // ULASAN
    Route::resource('ulasan', UlasanController::class);
    // PROFIL
    Route::resource('profil', ProfilAhliGigiController::class);
    // LOGOUT
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});
