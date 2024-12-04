<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class DashboardController extends Controller
{
    public function index() {
        $pasien = Pasien::where('id_user', auth()->id())->first();
        return view('dashboard.index', [
            'title' => 'Tambah Riwayat',
            'pasien' => $pasien
        ]);
    }
}
