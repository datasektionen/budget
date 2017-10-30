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
class ApiCommitteeController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function list(Request $request) {
		if ($request->input('short') !== null && $request->input('short') !== 'false') {
			return response()->json(Committee::select('*')->get());
		}
		return response()->json(Committee::select('*')->with('costCentres')->get());
	}

	public function create(Request $request) {
		$data = json_decode($request->getContent(), true);
		return Committee::create($data);
	}

	public function get($id) {
		return response()->json(Committee::select('id', 'name')->where('id', $id)->with('costCentres')->first());
	}

	public function edit($id, Request $request) {
		$data = json_decode($request->getContent(), true);
		$committee = Committee::findOrFail($id);
		$committee->update($data);
		return $committee;
	}

	public function delete($id) {
		$committee = Committee::findOrFail($id);
		$committee->delete();
		return $committee;
	}
}