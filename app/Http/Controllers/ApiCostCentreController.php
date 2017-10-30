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
class ApiCostCentreController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function all($committeeId, Request $request) {
		$data = json_decode($request->getContent(), true);
		$committee = Committee::findOrFail($committeeId);
		return $committee->costCentres;
	}

	public function create($committeeId, Request $request) {
		$data = json_decode($request->getContent(), true);
		$committee = Committee::findOrFail($committeeId);
		$x = array_merge($data, ['committee_id' => $committee->id]);
		$costCentre = CostCentre::create($x);

		$committee = $costCentre->committee;
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

		$res = new \stdClass;
		$res->cost_centre = $costCentre;
		$res->committee = $committee;
		return response()->json($res);
	}

	public function get($id) {
		return CostCentre::findOrFail($id);
	}

	public function edit($id, Request $request) {
		$data = json_decode($request->getContent(), true);
		$costCentre = CostCentre::findOrFail($id);
		$costCentre->update($data);
		return $costCentre;
	}

	public function delete($id, Request $request) {
		$data = json_decode($request->getContent(), true);
		$costCentre = CostCentre::findOrFail($id);
		$costCentre->delete();
		return $costCentre;
	}
}