<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
//        dd($request->user()->hasRole($role));
        if ( $request->user()->role != $role)
            return redirect()->route('home');
        else
            return $next($request);
    }
}
