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
            if(!session()->has('url.intended'))
            {
                session(['url.intended' => url()->previous()]);
            }
            session()->flash("error", "Erreur! Votre session a expirée, Veuillez vous reconnecter.");
            return redirect()->route('connexion');

        }else if(auth()->user()->type!="administrateur"){
            return redirect()->route('index_client_path');
        }
        
        return $next($request);
    }
}
