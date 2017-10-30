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
 * Controls budget line API.
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-30
 */
class ApiBudgetLineController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Lists all budget lines for cost centre.
	 * @param  integer $costCentreId the id of the cost centres to list for
	 * @return JSON response with the list of budget lines
	 */
	public function all($costCentreId) {
		return response()->json(CostCentre::findOrFail($costCentreId)->budgetLines);
	}

	/**
	 * Creates a new budget line.
	 * @param  integer $id      the id of the cost centre to add the budget line to
	 * @param  Request $request the request
	 * @return the created budget line as JSON
	 */
	public function create($id, Request $request) {
		$costCentre = CostCentre::findOrFail($id);
		$budgetLine = BudgetLine::create($request->all() + ['cost_centre_id' => $costCentre->id]);
		return response()->json($budgetLine);
	}

	/**
	 * Displays a budget line.
	 * @param  integer $id   the id of the budget line to display
	 * @return the budget line as JSON
	 */
	public function get(Request $request, $id) {
		return response()->json(BudgetLine::where('id', $id)->with('accounts')->firstOrFail());
	}

	/**
	 * Edits a budget line. However, a new budget line will instead be created if the current budget line
	 * is not in the given suggestion. The new line (or old, if none created) is returned.
	 * @param  integer $id      the id of the budget line to edit
	 * @param  Request $request the request with the data
	 * @return the edited budget line as JSON
	 */
	public function edit($id, Request $request) {
		$suggestion = Suggestion::findOrFail($request->suggestion);
		$data = $request->all();
		$oldBudgetLine = BudgetLine::where('id', $id)->with('accounts')->firstOrFail();
		if ($oldBudgetLine->equals($request->all())) {
			return response()->json(null);
		}

		// Create the new budget line (copy the old) if not already existed in suggestion
		$budgetLine = BudgetLine::where('id', $id)->where('suggestion_id', $suggestion->id)->first();
		if ($budgetLine === null) {
			$budgetLine = $oldBudgetLine->replicate();
			$budgetLine->parent = intval($id);
			$budgetLine->suggestion_id = $suggestion->id;
			$budgetLine->save();
			$budgetLine->accounts()->sync($oldBudgetLine->accounts->pluck('id'));
		}

		// Update with new data
		$budgetLine->update($data);

		return $budgetLine;
	}

	/**
	 * Adds an account to the budget line.
	 * @param  integer $id      id of the budget line to add the account to
	 * @param  integer $aid     id of the account to add
	 * @return the new budget line
	 */
	public function addAccount($id, $aid) {
		$budgetLine = BudgetLine::findOrFail($id);
		$budgetLine->accounts()->attach(Account::findOrFail($aid)->id);
		return $budgetLine;
	}
}