<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Models\Suggestion;
use App\Models\User;
use App\Models\Committee;
use App\Models\Account;
use App\Models\BudgetLine;
use Carbon\Carbon;
use Auth;

/**
 * 
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-02
 */
class AdminController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function getIndex() {
		return view('admin.index');
	}

	public function getCommitteesList() {
		return view('admin.committees.index')
			->with('committees', Committee::committees())
			->with('projects', Committee::projects())
			->with('others', Committee::other());
	}

	public function getCommitteesEdit($id) {
		return view('admin.committees.edit')
			->with('committee', Committee::findOrFail($id));
	}

	public function postCommitteesEdit($id, Request $request) {
		$committee = Committee::findOrFail($id);
		$committee->update($request->all());
		return redirect('admin/committees')->with('success', 'committees.saved');
	}

	public function getCommitteesNew() {
		return view('admin.committees.new');
	}

	public function postCommitteesNew(Request $request) {
		Committee::create($request->all());
		return redirect('admin/committees')->with('success', 'committees.saved');
	}

	public function getAccountsList() {
		return view('admin.accounts.index')
			->with('accounts', Account::all());
	}

	public function getAccountsEdit($id) {
		return view('admin.accounts.edit')
			->with('account', Account::findOrFail($id));
	}

	public function postAccountsEdit($id, Request $request) {
		$account = Account::findOrFail($id);
		$account->update($request->all());
		return redirect('admin/accounts')->with('success', 'accounts.saved');
	}

	public function getAccountsNew() {
		return view('admin.accounts.new');
	}

	public function postAccountsNew(Request $request) {
		Account::create($request->all());
		return redirect('admin/accounts')->with('success', 'accounts.saved');
	}

	public function getAccountsBudgetLines($id) {
		return view('admin.accounts.budget-lines')
			->with('account', Account::findOrFail($id));
	}

	public function getSuggestions() {
		return view('admin.suggestions.index')
			->with('suggestions', Suggestion::allPublic());
	}

	public function getEvents() {
		$futureValidFrom = BudgetLine::where('valid_from', '>', Carbon::now())->orderBy('valid_from')->get()->toArray();
		$futureValidTo = BudgetLine::where('valid_to', '>', Carbon::now())->orderBy('valid_to')->get()->toArray();
		$future = [];
		for ($i = 0, $j = 0; $i < count($futureValidFrom) || $j < count($futureValidTo); $i++, $j++) {
			if ($i < count($futureValidFrom) && $futureValidFrom[$i]->valid_from->lte($futureValidTo[$j]->valid_to)) {
				$futureValidFrom[$i]['type'] = 'from';
				$future[] = $futureValidFrom[$i];
				$i++;
			} else {
				$futureValidTo[$j]['type'] = 'to';
				$future[] = $futureValidTo[$j];
				$j++;
			}
		}
		return view('admin.events')
			->with('future', $future);
	}
}