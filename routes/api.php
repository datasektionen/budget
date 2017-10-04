<?php

use Illuminate\Http\Request;
use App\Models\Committee;
use App\Models\CostCentre;
use App\Models\BudgetLine;
use App\Models\Suggestion;
use App\Models\Account;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('committees', function () {
	return response()->json(Committee::select('*')->with('costCentres')->get());
});

Route::post('committees', function (Request $request) {
	$data = json_decode($request->getContent(), true);
	return Committee::create($data);
});

Route::get('committees/{id}', function ($id) {
	return response()->json(Committee::select('id', 'name')->where('id', $id)->with('costCentres')->first());
});

Route::post('committees/{id}', function ($id, Request $request) {
	$data = json_decode($request->getContent(), true);
	$committee = Committee::findOrFail($id);
	$committee->update($data);
	return $committee;
});

Route::delete('committees/{id}', function ($id) {
	$committee = Committee::findOrFail($id);
	$committee->delete();
	return $committee;
});

Route::get('committees/{id}/cost-centres', function ($id, Request $request) {
	$data = json_decode($request->getContent(), true);
	$committee = Committee::findOrFail($id);
	return $committee->costCentres;
});

Route::post('committees/{id}/cost-centres', function ($id, Request $request) {
	$data = json_decode($request->getContent(), true);
	$committee = Committee::findOrFail($id);
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
});

Route::get('cost-centres/{id}', function ($id) {
	return CostCentre::findOrFail($id);
});

Route::post('cost-centres/{id}', function ($id, Request $request) {
	$data = json_decode($request->getContent(), true);
	$costCentre = CostCentre::findOrFail($id);
	$costCentre->update($data);
	return $costCentre;
});

Route::delete('cost-centres/{id}', function ($id, Request $request) {
	$data = json_decode($request->getContent(), true);
	$costCentre = CostCentre::findOrFail($id);
	$costCentre->delete();
	return $costCentre;
});

Route::get('cost-centres/{id}/budget-lines', function ($id) {
	return CostCentre::findOrFail($id)->budgetLines;
});

Route::post('cost-centres/{id}/budget-lines', function ($id, Request $request) {
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
});

Route::get('budget-lines/{id}', function(Request $request, $id) {
	return BudgetLine::where('id', $id)->with('accounts')->firstOrFail();
});

Route::post('budget-lines/{id}', function ($id, Request $request) {
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
});

Route::post('budget-lines/{id}/accounts/{aid}', function ($id, $aid, Request $request) {
	$budgetLine = BudgetLine::findOrFail($id);
	$account = Account::findOrFail($aid);
	$budgetLine->accounts()->attach($account->id);
	return $budgetLine;
});

Route::get('accounts', function(Request $request) {
	return Account::all();
});

Route::post('accounts', function (Request $request) {
	$data = json_decode($request->getContent(), true);
	return Account::create($data);
});

Route::get('accounts/{id}', function($id, Request $request) {
	return Account::findOrFail($id);
});

Route::get('accounts/number/{number}', function($number, Request $request) {
	return Account::where('number', $number)->firstOrFail();
});

Route::delete('suggestions/{id}', function($id, Request $request) {
	$suggestion = Suggestion::findOrFail($id);
	$suggestion->delete();
	return $suggestion;
});