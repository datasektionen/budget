<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Models\Committee;

/**
 * 
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-02
 */
class GeneralController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function getWelcome() {
		return view('welcome')
			->with('committees', Committee::committees())
			->with('projects', Committee::projects())
			->with('others', Committee::other());
	}

	public function getFuzzyfile() {
		$res['@type'] = 'fuzzyfile';
		$res['fuzzes'] = [
			[
				'name' => 'Rambudget',
				'str' => 'Rambudget budgetöversikt',
				'href' => '/overview'
			],
			[
				'name' => 'Dina budgetförslag',
				'str' => 'budgetförslag förslag lista',
				'href' => '/suggestions'
			],
			[
				'name' => 'Budgetuppföljning',
				'str' => 'budgetuppföljning uppföljning speedledger pdf',
				'href' => '/follow-up'
			],
			[
				'name' => 'Administration',
				'str' => 'administration admin kassör',
				'href' => '/admin'
			]
		];
		foreach (Committee::all() as $committee) {
			$res['fuzzes'][] = [
				'name' => 'Budget för ' . $committee->name,
				'str' => 'Budget för ' . $committee->name,
				'href' => '/committees/' . $committee->id,
			];
		}
		return response()->json($res);
	}
}