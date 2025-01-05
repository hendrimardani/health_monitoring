<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }
        
    public function authenticated(Request $request) {
       // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput() // Supaya tidak mereset lagi valuenya ke awal
                            ->with('errorValidation', 'Validasi gagal. Silakan periksa input Anda.');
        }

        // Mencoba autentikasi
        if (Auth::attempt($request->only('email', 'password'))) {
            // Regenerasi sesi untuk mencegah serangan session fixation
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirect berdasarkan peran pengguna
            if ($user->role === 'dokter') {
                return redirect()->intended('/cek-pasien');
            } elseif ($user->role === 'pasien') {
                return redirect()->intended('/home');
            } elseif ($user->role === 'admin') {
                return redirect()->intended(route('dashboard.admin'));
            }
        }

        // Jika autentikasi gagal
        return redirect()->back()
                        ->withInput()
                        ->with('errorLogin', 'Email atau password salah.');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
