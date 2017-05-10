<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\Resident;
use App\Models\Certification;
use App\Models\Indigency;
use App\Models\GoodMoral;
use App\Models\BarangayId;
use App\Models\BusinessPermit;
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

	public function documentsList(){
	    return view('admin.document.documentsList');
	}

	public function certificateList(){
		$certificate = Certification::all();
	    return view('admin.document.docuCertificateList')
	    	->with('certificate', $certificate);
	}

	public function goodMoralList(){
		$moral = GoodMoral::all();
	    return view('admin.document.docuGoodMoralList')
	    	->with('moral', $moral);
	}

	public function indigencyList(){
		$indigency = Indigency::all();
	    return view('admin.document.docuIndigencyList')
	    	->with('indigency', $indigency);
	}

	public function idList(){
		$id = BarangayId::all();
	    return view('admin.document.docuIDList')
	    	->with('id', $id);
	}

	public function permitList(){
		$permit = BusinessPermit::all();
	    return view('admin.document.docuBusinessPermitList')
	    	->with('permit', $permit);
	}



}
