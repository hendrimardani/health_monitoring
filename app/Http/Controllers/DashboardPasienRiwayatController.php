<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\Resep;
use App\Models\RiwayatPenyakit;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class DashboardPasienRiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // user saat ini login
        $pasiens = RiwayatPenyakit::with(['pasien.user'])
                                ->where('pasien_id', auth()->id())
                                ->paginate(7);
        $pasien = RiwayatPenyakit::with(['pasien.user'])
                                ->where('pasien_id', auth()->id())
                                ->first();
        $riwayatPenyakit = RiwayatPenyakit::where('pasien_id', auth()->id())
                                ->first();

        if ($riwayatPenyakit->keluhan === null) {
            $title = 'Akun Saya';
            return view('dashboard.pasien.akun', compact('title', 'pasien'));
        } else {
            return view('dashboard.pasien.riwayat', [
                'title' => 'Riwayat Saya',
                'pasiens' => $pasiens,
                'pasien' => $pasien
            ]);
        }
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
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'no_telepon' => 'required',
                'usia' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'keluhan' => 'required|max:255'
            ]);
            $validatedPasien = [
                'nama' => $validatedData['nama'],
                'nik' => $validatedData['nik'],
                'no_telepon' => $validatedData['no_telepon'],
                'usia' => $validatedData['usia'],
                'jenis_kelamin' => $validatedData['jenis_kelamin'],
                'alamat' => $validatedData['alamat'],
            ];
        } catch (ValidationException $e) {
            dd($e->errors());
        }
        $userId = Auth::id();
        $validatedData['pasien_id'] = $userId;
        RiwayatPenyakit::create($validatedData);
        Pasien::where('id_pasien', $userId)
            ->update($validatedPasien);
        
        return redirect('/dashboard/pasien/riwayat')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    public function exportRiwayatPDF()
    {
        $idPasien = auth()->id();
        // Data yang akan ditampilkan pada PDF
        $namaPasien = RiwayatPenyakit::with('pasien')
                                    ->where('pasien_id', $idPasien)
                                    ->first();
        $riwayatPenyakits = RiwayatPenyakit::with('pemeriksaan')
                                            ->where('pasien_id', $idPasien)
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

        // Memisahkan tanggal dan waktu
        foreach ($riwayatPenyakits as $riwayatPenyakit) {
            $riwayatPenyakit->waktu = \Carbon\Carbon::parse($riwayatPenyakit->waktu_pengukuran)->toTimeString();
            $riwayatPenyakit->tanggal = \Carbon\Carbon::parse($riwayatPenyakit->waktu_pengukuran)->toDateString();
        }

        // Misalnya $pemeriksaan->created_at adalah timestamp
        $timestampLatest = $pemeriksaanLatest->vital_sign->waktu_pengukuran; // Contoh: '2024-12-17 14:35:22'
        $timestampOld = $pemeriksaanOld->vital_sign->waktu_pengukuran; // Contoh: '2024-12-17 14:35:22'

         // Memisahkan tanggal
         $tanggalLatest = Carbon::parse($timestampLatest)->translatedFormat('d F Y'); // Contoh: '21 Desember 2024' karena menggunakan metode transslatedFormat()
         $tanggalOld = Carbon::parse($timestampOld)->translatedFormat('d F Y'); // Contoh: '21 Desember 2024' karena menggunakan metode transslatedFormat()

        // Load view untuk PDF
        $pdf = PDF::loadView('pdf.riwayat', [
            'namaPasien' => $namaPasien->pasien,
            'riwayatPenyakits' => $riwayatPenyakits,
            'tanggal' => $riwayatPenyakit->tanggal,
            'waktu' => $riwayatPenyakit->waktu,
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
}
