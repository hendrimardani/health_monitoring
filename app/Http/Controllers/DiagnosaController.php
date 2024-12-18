<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\Resep;
use App\Models\RiwayatPenyakit;
use App\Models\VitalSign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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
            $validatedPasien = $request->validate([
                'id_pasien' => 'required',
                'nama' => 'required',
                'nik' => 'required',
                'no_telepon' => 'required',
                'usia' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required|in:laki-laki,perempuan',
                'status' => 'required',
            ]);
            $validatedVitalSign = $request->validate([
                'saturasi_oksigen' => 'required',
                'detak_jantung' => 'required',
                'suhu_badan' => 'required',
                'detak_jantung' => 'required',
                'berat_badan' => 'required',
                'tekanan_darah_sistol' => 'required',
                'tekanan_darah_diastol' => 'required',
                'waktu_pengukuran' => 'required'
            ]);
            $validatedDiagnosa = $request->validate([
                'kode_icd' => 'required',
                'deskripsi' => 'required',
                'rekomendasi' => 'required',
            ]);
            $validatedResep = $request->validate([
                'id_obat' => 'required',
                'frekuensi' => 'required',
                'durasi_hari' => 'required',
                'cara_penggunaan' => 'required'
            ]);
            $validatedPemeriksaan = $request->validate([
                'catatan' => 'required',
                'waktu_pemeriksaan' => 'required'
            ]);
            $validatedRiwayatPenyakit = $request->validate([
                'id' => 'required|exists:riwayat_penyakits,id',
                'keluhan' => 'required',
                'status' => 'required'
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }

        $vitalSign = VitalSign::create($validatedVitalSign);
        
        $userId = auth()->id();
        $validatedDiagnosa['dokter_id'] = $userId;
        $diagnosa = Diagnosa::create($validatedDiagnosa);

        $validatedResep['dokter_id'] = $userId;
        $resep = Resep::create($validatedResep);

        $validatedPemeriksaan['pasien_id'] = $validatedPasien['pasien_id']; // Gunakan ID pasien yang valid
        $validatedPemeriksaan['diagnosa_id'] = $diagnosa->id; // ID diagnosa yang baru dibuat
        $validatedPemeriksaan['vital_sign_id'] = $vitalSign->id;
        $validatedPemeriksaan['resep_id'] = $resep->id;
        $validatedPemeriksaan['dokter_id'] = $userId; // ID dokter yang sedang login
        $pemeriksaan = Pemeriksaan::create($validatedPemeriksaan);

        // Ambil id yang baru saja ditambahkan pada entitas Pemeriksaan
        $validatedRiwayatPenyakit['pemeriksaan_id'] = $pemeriksaan->id;
        RiwayatPenyakit::where('id', $validatedRiwayatPenyakit['id'])
                        ->update($validatedRiwayatPenyakit);

        return redirect('/dashboard/dokter/pasien')->with('success', 'Pasien berhasil didiagnosa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
