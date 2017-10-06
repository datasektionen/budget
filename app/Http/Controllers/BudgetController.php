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
 * @version 2017-10-02
 */
class BudgetController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Displays the budget for the committee with the given id.
	 * The view consists of a view component.
	 * @param  stringint 	$id 	the id of the committee
	 * @return view 		view with vue.js component
	 */
	public function getCommittee($id) {
		// Is this a suggestion editing? Don't edit implemented suggestions either
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
	 * @return view        a view with all committees' budgets
	 */
	public function getOverview() {
		$committees = [];
		$budgetLines = BudgetLine::allNow();
		foreach ($budgetLines as $budgetLine) {
			if (!array_key_exists($budgetLine->costCentre->committee_id, $committees)) {
				$committees[$budgetLine->costCentre->committee_id] = [
					'info' => $budgetLine->costCentre->committee,
					'income' => 0,
					'expenses' => 0,
					'external' => 0,
					'internal' => 0,
					'balance' => 0
				];
			}

			if ($budgetLine->type === 'internal') {
				$committees[$budgetLine->costCentre->committee_id]['internal'] += ($budgetLine->income - $budgetLine->expenses) * $budgetLine->costCentre->repetitions;
			} else {
				$committees[$budgetLine->costCentre->committee_id]['external'] += ($budgetLine->income - $budgetLine->expenses) * $budgetLine->costCentre->repetitions;
			}

			$committees[$budgetLine->costCentre->committee_id]['income'] += $budgetLine->income * $budgetLine->costCentre->repetitions;
			$committees[$budgetLine->costCentre->committee_id]['expenses'] += $budgetLine->expenses * $budgetLine->costCentre->repetitions;
			$committees[$budgetLine->costCentre->committee_id]['balance'] += ($budgetLine->income - $budgetLine->expenses) * $budgetLine->costCentre->repetitions;
		}
		return view('budget.overview')->with('committees', $committees);
	}
}