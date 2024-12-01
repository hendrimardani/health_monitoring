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
            'title' => 'Daftar Pasien'
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
        dd($request);
        //         // 'unique:users' Pada bagian ini users adalah nama tabel
        //         $validatedData = $request->validate([
        //             'name' => 'required|max:255',
        //             'username' => ['required', 'min:3', 'max:255', 'unique:users', 'alpha'],
        //             'email' => 'required|email:dns|unique:users',
        //             'password' => 'required|min:5|max:255'
        //         ]);
        //         // Bisa menggunakan ini
        //         // $validatedData['password'] = bcrypt($validatedData['password'])
        // $validateData = $request->validate([
            
        // ]);
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
