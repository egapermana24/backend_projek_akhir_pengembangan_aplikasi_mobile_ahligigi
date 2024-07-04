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
    Route::get('/pengunjung-edit/{pengunjung}', [PengunjungController::class, 'edit'])->name('pengunjung.edit');
    Route::get('/pengunjung-delete/{pengunjung}', [PengunjungController::class, 'destroy'])->name('pengunjung.destroy');
    Route::put('/pengunjung-update/{pengunjung}', [PengunjungController::class, 'update'])->name('pengunjung.update');
    // DOKTER
    Route::resource('dokter', DokterController::class);
    Route::get('/add-dokter', [DokterController::class, 'create'])->name('dokter.create');
    Route::post('/dokter-add', [DokterController::class, 'store'])->name('dokter.store');
    Route::get('/dokter-edit/{dokter}', [DokterController::class, 'edit'])->name('dokter.edit');
    Route::get('/dokter-delete/{dokter}', [DokterController::class, 'destroy'])->name('dokter.destroy');
    Route::put('/dokter-update/{dokter}', [DokterController::class, 'update'])->name('dokter.update');
    // PENGGUNA APLIKASI
    Route::resource('user', PenggunaController::class);
    Route::view('add-user', 'User.add');
    Route::post('/user-add', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/user-edit/{pengguna}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::get('/user-delete/{pengguna}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
    Route::put('/user-update/{pengguna}', [PenggunaController::class, 'update'])->name('pengguna.update');
    // ULASAN
    Route::resource('ulasan', UlasanController::class);
    // PROFIL
    Route::resource('profil', ProfilAhliGigiController::class);
    // LOGOUT
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});
