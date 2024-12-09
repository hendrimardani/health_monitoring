<?php

use App\Http\Controllers\DashboardAdminFarmasiController;
use App\Http\Controllers\DashboardAdminObatController;
use App\Http\Controllers\DashboardAdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDokterController;
use App\Http\Controllers\DashboardPasienRiwayatController;
use App\Http\Controllers\DashboardPasienAkunController;
use App\Http\Controllers\DiagnosaController;
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
    Route::resource('/dashboard/pasien/riwayat', DashboardPasienRiwayatController::class);
    Route::resource('/dashboard/pasien/akun', DashboardPasienAkunController::class);
});

Route::prefix('dashboard')->middleware(['auth', 'role:dokter'])->group(function() {
    Route::get('/dokter', [DashboardController::class, 'dokter'])->name('dashboard.dokter');
    Route::resource('/dokter/pasien', DashboardDokterController::class);
    Route::resource('/dokter/pasien/diagnosa', DiagnosaController::class);
});

Route::prefix('dashboard')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
    Route::resource('/admin/farmasi', DashboardAdminFarmasiController::class);
    Route::post('/admin/farmasi/{id}', [DashboardAdminFarmasiController::class, 'destroy'])->name('farmasi.destroy');
    Route::resource('/admin/obat', DashboardAdminObatController::class);
    Route::post('/admin/obat/{id}', [DashboardAdminObatController::class, 'destroy'])->name('obat.destroy');
    Route::resource('/admin/user', DashboardAdminUserController::class);
    Route::post('/admin/user/{id}', [DashboardAdminUserController::class, 'destroy'])->name('user.destroy');
});