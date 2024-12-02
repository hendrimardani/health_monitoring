<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasienController;

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

Route::get('/login', function() {
    return view('login.index', [
        'title' => 'Login'
    ]); 
});

Route::get('/register', [PasienController::class, 'index']);
Route::post('/register', [PasienController::class, 'store'])->name('register');

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/riwayat-saya', function() {
    return view('dashboard.riwayat-saya', [
        'title' => 'Riwayat Saya'
    ]); 
});
