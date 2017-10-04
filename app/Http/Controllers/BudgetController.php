<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Models\Committee;
use App\Models\Suggestion;

/**
 * 
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-02
 */
class BudgetController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function getCommittee($id) {
		$suggestion = Suggestion::find(session('suggestion'));
		if ($suggestion != null) {
			$suggestion->authors;
		}
		if ($suggestion != null && $suggestion->isImplemented()) {
			$suggestion = null;
		}
		$committee = \App\Models\Committee::findOrFail($id); 
		$committee->expenses();
		$committee->income();
		$committee->costCentres->map(function ($costCentre) {
			return $costCentre->budgetLines->map(function ($budgetLine) use ($costCentre) {
				$budgetLine->expenses = $budgetLine->expenses / 100;
				$budgetLine->income = $budgetLine->income / 100;
				$budgetLine->deleted = $costCentre->budgetLines->map(function ($x) use ($budgetLine) {
					return $x->suggestion_id == session('suggestion') && $x->parent == $budgetLine->id;
				})->reduce(function ($a, $b) {
					return $a || $b;
				}, false);
				return $budgetLine;
			});
		});
		return view('budget.committee')
			->with('committee', $committee)
			->with('suggestion', $suggestion);
	}

	public function getOverview() {
		$committees = [];
		$budgetLines = \App\Models\BudgetLine::allNow();
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
				$committees[$budgetLine->costCentre->committee_id]['internal'] += $budgetLine->income - $budgetLine->expenses;
			} else {
				$committees[$budgetLine->costCentre->committee_id]['external'] += $budgetLine->income - $budgetLine->expenses;
			}

			$committees[$budgetLine->costCentre->committee_id]['income'] += $budgetLine->income;
			$committees[$budgetLine->costCentre->committee_id]['expenses'] += $budgetLine->expenses;
			$committees[$budgetLine->costCentre->committee_id]['balance'] += $budgetLine->income - $budgetLine->expenses;
		}
		return view('budget.overview')->with('committees', $committees);
	}
}