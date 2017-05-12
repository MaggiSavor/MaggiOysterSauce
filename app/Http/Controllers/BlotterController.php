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
	return view('admin.blotter.blotterList')
		->with('blotterLists', $blotterLists)
			->with('caseHistory', $caseHistory);
	}

	public function addCase(){
	    return view('admin.blotter.addCase');
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
	    return view('admin.blotter.blotterDocuments');
	}

	public function blotterSummon(){
		$summon = Blotter::where('case_status', '!=', 'Case Closed' )
								->where('case_status', '!=', 'Dismissed')
									->where('case_status', '!=', 'Turn Over')
										->where('case_status', '!=', 'Transferred')->get();
	    return view('admin.blotter.blotterSummon')
	    	->with('summon', $summon);
	}

	public function blotterFileAction(){
		$summon = Blotter::where('case_status', '!=', 'Case Closed' )
								->where('case_status', '!=', 'Dismissed')
									->where('case_status', '!=', 'Turn Over')
										->where('case_status', '!=', 'Transferred')->get();
	    return view('admin.blotter.blotterFileAction')
	    	->with('summon', $summon);
	}

	public function blotterDetails(){
		$summon = Blotter::all();
	    return view('admin.blotter.blotterDetails')
	    	->with('summon', $summon);

	}

	public function blotterAgreement(){
		$agreement = Blotter::where('case_status', '!=', 'Case Closed' )
								->where('case_status', '!=', 'Dismissed')
									->where('case_status', '!=', 'Turn Over')
										->where('case_status', '!=', 'Transferred')->get();
	    return view('admin.blotter.blotterAgreement')
	    	->with('agreement', $agreement);
	}

	public function summonPrint($id){
		$summondetails = Blotter::where('case_id', '=', $id)->first();
	    return view('admin.blotter.blotterSummonPrint')
	    	->with('summondetails', $summondetails);
	}

	public function fileActionPrint($id){
		$fileaction = Blotter::where('case_id', '=', $id)->first();
	    return view('admin.blotter.blotterFileActionPrint')
	    	->with('fileaction', $fileaction);
	}

	public function blotterDetailsPrints($id){
		$details = Blotter::where('case_id', '=', $id)->first();
	    return view('admin.blotter.blotterDetailsPrint')
	    	->with('details', $details);
	}

	public function agreementPrint($id){
		$agree = Blotter::where('case_id', '=', $id)->first();
	    return view('admin.blotter.blotterAgreementPrint')
	    	->with('agree', $agree);
	}

	public function blotterSummonPrint(){
		$summon = Request::all();
        $case = new CaseHistory;
        $case['case_id'] = $summon['caseID'];
        $case['complainant_fullname'] = $summon['cname'];
        $case['defendant_fullname'] = $summon['dname'];
        $case['case_title'] = $summon['title'];
        $case['case_status'] = $summon['status'];
        $case['case_desc'] = 'Reprinting of Summon Letter';
        $case['issued'] = 'Summon Letter';
        $case['summon_date'] = $summon['sdate'];
        $case['summon_time'] = $summon['stime'];
        $case->save();
        return response()->json(array('success' =>'Successfully Saved!'));
	}

	public function blotterDetailsPrint(){
		$summon = Request::all();
        $case = new CaseHistory;
        $case['case_id'] = $summon['caseID'];
        $case['complainant_fullname'] = $summon['cname'];
        $case['defendant_fullname'] = $summon['dname'];
        $case['case_title'] = $summon['title'];
        $case['case_status'] = $summon['status'];
        $case['case_desc'] = 'Printing of Blotter Details';
        $case['issued'] = 'Blotter Details';
        $case->save();
        return response()->json(array('success' =>'Successfully Saved!'));
	}
}
