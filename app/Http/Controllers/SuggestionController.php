<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Models\Suggestion;
use App\Models\User;
use Auth;

/**
 * Takes care of requests regarding budget suggestions.
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-02
 */
class SuggestionController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Lists all user's suggestions
	 * @return view    showing all suggestions that user is in
	 */
	public function getList() {
		return view('suggestions.list')
			->with('suggestions', Auth::user()->suggestions);	
	}

	/**
	 * Shows form for creating a new suggestion
	 * @return view    with the form
	 */
	public function getNew() {
		return view('suggestions.new');
	}

	/**
	 * Handles creating new suggestion. Takes all post data and creates
	 * such suggestion.
	 * @param  Request $request request containing at least name and valid_to date
	 * @return redirect 	to /suggestions with result
	 */
	public function postNew(Request $request) {
		$this->validate($request, ['name' => 'required', 'valid_to' => 'required|regex:/\d{4}-\d{2}-\d{2}\T\d{2}:\d{2}/']);
		// Add information about who created the suggestion
		$data = array_merge($request->all(), ['created_by' => Auth::user()->id, 'valid_from' => date('Y-m-d H:i:s')]);

		// Create and attach to user
		$suggestion = Suggestion::create($data);
		Auth::user()->suggestions()->attach($suggestion);

		return redirect('/suggestions')
			->with('success', 'suggestions.created');
	}

	/**
	 * Shows a suggestion.
	 * @param  int  	$id 	the id of the suggestion to show
	 * @return view 			showing the suggestion
	 */
	public function getShow($id) {
		return view('suggestions.show')
			->with('suggestion', Suggestion::findOrFail($id));
	}

	/**
	 * Shows a printable version of the suggestion for attaching to SM motion.
	 * @param  int  	$id 	the id of the suggestion to show
	 * @return view 			showing the suggestion printable
	 */
	public function getPdf($id) {
		return view('suggestions.pdf')
			->with('suggestion', Suggestion::findOrFail($id));
	}

	/**
	 * Shows a form for sharing the suggestion with others.
	 * @param  int  	$id 	the id of the suggestion to share
	 * @return view 			showing the suggestion sharing form
	 */
	public function getShare($id, Request $request) {
		return view('suggestions.share')
			->with('suggestion', Suggestion::findOrFail($id));
	}

	/**
	 * Shares the given suggestion with the input user (kth_username), 
	 * that is required.
	 * @param  int  	$id 	the id of the suggestion to share
	 * @param  Request $request the request containing kth_username (required)
	 * @return redirect 		to /suggestions/{id}/share with status message
	 */
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

	/**
	 * Publishes a suggestion.
	 * @param  $id 	     the id of the suggestion to publish
	 * @return redirect  to the suggestions page
	 */
	public function getPublish($id) {
		$suggestion = Suggestion::findOrFail($id);
		$suggestion->publish();
		return redirect('/suggestions')->with('success', 'suggestions.published');
	}
}