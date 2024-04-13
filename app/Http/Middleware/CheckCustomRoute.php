<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\File;


class CheckCustomRoute
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $filePath = public_path($request->path());

        if (File::exists($filePath)) {
            return abort(404);
        }

        return $next($request);
    }
}
