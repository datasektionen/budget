<?php 

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Models\Account;

/**
 * Controls account API.
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-30
 */
class ApiAccountController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Returns a list of every account as json.
	 * @return the account plan as json
	 */
	public function all() {
		return response()->json(Account::all());
	}

	/**
	 * Creates a new account from request data.
	 * @param  Request $request the request containing the data
	 * @return the newly created account as json
	 */
	public function create(Request $request) {
		return response()->json(Account::create($request->all()));
	}

	/**
	 * Updates an account from request data.
	 * @param  Request $request the request containing the data
	 * @return the newly updated account as json
	 */
	public function edit($id, Request $request) {
		$account = Account::findOrFail($id);
		$account->update($request->all());
		return response()->json($account);
	}

	/**
	 * Returns the account for given $id.
	 * @param  integer $id      the id of the account to show
	 * @return the account as json
	 */
	public function get($id) {
		return response()->json(Account::findOrFail($id));
	}

	/**
	 * Returns the account for given account number.
	 * @param  integer $number  the account number (not the id)
	 * @return the account as json
	 */
	public function getByNumber($number) {
		return response()->json(Account::findByNumberOrFail($number));
	}
}