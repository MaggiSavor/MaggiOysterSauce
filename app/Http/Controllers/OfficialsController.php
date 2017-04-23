<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Request;
use Auth;
use Redirect;

class OfficialsController extends Controller
{
public function addOfficials(){
    return view('admin.officialsAdd');
}
public function officials(){
    return view('admin.officials');
}
public function officialsHistory(){
    return view('admin.officialsHistory');
}


}
