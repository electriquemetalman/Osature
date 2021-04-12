<?php

namespace App\Http\Middleware;

use Closure;

class authMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->guest()) {
            session()->flash("error", "Erreur! Votre session a expirée, Veuillez vous reconnecter.");
            return redirect()->route('connexion');
        }

        return $next($request);
    }
}
