<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use GuzzleHttp\Client;

/**
 * Handles API authentication requests. Looks for a "token" 
 * in the requests and validates it through login2.
 *
 * @author Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-30
 */
class ApiAuth {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (empty($request->token)) {
            return response()->json(['error' => 'Token not supplied.'], 401);
        }

        $client = new Client();
        try {
            $res = $client->request('GET', env('LOGIN_API_URL') . '/verify/' . $request->token . '?format=json&api_key=' . env('LOGIN_API_KEY'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Authentication failed, probably wrong token.'], 401);
        }

        return $next($request);
    }
}
