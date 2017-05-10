<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\CaseHistory;
use App\Models\Blotter;
use Request;
use Auth;
use Redirect;

class BlotterController extends Controller
{
	public function blotterList(){
	$blotterLists = Blotter::all();
	$caseHistory = CaseHistory::all();
	return view('admin.blotterList')
		->with('blotterLists', $blotterLists)
			->with('caseHistory', $caseHistory);
	}

	public function addCase(){
	    return view('admin.addCase');
	}

	public function addBlotter(){
	   $addBlotter = Request::all();
	   
        if(($addBlotter['cname']) == ($addBlotter['dname'])){
           return response()->json(array('error' =>'Same!'));
        }
        else{
        // $resident = Resident::where('fullname', $addUser['SearchName'])->exists();
        // if ($resident){
        //   try{
            //users
            $addBlotter = Request::all();
            $case = new Blotter;
            $case['case_title'] = $addBlotter['title'];
            $case['case_type'] = $addBlotter['casetype'];
            $case['case_rate'] = $addBlotter['rate'];
            $case['case_date'] = $addBlotter['casedate'];
            $case['case_time'] = $addBlotter['casetime'];
            $case['complainant_fullname'] = $addBlotter['cname'];
            $case['complainant_address'] = $addBlotter['caddress'];
            $case['defendant_fullname'] = $addBlotter['dname'];
            $case['defendant_address'] = $addBlotter['daddress'];
            $case['summon_date'] = $addBlotter['summondate'];
            $case['summon_time'] = $addBlotter['summontime'];
            $case['case_description'] = $addBlotter['description'];
            $case['case_status'] = 'On-going';
            $case->save();
            return response()->json(array('success' =>'Successfully Saved!'));  
              
        //   }catch(Exception $e){
        //    return response()->json(array('error' =>'Error Occured!'));
        //   }

        // }else{
        //   return response()->json(array('error' =>"Not a Resident!"));
        // }
         
       }
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

	public function summonPrint($id){
		$summondetails = Blotter::where('case_id', '=', $id)->first();
	    return view('admin.blotterSummonPrint')
	    	->with('summondetails', $summondetails);
	}

	public function fileActionPrint($id){
		$fileaction = Blotter::where('case_id', '=', $id)->first();
	    return view('admin.blotterFileActionPrint')
	    	->with('fileaction', $fileaction);
	}

	public function blotterDetailsPrint($id){
		$details = Blotter::where('case_id', '=', $id)->first();
	    return view('admin.blotterDetailsPrint')
	    	->with('details', $details);
	}

	public function agreementPrint($id){
		$agree = Blotter::where('case_id', '=', $id)->first();
	    return view('admin.blotterAgreementPrint')
	    	->with('agree', $agree);
	}
}
