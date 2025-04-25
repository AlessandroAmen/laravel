<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Controlla se l'utente è loggato
        if (!Session::has('user')) {
            // Reindirizza alla pagina di login con un messaggio di errore
            return redirect('/login')->with('error', 'Devi essere loggato per accedere a questa pagina.');
        }

        // L'utente è loggato, procedi
        return $next($request);
    }
}