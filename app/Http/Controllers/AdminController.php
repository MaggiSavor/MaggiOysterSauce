<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\User;
use App\Models\Resident;
use App\Models\Settings;
use Request;
use Auth;
use Redirect;

class AdminController extends Controller
{
	public function dashboard(){
	    // return view('admin.index');
	    return view('admin.home');
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
