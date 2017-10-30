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
class ApiBudgetLineController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function list($id) {
		return CostCentre::findOrFail($id)->budgetLines;
	}

	public function create($id, Request $request) {
		$data = json_decode($request->getContent(), true);
		$costCentre = CostCentre::findOrFail($id);
		if (empty($data['name'])) $data['name'] = '';
		if (empty($data['income'])) $data['income'] = 0;
		if (empty($data['expenses'])) $data['expenses'] = 0;
		if (empty($data['type'])) $data['type'] = 'internal';
		if (empty($data['valid_from'])) $data['valid_from'] = \Carbon\Carbon::now();
		if (empty($data['valid_to'])) $data['valid_to'] = date("Y") . '-12-31 23:59:59';
		$x = array_merge($data, ['cost_centre_id' => $costCentre->id]);
		$budgetLine = BudgetLine::create($x);

		$committee = $budgetLine->costCentre->committee;
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
		$res->budget_line = $budgetLine;
		$res->committee = $committee;
		return response()->json($res);
	}

	public function get(Request $request, $id) {
		return BudgetLine::where('id', $id)->with('accounts')->firstOrFail();
	}

	public function edit($id, Request $request) {
		$suggestion = Suggestion::findOrFail($request->input('suggestion'));
		$data = json_decode($request->getContent(), true);
		$oldBudgetLine =  BudgetLine::findOrFail($id)->first();
		if ($oldBudgetLine->type == @$data['type'] &&
			$oldBudgetLine->income == @$data['income'] &&
			$oldBudgetLine->expenses == @$data['expenses'] &&
			$oldBudgetLine->name == @$data['name']) {
			return response()->json(false);
		}
		$budgetLine = BudgetLine::where('id', intval($id))->where('suggestion_id', $suggestion->id)->first();
		if ($budgetLine === null) {
			$budgetLine = BudgetLine::where('parent', intval($id))->where('suggestion_id', $suggestion->id)->first();
		}
		if ($budgetLine === null) {
			$old = BudgetLine::where('id', $id)->with('accounts')->first();
			$budgetLine = $old->replicate();
			$budgetLine->parent = intval($id);
			$budgetLine->suggestion_id = $suggestion->id;
			$budgetLine->save();
			$budgetLine->accounts()->sync($old->accounts->pluck('id'));
		}
		$budgetLine->update($data);

		$committee = $budgetLine->costCentre->committee;
		$budgetLine = $budgetLine->removeIfEqualsParent();

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
		return $committee;
	}

	public function getAccount($id, $aid, Request $request) {
		$budgetLine = BudgetLine::findOrFail($id);
		$account = Account::findOrFail($aid);
		$budgetLine->accounts()->attach($account->id);
		return $budgetLine;
	}
}