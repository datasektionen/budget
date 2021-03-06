<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class BudgetLine extends Model {    
	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['updated_at', 'created_at'];   
    protected $fillable = ['name', 'income', 'expenses', 'cost_centre_id', 'type', 'valid_from', 'valid_to', 'suggestion_id', 'parent'];
    protected $appends = ['accounts', 'deleted', 'balance'];

    public static function now() {
        return self::where('valid_from', '<', DB::raw('NOW()'))
            ->where('valid_to', '>', DB::raw('NOW()'))
            ->whereExists(function ($q) {
                $q->select(DB::raw(1))
                    ->from('suggestions')
                    ->whereNotNull('implemented_at')
                    ->whereRaw('suggestions.id = budget_lines.suggestion_id');
            })
            ->with('costCentre.committee')
            ->get();
    }

    public function copy($suggestion) {
        if ($this->suggestion_id === $suggestion->id) {
            return $this;
        }

        $budgetLine = $this->replicate();
        $budgetLine->parent = $this->id;
        $budgetLine->suggestion_id = $suggestion->id;
        $budgetLine->valid_to = null;
        $budgetLine->valid_from = null;
        $budgetLine->save();
        $budgetLine->accounts()->sync($this->accounts->pluck('id'));
        return $budgetLine;
    }

    public function getDeletedAttribute() {
        return BudgetLine::where('cost_centre_id', $this->cost_centre_id)
            ->where('suggestion_id', session('suggestion'))
            ->where('parent', $this->id)
            ->count() > 0;
    }

    public function getAccountsAttribute() {
        return $this->accounts()->get();
    }

    public function accounts() {
        return $this->belongsToMany('App\Models\Account')->orderBy('number');
    }

    public function costCentre() {
        return $this->belongsTo('App\Models\CostCentre');
    }

    public function followUps($id = null) {
        if ($id !== null) {
            return $this->belongsToMany('App\Models\FollowUp')->withPivot('booked')->where('follow_up_id', $id);
        }
        return $this->belongsToMany('App\Models\FollowUp')->withPivot('booked');
    }

    public function parentLine() {
        return $this->belongsTo('App\Models\BudgetLine', 'parent');
    }

    public function getBalanceAttribute() {
        return $this->income - $this->expenses;
    }

    public function equals(array $data) {
        return $this->type == @$data['type'] &&
               $this->income == @$data['income'] &&
               $this->expenses == @$data['expenses'] &&
               $this->name == @$data['name'];
    }

    public static function allNow() {
        return self::where('valid_to', '>', Carbon::now())
            ->where('valid_from', '<', Carbon::now())
            ->whereExists(function ($q) {
                $q->select(DB::raw(1))
                    ->from('suggestions')
                    ->whereRaw('suggestions.id = budget_lines.suggestion_id')
                    ->whereNotNull('implemented_at');
            })
            ->with('costCentre')
            ->get();
    }

    public function removeIfEqualsParent() {
        $parent = $this->parentLine;
        if ($parent === null) {
            return $this;
        }
        if ($this->name != $parent->name) return $this;
        if ($this->income != $parent->income) return $this;
        if ($this->expenses != $parent->expenses) return $this;
        if ($this->type != $parent->type) return $this;
        //if ($this->accounts != $parent->accounts) return $this;
        $this->delete();
        return $parent;
    }
}
