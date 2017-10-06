<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Models\Committee;
use App\Helpers\SpeedledgerParser;

/**
 * 
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-02
 */
class FollowUpController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Shows the import PDF from Speedledger view.
	 * @return view    form with pdf upload
	 */
	public function getImport() {
		return view('follow-up.index');
	}

	/**
	 * Handles file upload from import page and
	 *  1 Parses PDF through SpeedledgerParser
	 *  2 Generates the budget
	 *  3 Matches Speedledger report to budget lines
	 * @param  Request $request the post request
	 * @return view 			view with the result
	 */
	public function postShow(Request $request) {
		$file = $request->file('report');
		$parser = new SpeedledgerParser();
		$followUp = $parser->parseFile($file->path());

		$committees = \App\Models\Committee::all();
		$committees = $committees->map(function ($committee) use ($followUp) {
			$committee->expenses();
			$committee->income();
			$committee->costCentres = $committee->costCentres->map(function ($costCentre) use ($followUp) {
				$costCentre->budgetLines = $costCentre->budgetLines->map(function ($budgetLine) use ($followUp, $costCentre) {
					$budgetLine->expenses = $budgetLine->expenses / 100;
					$budgetLine->income = $budgetLine->income / 100;
					$budgetLine->deleted = $costCentre->budgetLines->map(function ($x) use ($budgetLine) {
						return $x->suggestion_id == session('suggestion') && $x->parent == $budgetLine->id;
					})->reduce(function ($a, $b) {
						return $a || $b;
					}, false);
					return $budgetLine;
				});
				return $costCentre;
			});
			return $committee;
		});

		$update = function (&$fu, &$costCentre) {
			foreach ($fu["spec"] as &$acc) {
				$found = false;
				foreach ($costCentre->budgetLines as &$budgetLine) {
					foreach ($budgetLine->accounts as &$account) {
						if ($account->number != $acc['account']) { continue; }
						$budgetLine->booked = $acc['amount'];
						$acc['amount'] = 0;
						$found = true;
						break;
					}
				}
				if (!$found) {
					$bl = new \App\Models\BudgetLine;
					$a = new \App\Models\Account;
					$a->number = $acc['account'];
					$a->name = $acc['name'];
					$a->description = $acc['name'];
					$bl->accounts = collect([$a]);
					$bl->income = 0;
					$bl->expenses = 0;
					$bl->cost_centre_id = $costCentre->id;
					$bl->type = 'external';
					$bl->booked = $acc['amount'];
					$bl->name = "Automatiskt tillagd: " . $acc['name'];
					if ($costCentre->budgetLines == null || $costCentre->budgetLines->count() == 0) {
						$costCentre->budgetLines = collect([$bl]);
					} else {
						$costCentre->budgetLines->push($bl);
					}
					$acc['amount'] = 0;
				}
			}
		};

		$error = [];
		foreach ($followUp as $fu) {
			$found = false;
			if (!empty($fu["budget_line"]["speedledger_id"])) {
				$costCentre = \App\Models\CostCentre::where('speedledger_id', $fu["budget_line"]["speedledger_id"])->first();
				if ($costCentre !== null) {
					$update($fu, $costCentre);
					$found = true;
					continue;
				}
			}

			foreach ($committees as &$committee) {
				if ($committee->name != $fu["budget_line"]["committee"]) { continue; }
				foreach ($committee->costCentres as &$costCentre) {
					if (strcasecmp($costCentre->name, $fu["budget_line"]["cost_centre"])) { continue; }
					$update($fu, $costCentre);
					$found = true;
					break;
				}
			}
			
			if (!$found) {
				$error[] = $fu;
			}
		}

		return view('follow-up.result')->with('error', $error)->with('committees', $committees);
	}
}