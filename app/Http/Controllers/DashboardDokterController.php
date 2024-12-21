<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\RiwayatPenyakit;
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
        $pasiens = RiwayatPenyakit::with('pemeriksaan')
                ->paginate(10); 
        // Mendapatkan data kategori yang unik
        $namaObats = DB::table('obats')
                    ->selectRaw('MIN(id) as id, nama_obat') // Pilih id terkecil untuk setiap nama_obat
                    ->groupBy('nama_obat')
                    ->get();

        $kategoriObats = DB::table('kategori_obats')
                        ->selectRaw('MIN(id) as id, nama_kategori')  // Pilih id terkecil untuk setiap nama_kategori
                        ->groupBy('nama_kategori')
                        ->get();
        return view('dashboard.dokter.pasien.index', [
            'title' => 'Dashboard Dokter',
            'pasiens' => $pasiens,
            'namaObats' => $namaObats,
            'kategoriObats' => $kategoriObats
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
    public function show(string $idPemeriksaan, string $idPasien, string $idDokter)
    {
        // $riwayatPenyakit = RiwayatPenyakit::where('id', $id)->first();
        // $idPasien = $riwayatPenyakit->pasien_id_pasien;

        // Mengambil data pemeriksaan berdasarkan ID pasien atau ID pemeriksaan
        $pemeriksaan = Pemeriksaan::with(['dokter', 'pasien'])
                                ->where('id', $idPemeriksaan)
                                ->where('id_pasien', $idPasien)  // Mencari pemeriksaan berdasarkan ID
                                ->where('id_dokter', $idDokter)
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
