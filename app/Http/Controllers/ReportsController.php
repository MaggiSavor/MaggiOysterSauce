<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\RequestBorrowLaptop;
use Request;
use Auth;
use Redirect;

class ReportsController extends Controller
{
public function residentReport(){
    return view('admin.residentReport');
}
public function barangayProfileReport(){
    return view('admin.barangayProfileReport');
}
public function caseReport(){
    return view('admin.caseReport');
}
public function paymentReport(){
    return view('admin.paymentReport');
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
