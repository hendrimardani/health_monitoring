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
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RegisterController;

Route::middleware(['guest', 'revalidateBackHistory'])->group(function() {
    Route::get('/', function () {
        return view('welcome', [
            'title' => 'Selamat Datang'
        ]);
    });
});

Route::middleware(['auth', 'role:pasien', 'revalidateBackHistory'])->group(function() {
    Route::get('/home', [PasienController::class, 'home']);
    Route::get('/tentang-kami', [PasienController::class, 'tentangKami']);
});

Route::middleware(['auth', 'role:dokter', 'revalidateBackHistory'])->group(function() {
    Route::get('/cek-pasien', [DokterController::class, 'cekPasien']);
    Route::get('/jadwal-anda', [DokterController::class, 'jadwalAnda']);
});

// Fungsi middleware revalidateBackHistory supaya tidak bisa kembali ke 
// halaman sebelumnya jika sudah login atau logout
Route::middleware(['guest', 'revalidateBackHistory'])->group(function() {
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticated'])->name('login');
});
Route::post('/logout', [LoginController::class, 'logout']);

Route::prefix('dashboard')->middleware(['auth', 'role:pasien', 'revalidateBackHistory'])->group(function() {
    Route::get('/pasien', [DashboardController::class, 'pasien'])->name('dashboard.pasien');
    Route::resource('/pasien/riwayat', DashboardPasienRiwayatController::class);
    Route::get('/export-riwayat-pdf', [ExportController::class, 'exportRiwayatPDF'])
        ->name('export-riwayat-pdf');
    Route::get('/export-diagnosa-pdf/{idPemeriksaan}', [ExportController::class, 'exportDiagnosaPDF'])
        ->name('export-diagnosa-pdf');
    Route::get('/export-antrian-pdf', [ExportController::class, 'exportAntrianPDF'])
        ->name('export-antrian-pdf');
    Route::resource('/pasien/akun', DashboardPasienAkunController::class);
});

Route::prefix('dashboard')->middleware(['auth', 'role:dokter', 'revalidateBackHistory'])->group(function() {
    Route::get('/dokter', [DashboardController::class, 'dokter'])->name('dashboard.dokter');
    Route::resource('/dokter/pasien', DashboardDokterController::class);
    Route::resource('/dokter/pasien/diagnosa', DiagnosaController::class);
});
Route::get('/cari-obat-json/{kategoriId}/{namaObat}/{dosis}', [ObatController::class, 'cariObatJson'])->withoutMiddleware(['role:dokter']);

Route::get('/dashboard/dokter/pasien/{idPemeriksaan}/{idPasien}/{idDokter}', [DashboardDokterController::class, 'show'])->withoutMiddleware(['role:dokter']);

// Dipisah karena ia mengambil data menggunakan AJAX (tanpa menggunakan role)
Route::get('/dashboard/dokter/pasien/getDataJson/{id}', [DashboardPasienAkunController::class, 'getDataJson'])->withoutMiddleware(['role:dokter']);

Route::prefix('dashboard')->middleware(['auth', 'role:admin', 'revalidateBackHistory'])->group(function() {
    Route::get('/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
    Route::resource('/admin/farmasi', DashboardAdminFarmasiController::class);
    Route::post('/admin/farmasi/{id}', [DashboardAdminFarmasiController::class, 'destroy'])->name('farmasi.destroy');
    Route::resource('/admin/obat', DashboardAdminObatController::class);
    Route::post('/admin/obat/{id}', [DashboardAdminObatController::class, 'destroy'])->name('obat.destroy');
    Route::resource('/admin/user', DashboardAdminUserController::class);
    Route::post('/admin/user/{id}', [DashboardAdminUserController::class, 'destroy'])->name('user.destroy');
});