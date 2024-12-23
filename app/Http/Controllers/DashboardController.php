<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class DashboardController extends Controller
{
    public function pasien() {
        // user saat ini login
        $pasien = Pasien::where('id_pasien', auth()->id())->first();
        $pasiens = Pasien::with(['user'])->get();
        return view('dashboard.pasien.index', [
            'title' => 'Dashboard Pasien',
            'pasien' => $pasien,
            'pasiens' => $pasiens
        ]);
    }

    public function dokter() {
        return view('dashboard.dokter.index', [
            'title' => 'Dashboard Dokter',
        ]);
    }

    public function admin() {
        return view('dashboard.admin.index', [
            'title' => 'Dashboard Admin',
        ]);
    }
}
