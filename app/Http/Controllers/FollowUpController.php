<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Models\Committee;
use App\Models\CostCentre;
use App\Models\FollowUp;
use App\Helpers\SpeedledgerParser;
use Auth;

/**
 * 
 *
 * @author  Jonas Dahl <jonas@jdahl.se>
 * @version 2017-10-02
 */
class FollowUpController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Shows the import PDF from Speedledger view.
	 * @return view    form with pdf upload
	 */
	public function getIndex() {
		return view('follow-up.index')
			->with('followUps', FollowUp::all());
	}

	/**
	 * Handles file upload from import page and
	 *  1 Parses PDF through SpeedledgerParser
	 *  2 Generates the budget
	 *  3 Matches Speedledger report to budget lines
	 * @param  Request $request the post request
	 * @return view 			view with the result
	 */
	public function postImport(Request $request) {
		try {
			$file = $request->file("report");
			$parser = new SpeedledgerParser();
			$followUp = $parser->parseFile($file->path());
		} catch (Exception $e) {
			return redirect()->back()->with("errors", new MessageBag(["parse" => "error.parse"]));		
		}

		$followUp = FollowUp::createFromSpeedledger($followUp, 'Namnlös budgetuppföljning', Auth::user()->id);

		return redirect('/follow-up/' . $followUp->id);
	}

	/**
	 * Shows the followup
	 * @param  $id      the id of the follow-up to show
	 * @return view 	the follow-up
	 */
	public function getShow($id) {
		$followUp = FollowUp::preparedOverview($id);
		return view('follow-up.overview')->with('followUp', $followUp);
	}

	public function getShowCommittee($id, $committeeId) {
		$followUp = FollowUp::prepared($id, $committeeId);
		return view('follow-up.result')->with('followUp', $followUp);
	}
}