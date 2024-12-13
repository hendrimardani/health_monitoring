<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Dokter yang saat ini sedang login, ambil id nya
        $userId = Auth::user()->id;
        // // Kode dari pasien.user berarti tabel pasien memanggil tabel user
        // $pemeriksaans = Pemeriksaan::with(['dokter', 'pasien.user'])
        //                             ->where('id_dokter', $user)
        //                             ->get();
        $pasiens = Pasien::paginate(10);
        // Mendapatkan data kategori yang unik
        $namaObat = DB::table('obats')
                        ->select('id_obat', 'nama_obat')
                        ->distinct()
                        ->get();
        $kategoriObat = DB::table('obats')
                        ->select('kategori')
                        ->distinct()
                        ->get();
        return view('dashboard.dokter.pasien.index', [
            'title' => 'Dashboard Dokter',
            'pasiens' => $pasiens,
            'namaObat' => $namaObat,
            'kategoriObat' => $kategoriObat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mengambil data pemeriksaan berdasarkan ID pasien atau ID pemeriksaan
        $pemeriksaan = Pemeriksaan::with(['dokter', 'pasien'])
                                ->where('id_pasien', $id)  // Mencari pemeriksaan berdasarkan ID
                                ->first();          // Ambil pemeriksaan pertama yang cocok dengan ID
        // Cek jika data pemeriksaan ditemukan
        if ($pemeriksaan) {
            return response()->json([
                'success' => true,
                'pemeriksaan' => $pemeriksaan
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data pemeriksaan tidak ditemukan.'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
