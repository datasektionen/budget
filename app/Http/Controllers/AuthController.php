<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Auth;
use Session;

use App\Models\Election;
use App\Models\Position;
use App\Models\User;

/**
* Authentication controller. Handles login via login2.datasektionen.se.
*
* @author Jonas Dahl <jonas@jdahl.se>
* @version 2016-11-23
*/
class AuthController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	* The logout url. Redirects to main page with success message.
	* 
	* @return view the welcome view
	*/
	public function getLogout() {
		Auth::logout();
		Session::forget('admin');
		return redirect('/')
			->with('success', 'Du är nu utloggad.');
	}

	/**
	* The login page. Just redirects to login2.
	* 
	* @return redirect to login2.datasektionen.se
	*/
	public function getLogin(Request $request) {
		return redirect(env('LOGIN_API_URL') . '/login?callback=' . url('/login-complete') . '/');
	}

	/**
	* When login is complete, login2 will redirect us here. Now verify the login and ask PLS
	* for admin privileges. The admin privileges will be stored in Session['admin'] as an array of
	* pls permissions.
	* 
	* @param  string $token the token from login2
	* @return redirect to main page or intended page
	*/
	public function getLoginComplete($token) {
		// Send get request to login server
		$client = new Client();
		$res = $client->request('GET', env('LOGIN_API_URL') . '/verify/' . $token . '.json', [
			'form_params' => [
				'format' => 'json',
				'api_key' => env('LOGIN_API_KEY')
			]
		]);

		// We now have a response. If it is good, parse the json and login user
		if ($res->getStatusCode() == 200) {
			$body = json_decode($res->getBody());
			$user = User::where('ugkthid', $body->ugkthid)->first();

			if ($user === null) {
				// Create new user in our systems if did not exist
				$user = new User;
				$user->first_name = $body->first_name;
				$user->last_name = $body->last_name;
				$user->email = $body->emails;
				$user->kth_username = $body->user;
				$user->ugkthid = $body->ugkthid;
				$user->save();
			}

			// Send get request to pls to ask for permissions
			$client = new Client();
			$res = $client->request('GET', env('PLS_API_URL') . '/user/' . $user->kth_username . '/pandora');
			$pls = json_decode($res->getBody());
			if (in_array('admin', $pls)) {
				session(['admin' => true]);
			} else {
				session(['admin' => false]);
			}

			Auth::login($user);
		} else {
			Auth::logout();
			return redirect('/')->with('error', 'Du loggades inte in.');
		}

		return redirect()->intended('/')->with('success', 'Du loggades in.');
	}
}