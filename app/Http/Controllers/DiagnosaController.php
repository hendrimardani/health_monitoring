<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
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
            dd($request);
            $validatedData = $request->validate([
                'id_pasien' => 'required',
                'nama_pasien' => 'required',
                'nik' => 'required',
                'no_telepon' => 'required',
                'usia' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required|in:laki-laki,perempuan',
                'riwayat_penyakit' => 'required',
                'status' => 'required'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }
        Pasien::where('id_pasien', $validatedData['id_pasien'])
            ->update($validatedData);

        return redirect('/dashboard/dokter/pasien')->with('success', 'Pasien berhasil didiagnosa');


            // $validatedData = $request->validate([
            //     // 'id_pasien' => 'required',
            //     // 'nama_pasien' => 'required',
            //     // 'nik' => 'required',
            //     // 'no_telepon' => 'required',
            //     // 'usia' => 'required',
            //     // 'alamat' => 'required',
            //     // 'jenis_kelamin' => 'required',
            //     // 'riwayat_penyakit' => 'required',
            //     'saturasi_oksigen' => 'required',
            //     'detak_jantung' => 'required',
            //     'suhu_badan' => 'required',
            //     'detak_jantung' => 'required',
            //     'berat_badan' => 'required',
            //     'tekanan_darah_sistol' => 'required',
            //     'tekanan_darah_diastol' => 'required',
            //     'waktu_pengukuran' => 'required',
            //     'kode_icd' => 'required',
            //     'detak_jantung' => 'required',
            //     'keluhan' => 'required',
            //     'catatan' => 'required',
            //     'deskripsi' => 'required',
            //     'rekomendasi' => 'required',
            //     'waktu_pemeriksaan' => 'required',
            //     'nama_obat' => 'required',
            //     'kategori' => 'required',
            //     'dosis_tersedia' => 'required',
            //     'unit' => 'required',
            //     'frekuensi' => 'required',
            //     'durasi_hari' => 'required',
            //     'cara_penggunaan' => 'required'
            // ]);
        // $validatedData = $request->validate([
        //     'saturasi_oksigen' => 'required',
        //     'detak_jantung' => 'required',
        //     'suhu_badan' => 'required',
        //     'berat_badan' => 'required',
        //     'tekanan_darah_sistol' => 'required',
        //     'tekanan_darah_diastol' => 'required',
        //     'waktu_pengukuran' => 'required'
        // ]);
        // $vitalSign = VitalSign::create($validatedData);
        // $id_vitalSign = $vitalSign->id;

        // $validatedData = $request->validate([
        //     'kode_icd' => 'required',
        //     'deskripsi' => 'required',
        //     'rekomendasi' => 'required',
        // ]);
        // $validatedData['id_dokter'] = Auth::user()->id;
        // $diagnosa = Diagnosa::create($validatedData);
        // // Ambil id_diagnosa yang baru saja dibuat
        // $id_diagnosa = $diagnosa->id;

        // $validatedData = $request->validate([
        //     'id_pasien' => 'required',
        //     'keluhan' => 'required',
        //     'catatan' => 'required',
        //     'waktu_pemeriksaan' => 'required'
        // ]);
        // $validatedData['id_diagnosa'] = $id_diagnosa;
        // $validatedData['id_vital_sign'] = $id_vitalSign;
        // $validatedData['id_dokter'] = Auth::user()->id;
        // Pemeriksaan::create($validatedData);

        // return redirect('/dashboard/dokter/pasien')->with('success', 'Data berhasil di diagnosa');
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
