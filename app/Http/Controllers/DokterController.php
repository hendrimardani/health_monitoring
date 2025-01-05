<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\RiwayatPenyakit;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function cekPasien()
    {
        $pasiens = RiwayatPenyakit::with('pasien')
                                ->where('status', 'menunggu')
                                ->get();
        return view('cek-pasien', [
            'title' => 'Cek Pasien',
            'pasiens' => $pasiens
        ]);
    }

    public function jadwalAnda()
    {
        return view('jadwal-anda', [
            'title' => 'Jadwal Anda'
        ]);
    }
}
