<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\Resident;
use Request;
use Redirect;

class DocumentsController extends Controller
{

	public function documents(){
	    return view('admin.document.documents');
	}

	public function docuCertificate(){
		$residentLists = Resident::where('resident_status','=','active')->get();
	    return view('admin.document.docuCertificate')
	    	->with('residentLists', $residentLists);
	}

	public function docuGoodMoral(){
		$residentLists = Resident::where('resident_status','=','active')->get();
	    return view('admin.document.docuGoodMoral')
	    	->with('residentLists', $residentLists);
	}

	public function docuIndigency(){
		$residentLists = Resident::where('resident_status','=','active')->get();
	    return view('admin.document.docuIndigency')
	    	->with('residentLists', $residentLists);
	}

	public function docuID(){
		$residentLists = Resident::where('resident_status','=','active')->get();
	    return view('admin.document.docuID')
	    	->with('residentLists', $residentLists);
	}

	public function docuBusinessPermit(){
		$residentLists = Resident::where('resident_status','=','active')->get();
	    return view('admin.document.docuBusinessPermit')
	    	->with('residentLists', $residentLists);
	}



}
