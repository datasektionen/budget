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
        return self::whereNotNull('public_at')->orderBy('public_at')->paginate(20);
    }

    public function reset($budgetLine) {
        $bl = $this->budgetLines()->where('parent', $budgetLine->id)->first();
        if ($bl === null) {
            $bl = $budgetLine->replicate();
            $bl->parent = $budgetLine->id;
            $bl->suggestion_id = $this->id;
            $bl->valid_to = null;
            $bl->valid_from = null;
            $bl->save();
            $bl->accounts()->sync($budgetLine->accounts->pluck('id'));
        }
        $bl->income = 0;
        $bl->expenses = 0;
        $bl->save();
    }

    public function import($committees, $type) {
        if ($type === 'replace_all') {
            foreach (BudgetLine::now() as $budgetLine) {
                $this->reset($budgetLine);
            }
        }

        if ($type === 'replace_committees') {
            $committeeIds = array_map(function ($x) {
                if (!empty($x['model'])) {
                    return $x['model']->id;
                }
                return -1;
            }, $committees);
            foreach (BudgetLine::now() as $budgetLine) {
                if (in_array($budgetLine->costCentre->committee->id, $committeeIds)) {
                    $this->reset($budgetLine);
                }
            }
        }

        foreach ($committees as $c) {
            $committee = Committee::where('name', $c['name'])->first();
            if ($committee === null) {
                $committee = Committee::create(['name' => $c['name']]);
            }

            foreach ($c['costCentres'] as $cc) {
                $costCentre = $committee->costCentres()->where('name', $cc['name'])->first();
                if ($costCentre === null) {
                    $costCentre = CostCentre::create([
                        'name' => $cc['name'], 
                        'committee_id' => $committee->id
                    ]);
                }

                foreach ($cc['budgetLines'] as $bl) {
                    if ($type === 'add') {
                        $budgetLine = BudgetLine::create([
                            'name' => $bl['name'], 
                            'income' => $bl['income'] * 100, 
                            'expenses' => $bl['expenses'] * 100,
                            'suggestion_id' => $this->id,
                            'type' => empty($bl['type']) ? 'external' : $bl['type'],
                            'valid_from' => null,
                            'valid_to' => null,
                            'parent' => null,
                            'cost_centre_id' => $costCentre->id
                        ]);
                    } else {
                        $budgetLine = $this->budgetLines()->where('name', $bl['name'])->where('cost_centre_id', $costCentre->id)->first();
                        if ($budgetLine === null) {
                            $oldBudgetLine = $costCentre->budgetLines()->where('name', $bl['name'])->first();
                            $budgetLine = BudgetLine::create([
                                'name' => $bl['name'], 
                                'income' => $bl['income'] * 100, 
                                'expenses' => $bl['expenses'] * 100,
                                'suggestion_id' => $this->id,
                                'type' => empty($bl['type']) ? 'external' : $bl['type'],
                                'valid_from' => null,
                                'valid_to' => null,
                                'parent' => ($oldBudgetLine != null) ? $oldBudgetLine->id : null,
                                'cost_centre_id' => $costCentre->id
                            ]);
                        } else {
                            $budgetLine->update([
                                'income' => $bl['income'] * 100, 
                                'expenses' => $bl['expenses'] * 100,
                                'type' => empty($bl['type']) ? 'external' : $bl['type'],
                                'valid_from' => null,
                                'valid_to' => null
                            ]);
                        }
                    }
                }
            }
        }
    }

    public function implement() {
        foreach ($this->budgetLines as $budgetLine) {
            $parent = $budgetLine->parentLine;
            if ($parent != null) {
                $parent->valid_to = $this->valid_from;
                $parent->save();
            }
            $budgetLine->valid_from = $this->valid_from;
            if ($budgetLine->income === 0 && $budgetLine->expenses === 0) {
                $budgetLine->valid_to = Carbon::now();
            } else {
                $budgetLine->valid_to = $this->valid_to;
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