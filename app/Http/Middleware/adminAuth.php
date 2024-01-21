<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class adminAuth
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
        if (($request->user() && $request->user()->role != 'admin'))
        {
            return abort('401');
        }
        else if(!$request->user()){
            return abort('403');
        }
        return $next($request);
    }
}
