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
            'title' => 'Login'
        ]);
    }
        
    public function authenticated(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {  
            // Regenerasi sesi untuk mencegah serangan session 
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 'dokter') {
                return redirect('/home');
            } elseif ($user->role === 'pasien') {
                return redirect('/home');
            } elseif ($user->role === 'admin') {
                return redirect()->route('dashboard.admin');
            }
        
            // Jika maksa akses ke dashboard diatas maka akan redirect ke login
            return redirect()->intended('/login');
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
