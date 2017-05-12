<?php
namespace App\Http\Controllers;

use App\Models\Resident;
use Request;
use Auth;
use Redirect;

class ResidentController extends Controller
{
	public function newResidents(){
		$myDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) );
		$date = date("Y-m-d");

		$residentInfo = Resident::where('resident_status','=','Active')->whereBetween('created_at', [$myDate, $date])->get();

	    return view('admin.newResidentList')
	    	->with('residentInfo', $residentInfo);
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
		$houseID = Resident::select('household_id')->where('resident_status','=','Active')->orderby('household_id', 'DESC')->first();
		$familyID = Resident::select('family_id')->where('resident_status','=','Active')->orderby('family_id', 'DESC')->first();
		$mother = Resident::where('gender', '=', 'Female')->where('resident_status', '=', 'Active')->get();
		$father = Resident::where('gender', '=', 'Male')->where('resident_status', '=', 'Active')->get();
	    return view('admin.addResident')
	    	->with('houseID',$houseID)
	    		->with('familyID',$familyID)
	    			->with('mother', $mother)
	    				->with('father', $father);
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
	public function updateResident($id){
		$info = Resident::where('id','=',$id)->first();
		$househead = Resident::where('household_head','=','yes')->get();
		$familyhead = Resident::where('family_head','=','yes')->get();		
	    return view('admin.updateResident')
	    	->with('info', $info)
	    		->with('househead', $househead)
	    			->with('familyhead', $familyhead);
	}
	public function saveUpdate(){
		$info = Request::all();

		$saveInfo = Resident::where('id','=', $info['residentId'])->first();
	    $saveInfo['role'] = $info['role'];
	    $saveInfo['resident_status'] = $info['resStatus'];
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
	    if($info['familyhead'] == 'yes'){
		 	Resident::where('family_id','=' , $info['oldFamilyID'])->update(['family_id' => $info['familyID']]);
		 	Resident::where('family_id','=', $info['oldFamilyID'])->where('family_head','=', 'yes')->where('id','!=', $info['residentId'])->update(['family_head' => 'no']);
	    }
	    if($info['househead'] == 'yes'){
	    	Resident::where('household_id','=', $info['oldHouseholdID'])->where('household_head','=', 'yes')->where('id','!=', $info['residentId'])->update(['household_head' => 'no']);
	    }
	    $saveInfo['household_head'] = $info['househead'];
	    $saveInfo['family_head'] = $info['familyhead'];
	    $saveInfo['transfer_to'] = $info['transfer'];
	 	$saveInfo->save(); 

		
	 	if($saveInfo){
	      return response()->json(['success' =>'yes']);
	    }

	}
	public function transferExisting(){
		$data = Request::all();

		if($data['type'] == 'existing'){
			$transferId =  Resident::select('household_id','house_no','street')->where('fullname','=',$data['name'])->first();
			Resident::where('family_id','=', $data['id'])->update(['household_id' => $transferId['household_id']]);
			Resident::where('family_id','=', $data['id'])->update(['house_no' => $transferId['house_no']]);
			Resident::where('family_id','=', $data['id'])->update(['street' => $transferId['street']]);
			Resident::where('family_id','=', $data['id'])->where('household_head','=', 'yes')->update(['household_head' => 'no']);
			return response()->json(['success' =>'yes']);
		}
		else{
			$newId =  Resident::select('household_id')->where('resident_status','=','Active')->orderby('household_id', 'DESC')->first();
			Resident::where('family_id','=', $data['id'])->update(['household_id' => ($newId['household_id'] + 1)]);
			Resident::where('family_id','=', $data['id'])->where('family_head','=', 'yes')->update(['household_head' => 'yes']);
			return response()->json(['success' =>'yes']);
		}
		// return response($data);
	}
	public function getHouseId(){
		$data = Request::all();

		if($data['type'] == 'new'){
			$newId =  Resident::select('household_id')->where('resident_status','=','Active')->orderby('household_id', 'DESC')->first();
			return response($newId['household_id'] + 1);
		}
		else if($data['type'] == 'transfer'){
			$transferId =  Resident::select('household_id','house_no','street')->where('fullname','=',$data['name'])->first();
			return response($transferId);
		}

	}
	public function getFamilyId(){
		$data = Request::all();

		if($data['type'] == 'new'){
			$newId =  Resident::select('family_id')->where('resident_status','=','Active')->orderby('family_id', 'DESC')->first();
			return response($newId['family_id'] + 1);
		}
		else{
			$transferId =  Resident::select('family_id')->where('fullname','=',$data['name'])->first();
			return response($transferId['family_id']);
			// return response($data);
		}

	}
	public function checkHead(){
		$data = Request::all();

		if($data['type'] == 'household'){
			$count = Resident::where('household_id','=',$data['id'])
				->where('household_head', '=', 'yes')->count();
			if($count == 0){
				return response('clear');
			}
			else{
				return response('exist');
			}
		}

		if($data['type'] == 'family'){
			$count = Resident::where('family_id','=',$data['id'])
				->where('family_head', '=', 'yes')->count();
			if($count == 0){
				return response('clear');
			}
			else{
				return response('exist');
			}
		}

		return response($data);
		
	}
	public function addMember(){
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
	    $saveInfo['household_head'] = 'no';
	    $saveInfo['family_head'] = 'no';
	 	$saveInfo->save(); 

	 	if($saveInfo){
	 		return response()->json(['success'=> 'yes']);
	    }

	}
	public function addFamily(){
	  
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
	    $saveInfo['family_head'] = 'yes';
	 	$saveInfo->save(); 

	 	if($saveInfo){
	 		return response()->json(['success'=> 'yes']);
	    }

	}

	public function residentList(){
		$residentInfo = Resident::where('resident_status','=','Active')->get();
	    return view('admin.residentList')
	    	->with('residentInfo', $residentInfo);
	}
	public function householdList(){
		$residentInfo = Resident::where('resident_status','=','Active')
			->where('household_head','=','yes')->get();
		$mother = Resident::where('gender', '=', 'Female')->where('resident_status', '=', 'Active')->get();
		$father = Resident::where('gender', '=', 'Male')->where('resident_status', '=', 'Active')->get();
		$househead = Resident::where('household_head','=','yes')->get();
	    return view('admin.householdList')
	    	->with('residentInfo', $residentInfo)
	    		->with('mother', $mother)
	    			->with('father', $father)
	    				->with('househead', $househead);
	}
	public function getFamily(){
		$data = Request::all();

		$families = Resident::where('resident_status','=','Active')
			->where('household_id','=', $data['id'])
				->where('family_head','=', 'yes')->get();

		return response($families);
	}
	public function familyList(){
		$residentInfo = Resident::where('resident_status','=','Active')
			->where('family_head','=','yes')->get();
		$mother = Resident::where('gender', '=', 'Female')->where('resident_status', '=', 'Active')->get();
		$father = Resident::where('gender', '=', 'Male')->where('resident_status', '=', 'Active')->get();
	    return view('admin.familyList')
	    	->with('residentInfo', $residentInfo)
	    		->with('mother', $mother)
	    			->with('father', $father);
	}
	public function getMembers(){
		$data = Request::all();

		$family = Resident::where('resident_status','=','Active')
			->where('family_id','=', $data['id'])->get();

		return response($family);
	}
	public function femaleList(){
		$residentInfo = Resident::where('resident_status','=','Active')
			->where('gender','=','Female')->get();
	    return view('admin.femaleList')
	    	->with('residentInfo', $residentInfo);
	}
	public function maleList(){
		$residentInfo = Resident::where('resident_status','=','Active')
			->where('gender','=','Male')->get();
	    return view('admin.maleList')
	    	->with('residentInfo', $residentInfo);
	}
	public function voterList(){
		$residentInfo = Resident::where('resident_status','=','Active')
			->where('voter','=','voter')->get();
	    return view('admin.voterList')
	    	->with('residentInfo', $residentInfo);
	}
	public function seniorList(){
		$residentInfo = Resident::where('resident_status','=','Active')
			->whereYear('birthdate','<=',1955)->get();
	    return view('admin.seniorList')
	    	->with('residentInfo', $residentInfo);
	}
	public function transferredList(){
		$residentInfo = Resident::where('resident_status','=','Transferred')->get();
	    return view('admin.transferredList')
	    	->with('residentInfo', $residentInfo);
	}
	public function checkParents(){
		$data = Request::all();

		$mom = Resident::where('family_id','=', $data['fam'])->where('role','=','Wife')->first();
		$dad = Resident::where('family_id','=', $data['fam'])->where('role','=','Husband')->first();
		return response()->json(['mom'=> $mom, 'dad' => $dad]);
	}
	public function transferAddress(){
		$data = Request::all();

		Resident::where('family_id','=', $data['id'])->update(['resident_status' => 'Transferred']);
		Resident::where('family_id','=', $data['id'])->update(['household_head' => 'no']);
		Resident::where('family_id','=', $data['id'])->update(['family_head' => 'no']);
		Resident::where('family_id','=', $data['id'])->update(['transfer_to' => $data['address']]);

		return response()->json(['success'=> 'yes']);		
		
	}
}
