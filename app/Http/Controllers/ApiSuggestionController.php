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
 * Controls committee API.
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-30
 */
class ApiSuggestionController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function delete($id, Request $request) {
		$suggestion = Suggestion::findOrFail($id);
		$suggestion->delete();
		return $suggestion;
	}
}