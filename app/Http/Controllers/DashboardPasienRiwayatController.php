<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\RiwayatPenyakit;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\File;


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
        // Data yang akan ditampilkan pada PDF
        $data = [
            'title' => 'Laporan Data User',
            'date' => date('m/d/Y'),
            'users' => [
                ['name' => 'John Doe', 'email' => 'john@example.com'],
                ['name' => 'Jane Doe', 'email' => 'jane@example.com'],
            ]
        ];

        // Load view untuk PDF
        $pdf = PDF::loadView('pdf.template', $data);

        // Tampilkan PDF di browser
        return $pdf->stream('laporan-produk.pdf');

        // // Download file PDF
        // return $pdf->download('laporan-user.pdf');
    }

    public function exportDiagnosaPDF(string $idPemeriksaan)
    {
        // Data yang akan ditampilkan pada PDF
        $pemeriksaan = Pemeriksaan::with(['pasien', 'diagnosa', 'vital_sign', 'dokter', 'resep'])
                                    ->where('id', $idPemeriksaan)
                                    ->first();
        $idResep = $pemeriksaan->id_resep;
        // $obat = Obat::where('id')
        $riwayatPenyakit = RiwayatPenyakit::where('pemeriksaan_id', $idPemeriksaan)
                                        ->first();

        // Path gambar di folder public
        $path = public_path('assets/2-2.png');
        
        // Membaca gambar dan mengonversi menjadi base64
        $imageData = base64_encode(File::get($path));
        $imageSrc = 'data:image/png;base64,' . $imageData;  // Format base64
        // Load view untuk PDF
        $pdf = PDF::loadView('pdf.riwayat', [
            'image' => $imageSrc,
            'pemeriksaan' => $pemeriksaan,
            'riwayatPenyakit' => $riwayatPenyakit
        ]);

        // Tampilkan PDF di browser
        return $pdf->stream('laporan-riwayat.pdf');

        // // Download file PDF
        // return $pdf->download('laporan-user.pdf');
    }
}
