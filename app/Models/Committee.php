<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model {
	protected $fillable = ['name'];

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
