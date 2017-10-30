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
 * Controls budget routes. For example, if the budget for a committee or the
 * budget overview is requested, this is the controller to ask.
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-30
 */
class BudgetController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Displays the budget for the committee with the given id.
	 * The view consists of a Vue.js component.
	 * @param  stringint 	$id 	the id of the committee
	 * @return view with vue.js component
	 */
	public function getCommittee($id) {
		$suggestion = Suggestion::find(session('suggestion'));
		$suggestion = ($suggestion != null && $suggestion->isImplemented()) ? null : $suggestion;
		$committee = Committee::findOrFailWithColumns($id);
		return view('budget.committee')
			->with('committee', $committee)
			->with('suggestion', $suggestion);
	}

	/**
	 * Show the rambudget for all committees. Pre-calculates all data since
	 * calling the different income/expenses functions is time-killing.
	 * @return a view with all committees' budgets
	 */
	public function getOverview() {
		return view('budget.overview')->with('committees', Committee::overview());
	}
}