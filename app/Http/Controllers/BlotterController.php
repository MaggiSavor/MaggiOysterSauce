<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\Blotter;
use Request;
use Auth;
use Redirect;

class BlotterController extends Controller
{
	public function blotterList(){
	$blotterLists = Blotter::all();
	return view('admin.blotterList')
		->with('blotterLists', $blotterLists);
	}

	public function addCase(){
	    return view('admin.addCase');
	}

	public function blotterDocuments(){
	    return view('admin.blotterDocuments');
	}
	public function blotterSummon(){
		$summon = Blotter::where('case_status', '!=', 'Case Closed')
								->where('case_status', '!=', 'Dismissed')->get();
	    return view('admin.blotterSummon')
	    	->with('summon', $summon);
	}
	public function blotterFileAction(){
		$filaction = Blotter::where('case_status', '!=', 'Case Closed')
								->where('case_status', '!=', 'Turn Over')
									->where('case_status', '!=', 'Transferred')
										->where('case_status', '!=', 'Dismissed')->get();
	    return view('admin.blotterFileAction')
	    	->with('fileaction', $filaction);
	}
	public function blotterDetails(){
		$detail = Blotter::all();
	    return view('admin.blotterDetails')
	    	->with('detail', $detail);
	}
	public function blotterAgreement(){
		$agreement = Blotter::where('case_status', '!=', 'Case Closed')->get();
	    return view('admin.blotterAgreement')
	    	->with('agreement', $agreement);
	}
}
