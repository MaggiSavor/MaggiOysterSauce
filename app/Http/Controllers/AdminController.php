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

class AdminController extends Controller
{
public function dashboard(){
    // return view('admin.index');
    return view('admin.home');
}

public function settings(){
    return view('admin.settings');
}

public function sample(){
    return view('admin.sample');
}


}