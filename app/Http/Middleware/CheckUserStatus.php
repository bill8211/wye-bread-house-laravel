<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificamos si el usuario está autenticado y si su estado es inactivo (false/0)
        if (Auth::check() && !Auth::user()->is_active) {
            
            Auth::logout(); // Cierra la sesión
            $request->session()->invalidate(); // Invalida la sesión actual
            $request->session()->regenerateToken(); // Regenera el token CSRF por seguridad

            // Redirige al login con un mensaje de error
            return redirect()->route('login')->withErrors([
                'email' => 'Tu cuenta ha sido desactivada. Comunícate con el administrador.',
            ]);
        }

        return $next($request);
    }
}