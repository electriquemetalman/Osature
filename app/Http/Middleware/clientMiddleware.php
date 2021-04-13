<?php

namespace App\Http\Middleware;

use Closure;

class clientMiddleware
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
        if(auth()->user()->type!="client"){
            return redirect()->back();
        }
        
        return $next($request);
    }
}
