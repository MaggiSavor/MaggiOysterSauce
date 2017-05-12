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

	public function updateBlotter($id){
	$update = Blotter::where('id', '=', $id)->first(); 
	    return view('admin.blotter.updateBlotter')
        	->with("update",$update);
	}

	public function editBlotter($id){
		$edit = Request::all();
	    $info = Blotter::find($id);
	    $info['case_status'] = $edit['casestatus'];
	    $info['summon_date'] = $edit['summondate'];
	    $info['summon_time'] = $edit['summontime'];
	    $info->save();

	    $summon = Request::all();
        $case = new CaseHistory;
        $case['case_id'] = $summon['case_id'];
        $case['complainant_fullname'] = $summon['cname'];
        $case['defendant_fullname'] = $summon['dname'];
        $case['case_title'] = $summon['case_title'];
        $case['case_status'] = $summon['casestatus'];
        $case['case_desc'] = $summon['reason'];
        $case['issued'] = '';
        $case->save();

        return response()->json(array('success' =>'Successfully Saved!'));  
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
		$summon = Blotter::where('case_status', '!=', 'Case Closed' )
								->where('case_status', '!=', 'Dismissed')
									->where('case_status', '!=', 'Turn Over')
										->where('case_status', '!=', 'Transferred')->get();
	    return view('admin.blotter.blotterAgreement')
	    	->with('summon', $summon);
	}

	public function summonPrint($id){
		$summondetails = Blotter::where('id', '=', $id)->first();
	    return view('admin.blotter.blotterSummonPrint')
	    	->with('summondetails', $summondetails);
	}

	public function fileActionPrint($id){
		$fileaction = Blotter::where('id', '=', $id)->first();
	    return view('admin.blotter.blotterFileActionPrint')
	    	->with('fileaction', $fileaction);
	}

	public function blotterDetailsPrints($id){
		$details = Blotter::where('id', '=', $id)->first();
	    return view('admin.blotter.blotterDetailsPrint')
	    	->with('details', $details);
	}

	public function agreementPrint($id){
		$agree = Blotter::where('id', '=', $id)->first();
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

	public function blotterFileActionPrint(){
		$summon = Request::all();
        $case = new CaseHistory;
        $case['case_id'] = $summon['caseID'];
        $case['complainant_fullname'] = $summon['cname'];
        $case['defendant_fullname'] = $summon['dname'];
        $case['case_title'] = $summon['title'];
        $case['case_status'] = $summon['status'];
        $case['case_desc'] = 'Printing of File Action';
        $case['issued'] = 'File Action';
        $case['summon_date'] = '';
        $case['summon_time'] = '';
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

	public function blotterAgreementsPrint(){
		$summon = Request::all();
        $case = new CaseHistory;
        $case['case_id'] = $summon['caseID'];
        $case['complainant_fullname'] = $summon['cname'];
        $case['defendant_fullname'] = $summon['dname'];
        $case['case_title'] = $summon['title'];
        $case['case_status'] = $summon['status'];
        $case['case_desc'] = 'sd';
        $case['issued'] = 'Agreement Letter';
        $case->save();
        return response()->json(array('success' =>'Successfully Saved!'));
	}
}
