<?php

use App\Http\Controllers\DashboardAdminFarmasiController;
use App\Http\Controllers\DashboardAdminObatController;
use App\Http\Controllers\DashboardAdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDokterController;
use App\Http\Controllers\DashboardPasienController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Selamat Datang'
    ]);
});

Route::get('/home', function() {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/cek-pasien', function() {
    return view('cek-pasien', [
        'title' => 'Cek Pasien'
    ]);
});

Route::get('/jadwal-anda', function() {
    return view('jadwal-anda', [
        'title' => 'Jadwal Anda'
    ]);
});

Route::get('/tentang-kami', function() {
    return view('tentang-kami', [
        'title' => 'Tentang Kami'
    ]);
});

Route::get('/register', [UserController::class, 'index']);
Route::post('/register', [UserController::class, 'store'])->name('register');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticated'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth', 'role:pasien'])->group(function() {
    Route::get('/dashboard/pasien', [DashboardController::class, 'pasien'])->name('dashboard.pasien');
    Route::resource('/dashboard/pasien/riwayat', DashboardPasienController::class);
});

Route::middleware(['auth', 'role:dokter'])->group(function() {
    Route::get('/dashboard/dokter', [DashboardController::class, 'dokter'])->name('dashboard.dokter');
    Route::resource('/dashboard/dokter/pasien', DashboardDokterController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
    Route::resource('/dashboard/admin/farmasi', DashboardAdminFarmasiController::class);
    Route::post('/dashboard/admin/farmasi/{id}', [DashboardAdminFarmasiController::class, 'destroy'])->name('farmasi.destroy');
    Route::resource('/dashboard/admin/obat', DashboardAdminObatController::class);
    Route::post('/dashboard/admin/obat/{id}', [DashboardAdminObatController::class, 'destroy'])->name('obat.destroy');
    Route::resource('/dashboard/admin/user', DashboardAdminUserController::class);
    Route::post('/dashboard/admin/user/{id}', [DashboardAdminUserController::class, 'destroy'])->name('user.destroy');
});