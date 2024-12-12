<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $validatedUser = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $validatedUser['password'] = bcrypt($validatedUser['password']);
        $user = User::create($validatedUser);

        $validatedPasien = $request->validate([
            'nama' => 'required'
        ]);
        $validatedPasien['id_pasien'] = $user->id;
        Pasien::create($validatedPasien);
    
        // Redirect with success message
        return redirect('/login')->with('success', 'Berhasil Registrasi');  
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
