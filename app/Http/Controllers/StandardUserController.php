<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\AuditTrail;
use App\Models\Resident;
use App\Models\Certification;
use App\Models\Indigency;
use App\Models\GoodMoral;
use App\Models\BarangayId;
use App\Models\BusinessPermit;
use App\Models\BarangayOfficial;
use App\Models\Blotter;
use App\Models\CaseHistory;
use Request;
use Auth;
use Redirect;

class StandardUserController extends Controller
{
public function home(){
		$resident = Resident::where('resident_status', '=', 'Active')->count();
		$male = Resident::where('gender', '=', 'Male')
							->where('resident_status', '=', 'Active')->count();
		$female = Resident::where('gender', '=', 'Female')
							->where('resident_status', '=', 'Active')->count();
		$voter = Resident::where('voter', '=', 'voter')
							->where('resident_status', '=', 'Active')->count();
		$household = Resident::select('household_id')->distinct()
							->orderBy('household_id', 'desc')->first();
		$family = Resident::select('family_id')->distinct()
							->orderBy('family_id', 'desc')->first();
		$senior = Resident::whereYear('birthdate', '<', 1955)
							->where('resident_status', '=', 'Active')->count();
		$alarms = Blotter::where('case_type','=','Alarms and Scandals')->count();
		$false = Blotter::where('case_type','=','False Identities')->count();
		$physical = Blotter::where('case_type','=','Physical Injury')->count();
		$abandonment = Blotter::where('case_type','=','Abandonment')->count();
		$tresspass = Blotter::where('case_type','=','Tresspass')->count();
		$threats = Blotter::where('case_type','=','Threats')->count();
		$theft = Blotter::where('case_type','=','Theft')->count();
		$swindling = Blotter::where('case_type','=','Swindling')->count();
		$sexual = Blotter::where('case_type','=','Sexual Assault')->count();
		$murder = Blotter::where('case_type','=','Murder')->count();
		$illegal  = Blotter::where('case_type','=','Illegal Drug')->count();
	    return view('standardUser.home1')
	    ->with('resident', $resident)
    		->with('male', $male)
    			->with('female', $female)
    				->with('voter', $voter)
    					->with('household', $household)
    						->with('family', $family)
    							->with('senior', $senior)
    							->with('alarms',$alarms)
						    		->with('false',$false)
						    			->with('physical',$physical)
						    				->with('abandonment',$abandonment)
						    					->with('tresspass',$tresspass)
						    						->with('threats',$threats)
						    							->with('theft',$theft)
							    							->with('swindling',$swindling)
							    								->with('sexual',$sexual)
							    									->with('murder',$murder)
							    										->with('illegal',$illegal);
	}
	public function resident(){
		$allResident = Resident::where('resident_status','=','Active')->count();
		$household = Resident::where('resident_status','=','Active')
			->where('household_head','=','yes')->count();
		$family = Resident::where('resident_status','=','Active')
			->where('family_head','=','yes')->count();
		$female = Resident::where('resident_status','=','Active')
			->where('gender','=','Female')->count();
		$male = Resident::where('resident_status','=','Active')
			->where('gender','=','Male')->count();
		$voter = Resident::where('resident_status','=','Active')
			->where('voter','=','voter')->count();
		$senior = Resident::where('resident_status','=','Active')
			->whereYear('birthdate','<=',1955)->count();
		$transfer = Resident::where('resident_status','=','Transferred')->count();
	    return view('standardUser.resident')
	    	->with('all', $allResident)
		    	->with('household', $household)
			    	->with('family', $family)
				    	->with('female', $female)
					    	->with('male', $male)
						    	->with('voter', $voter)
							    	->with('senior', $senior)
								    	->with('transfer', $transfer);
	}
	public function residentList(){
		$residentInfo = Resident::where('resident_status','=','Active')->get();
	    return view('standardUser.residentList')
	    	->with('residentInfo', $residentInfo);
	}
	public function householdList(){
		$residentInfo = Resident::where('resident_status','=','Active')
			->where('household_head','=','yes')->get();
		return view('standardUser.householdList')
	    	->with('residentInfo', $residentInfo);
	}
	public function familyList(){
		$residentInfo = Resident::where('resident_status','=','Active')
			->where('family_head','=','yes')->get();
	    return view('standardUser.familyList')
	    	->with('residentInfo', $residentInfo);
	}
	public function femaleList(){
		$residentInfo = Resident::where('resident_status','=','Active')
			->where('gender','=','Female')->get();
	    return view('standardUser.femaleList')
	    	->with('residentInfo', $residentInfo);
	}
	public function maleList(){
		$residentInfo = Resident::where('resident_status','=','Active')
			->where('gender','=','Male')->get();
	    return view('standardUser.maleList')
	    	->with('residentInfo', $residentInfo);
	}
	public function voterList(){
		$residentInfo = Resident::where('resident_status','=','Active')
			->where('voter','=','voter')->get();
	    return view('standardUser.voterList')
	    	->with('residentInfo', $residentInfo);
	}
	public function seniorList(){
		$residentInfo = Resident::where('resident_status','=','Active')
			->whereYear('birthdate','<=',1955)->get();
	    return view('standardUser.seniorList')
	    	->with('residentInfo', $residentInfo);
	}
	public function transferredList(){
		$residentInfo = Resident::where('resident_status','=','Transferred')->get();
	    return view('standardUser.transferredList')
	    	->with('residentInfo', $residentInfo);
	}
	public function documentsList(){
	    return view('standardUser.documentsList');
	}

