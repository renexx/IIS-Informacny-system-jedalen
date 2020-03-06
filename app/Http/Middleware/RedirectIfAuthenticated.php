<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "administrator" && Auth::guard($guard)->check()) {
                return redirect('/adminIS');
            }
        if ($guard == "operatori" && Auth::guard($guard)->check()) {
            return redirect('/menuIS');
        }
        if ($guard == "vodici" && Auth::guard($guard)->check()) {
            return redirect('/vodicIS');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
