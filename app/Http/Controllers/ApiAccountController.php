<?php 

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Models\Committee;
use App\Models\Suggestion;
use App\Models\BudgetLine;

/**
 * Controls committee API.
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-30
 */
class ApiAccountController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function list(Request $request) {
		return Account::all();
	}

	public function create(Request $request) {
		$data = json_decode($request->getContent(), true);
		return Account::create($data);
	}

	public function get($id, Request $request) {
		return Account::findOrFail($id);
	}

	public function getByNumber($number, Request $request) {
		return Account::where('number', $number)->firstOrFail();
	}
}