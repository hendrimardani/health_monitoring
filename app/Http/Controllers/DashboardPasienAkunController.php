<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RiwayatPenyakit;
use Illuminate\Http\Request;
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
                        ->where('id_pasien', $pasienId)
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
            $validatedPasien = $request->validate([
                'keluhan' => 'required'
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }

        $userId = auth()->id();
        $validatedPasien['id_pasien'] = $userId;
        RiwayatPenyakit::create($validatedPasien);

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
        $pasien = RiwayatPenyakit::with(['pasien'])->find($id);

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
