<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RiwayatPenyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class DashboardPasienAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ->get(); // Kalau menggunakan get() ini berarti mengembalikan banyak data
        $pasienId = auth()->user()->id;
        $riwayatPenyakit = RiwayatPenyakit::with(['pasien.user'])
                        ->where('pasien_id', $pasienId)
                        ->first();
        return view('dashboard.pasien.akun', [
            'title' => 'Pasien',
            'pasien' => $riwayatPenyakit
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
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'no_telepon' => 'required',
                'usia' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'keluhan' => 'required'
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }
        
        $userId = auth()->id();
        $validatedPasien = [
            'nama' => $validatedData['nama'],
            'nik' => $validatedData['nik'],
            'no_telepon' => $validatedData['no_telepon'],
            'usia' => $validatedData['usia'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'alamat' => $validatedData['alamat'],
        ];
        Pasien::where('id_pasien', $userId)
                ->update($validatedPasien);

        $validatedRiwayatPenyakit = [
            'keluhan' => $validatedData['keluhan'],
            'pasien_id' => $userId
        ];
        RiwayatPenyakit::where('pasien_id', $userId)
                        ->update($validatedRiwayatPenyakit);

        return redirect('/dashboard/pasien/akun')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getDataJson(string $id)
    {
        // Jika data json ini tidak tertangkap gunakan yang bawah
        // $pasien = RiwayatPenyakit::with(['pasien'])->findOrFail($id);

        $pasien = DB::table('riwayat_penyakits')
        ->leftJoin('pasiens', 'riwayat_penyakits.pasien_id', '=', 'pasiens.id_pasien')
        ->where('riwayat_penyakits.pasien_id', $id)
        ->first();
        Log::info('Data pasien menggunakan query builder:', ['pasien' => $pasien]);

        if ($pasien) {
            return response()->json([
                'success' => true,
                'pasien' => $pasien
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data pasien tidak ditemukan'
            ], 404);
        }
    }
}
