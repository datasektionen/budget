<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Committee extends Model {
	protected $fillable = ['name', 'type'];
	protected $hidden = ['created_at', 'updated_at'];

	public static function all($columns = []) {
		return parent::select('*')->orderBy('name')->get();
	}

	public static function allWithColumns() {
		$committees = self::all();
		foreach ($committees as $committee) { 
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
		}

		return $committees;
	}

	public static function findOrFailWithColumns($id) {
		$committee = parent::findOrFail($id); 
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
		});;

		return $committee;
	}

	public static function committees() {
		return self::select('*')->where('type', 'committee')->orderBy('name')->get();
	}

	public static function projects() {
		return self::select('*')->where('type', 'project')->orderBy('name')->get();
	}

	public static function other() {
		return self::select('*')->where('type', 'other')->orderBy('name')->get();
	}

	public static function now() {
		return self::select('*')->orderBy('name')->with('costCentres')->get();
	}

	public function costCentres() {
		return $this->hasMany('App\Models\CostCentre')->with('budgetLines')->orderBy('name');
	}

	public function allCostCentres() {
		return $this->hasMany('App\Models\CostCentre')->with('allBudgetLines')->orderBy('name');
	}

	public function external() {
		return $this->costCentres->sum(function ($x) {
			return $x->external();
		});
	}

	public function internal() {
		return $this->costCentres->sum(function ($x) {
			return $x->internal();
		});
	}

	public function expenses() {
		return $this->costCentres->sum(function ($x) {
			return $x->expenses();
		});
	}

	public function income() {
		return $this->costCentres->sum(function ($x) {
			return $x->income();
		});
	}

	public function balance() {
		return $this->income() - $this->expenses();
	}

	public static function externalAll() {
		return self::all()->sum(function ($x) {
			return $x->external();
		});
	}

	public static function internalAll() {
		return self::all()->sum(function ($x) {
			return $x->internal();
		});
	}

	public static function expensesAll() {
		return self::all()->sum(function ($x) {
			return $x->expenses();
		});
	}

	public static function incomeAll() {
		return self::all()->sum(function ($x) {
			return $x->income();
		});
	}

	public static function balanceAll() {
		return self::incomeAll() - self::expensesAll();
	}

	/**
	 * Runs pretty SQL query to sum all budget lines per committee.
	 * @return laravel collection of committees
	 */
	public static function overview() {
		return collect(DB::select("SELECT
			    t1.id, 
			    t1.name,
			    t1.type,
			    income, 
			    expenses, 
			    internal, 
			    external, 
			    balance
			FROM (
			    SELECT t0.*, t0.income - t0.expenses AS balance FROM (
			        SELECT 
			            committees.id AS id, 
			            committees.name AS name,
			            committees.type AS type, 
			            SUM(budget_lines.expenses * cost_centres.repetitions) AS expenses,
			            SUM(budget_lines.income * cost_centres.repetitions) AS income
			        FROM committees
			        LEFT JOIN cost_centres ON cost_centres.committee_id = committees.id
			        LEFT JOIN budget_lines ON budget_lines.cost_centre_id = cost_centres.id
			        WHERE budget_lines.valid_from < NOW() AND budget_lines.valid_to > NOW()
			        OR budget_lines.suggestion_id = :suggid1
			        GROUP BY committees.id
			    ) AS t0
			) AS t1


			LEFT JOIN (
			    SELECT 
			        committees.id AS id, 
			        SUM((budget_lines.income - budget_lines.expenses) * cost_centres.repetitions) AS internal
			    FROM committees
			    LEFT JOIN cost_centres ON cost_centres.committee_id = committees.id
			    LEFT JOIN budget_lines ON budget_lines.cost_centre_id = cost_centres.id
			    WHERE budget_lines.type = 'internal' AND budget_lines.valid_from < NOW() AND budget_lines.valid_to > NOW()
			    OR budget_lines.suggestion_id = :suggid2
			    GROUP BY committees.id
			) AS t2
			ON t1.id = t2.id


			LEFT JOIN (
			    SELECT 
			        committees.id AS id, 
			        SUM((budget_lines.income - budget_lines.expenses) * cost_centres.repetitions) AS external
			    FROM committees
			    LEFT JOIN cost_centres ON cost_centres.committee_id = committees.id
			    LEFT JOIN budget_lines ON budget_lines.cost_centre_id = cost_centres.id
			    WHERE budget_lines.type = 'external' AND budget_lines.valid_from < NOW() AND budget_lines.valid_to > NOW()
			    OR budget_lines.suggestion_id = :suggid3
			    GROUP BY committees.id
			) AS t3
			ON t1.id = t3.id", [
				'suggid1' => session('suggestion', -1),
				'suggid2' => session('suggestion', -1),
				'suggid3' => session('suggestion', -1)
			]));
	}
}
