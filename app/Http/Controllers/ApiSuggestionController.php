<?php 

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Models\Committee;
use App\Models\Suggestion;
use App\Models\BudgetLine;

/**
 * Controls suggestions API.
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-30
 */
class ApiSuggestionController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Deletes suggestion.
	 * @param  integer  $id      the id of the suggestion to delete
	 * @param  Request  $request the request
	 * @return the deleted suggestion as json
	 */
	public function delete($id, Request $request) {
		$suggestion = Suggestion::findOrFail($id);
		$suggestion->delete();
		return reponse()->json($suggestion);
	}
}