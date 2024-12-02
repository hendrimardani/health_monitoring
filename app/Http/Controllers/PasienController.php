<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register.index', [
            'title' => 'Registrasi Pasien'
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
            'email_pasien' => 'required',
            'password' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'riwayat_penyakit' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required'
        ]);
    
        // Encrypt password
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        // Save to database
        Pasien::create($validatedData);
    
        // Redirect with success message
        return redirect('/login')->with('success', 'Berhasil Registrasi');    
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        //
    }
}
