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
public function updateResident($id){
	$info = Resident::where('resident_id','=',$id)->first();
    return view('admin.updateResident')
    	->with('info', $info);
}
public function saveUpdate(){
	$info = Request::all();

	$saveInfo = Resident::where('resident_id','=', $info['residentId'])->first();
    $saveInfo['lastname'] = $info['lname'];
    $saveInfo['firstname'] = $info['fname'];
    $saveInfo['middlename'] = $info['mname'];
    $saveInfo['house_no'] = $info['houseNo'];
    $saveInfo['street'] = $info['street'];
    $saveInfo['household_id'] = $info['householdID'];
    $saveInfo['telno'] = $info['telno'];
    $saveInfo['mobile'] = $info['mobile'];
    $saveInfo['status'] = $info['status'];
    $saveInfo['occupation'] = $info['occupation'];
    if(isset($info['voter'])){
    	$saveInfo['voter'] = $info['voter'];   
    }
    else
    {
    	$saveInfo['voter'] = 'nonvoter';
    }
    $saveInfo['nationality'] = $info['nationality'];
    $saveInfo['religion'] = $info['religion'];
    $saveInfo['family_id'] = $info['familyID'];
    $saveInfo['fullname'] = $info['fname'].' '.$info['mname'].' '.$info['lname'];
    if(isset($info['houseHead'])){
    	$saveInfo['household_head'] = $info['houseHead'];   
    }
    else
    {
    	$saveInfo['household_head'] = 'yes';
    }
    if(isset($info['familyHead'])){
    	$saveInfo['family_head'] = $info['familyHead'];   
    }
    else
    {
    	$saveInfo['family_head'] = 'yes';
    }
 	// $saveInfo->save(); 

 	// if($saveInfo){
  //     return response()->json(['success' =>'yes']);
  //   }


	return response($info);
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
    if(isset($residentInfo['houseHead'])){
    	$saveInfo['household_head'] = $residentInfo['houseHead'];   
    }
    else
    {
    	$saveInfo['household_head'] = 'yes';
    }
    if(isset($residentInfo['familyHead'])){
    	$saveInfo['family_head'] = $residentInfo['familyHead'];   
    }
    else
    {
    	$saveInfo['family_head'] = 'yes';
    }
 	$saveInfo->save(); 

 	if($saveInfo){
      return response()->json(['success' =>'yes']);
    }

}
public function addMember(){
  
    $residentInfo = Request::all();
// return $residentInfo;
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
    $saveInfo['household_head'] = 'no';
    $saveInfo['family_head'] = 'no';
    // if(isset($residentInfo['houseHead'])){
    // 	$saveInfo['household_head'] = $residentInfo['houseHead'];   
    // }
    // else
    // {
    // 	$saveInfo['household_head'] = 'yes';
    // }
    // if(isset($residentInfo['familyHead'])){
    // 	$saveInfo['family_head'] = $residentInfo['familyHead'];   
    // }
    // else
    // {
    // 	$saveInfo['family_head'] = 'yes';
    // }
 	$saveInfo->save(); 

 	// if($saveInfo){
      return back();
    // }

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
