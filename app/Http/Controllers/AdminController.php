<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\User;
use App\Models\Resident;
use App\Models\Blotter;
use App\Models\Settings;
use Request;
use Auth;
use Redirect;

class AdminController extends Controller
{
	public function dashboard(){
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
	    return view('admin.home')
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

	public function settings(){
		$settings = Settings::where('id','=',(Auth::user()->id))->first();
		$users = User::all();
		$residents = Resident::all();
		    return view('admin.settings')
		    	->with('users', $users)
		    		->with('residents', $residents)
		    			->with('settings', $settings);	
	}

	public function sample(){
	    return view('admin.sample');
	}

}
