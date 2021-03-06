<?php

namespace App\Http\Middleware;

use Closure;

class VerifyGovernment
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
        if (!Session::get('login')) {
            return redirect('/auth');
        } 
        return $next($request);
    }
}
