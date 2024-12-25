<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\Resep;
use App\Models\RiwayatPenyakit;
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
                'id_pasien' => 'required|integer|exists:users,id', // Pastikan ada di tabel users
                // 'nama' => 'required|string|max:255',               // Maksimal 255 karakter
                // 'nik' => 'required|string|digits:16|unique:pasiens,nik',   // NIK harus 16 digit dan unik
                // 'no_telepon' => 'required|string|min:11|max:12', // Format no telepon
                // 'usia' => 'required|integer|min:0|max:120',        // Usia harus masuk akal
                // 'alamat' => 'required|string|max:500',             // Maksimal 500 karakter
                // 'jenis_kelamin' => 'required|in:laki-laki,perempuan', // Pilihan terbatas
                // 'status' => 'required|string|in:menunggu,selesai',  // Contoh status, sesuaikan dengan aturan Anda
            ]);
            $validatedVitalSign = $request->validate([
                'saturasi_oksigen' => 'required|integer|min:0|max:200', // Angka, antara 0-200
                'detak_jantung' => 'required|integer|min:30|max:200',   // Detak jantung wajar
                'suhu_badan' => 'required|numeric|min:30|max:45',       // Suhu tubuh wajar dalam °C
                'berat_badan' => 'required|numeric|min:1|max:200',      // Berat badan wajar dalam kg
                'tekanan_darah_sistol' => 'required|integer|min:50|max:250', // Sistol wajar
                'tekanan_darah_diastol' => 'required|integer|min:30|max:150', // Diastol wajar
                'waktu_pengukuran' => 'required|date_format:Y-m-d\TH:i:s', // Format waktu 2024-12-25T21:35:36 Huruf T yang digunakan sebagai pemisah antara tanggal dan waktu
            ]);
            $validatedDiagnosa = $request->validate([
                'kode_icd' => 'required|string|max:10|unique:diagnosas,kode_icd', // Maksimal 10 karakter, unik di tabel diagnosas
                'deskripsi' => 'required|string|max:500',                        // Maksimal 500 karakter
                'rekomendasi' => 'required|string|max:2000',                     // Maksimal 2000 karakter
            ]);
            $validatedResep = $request->validate([
                'obat_id' => 'required|integer|exists:obats,id',  // ID obat harus valid dan ada di tabel obats
                'frekuensi' => 'required|string', // Frekuensi (misalnya sebelum makan dan setelah makan)
                'durasi_hari' => 'required|integer|min:1|max:5', // Durasi dalam hari 1 s/d 5
                'cara_penggunaan' => 'required|string|max:2000',  // Maksimal 2000 karakter                
            ]);
            $validatedPemeriksaan = $request->validate([
                'catatan' => 'required|string|max:1000',              // Maksimal 1000 karakter
                'waktu_pemeriksaan' => 'required|date_format:Y-m-d\TH:i:s', // Format waktu 2024-12-25T21:35:36 Huruf T yang digunakan sebagai pemisah antara tanggal dan waktu
            ]);
            $validatedRiwayatPenyakit = $request->validate([
                'id' => 'required|integer|exists:riwayat_penyakits,id', // Pastikan ada di tabel riwayat_penyakits
                'keluhan' => 'required|string|max:2000',               // Maksimal 1000 karakter
                'status' => 'required|string|in:menunggu,selesai',      // Hanya menerima nilai 'menunggu' atau 'selesai'
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }

        $vitalSign = VitalSign::create($validatedVitalSign);
        
        $userId = auth()->id();
        $validatedDiagnosa['dokter_id'] = $userId;
        $diagnosa = Diagnosa::create($validatedDiagnosa);

        $validatedResep['dokter_id'] = $userId;
        // Formatkan komentar agar disimpan dengan tanda newline
        // Format \r\n berarti ketika kita menekan enter pada text area akan dihasilkan formati ini, dan akan diganti dengan newline
        $validatedResep['cara_penggunaan'] = str_replace("\r\n", "\n", $validatedResep['cara_penggunaan']);
        $resep = Resep::create($validatedResep);

        $validatedPemeriksaan['pasien_id'] = $validatedPasien['id_pasien']; // Gunakan ID pasien yang valid
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
