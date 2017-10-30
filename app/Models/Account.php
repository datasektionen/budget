<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {    
	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['updated_at', 'created_at', 'pivot'];
    protected $fillable = ['name', 'description', 'number'];

    public static function all($columns = []) {
    	return self::select('*')->orderBy('number')->get();
    }

    public static function findByNumberOrFail($number) {
        return self::where('number', $number)->firstOrFail();
    }

    public function budgetLines() {
        return $this->belongsToMany('App\Models\BudgetLine')->with('costCentre.committee');
    }
}
