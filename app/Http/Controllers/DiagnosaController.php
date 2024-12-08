<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\VitalSign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $validatedData = $request->validate([
            'saturasi_oksigen' => 'required',
            'detak_jantung' => 'required',
            'suhu_badan' => 'required',
            'berat_badan' => 'required',
            'tekanan_darah_sistol' => 'required',
            'tekanan_darah_diastol' => 'required',
            'waktu_pengukuran' => 'required'
        ]);
        $vitalSign = VitalSign::create($validatedData);
        // Ambil id_vitalSign yang baru saja dibuat
        $id_vitalSign = $vitalSign->id;

        $validatedData = $request->validate([
            'kode_icd' => 'required',
            'deskripsi' => 'required',
            'rekomendasi' => 'required',
        ]);
        $validatedData['id_dokter'] = Auth::user()->id;
        $diagnosa = Diagnosa::create($validatedData);
        // Ambil id_diagnosa yang baru saja dibuat
        $id_diagnosa = $diagnosa->id;

        $validatedData = $request->validate([
            'id_pasien' => 'required',
            'keluhan' => 'required',
            'catatan' => 'required',
            'waktu_pemeriksaan' => 'required'
        ]);
        $validatedData['id_diagnosa'] = $id_diagnosa;
        $validatedData['id_vital_sign'] = $id_vitalSign;
        $validatedData['id_dokter'] = Auth::user()->id;
        Pemeriksaan::create($validatedData);

        return redirect('/dashboard/dokter/pasien')->with('success', 'Data berhasil di diagnosa');
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
