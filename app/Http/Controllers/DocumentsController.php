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
		$residentLists = Resident::where('resident_status','=','Active')->get();
	    return view('admin.document.docuCertificate')
	    	->with('residentLists', $residentLists);
	}

	public function docuGoodMoral(){
		$residentLists = Resident::where('resident_status','=','Active')->get();
	    return view('admin.document.docuGoodMoral')
	    	->with('residentLists', $residentLists);
	}

	public function docuIndigency(){
		$residentLists = Resident::where('resident_status','=','Active')->get();
	    return view('admin.document.docuIndigency')
	    	->with('residentLists', $residentLists);
	}

	public function docuID(){
		$residentLists = Resident::where('resident_status','=','Active')->get();
	    return view('admin.document.docuID')
	    	->with('residentLists', $residentLists);
	}

	public function docuBusinessPermit(){
		$res = Resident::where('resident_status', '=', 'Active')->get();
		$permit = BusinessPermit::all();
	    return view('admin.document.docuBusinessPermit')
	    	->with('permit', $permit)
	    		->with('res', $res);
		// return $permit;
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

	public function certPrint($id){
		$cert = Resident::where('id', '=', $id)->first();
	    return view('admin.document.docuCertificatePrint')
	    	->with('cert', $cert);
	}

	public function goodMoralPrint($id){
		$gm = Resident::where('id', '=', $id)->first();
	    return view('admin.document.docuGoodMoralPrint')
	    	->with('gm', $gm);
	}

	public function indigencyPrint($id){
		$indi = Resident::where('id', '=', $id)->first();
	    return view('admin.document.docuIndigencyPrint')
	    	->with('indi', $indi);
	}

	public function brgyIdPrint($id){
		$bid = Resident::where('id', '=', $id)->first();
		$res = Resident::where('resident_status', '=', 'Active')->get();
	    return view('admin.document.docuIDPrint')
	    	->with('bid', $bid)
	    		->with('res', $res);
	}

	public function bPermitPrint($id){
		$permit = BusinessPermit::where('permit_id', '=', $id)->first();
	    return view('admin.document.docuRenewBusinessPermitPrint')
	    	->with('permit', $permit);
	}

	public function addCert(){
		$data = Request::all();
		$cert = new Certification;
	    
	    $cert['name'] = $data['name'];
	    $cert['age'] = $data['age'];
	    $cert['status'] = $data['status'];
	    $cert['address'] = $data['address'];
	    $cert['reason'] = $data['reasons'];
	    if(!empty($data['idFor'])){
            $cert['id_for'] = $data['idFor'];
	    }else{
	        $cert['id_for'] = "";
	    }
	    if(!empty($data['others'])){
            $cert['others'] = $data['others'];
	    }else{
	        $cert['others'] = "";
	    }
	    $cert->save();

	    return redirect::back();
	}
	public function addGoodMoral(){
		$data = Request::all();
		$goodMoral = new GoodMoral;
	    
	    $goodMoral['name'] = $data['name'];
	    $goodMoral['age'] = $data['age'];
	    $goodMoral['status'] = $data['status'];
	    $goodMoral['address'] = $data['address'];
	    $goodMoral->save();

	    return redirect::back();
	}
	public function addIndigency(){
		$data = Request::all();
		$indigency = new Indigency;
	    
	    $indigency['name'] = $data['name'];
	    $indigency['age'] = $data['age'];
	    $indigency['status'] = $data['status'];
	    $indigency->save();

	    return redirect::back();
	}
	public function addBusinessPermit(){
		$data = Request::all();
		$bp = new BusinessPermit;
	    
	    $bp['name'] = $data['name'];
	    $bp['business_name'] = $data['bname'];
	    $bp['business_kind'] = $data['bkind'];
	    $bp['business_address'] = $data['address'];
	    $bp['or_number'] = $data['orNum'];
	    $bp['date_expired'] = $data['dateExpired'];
	    $bp->save();

	    return redirect::back();
	}
	public function addBarangayId(){
		$data = Request::all();
		$bid = new BarangayId;
	    
	    $bid['id_no'] = $data['idNo'];
	    $bid['name'] = $data['name'];
	    $bid['address'] = $data['address'];
	    $bid['bday'] = $data['bday'];
	    $bid['birthplace'] = $data['place'];
	    $bid['bloodtype'] = $data['bloodType'];
	    $bid['height'] = $data['height'];
	    $bid['weight'] = $data['weight'];
	    $bid['status'] = $data['status'];
	    $bid['occupation'] = $data['occupation'];
	    $bid['tin_no'] = $data['tin'];
	    $bid['contact'] = $data['contact'];
	    $bid['emergency_name'] = $data['ename'];
	    $bid['relation'] = $data['relation'];
	    $bid['e_address'] = $data['eaddress'];
	    $bid['date_expired'] = $data['dexp'];
	    $bid['e_address'] = $data['eaddress'];
	    if(!empty($data['mobile'])){
            $bid['e_contact'] = $data['mobile'];
	    }else{
	        $bid['e_contact'] = $data['telephone'];
	    }

	    $bid->save();

	    return redirect::back();
	}

}
