<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Dokter yang saat ini sedang login, ambil id nya
        $user = Auth::user()->id;
        // Kode dari pasien.user berarti tabel pasien memanggil tabel user
        $pemeriksaans = Pemeriksaan::with(['dokter', 'pasien.user'])
                                    ->where('id_dokter', $user)
                                    ->get();
        return view('dashboard.dokter.pasien', [
            'title' => 'Dashboard Dokter',
            'pemeriksaans' => $pemeriksaans
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
