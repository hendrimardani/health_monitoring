<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\RiwayatPenyakit;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function pasien() {
        // user saat ini login
        $idPasien = auth()->id();

        $pasien = Pasien::where('id_pasien', $idPasien)
                        ->first();
        $pasiens = Pasien::with(['user'])
                        ->get();
        $pemeriksaanLatest = Pemeriksaan::where('pasien_id', $idPasien)
                                        ->orderBy('created_at', 'desc')
                                        ->first();
        $jumlahKeluhan = RiwayatPenyakit::where('pasien_id', $idPasien)
                                        ->count();
        $jumlahKeluhanMenunggu = RiwayatPenyakit::where('pasien_id', $idPasien)
                                        ->where('status', 'menunggu')
                                        ->count();
        $jumlahKeluhanSelesai = RiwayatPenyakit::where('pasien_id', $idPasien)
                                        ->where('status', 'selesai')
                                        ->count();
                                        
        // Misalnya $pemeriksaan->created_at adalah timestamp
        $timestampLatest = $pemeriksaanLatest->vital_sign->waktu_pengukuran; // Contoh: '2024-12-17 14:35:22'

        // Memisahkan tanggal
        $tanggalLatest = Carbon::parse($timestampLatest)->translatedFormat('d F Y'); // Contoh: '21 Desember 2024' karena menggunakan metode transslatedFormat()
        
        return view('dashboard.pasien.index', [
            'title' => 'Dashboard Pasien',
            'pasien' => $pasien,
            'pasiens' => $pasiens,
            'tanggalLatest' => $tanggalLatest,
            'jumlahKeluhan' => $jumlahKeluhan,
            'jumlahKeluhanMenunggu' => $jumlahKeluhanMenunggu,
            'jumlahKeluhanSelesai' => $jumlahKeluhanSelesai,
        ]);
    }

    public function dokter() {
        // user saat ini login
        $idDokter = auth()->id();

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
