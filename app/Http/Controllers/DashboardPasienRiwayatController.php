<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class DashboardPasienRiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // user saat ini login
        $pasien = Pasien::where('id_user', auth()->id())->first();
        $pasiens = Pasien::with(['user'])->get();
        return view('dashboard.pasien.riwayat', [
            'title' => 'Riwayat Saya',
            'pasien' => $pasien,
            'pasiens' => $pasiens
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
        $validatedData = $request->validate([
            'nama_pasien' => 'required',
            'nik' => 'required',
            'no_telepon' => 'required',
            'usia' => 'required',
            'alamat' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'riwayat_penyakit' => 'required|max:255'
        ]);

        $validatedData['id_user'] = Auth::id();

        Pasien::create($validatedData);
        
        return redirect('/dashboard/riwayat')->with('success', 'Data Berhasil Ditambahkan');
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
