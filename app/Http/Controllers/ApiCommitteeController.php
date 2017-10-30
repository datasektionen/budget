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

	/**
	 * Returns all committees as JSON.
	 * @param  Request $request the request
	 * @return all committees as JSON, with or without cost centres depending on the verbose input
	 */
	public function all(Request $request) {
		if (isset($request->verbose)) {
			return response()->json(Committee::with('costCentres')->get());
		}
		return response()->json(Committee::all());
	}

	/**
	 * Creates new committee.
	 * @param  Request $request the request containg the data
	 * @return the new committee as JSON
	 */
	public function create(Request $request) {
		return response()->json(Committee::create($request->all()));
	}

	/**
	 * Shows data about committee.
	 * @param  integer $id the id of the committee to show
	 * @return the committee as JSON, with or without cost centres depending on the verbose flag
	 */
	public function get($id, Request $request) {
		if (isset($request->verbose)) {
			return response()->json(Committee::where('id', $id)->with('costCentres')->first());
		}
		return response()->json(Committee::where('id', $id)->first());
	}

	/**
	 * Edits a committee with given data.
	 * @param  integer $id      id of the committee to edit
	 * @param  Request $request the request
	 * @return the updated committee as JSON
	 */
	public function edit($id, Request $request) {
		$committee = Committee::findOrFail($id);
		$committee->update($request->all());
		return response()->json($committee);
	}

	/**
	 * Deletes a committee from the database.
	 * @param  integer $id      id of the committee to delete
	 * @return the deleted committee as JSON
	 */
	public function delete($id) {
		$committee = Committee::findOrFail($id);
		$committee->delete();
		return $committee;
	}
}