<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use App\Models\Pemeriksaan;
use App\Models\RiwayatPenyakit;


class ExportController extends Controller
{
    public function exportRiwayatPDF()
    {
        $idPasien = auth()->id();
        // Data yang akan ditampilkan pada PDF
        $namaPasien = RiwayatPenyakit::with('pasien')
                                    ->where('pasien_id', $idPasien)
                                    ->first();
        // pemeriksaan: Relasi pertama yang dimiliki oleh RiwayatPenyakit.
        // dokter: Relasi kedua yang dimiliki oleh pemeriksaan.
        $riwayatPenyakits = RiwayatPenyakit::with(['pemeriksaan.dokter', 'pemeriksaan.vital_sign'])
                                            ->where('pasien_id', $idPasien)
                                            ->whereHas('pemeriksaan.dokter') // Hanya ambil data yang memiliki pemeriksaan dan dokter
                                            ->whereHas('pemeriksaan.vital_sign')
                                            ->get();
        $pemeriksaans = Pemeriksaan::with('dokter')
                                    ->where('pasien_id', $idPasien)
                                    ->get();
        $pemeriksaanLatest = Pemeriksaan::where('pasien_id', $idPasien)
                                    ->orderBy('created_at', 'desc')
                                    ->first();
        $pemeriksaanOld = Pemeriksaan::where('pasien_id', $idPasien)
                                    ->orderBy('created_at', 'asc')
                                    ->first();
                                    
        Log::info('riwayatPenyakits : ', ['riwayatPenyakits' => $riwayatPenyakits]);
        Log::info('pemeriksaans : ', ['pemeriksaans' => $pemeriksaans]);
        Log::info('pemeriksaanLatest : ', ['pemeriksaanLatest' => $pemeriksaanLatest]);
        Log::info('pemeriksaanOld : ', ['pemeriksaanOld' => $pemeriksaanOld]);

        // Misalnya $pemeriksaan->created_at adalah timestamp
        $timestampLatest = $pemeriksaanLatest->vital_sign->waktu_pengukuran; // Contoh: '2024-12-17 14:35:22'
        $timestampOld = $pemeriksaanOld->vital_sign->waktu_pengukuran; // Contoh: '2024-12-17 14:35:22'

         // Mengubah tanggal
         $tanggalLatest = Carbon::parse($timestampLatest)->translatedFormat('d F Y'); // Contoh: '21 Desember 2024' karena menggunakan metode transslatedFormat()
         $tanggalOld = Carbon::parse($timestampOld)->translatedFormat('d F Y'); // Contoh: '21 Desember 2024' karena menggunakan metode transslatedFormat()

        // Load view untuk PDF
        $pdf = PDF::loadView('pdf.riwayat', [
            'namaPasien' => $namaPasien->pasien,
            'riwayatPenyakits' => $riwayatPenyakits,
            'pemeriksaans' => $pemeriksaans,
            'tanggalLatest' => $tanggalLatest,
            'tanggalOld' => $tanggalOld
        ]);

        // Tampilkan PDF di browser
        $fileName = 'laporan-riwayat-' . str_replace(' ', '_', strtolower($namaPasien->pasien->nama)) . '.pdf';
        return $pdf->stream($fileName);

        // // Download file PDF
        // return $pdf->download('laporan-riwayat.pdf');
    }

    public function exportDiagnosaPDF(string $idPemeriksaan)
    {
        // Data yang akan ditampilkan pada PDF
        $pemeriksaan = Pemeriksaan::with(['pasien', 'diagnosa', 'vital_sign', 'dokter', 'resep'])
                                    ->where('id', $idPemeriksaan)
                                    ->first();
        Log::info('PEMERIKSAAN :', ['pemeriksaan' => $pemeriksaan]);

        // Misalnya $pemeriksaan->created_at adalah timestamp
        $timestamp = $pemeriksaan->vital_sign->waktu_pengukuran; // Contoh: '2024-12-17 14:35:22'

        // Memisahkan tanggal dan waktu
        $waktu = Carbon::parse($timestamp)->toTimeString(); // '14:35:22'
        $tanggal = Carbon::parse($timestamp)->toDateString(); // '2024-12-17'

        $riwayatPenyakit = RiwayatPenyakit::where('pemeriksaan_id', $idPemeriksaan)
                                        ->first();
        Log::info('riwayatPenyakit :', ['riwayat_penyakit' => $riwayatPenyakit]);

        // Path gambar di folder public
        $path = public_path('assets/2-2.png');
        
        // Membaca gambar dan mengonversi menjadi base64
        $imageData = base64_encode(File::get($path));
        $imageSrc = 'data:image/png;base64,' . $imageData;  // Format base64
        // Load view untuk PDF
        $pdf = PDF::loadView('pdf.diagnosa', [
            'image' => $imageSrc,
            'pemeriksaan' => $pemeriksaan,
            'waktu' => $waktu,
            'tanggal' => $tanggal,
            'riwayatPenyakit' => $riwayatPenyakit
        ]);

        // Tampilkan PDF di browser
        $fileName = 'laporan-diagnosa-' . str_replace(' ', '_', strtolower($pemeriksaan->pasien->nama)) . '.pdf';
        return $pdf->stream($fileName);

        // // Download file PDF
        // return $pdf->download('laporan-diagnosa.pdf');
    }

    public function exportAntrianPDF() {
        $idPasien = auth()->id(); 
        $riwayatPenyakit = RiwayatPenyakit::with('pasien')
                                ->where('pasien_id', $idPasien)
                                ->where('status', 'menunggu')
                                ->first();
        $jumlahAntrian = RiwayatPenyakit::where('created_at', '<=', Carbon::now())
                                        ->where('status', 'menunggu')
                                        ->count();
        Log::info('TEST ANTRIAN', ['Antrian' => $jumlahAntrian]);

        // Misalnya $riwayatPenyakit->created_at adalah timestamp
        $timestamp = $riwayatPenyakit->created_at; // Contoh: '2024-12-17 14:35:22'

        // Mengubah tanggal
        $tanggal = Carbon::parse($timestamp)->translatedFormat('d F Y'); // Contoh: '21 Desember 2024' karena menggunakan metode transslatedFormat()
       
        // Memisahkan tanggal
        $jam = Carbon::parse($timestamp)->toTimeString(); // 16:52:21

        // Ubah string menjadi objek Carbon
        $carbonTime = Carbon::createFromFormat('H:i:s', $jam);

        // Tambah 3 jam
        $tambahTigaJam = $carbonTime->addHour(3); // 2024-12-17 16:52:21

        // Pisah lagi
        $tambahTigaJam = Carbon::parse($tambahTigaJam)->toTimeString(); // 19:52:21
        
        // Load view untuk PDF
        $pdf = PDF::loadView('pdf.antrian', [
            'jumlahAntrian' => $jumlahAntrian,
            'riwayatPenyakit' => $riwayatPenyakit,
            'tanggal' => $tanggal,
            'jam' => $jam,
            'tambahTigaJam' => $tambahTigaJam
        ]);

        // Tampilkan PDF di browser
        $fileName = 'antrian.pdf';
        return $pdf->stream($fileName);
    }
}