	public function certificateList(){
		$certificate = Certification::all();
	    return view('standardUser.docuCertificateList')
	    	->with('certificate', $certificate);
	}

	public function goodMoralList(){
		$moral = GoodMoral::all();
	    return view('standardUser.docuGoodMoralList')
	    	->with('moral', $moral);
	}

	public function indigencyList(){
		$indigency = Indigency::all();
	    return view('standardUser.docuIndigencyList')
	    	->with('indigency', $indigency);
	}

	public function idList(){
		$id = BarangayId::all();
	    return view('standardUser.docuIDList')
	    	->with('id', $id);
	}

	public function permitList(){
		$permit = BusinessPermit::all();
	    return view('standardUser.docuBusinessPermitList')
	    	->with('permit', $permit);
	}

	public function blotterList(){
	$blotterLists = Blotter::all();
	$caseHistory = CaseHistory::all();
	return view('standardUser.blotterList')
		->with('blotterLists', $blotterLists)
			->with('caseHistory', $caseHistory);
	}
	public function officials(){
	$chairman = BarangayOfficial::where('position', '=', 'chairman')
					->orderBy('term_year', 'desc')->first();
	$sec = BarangayOfficial::where('position', '=', 'secretary')
					->orderBy('term_year', 'desc')->first();
	$tre = BarangayOfficial::where('position', '=', 'treasurer')
					->orderBy('term_year', 'desc')->first();
	$kag1 = BarangayOfficial::where('position', '=', 'kagawad1')
					->orderBy('term_year', 'desc')->first();
	$kag2 = BarangayOfficial::where('position', '=', 'kagawad2')
					->orderBy('term_year', 'desc')->first();
	$kag3 = BarangayOfficial::where('position', '=', 'kagawad3')
					->orderBy('term_year', 'desc')->first();
	$kag4 = BarangayOfficial::where('position', '=', 'kagawad4')
					->orderBy('term_year', 'desc')->first();
	$kag5 = BarangayOfficial::where('position', '=', 'kagawad5')
					->orderBy('term_year', 'desc')->first();
	$kag6 = BarangayOfficial::where('position', '=', 'kagawad6')
					->orderBy('term_year', 'desc')->first();
	$kag7 = BarangayOfficial::where('position', '=', 'kagawad7')
					->orderBy('term_year', 'desc')->first();
	$officials = Resident::where('voter', '=', 'voter')->get();	
    return view('standardUser.officials')
    	->with('chairman', $chairman)
    		->with('sec', $sec)
    			->with('tre', $tre)
    				->with('kag1', $kag1)
    					->with('kag2', $kag2)
    						->with('kag3', $kag3)
    							->with('kag4', $kag4)
    								->with('kag5', $kag5)
    									->with('kag6', $kag6)
    										->with('kag7', $kag7)
    											->with('officials', $officials);
}
public function officialsHistory(){
    $chairman = BarangayOfficial::where('position', '=', 'chairman')
					->orderBy('term_year', 'desc')->first();
	$sec = BarangayOfficial::where('position', '=', 'secretary')
					->orderBy('term_year', 'desc')->first();
	$tre = BarangayOfficial::where('position', '=', 'treasurer')
					->orderBy('term_year', 'desc')->first();
	$kag1 = BarangayOfficial::where('position', '=', 'kagawad1')
					->orderBy('term_year', 'desc')->first();
	$kag2 = BarangayOfficial::where('position', '=', 'kagawad2')
					->orderBy('term_year', 'desc')->first();
	$kag3 = BarangayOfficial::where('position', '=', 'kagawad3')
					->orderBy('term_year', 'desc')->first();
	$kag4 = BarangayOfficial::where('position', '=', 'kagawad4')
					->orderBy('term_year', 'desc')->first();
	$kag5 = BarangayOfficial::where('position', '=', 'kagawad5')
					->orderBy('term_year', 'desc')->first();
	$kag6 = BarangayOfficial::where('position', '=', 'kagawad6')
					->orderBy('term_year', 'desc')->first();
	$kag7 = BarangayOfficial::where('position', '=', 'kagawad7')
					->orderBy('term_year', 'desc')->first();
	$terms = BarangayOfficial::select('term_year')->distinct()->get(); 	
    return view('standardUser.officialsHistory')
    	->with('chairman', $chairman)
    		->with('sec', $sec)
    			->with('tre', $tre)
    				->with('kag1', $kag1)
    					->with('kag2', $kag2)
    						->with('kag3', $kag3)
    							->with('kag4', $kag4)
    								->with('kag5', $kag5)
    									->with('kag6', $kag6)
    										->with('kag7', $kag7)
    											->with('terms', $terms);
	}
	public function getOfficials(){
    	$data = Request::all();

    	$officials = BarangayOfficial::where('term_year','=', $data['year'])->get();

    	return response($officials);
    }
    public function validResident(){
    	$data = Request::all();

    	$check = Resident::where('fullname','=', $data['name'])->count();

    	return response($check);
    }
    public function dashboard(){
    	
    }
}