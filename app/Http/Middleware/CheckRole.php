<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $roles)
    {
        // if (auth()->check() && auth()->user()->role === $role) {
        //     return $next($request);
        // }

        $rolesArray = explode('|', $roles);
        if (in_array(Auth::user()->role, $rolesArray)) {
            return $next($request);
        }

        // Arahkan ke halaman login jika peran tidak sesuai
        return redirect('/formlogin')->withErrors(['error' => 'Anda tidak memiliki akses ke halaman ini.']);
    }
}
