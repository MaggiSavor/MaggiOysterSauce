<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\AuditTrail;
use App\Models\Resident;
use App\Models\BarangayOfficial;
use Request;
use Auth;
use Redirect;

class OfficialsController extends Controller
{
public function addOfficials(){
	$officials = Resident::where('voter', '=', 'voter')->get();
    return view('admin.officialsAdd')
    	->with('officials', $officials);
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
    return view('admin.officials')
    	->with('chairman', $chairman)
    		->with('sec', $sec)
    			->with('tre', $tre)
    				->with('kag1', $kag1)
    					->with('kag2', $kag2)
    						->with('kag3', $kag3)
    							->with('kag4', $kag4)
    								->with('kag5', $kag5)
    									->with('kag6', $kag6)
    										->with('kag7', $kag7);
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
    return view('admin.officialsHistory')
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
public function addNew(){
	$chairman = new BarangayOfficial;
	$chai = Request::all();
	$chairman['fullname'] = $chai['chairman'];
	$chairman['position'] = 'chairman';
	$chairman['term_start'] = $chai['startyear'];
	$chairman['term_end'] = $chai['endyear'];
	$chairman['term_year'] = $chai['termYear'];
	$chairman->save();

	$secretary = new BarangayOfficial;
	$sec = Request::all();
	$secretary['fullname'] = $sec['secretary'];
	$secretary['position'] = 'secretary';
	$secretary['term_start'] = $sec['startyear'];
	$secretary['term_end'] = $sec['endyear'];
	$secretary['term_year'] = $sec['termYear'];
	$secretary->save();

	$treasurer = new BarangayOfficial;
	$tre = Request::all();
	$treasurer['fullname'] = $tre['treasurer'];
	$treasurer['position'] = 'treasurer';
	$treasurer['term_start'] = $tre['startyear'];
	$treasurer['term_end'] = $tre['endyear'];
	$treasurer['term_year'] = $tre['termYear'];
	$treasurer->save();

	$kagawad1 = new BarangayOfficial;
	$kag1 = Request::all();
	$kagawad1['fullname'] = $kag1['kag1'];
	$kagawad1['position'] = 'kagawad1';
	$kagawad1['term_start'] = $kag1['startyear'];
	$kagawad1['term_end'] = $kag1['endyear'];
	$kagawad1['term_year'] = $kag1['termYear'];
	$kagawad1->save();

	$kagawad2 = new BarangayOfficial;
	$kag2 = Request::all();
	$kagawad2['fullname'] = $kag2['kag2'];
	$kagawad2['position'] = 'kagawad2';
	$kagawad2['term_start'] = $kag2['startyear'];
	$kagawad2['term_end'] = $kag2['endyear'];
	$kagawad2['term_year'] = $kag2['termYear'];
	$kagawad2->save();

	$kagawad3 = new BarangayOfficial;
	$kag3 = Request::all();
	$kagawad3['fullname'] = $kag3['kag3'];
	$kagawad3['position'] = 'kagawad3';
	$kagawad3['term_start'] = $kag3['startyear'];
	$kagawad3['term_end'] = $kag3['endyear'];
	$kagawad3['term_year'] = $kag3['termYear'];
	$kagawad3->save();

	$kagawad4 = new BarangayOfficial;
	$kag4 = Request::all();
	$kagawad4['fullname'] = $kag4['kag4'];
	$kagawad4['position'] = 'kagawad4';
	$kagawad4['term_start'] = $kag4['startyear'];
	$kagawad4['term_end'] = $kag4['endyear'];
	$kagawad4['term_year'] = $kag4['termYear'];
	$kagawad4->save();

	$kagawad5 = new BarangayOfficial;
	$kag5 = Request::all();
	$kagawad5['fullname'] = $kag5['kag5'];
	$kagawad5['position'] = 'kagawad5';
	$kagawad5['term_start'] = $kag5['startyear'];
	$kagawad5['term_end'] = $kag5['endyear'];
	$kagawad5['term_year'] = $kag5['termYear'];
	$kagawad5->save();

	$kagawad6 = new BarangayOfficial;
	$kag6 = Request::all();
	$kagawad6['fullname'] = $kag6['kag6'];
	$kagawad6['position'] = 'kagawad6';
	$kagawad6['term_start'] = $kag6['startyear'];
	$kagawad6['term_end'] = $kag6['endyear'];
	$kagawad6['term_year'] = $kag6['termYear'];
	$kagawad6->save();

	$kagawad7 = new BarangayOfficial;
	$kag7 = Request::all();
	$kagawad7['fullname'] = $kag7['kag7'];
	$kagawad7['position'] = 'kagawad7';
	$kagawad7['term_start'] = $kag7['startyear'];
	$kagawad7['term_end'] = $kag7['endyear'];
	$kagawad7['term_year'] = $kag7['termYear'];
	$kagawad7->save();
	if($kagawad7){              
          return response()->json(["success" => "yes"] );
    }else{
          return response()->json(["error" => "yes"] );
    }

	$audit_trail = new AuditTrail;
	$audit_trail['user_id'] = Auth::user()->id;
	$audit_trail['action'] = "Add new officials";
	$audit_trail['user_role'] = Auth::user()->user_type;
	$audit_trail->save();
}


}
