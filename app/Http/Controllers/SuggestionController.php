<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Models\Suggestion;
use App\Models\User;
use Auth;

/**
 * 
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-02
 */
class SuggestionController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function getList() {
		return view('suggestions.list')->with('suggestions', Auth::user()->suggestions);	
	}

	public function getNew() {
		return view('suggestions.new');
	}

	public function postNew(Request $request) {
		$suggestion = Suggestion::create(array_merge($request->all(), ['created_by' => Auth::user()->id]));
		Auth::user()->suggestions()->attach($suggestion);
		return redirect('/suggestions')->with('success', 'suggestions.created');
	}

	public function getShow($id, Request $request) {
		return view('suggestions.show')->with('suggestion', Suggestion::findOrFail($id));
	}

	public function getPdf($id, Request $request) {
		return view('suggestions.pdf')->with('suggestion', Suggestion::findOrFail($id));
	}

	public function getShare($id, Request $request) {
		return view('suggestions.share')->with('suggestion', Suggestion::findOrFail($id));
	}

	public function postShare($id, Request $request) {
		$this->validate($request, ['kth_username' => 'required']);
		$suggestion = Suggestion::findOrFail($id);
		$user = User::createFromKthUsername($request->input('kth_username'));
		$suggestion->authors()->attach($user->id);
		return redirect('suggestions/' . $id . '/share')->with('success', 'suggestions.shared');
	}

	public function getEdit($id, Request $request) {
		$suggestion = Suggestion::findOrFail($id);
		if ($suggestion->isImplemented()) {
			redirect('suggestions')->with('error', 'suggestion.error_implemented');
		}
		session(['suggestion' => $suggestion->id]);
		return redirect('suggestions')->with('success', 'suggestion.changed');
	}

	public function getDone($id, Request $request) {
		session(['suggestion' => null]);
		return redirect('suggestions')->with('success', 'suggestion.done');
	}

	public function getImplement($id, Request $request) {
		$suggestion = Suggestion::findOrFail($id);
		$suggestion->implement();
		if (session('suggestion') == $suggestion->id) {
			session(['suggestion' => null]);
		}
		return redirect('suggestions')->with('success', 'suggestion.implemented');
	}
}