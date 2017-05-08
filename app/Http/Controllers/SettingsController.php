<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\User;
use App\Models\Settings;
use Request;
use Auth;
use Redirect;

class SettingsController extends Controller
{
	public function saveSettings($id){
		$changes = Request::all();
		$settings = Settings::find($id);
		$settings['navbar'] = $changes['navbarColor'];
		$settings['bg_image_toggle'] = $changes['bg_image_toggle'];
		$settings['bg_image'] = $changes['background_image'];
		$settings['filter'] = $changes['colorFilter'];
		$settings->save();
		if($settings){              
	          return response()->json(["success" => "yes"] );
	    }else{
	          return response()->json(["error" => "yes"] );
	    }
   }

}
