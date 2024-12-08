<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class DashboardPasienAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ->get(); // Kalau menggunakan get() ini berarti mengembalikan banyak data

        $pasienId = auth()->user()->id;
        $pasien = Pasien::with('user')
                        ->where('id_pasien', $pasienId)
                        ->first();
        return view('dashboard.pasien.akun', [
            'title' => 'Pasien',
            'pasien' => $pasien
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
