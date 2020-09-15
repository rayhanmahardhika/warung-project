<?php

namespace App\Http\Middleware;

use Closure;
use App\Restaurant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class VerifyResto
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
