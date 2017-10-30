<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use GuzzleHttp\Client;

/**
 * Handles API authentication requests with authentication via pls.
 *
 * @author Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-30
 */
class PlsAuth {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission) {
        if (empty($request->token)) {
            return response()->json(['error' => 'Token not supplied.'], 401);
        }

        $client = new Client();
        try {
            $res = $client->request('GET', env('LOGIN_API_URL') . '/verify/' . $request->token . '?format=json&api_key=' . env('LOGIN_API_KEY'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Authentication failed, probably wrong token.'], 401);
        }

        $content = json_decode($res->getBody()->getContents());
        try {
            $res = $client->request('GET', env('PLS_API_URL') . '/user/' . $content->user . '/budget/' . $permission);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Could not connect to pls, is pls down?'], 500);
        }

        if (!json_decode($res->getBody()->getContents())) {
            return response()->json(['error' => 'Unauthorized.'], 401);
        }

        return $next($request);
    }
}
