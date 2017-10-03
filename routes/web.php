<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Suggestion;
use Illuminate\Http\Request;
use App\Helpers\SpeedledgerParser;

Route::get('/', function () {
	return view('welcome')->with('committees', \App\Models\Committee::now());
});

Route::get('/committees/{id}', function ($id) {
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
	return view('committee')
		->with('committee', $committee)
		->with('suggestion', $suggestion);
});

Route::get ('/suggestions', 'SuggestionController@getList');
Route::get ('/suggestions/new', 'SuggestionController@getNew');
Route::post('/suggestions/new', 'SuggestionController@postNew');
Route::get ('/suggestions/{id}', 'SuggestionController@getShow');
Route::get ('/suggestions/{id}/share', 'SuggestionController@getShare');
Route::post('/suggestions/{id}/share', 'SuggestionController@postShare');
Route::get ('/suggestions/{id}/edit', 'SuggestionController@getEdit');
Route::get ('/suggestions/{id}/done', 'SuggestionController@getDone');
Route::get ('/suggestions/{id}/implement', 'SuggestionController@getImplement');

Route::get('/overview', function (Request $request) {
	return view('overview')->with('committees', \App\Models\Committee::select('*')->orderBy('name')->get());
});

Route::get('/follow-up', function (Request $request) {
	return view('follow-up');
});

Route::post('/follow-up', function (Request $request) {
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


	$update = function ($fu, $costCentre) {
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
				$costCentre->budgetLines->push($bl);
				$acc['amount'] = 0;
			}
		}
	};

	$error = [];
	foreach ($followUp as $fu) {
		if (!isset($fu['budget_line'])) {
			$error[] = $fu;
			continue;
		}
		if (!isset($fu['spec'])) {
			$error[] = $fu;
			continue;
		}

		$costCentre = \App\Models\CostCentre::where('speedledger_id', $fu["budget_line"]["speedledger_id"])->first();
		if ($costCentre !== null) {
			$update($fu, $costCentre);
			continue;
		}

		$found = false;
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

	return view('follow-up-done')->with('error', $error)->with('committees', $committees);
});

Route::get('login', 'AuthController@getLogin')->middleware('guest');
Route::get('login-complete/{token}', 'AuthController@getLoginComplete');