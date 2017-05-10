<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\Resident;
use App\Models\Blotter;
use App\Models\BarangayId;
use App\Models\BusinessPermit;
use App\Models\Certification;
use App\Models\Indigency;
use App\Models\GoodMoral;
use Request;
use Auth;
use Redirect;

class ReportsController extends Controller
{
public function residentReport(){
    return view('admin.residentReport');
}
public function barangayProfileReport(){
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
    return view('admin.barangayProfileReport')
    	->with('resident', $resident)
    		->with('male', $male)
    			->with('female', $female)
    				->with('voter', $voter)
    					->with('household', $household)
    						->with('family', $family)
    							->with('senior', $senior);

}
public function caseReport(){
    return view('admin.caseReport');
}
public function certificateReport(){
    return view('admin.certificateReport');
}
public function barangayIdReport(){
    return view('admin.barangayIdReport');
}
public function businessPermitReport(){
    return view('admin.businessPermitReport');
}
public function returnResidentReport(){
	$gender = Request::all();
	$returnGender = Resident::where('gender','=',$gender)
								->where('resident_status', '=', 'Active')->get();

	$voter = Request::all();
	$returnVoter = Resident::where('voter','=', 'voter')
									->where('resident_status', '=', 'Active')->get();

	$senior = Request::all();
	$returnSenior = Resident::whereYear('birthdate', '<', 1955)
											->where('resident_status', '=', 'Active')->get();

	$all = Request::all();
	$returnResident = Resident::where('resident_status', '=', 'Active')->get();

	return response()->json(["gender" => $returnGender, "voter" => $returnVoter, "senior" => $returnSenior, "all" => $returnResident]);
}
public function returnCaseReport(){
	$case = Request::all();
	$returnCase = Blotter::where('case_status','=',$case)->get();

	$all = Request::all();
	$returnAll = Blotter::all();

	return response()->json(["case" => $returnCase, "all" => $returnAll]);
}
public function returnIdReport(){
	$barangay = Request::all();
	// $returnId = BarangayId::select('id_no')->distinct()
	// 						->orderBy('id_no', 'desc')->get();
	$returnId = BarangayId::all();

	return response()->json(["barangay" => $returnId]);
}
public function returnPermitReport(){
	$permit = Request::all();
	// $returnId = BarangayId::select('id_no')->distinct()
	// 						->orderBy('id_no', 'desc')->get();
	$returnId = BusinessPermit::all();

	return response()->json(["permit" => $returnId]);
}
public function returnCert(){
	$certification = Request::all();
	$returnCert = Certification::all();

	$goodMoral = Request::all();
	$returnGood = GoodMoral::all();

	$indigency = Request::all();
	$returnIndigency = Indigency::all();

	return response()->json(["certification" => $returnCert, "goodMoral" => $returnGood, "indigency" => $returnIndigency]);
}
public function resDate(){
	$res = Request::all();
	
	$residentDate = Resident::whereBetween('date_registered', [$res['start'], $res['end']])->get();

	return response()->json(["resident" => $residentDate]);
}
public function caseDate(){
	$case = Request::all();
	
	$caseDate = Blotter::whereBetween('case_date', [$case['start'], $case['end']])->get();

	return response()->json(["case" => $caseDate]);
}
public function idDate(){
	$id = Request::all();
	
	$IdDate = BarangayId::whereBetween('date_issued', [$id['start'], $id['end']])->get();

	return response()->json(["bid" => $IdDate]);
}
public function permitDate(){
	$permit = Request::all();
	
	$PermitDate = BusinessPermit::whereBetween('date_issued', [$permit['start'], $permit['end']])->get();

	return response()->json(["bpermit" => $PermitDate]);
}
public function certDate(){
	$cert = Request::all();
	$type = [$cert['type']];

	if($type == "Certificate"){	
		$certDate = Certification::whereBetween('date_issued', [$cert['start'], $cert['end']])->get();
		return response()->json(["info1" => $certDate, "type" => "Certificate"]);
	}
	else if($type == "Good Moral"){
		$goodDate = GoodMoral::whereBetween('date_issued', [$cert['start'], $cert['end']])->get();
		return response()->json(["info2" => $goodDate, "type" => "Good Moral"]);
	}
	else{
		$indigencyDate = Indigency::whereBetween('date_issued', [$cert['start'], $cert['end']])->get();
		return response()->json(["info3" => $indigencyDate, "type" => "Indigency"]);
	}
	// return response($type);
}

}
