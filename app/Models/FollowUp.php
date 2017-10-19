<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Committee;
use Carbon\Carbon;

class FollowUp extends Model {
	protected $fillable = ['name', 'created_by'];

	var $unidentified = [];

	public static function createFromSpeedledger($speedledger, $name, $createdBy) {
		$followUp = self::create([
			'name' => $name,
			'created_by' => $createdBy
		]);

		$cleanFollowUp = [];
		// Find cost centres for every page
		// Throw away pages with 0 spec
		foreach ($speedledger as &$row) {
			if (empty($row['spec'])) {
				// The spec is empty, we don't need it
				continue;
			}
			$costCentre = CostCentre::match(
				$row['budget_line']['speedledger_id'], 
				$row['budget_line']['committee'], 
				$row['budget_line']['cost_centre']
			);
			$row['cost_centre'] = $costCentre;
			
			if ($costCentre == null) {
				$followUp->unidentified[] = $row;
				continue;
			}
			$cleanFollowUp[] = $row;
		}

		$atts = [];
		foreach ($cleanFollowUp as &$row) {
			// Loop through every spec to map 
			foreach ($row['spec'] as $spec) {
				$budgetLine = $row['cost_centre']->budgetLineForAccount($spec['account']);
				if ($budgetLine == null) {
					$budgetLine = BudgetLine::create([
						'name' => 'Automatiskt tillagd: ' . $spec['name'], 
						'income' => 0, 
						'expenses' => 0, 
						'cost_centre_id' => $row['cost_centre']->id, 
						'type' => 'internal', 
						'valid_from' => Carbon::now(), 
						'valid_to' => date('Y-12-31 23:59', strtotime('+1 year')), 
						'suggestion_id' => 0
					]);

					$account = Account::where('number', trim($spec['account']))->first();
					if ($account === null) {
						$account = Account::create(['name' => $spec['name'], 'number' => $spec['account']]);
					}
					$budgetLine->accounts()->attach($account->id);
				}

				$followUp->budgetLines()->attach($budgetLine->id, ['booked' => intval($spec['amount'] * 100)]);
			}
		}

		return $followUp;
	}

	public function budgetLines() {
		return $this->belongsToMany('App\Models\BudgetLine')->withPivot('booked');
	}

	public static function prepared($id) {
		$followUp = self::findOrFail($id);

		$followUp->committees = Committee::all();
		foreach ($followUp->committees as &$committee) { 
			$committee->expenses();
			$committee->income();
			$committee->costCentres->map(function ($costCentre) use ($id) {
				$costCentre->budgetLines->map(function ($budgetLine) use ($costCentre, $id) {
					$budgetLine->expenses = $budgetLine->expenses / 100;
					$budgetLine->income = $budgetLine->income / 100;
					$budgetLine->booked = $budgetLine->followUps($id)->get()->sum(function ($x) {
						return $x->pivot->booked;
					}) / 100;
					$budgetLine->deleted = $costCentre->budgetLines->map(function ($x) use ($budgetLine) {
						return $x->suggestion_id == session('suggestion') && $x->parent == $budgetLine->id;
					})->reduce(function ($a, $b) {
						return $a || $b;
					}, false);
					return $budgetLine;
				});

				$costCentre->booked = $costCentre->budgetLines->sum(function ($budgetLine) {
					return $budgetLine->booked;
				});
			});

			$committee->booked = $committee->costCentres->sum(function ($costCentre) {
				return $costCentre->booked;
			});
		}

		return $followUp;
	}
}


