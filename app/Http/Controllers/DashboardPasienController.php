<?php

namespace App\Http\Controllers;

use App\Models\DashboardPasien;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\Diagnosa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPasienController extends Controller
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
    public function show(DashboardPasien $dashboardPasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DashboardPasien $dashboardPasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DashboardPasien $dashboardPasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DashboardPasien $dashboardPasien)
    {
        //
    }
}