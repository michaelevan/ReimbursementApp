<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class jabatanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Periksa apakah peran pengguna cocok dengan yang diizinkan
            if (in_array($user->jabatan, $roles)) {
                return $next($request);
            }
        }

        // Redirect atau berikan respons jika tidak diizinkan
        return redirect()->route('login')->with('error', 'Akses ditolak.');
    }
}
