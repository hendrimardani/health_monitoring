<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.index', [
            'title' => 'Login Pasien'
        ]);
    }
        
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {  
            // Regenerasi sesi untuk mencegah serangan session fixation
            $request->session()->regenerate();
        
            // Redirect ke halaman yang diminta sebelumnya atau ke '/dashboard' jika tidak ada
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login failed !');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
