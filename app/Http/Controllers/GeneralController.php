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
}