<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Models\Committee;

/**
 * Handles general routes such as fuzzyfile and index page.
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-30
 */
class GeneralController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * The frontpage view. Displays lists of committees, projects and others.
	 * @return the view
	 */
	public function getWelcome() {
		return view('welcome')
			->with('committees', Committee::activeCommittees())
			->with('projects', Committee::activeProjects())
			->with('others', Committee::other());
	}

	/**
	 * A fuzzyfile for [Methone](https://github.com/datasektionen/Methone),
	 * containing links to different parts of the site. The budget for each
	 * committee is included.
	 * @return fuzzes a JSON
	 */
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
