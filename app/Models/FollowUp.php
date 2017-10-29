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

	public static function prepared($id, $committeeId) {
		$followUp = self::findOrFail($id);

		$followUp->committee = Committee::select('*')
			->with('costCentres.budgetLines.followUps', 117)
		    ->first();

		return $followUp;
	}

	public static function preparedOverview($id) {
		$followUp = self::findOrFail($id);

		$followUp->committees = Committee::select('committees.*', 'c_income', 'c_expenses', 'c_booked')
		    ->leftJoin(DB::raw('(SELECT 
			        committees.id AS committee_id,
			        SUM(budget_lines.income) AS c_income, 
			        SUM(budget_lines.expenses) AS c_expenses,
			        SUM(budget_line_follow_up.booked) AS c_booked
			    FROM committees
			    JOIN cost_centres ON cost_centres.committee_id = committees.id
			    JOIN budget_lines ON budget_lines.cost_centre_id = cost_centres.id
			    LEFT JOIN budget_line_follow_up ON budget_line_follow_up.budget_line_id = budget_lines.id
			    WHERE (budget_line_follow_up.follow_up_id = ' . intval($id) . ' OR budget_line_follow_up.follow_up_id IS NULL)
			    GROUP BY committees.id
			) AS t1'), 'committees.id', 'committee_id')
		    ->get();

		return $followUp;

		/*
				SELECT t1.*, committees.name FROM committees LEFT JOIN (SELECT 
		        committees.id AS committee_id,
		        SUM(budget_lines.income) AS c_income, 
		        SUM(budget_lines.expenses) AS c_expenses,
		        SUM(budget_line_follow_up.booked) AS booked
		    FROM committees
		    JOIN cost_centres ON cost_centres.committee_id = committees.id
		    JOIN budget_lines ON budget_lines.cost_centre_id = cost_centres.id
		    LEFT JOIN budget_line_follow_up ON budget_line_follow_up.budget_line_id = budget_lines.id
		    WHERE budget_line_follow_up.follow_up_id = 117
		    GROUP BY committees.id
		) AS t1
		ON committees.id = t1.committee_id
				 */
	}
}


