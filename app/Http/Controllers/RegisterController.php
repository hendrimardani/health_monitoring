<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RiwayatPenyakit;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'title' => 'Registrasi Pasien'
        ]);
    }

    public function store(Request $request) {
        $validatedUser = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $validatedUser['password'] = bcrypt($validatedUser['password']);
        $user = User::create($validatedUser);

        $validatedPasien = [
            'nama' => $validatedUser['nama']
        ];
        $validatedPasien['id_pasien'] = $user->id;
        Pasien::create($validatedPasien);

        $validatedRiwayatPenyakit = [
            'pasien_id' => $user->id
        ];
        RiwayatPenyakit::create($validatedRiwayatPenyakit);
    
        // Redirect with success message
        return redirect('/login')->with('success', 'Berhasil Registrasi');  
    }
}
