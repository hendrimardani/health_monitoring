<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RiwayatPenyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class DashboardPasienRiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // user saat ini 
        $pasienId = auth()->id();
        $pasiens = RiwayatPenyakit::with(['pasien.user'])
                                ->where('pasien_id', $pasienId)
                                ->paginate(7);
        $pasien = RiwayatPenyakit::with(['pasien.user'])
                                ->where('pasien_id', $pasienId)
                                ->first();
        $inputLatest = RiwayatPenyakit::where('pasien_id', $pasienId)
                                ->orderBy('created_at', 'desc')
                                ->first();
        $jumlahKeluhan = RiwayatPenyakit::where('pasien_id', $pasienId)
                                        ->count();

        return view('dashboard.pasien.riwayat', [
            'title' => 'Riwayat Saya',
            'pasiens' => $pasiens,
            'pasien' => $pasien,
            'inputLatest' => $inputLatest,
            'jumlahKeluhan' => $jumlahKeluhan
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
        } catch (ValidationException $e) {
            dd($e->errors());
        }

        // User sedang login
        $userId = Auth::id();
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

        $antrian = RiwayatPenyakit::where('created_at', '<=', Carbon::now())
                                ->count();

        $validatedRiwayatPenyakit = [
            'pasien_id' => $userId,
            'keluhan' => $validatedData['keluhan'],
            'antrian' => $antrian + 1 // Supaya bertambah 1, tidak duplicate dari data awal
        ];
        RiwayatPenyakit::create($validatedRiwayatPenyakit);
        
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
}
