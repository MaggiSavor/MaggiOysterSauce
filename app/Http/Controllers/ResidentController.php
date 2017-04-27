<?php
namespace App\Http\Controllers;

use Request;
use Auth;
use Redirect;

class ResidentController extends Controller
{
public function resident(){
    return view('admin.Resident');
}


}
