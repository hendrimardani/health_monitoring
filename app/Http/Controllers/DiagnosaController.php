<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\Resep;
use App\Models\VitalSign;
use Illuminate\Http\Request;
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
                'keluhan_pasien' => 'required',
                'catatan' => 'required',
                'waktu_pemeriksaan' => 'required'
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }
        Pasien::where('id_pasien', $validatedPasien['id_pasien'])
            ->update($validatedPasien);

        $vitalSign = VitalSign::create($validatedVitalSign);
        
        $userId = auth()->id();
        $validatedDiagnosa['id_dokter'] = $userId;
        $diagnosa = Diagnosa::create($validatedDiagnosa);

        $validatedResep['id_dokter'] = $userId;
        Resep::create($validatedResep);

        $validatedPemeriksaan['id_pasien'] = $validatedPasien['id_pasien']; // Gunakan ID pasien yang valid
        $validatedPemeriksaan['id_diagnosa'] = $diagnosa->id; // ID diagnosa yang baru dibuat
        $validatedPemeriksaan['id_vital_sign'] = $vitalSign->id;
        $validatedPemeriksaan['id_dokter'] = $userId; // ID dokter yang sedang login
        Pemeriksaan::create($validatedPemeriksaan);

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
