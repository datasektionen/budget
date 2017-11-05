<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class CostCentre extends Model {
	protected $fillable = ['name', 'committee_id', 'speedledger_id'];
	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['updated_at', 'created_at'];
    
	public function budgetLines() {
		$s = session('suggestion');
		if (empty($s)) { $s = -1; }
		return $this->hasMany('App\Models\BudgetLine')
			->where(function ($q) use($s) {
				$q->where('budget_lines.valid_from', '<=', Carbon::now())
					->where('budget_lines.valid_to', '>', Carbon::now())
					->where(function ($q) use($s) {
						$q->whereExists(function ($q) use ($s) {
							$q->select(DB::raw(1))->from('suggestions')
							->whereRaw('suggestions.id = budget_lines.suggestion_id')
							->where(function ($q) use ($s) {
								$q->whereNotNull('suggestions.implemented_at')
								->orWhere('suggestions.id', $s);
							});
						})->orWhereExists(function ($q) {
							$q->select(DB::raw(1))->from('budget_line_follow_up')
							->whereRaw('budget_line_follow_up.budget_line_id = budget_lines.id');
						});
					});
			})
			->orWhere('suggestion_id', session('suggestion', -1))
			->with('accounts')
			->orderBy('budget_lines.name')
			->orderBy('suggestion_id');
	}
	
	public static function match($speedledgerId, $committeeName, $costCentreName) {
		// First, try speedledger id. It overrides everything else
		if (!empty($speedledgerId)) {
			$costCentre = self::where('speedledger_id', $speedledgerId)->first();
			if ($costCentre != null) {
				return $costCentre;
			}
		}

		// Otherwise, go by committee name and cost centre name
		$costCentre = CostCentre::where('name', $costCentreName)->whereExists(function ($q) use ($committeeName) {
			$q->select(DB::raw(1))
				->from('committees')
				->whereRaw('committees.id = cost_centres.committee_id')
				->where('committees.name', $committeeName);
		})->first();

		return $costCentre;
	}
	
	public function allBudgetLines() {
		return $this->hasMany('App\Models\BudgetLine')
			->with('accounts')
			->orderBy('budget_lines.name')
			->orderBy('suggestion_id');
	}

	public function expenses() {
		return $this->budgetLines->sum('expenses') * $this->repetitions;
	}

	public function income() {
		return $this->budgetLines->sum('income') * $this->repetitions;
	}

	public function external() {
		return $this->budgetLines->filter(function ($x) {
			return $x->type === 'external';
		})->sum(function ($x) {
			return $x->income - $x->expenses;
		}) * $this->repetitions;
	}

	public function internal() {
		return $this->budgetLines->filter(function ($x) {
			return $x->type === 'internal';
		})->sum(function ($x) {
			return $x->income - $x->expenses;
		}) * $this->repetitions;
	}

    public function committee() {
        return $this->belongsTo('App\Models\Committee');
    }

    public function budgetLineForAccount($acc) {
    	return $this->budgetLines()->whereHas('accounts', function ($q) use ($acc) {
    		$q->where('number', $acc);
    	})->first();
    }
}
