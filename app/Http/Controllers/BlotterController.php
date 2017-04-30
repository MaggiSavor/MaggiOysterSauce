<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\Blotter;
use Request;
use Auth;
use Redirect;

class BlotterController extends Controller
{
	public function blotterList(){
	$blotterLists = Blotter::all();
	return view('admin.blotterList')
		->with('blotterLists', $blotterLists);
	}

	public function addCase(){
	    return view('admin.addCase');
	}

	public function blotterDocuments(){
	    return view('admin.blotterDocuments');
	}
}
