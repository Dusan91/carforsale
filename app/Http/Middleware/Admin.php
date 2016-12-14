<?php

namespace App\Http\Middleware;

use Closure;

Use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
               return $next($request); 
            }
        }
        return redirect('/');
        
    }
}
