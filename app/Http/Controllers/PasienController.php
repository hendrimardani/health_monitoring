<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function home()
    {
        return view('home', [
            'title' => 'Home'
        ]);
    }

    public function tentangKami()
    {
        return view('tentang-kami', [
            'title' => 'Tentang Kami'
        ]);
    }

    public function cekKesehatan()
    {
        return view('cek-kesehatan', [
            'title' => 'Cek Kesehatan'
        ]);
    }
}
