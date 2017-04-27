<?php
namespace App\Http\Controllers;

use App\Models\Resident;
use Request;
use Auth;
use Redirect;

class ResidentController extends Controller
{
public function resident(){
    return view('admin.resident');
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
	// return $saveInfo;
}

}
