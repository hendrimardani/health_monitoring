<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RiwayatPenyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
}
