<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function cekPasien()
    {
        return view('cek-pasien', [
            'title' => 'Cek Pasien'
        ]);
    }

    public function jadwalAnda()
    {
        return view('jadwal-anda', [
            'title' => 'Jadwal Anda'
        ]);
    }
}
