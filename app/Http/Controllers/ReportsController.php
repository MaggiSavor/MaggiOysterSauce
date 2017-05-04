<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\Resident;
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

}
