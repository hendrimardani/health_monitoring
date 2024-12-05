<?php

namespace App\Http\Controllers;

use App\Models\DashboardAdminFarmasi;
use App\Models\Farmasi;
use Illuminate\Http\Request;

class DashboardAdminFarmasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farmasis = Farmasi::all();
        return view('dashboard.admin.farmasi.index', [
            'title' => 'Farmasi',
            'farmasis' => $farmasis
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
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required'
        ]);

        Farmasi::create($validatedData);

        return redirect('/dashboard/admin/farmasi')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DashboardAdminFarmasi $dashboardAdminFarmasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DashboardAdminFarmasi $dashboardAdminFarmasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DashboardAdminFarmasi $dashboardAdminFarmasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DashboardAdminFarmasi $dashboardAdminFarmasi)
    {
        //
    }
}
