<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class HideIfReception
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (env('HIDE') && (!Auth::user() || !Auth::user()->isn0llan())) {
            abort(403);
        }

        return $next($request);
    }
}
