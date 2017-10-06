<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model {
	protected $fillable = ['name', 'type'];

	public static function all($columns = []) {
		return parent::select('*')->orderBy('name')->get();
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
}
