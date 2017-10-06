<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;

class Suggestion extends Model {    
	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['updated_at', 'created_at'];
    protected $fillable = ['name', 'description', 'valid_from', 'valid_to', 'created_by', 'implemented_at', 'implemented_by'];

    public function budgetLines() {
        return $this->hasMany('App\Models\BudgetLine')->with('parentLine');
    }

    public function isPublic() {
        return $this->public_at !== null;
    }

    public function publish() {
        $this->public_at = Carbon::now();
        $this->save();
    }

    public static function allPublic() {
        return self::whereNotNull('public_at')->orderBy('public_at')->get();
    }

    public function implement() {
        foreach ($this->budgetLines as $budgetLine) {
            $parent = $budgetLine->parentLine;
            if ($parent != null) {
                $parent->valid_to = $suggestion->valid_from;
                $parent->save();
            }
            $budgetLine->valid_from = $suggestion->valid_from;
            if ($budgetLine->income === 0 && $budgetLine->expenses === 0) {
                $budgetLine->valid_to = Carbon::now();
            }
            $budgetLine->save();
        }
        $this->implemented_at = \Carbon\Carbon::now();
        $this->implemented_by = Auth::user()->id;
        $this->save();
    }

    public function committees() {
        $ids = $this->budgetLines->pluck('id');
        $committees = Committee::whereHas('allCostCentres.allBudgetLines', function ($q) use ($ids) {
            $q->whereIn('id', $ids);
        })->get();
        return $committees;
    }

    public function costCentresForCommittee($committeeId) {
        $ids = $this->budgetLines->pluck('id');
        $costCentres = CostCentre::whereHas('allBudgetLines', function ($q) use ($ids) {
            $q->whereIn('id', $ids);
        })->where('committee_id', $committeeId)->get();
        return $costCentres;
    }

    public function budgetLinesForCostCentre($costCentreId) {
        return BudgetLine::where('suggestion_id', $this->id)->where('cost_centre_id', $costCentreId)->get();
    }

    public function isImplemented() {
        return $this->implemented_at !== null;
    }

    public function authors() {
        return $this->belongsToMany('App\Models\User');
    }

    // override the toArray function (called by toJson)
    public function toArray() {
        // get the original array to be displayed
        $data = parent::toArray();

        // change the value of the 'mime' key
        $data['authors'] = $this->authors;

        return $data;
    }
}