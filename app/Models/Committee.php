<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Committee extends Model {
	protected $fillable = ['name', 'type', 'inactive'];
	protected $hidden = ['created_at', 'updated_at'];
	protected $appends = ['cost_centres'];
    protected $booleans = ['inactive'];

	public static function all($columns = []) {
		return parent::select('*')->orderBy('name')->get();
	}

	public static function committees() {
		return self::select('*')->where('type', 'committee')->orderBy('name')->get();
	}

	public static function projects() {
		return self::select('*')->where('type', 'project')->orderBy('name')->get();
	}

    public static function active() {
        return self::select('*')->where('inactive', false)->orderBy('name')->get();
    }

    public static function activeCommittees() {
		return self::select('*')->where('type', 'committee')->where('inactive', false)->orderBy('name')->get();
	}

	public static function activeProjects() {
		return self::select('*')->where('type', 'project')->where('inactive', false)->orderBy('name')->get();
	}

	public static function other() {
		return self::select('*')->where('type', 'other')->orderBy('name')->get();
	}

    public static function activeOther() {
		return self::select('*')->where('type', 'other')->where('inactive', false)->orderBy('name')->get();
	}

	public static function now() {
		return self::select('*')->orderBy('name')->with('costCentres')->get();
	}

	public function costCentres() {
		return $this->hasMany('App\Models\CostCentre')->with('budgetLines')->orderBy('name');
	}

	public function getCostCentresAttribute() {
		return $this->costCentres()->get();
	}

	public function allCostCentres() {
		return $this->hasMany('App\Models\CostCentre')->with('allBudgetLines')->orderBy('name');
	}

	public function getExternalAttribute() {
		return $this->costCentres->sum(function ($x) {
			return $x->external;
		});
	}

	public function getInternalAttribute() {
		return $this->costCentres->sum(function ($x) {
			return $x->internal;
		});
	}

	public function getExpensesAttribute() {
		return $this->costCentres->sum(function ($x) {
			return $x->expenses;
		});
	}

	public function getIncomeAttribute() {
		return $this->costCentres->sum(function ($x) {
			return $x->income;
		});
	}

	public function getBalanceAttribute() {
		return $this->income - $this->expenses;
	}

	public static function getExternalAllAttribute() {
		return self::all()->sum(function ($x) {
			return $x->external;
		});
	}

	public static function getInternalAllAttribute() {
		return self::all()->sum(function ($x) {
			return $x->internal;
		});
	}

	public static function expensesAll() {
		return self::all()->sum(function ($x) {
			return $x->expenses;
		});
	}

	public static function incomeAll() {
		return self::all()->sum(function ($x) {
			return $x->income;
		});
	}

	public static function getBalanceAllAttribute() {
		return self::incomeAll() - self::expensesAll();
	}

    public function displayName() {
        if (trim($this->name) == "") {
            return "<i>(namn saknas)</i>";
        } else {
            return htmlspecialchars($this->name);
        }
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
			    balance,
                inactive
			FROM (
			    SELECT t0.*, t0.income - t0.expenses AS balance FROM (
			        SELECT
			            committees.id AS id,
			            committees.name AS name,
			            committees.type AS type,
                        committees.inactive as inactive,
			            SUM(budget_lines.expenses * cost_centres.repetitions) AS expenses,
			            SUM(budget_lines.income * cost_centres.repetitions) AS income
			        FROM committees
			        LEFT JOIN cost_centres ON cost_centres.committee_id = committees.id
			        LEFT JOIN budget_lines ON budget_lines.cost_centre_id = cost_centres.id
			        WHERE (
			        	budget_lines.valid_from < NOW()
			        	AND budget_lines.valid_to > NOW()
                        AND NOT inactive
			        	AND NOT EXISTS (
			        		SELECT 1 FROM budget_lines AS bl
			        		WHERE bl.parent = budget_lines.id AND bl.suggestion_id = :suggid1
			        	)
			        )
			        OR budget_lines.suggestion_id = :suggid2
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
			    WHERE budget_lines.type = 'internal' AND (
			    	(
			        	budget_lines.valid_from < NOW()
			        	AND budget_lines.valid_to > NOW()
			        	AND NOT EXISTS (
			        		SELECT 1 FROM budget_lines AS bl
			        		WHERE bl.parent = budget_lines.id AND bl.suggestion_id = :suggid3
			        	)
		        	)
			    	OR budget_lines.suggestion_id = :suggid4
		        )
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
			    WHERE budget_lines.type = 'external' AND (
			    	(
			        	budget_lines.valid_from < NOW()
			        	AND budget_lines.valid_to > NOW()
			        	AND NOT EXISTS (
			        		SELECT 1 FROM budget_lines AS bl
			        		WHERE bl.parent = budget_lines.id AND bl.suggestion_id = :suggid5
			        	)
		        	)
			    	OR budget_lines.suggestion_id = :suggid6
		        )
			    GROUP BY committees.id
			) AS t3
			ON t1.id = t3.id

			ORDER BY t1.type, t1.name, balance", [
				'suggid1' => session('suggestion', -1),
				'suggid2' => session('suggestion', -1),
				'suggid3' => session('suggestion', -1),
				'suggid4' => session('suggestion', -1),
				'suggid5' => session('suggestion', -1),
				'suggid6' => session('suggestion', -1)
		]));
	}
}
