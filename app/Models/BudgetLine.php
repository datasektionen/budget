<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetLine extends Model {    
	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['updated_at', 'created_at'];   
    protected $fillable = ['name', 'income', 'expenses', 'cost_centre_id', 'type', 'valid_from', 'valid_to', 'suggestion_id'];

    public function accounts() {
        return $this->belongsToMany('App\Models\Account');
    }

    public function costCentre() {
        return $this->belongsTo('App\Models\CostCentre');
    }

    public function parentLine() {
        return $this->belongsTo('App\Models\BudgetLine', 'parent');
    }

    public function balance() {
        return $this->income - $this->expenses;
    }

    public function removeIfEqualsParent() {
        $parent = $this->parentLine;
        if ($this->name != $parent->name) return $this;
        if ($this->income != $parent->income) return $this;
        if ($this->expenses != $parent->expenses) return $this;
        if ($this->type != $parent->type) return $this;
        //if ($this->accounts != $parent->accounts) return $this;
        $this->delete();
        return $parent;
    }
}
