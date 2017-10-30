<?php namespace App\Http\Middleware;

use Closure;

/**
 * Adds CORS headers to responses.
 *
 * @author Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-30
 */
class Cors {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}

