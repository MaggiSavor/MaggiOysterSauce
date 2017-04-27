<?php
namespace App\Http\Controllers;

use App\Models\Resident;
use Request;
use Auth;
use Redirect;

class ResidentController extends Controller
{
public function resident(){
	$allResident = Resident::where('resident_status','=','active')->count();
	$household = Resident::where('resident_status','=','active')
		->where('household_head','=','yes')->count();
	$family = Resident::where('resident_status','=','active')
		->where('family_head','=','yes')->count();
	$female = Resident::where('resident_status','=','active')
		->where('gender','=','Female')->count();
	$male = Resident::where('resident_status','=','active')
		->where('gender','=','Male')->count();
	$voter = Resident::where('resident_status','=','active')
		->where('voter','=','voter')->count();
	$senior = Resident::where('resident_status','=','active')
		->whereYear('birthdate','<=',1955)->count();
	$transfer = Resident::where('resident_status','=','Transferred')->count();
    return view('admin.resident')
    	->with('all', $allResident)
	    	->with('household', $household)
		    	->with('family', $family)
			    	->with('female', $female)
				    	->with('male', $male)
					    	->with('voter', $voter)
						    	->with('senior', $senior)
							    	->with('transfer', $transfer);
	}
public function addResident(){
	$houseID = Resident::select('household_id')->where('resident_status','=','active')->orderby('resident_id', 'DESC')->first();
	$familyID = Resident::select('family_id')->where('resident_status','=','active')->orderby('resident_id', 'DESC')->first();
    return view('admin.addResident')
    	->with('houseID',$houseID)
    		->with('familyID',$familyID);
    // return $familyID;
}
public function saveResident(){
    $residentInfo = Request::all();

    $saveInfo = New Resident;
    $saveInfo['lastname'] = $residentInfo['lname'];
    $saveInfo['firstname'] = $residentInfo['fname'];
    $saveInfo['middlename'] = $residentInfo['mname'];
    $saveInfo['house_no'] = $residentInfo['houseNo'];
    $saveInfo['street'] = $residentInfo['street'];
    $saveInfo['household_id'] = $residentInfo['householdID'];
    $saveInfo['birthdate'] = $residentInfo['birthdate'];
    $saveInfo['telno'] = $residentInfo['telno'];
    $saveInfo['mobile'] = $residentInfo['mobile'];
    $saveInfo['status'] = $residentInfo['status'];
    $saveInfo['occupation'] = $residentInfo['occupation'];
    if(isset($residentInfo['voter'])){
    	$saveInfo['voter'] = $residentInfo['voter'];   
    }
    else
    {
    	$saveInfo['voter'] = 'nonvoter';
    }
    $saveInfo['nationality'] = $residentInfo['nationality'];
    $saveInfo['religion'] = $residentInfo['religion'];
    $saveInfo['family_id'] = $residentInfo['familyID'];
    $saveInfo['role'] = $residentInfo['role'];
    if($residentInfo['role'] == 'Husband' || $residentInfo['role'] == 'Son'){
    	$saveInfo['gender'] = 'Male';
    }
    else{
    	$saveInfo['gender'] = 'Female';
    }
    $saveInfo['mothers_name'] = $residentInfo['mother'];
    $saveInfo['fathers_name'] = $residentInfo['father'];
    $saveInfo['fullname'] = $residentInfo['fname'].' '.$residentInfo['mname'].' '.$residentInfo['lname'];
    $saveInfo['household_head'] = 'yes';
    $saveInfo['family_head'] = 'yes';
 	$saveInfo->save(); 

 	if($saveInfo){
      return response()->json(['success' =>'yes']);
    }

}
public function residentList(){
	$residentInfo = Resident::where('resident_status','=','active')->get();
    return view('admin.residentList')
    	->with('residentInfo', $residentInfo);
}
public function householdList(){
	$residentInfo = Resident::where('resident_status','=','active')
		->where('household_head','=','yes')->get();
    return view('admin.householdList')
    	->with('residentInfo', $residentInfo);
}
public function familyList(){
	$residentInfo = Resident::where('resident_status','=','active')
		->where('family_head','=','yes')->get();
    return view('admin.familyList')
    	->with('residentInfo', $residentInfo);
}
public function femaleList(){
	$residentInfo = Resident::where('resident_status','=','active')
		->where('gender','=','Female')->get();
    return view('admin.femaleList')
    	->with('residentInfo', $residentInfo);
}
public function maleList(){
	$residentInfo = Resident::where('resident_status','=','active')
		->where('gender','=','Male')->get();
    return view('admin.maleList')
    	->with('residentInfo', $residentInfo);
}
public function voterList(){
	$residentInfo = Resident::where('resident_status','=','active')
		->where('voter','=','voter')->get();
    return view('admin.voterList')
    	->with('residentInfo', $residentInfo);
}
public function seniorList(){
	$residentInfo = Resident::where('resident_status','=','active')
		->whereYear('birthdate','<=',1955)->get();
    return view('admin.seniorList')
    	->with('residentInfo', $residentInfo);
}
public function transferredList(){
	$residentInfo = Resident::where('resident_status','=','transferred')->get();
    return view('admin.transferredList')
    	->with('residentInfo', $residentInfo);
}

}
