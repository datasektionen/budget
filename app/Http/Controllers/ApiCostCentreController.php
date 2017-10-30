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
use App\Models\CostCentre;

/**
 * Controls cost centre API.
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-30
 */
class ApiCostCentreController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * List all cost centres for committee.
	 * @param  integer $committeeId the id of the committee to list for
	 * @return JSON list of cost centres
	 */
	public function all($committeeId) {
		return response()->json(Committee::findOrFail($committeeId)->costCentres);
	}

	/**
	 * Creates a new cost centre contained in the committee given.
	 * @param  integer $committeeId the id of the committee to create the cost centre in
	 * @param  Request $request     the request where we take the data from
	 * @return JSON response with the created cost centre
	 */
	public function create($committeeId, Request $request) {
		$committee = Committee::findOrFail($committeeId);
		$costCentre = CostCentre::create($request->all() + ['committee_id' => $committee->id]);
		return response()->json($costCentre);
	}

	/**
	 * Shows a cost centre object.
	 * @param  integer $id the if of the cost centre to show
	 * @return JSON formatted object of the cost centre
	 */
	public function get($id) {
		return response()->json(CostCentre::findOrFail($id));
	}

	/**
	 * Updates the given cost centre with put data.
	 * @param  integer $id      the id of the cost centre to update
	 * @param  Request $request the request
	 * @return the new cost centre as JSON
	 */
	public function edit($id, Request $request) {
		$costCentre = CostCentre::findOrFail($id);
		$costCentre->update($request->all());
		return $costCentre;
	}

	/**
	 * Deletes the cost centre from the database.
	 * @param  integer $id      the id of the cost centre to delete
	 * @return [type]           [description]
	 */
	public function delete($id) {
		$costCentre = CostCentre::findOrFail($id);
		$costCentre->delete();
		return $costCentre;
	}
}