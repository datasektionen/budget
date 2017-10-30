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
 * Handles admin requests.
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-30
 */
class AdminController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Show index page.
	 * @return view, the index page
	 */
	public function getIndex() {
		return view('admin.index');
	}

	/**
	 * Shows a list of all committees.
	 * @return view with the list
	 */
	public function getCommitteesList() {
		return view('admin.committees.index')
			->with('committees', Committee::committees())
			->with('projects', Committee::projects())
			->with('others', Committee::other());
	}

	/**
	 * Shows a form for editing a committee.
	 * @param  integer $id the committe to edit
	 * @return view with the form
	 */
	public function getCommitteesEdit($id) {
		return view('admin.committees.edit')
			->with('committee', Committee::findOrFail($id));
	}

	/**
	 * Handles the committees post request.
	 * @param  integer $id      id of the committee
	 * @param  Request $request the request
	 * @return redirect back when saved
	 */	
	public function postCommitteesEdit($id, Request $request) {
		$committee = Committee::findOrFail($id);
		$committee->update($request->all());
		return redirect('admin/committees')->with('success', 'committees.saved');
	}

	/**
	 * Show form for creating new committee.
	 * @return view with the form
	 */
	public function getCommitteesNew() {
		return view('admin.committees.new');
	}

	/**
	 * Handles the create committee post request.
	 * @param  Request $request the request
	 * @return redirect back when saved
	 */	
	public function postCommitteesNew(Request $request) {
		Committee::create($request->all());
		return redirect('admin/committees')->with('success', 'committees.saved');
	}

	/**
	 * Lists all accounts.
	 * @return view with the accounts
	 */
	public function getAccountsList() {
		return view('admin.accounts.index')
			->with('accounts', Account::orderBy('number', 'ASC')->paginate(20));
	}

	/**
	 * Show edit form for account
	 * @param  integer $id the id of the account to edit
	 * @return view with the form
	 */
	public function getAccountsEdit($id) {
		return view('admin.accounts.edit')
			->with('account', Account::findOrFail($id));
	}

	/**
	 * Handles the edit account post request.
	 * @param  Request $request the request
	 * @return redirect back when saved
	 */	
	public function postAccountsEdit($id, Request $request) {
		$account = Account::findOrFail($id);
		$account->update($request->all());
		return redirect('admin/accounts')->with('success', 'accounts.saved');
	}

	/**
	 * Show a create account form.
	 * @return view with the form
	 */
	public function getAccountsNew() {
		return view('admin.accounts.new');
	}

	/**
	 * Handles the create account post request.
	 * @param  Request $request the request
	 * @return redirect back when saved
	 */	
	public function postAccountsNew(Request $request) {
		Account::create($request->all());
		return redirect('admin/accounts')->with('success', 'accounts.saved');
	}

	/**
	 * Shows all budget lines for account.
	 * @param  integer $id the id of the account
	 * @return view with the list
	 */
	public function getAccountsBudgetLines($id) {
		$account = Account::findOrFail($id);
		return view('admin.accounts.budget-lines')
			->with('account', $account)
			->with('budgetLines', $account->budgetLines()->paginate(20));
	}

	/**
	 * Lists all suggestions.
	 * @return view with the suggestions
	 */
	public function getSuggestions() {
		return view('admin.suggestions.index')
			->with('suggestions', Suggestion::allPublic());
	}

	/**
	 * List all events. TODO.
	 * @return view listing all events
	 */
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