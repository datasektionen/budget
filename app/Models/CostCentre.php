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
			->where('budget_lines.valid_from', '<=', Carbon::now())
			->where('budget_lines.valid_to', '>', Carbon::now())
			->whereExists(function ($q) use ($s) {
				$q->select(DB::raw(1))->from('suggestions')->whereRaw('suggestions.id = budget_lines.suggestion_id')
				->whereNotNull('suggestions.implemented_at')
				->orWhere('suggestions.id', $s);
			})
			->with('accounts')
			->orderBy('budget_lines.name')
			->orderBy('suggestion_id');
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
}
