<?php

namespace App\Http\Controllers;

use App\Models\DashboardPasien;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'nik' => 'required',
            'no_telepon' => 'required',
            'usia' => 'required',
            'alamat' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'riwayat_penyakit' => 'required|max:255'
        ]);

        $validatedData['id_user'] = Auth::id();

        Pasien::create($validatedData);
        
        return redirect('/dashboard')->with('success', 'Data Berhasil Ditambahkan');
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
