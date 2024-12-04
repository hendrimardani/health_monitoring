<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, String $role): Response
    {
        // Periksa apakah user memiliki role yang sesuai
        if(Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Jika bukan dokter redirect kehalaman lain
        return redirect('/login')->with('error', 'Kamu tidak memiliki akses kesini');
    }
}
