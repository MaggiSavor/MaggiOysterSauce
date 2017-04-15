<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Employee;
use App\Models\User;
use App\Models\AuditTrail;
use Request;
use Alert;
use Auth;
use Hash;

class LoginController extends Controller
{
    
    public function addUser(){
       
       $addUser = Request::all();
       $empId = Employee::where('emp_id', $addUser['empID'])->exists();
       $username = User::where('username', $addUser['username'])->exists();
       $email = Employee::where('email', $addUser['emailAddress'])->exists();
       if($empId){
           return response()->json(array('error' =>'Employee ID Exists!'));
       }
       else if($email){
           return response()->json(array('error' =>'Email Exists!'));
       }
        else if($username){
           return response()->json(array('error' =>'Username Exists!'));
       }else{
           try{
       $employee = new Employee;
       $photo = Request::file('file');
       $destinationPath = base_path() . '/public/images';
       if(!empty($photo)){
           $photo->move($destinationPath, $photo->getClientOriginalName());
           $picture = $photo->getClientOriginalName();
           $image_size = $photo->getClientSize();
       }else{
           $picture = 'avatar.png';
           $image_size = 'NULL';
       }
       
       $employee['emp_id'] = $addUser['empID'];
       $employee['firstname'] = $addUser['fname'];
       $employee['middlename'] = $addUser['mname'];
       $employee['lastname'] = $addUser['lname'];
       $employee['department'] = $addUser['department'];
       $employee['role'] = $addUser['role'];
       $employee['address'] = $addUser['address'];
       $employee['contact_no'] = $addUser['contact'];
       $employee['email'] = $addUser['emailAddress'];
       $employee['image_size'] = $image_size;
       $employee['image_name'] = $picture;
       $employee->save();
       //users
       $addUser = Request::all();
       $user = new User;
       $user['emp_id'] = $addUser['empID'];
       $user['username'] = $addUser['username'];
       $user['email'] = $addUser['emailAddress'];
       $user['password'] = bcrypt($addUser['password']);
       $user['pass'] = $addUser['password'];
       $user['user_type'] = $addUser['userType'];
       $user['remember_token'] = $addUser['_token'];
       $user->save();
        if($employee){              
                   return response()->json(["success" => "yes"]);
               }else{
                   return response()->json(["error" => "yes", "empID" => $employee['emp_id']]);
               }
               }catch(Exception $e){
           return response()->json(array('error' =>'Error Occured!'));
       }
       }

   }

    public function login(){
        return view('admin.login');
    }

    public function loggedIn(){
        $userInfo = User::all();
        $loggedInCreds = Request::all();
        
            if((Auth::attempt(['email' =>$loggedInCreds['email'], 'password' => $loggedInCreds['login-password']])) || (Auth::attempt(['username' =>$loggedInCreds['email'], 'password' => $loggedInCreds['login-password']]))) {
                $audit_trail = new AuditTrail;
                $audit_trail['user_id'] = Auth::user()->id;
                $audit_trail['action'] = "Logged-in";
                $audit_trail['user_role'] = Auth::user()->user_type;
                $audit_trail->save();
                if(Auth::user()->user_type == "Admin"){
                    return Redirect::route('dashboard');
                }else{
                    return 'standard user';
                    // Alert::message("Error!", "Invalid Credentials", "error"); 
                    // return redirect('login');
                }
                
            }
            else{
                Alert::message("Error!", "Invalid Credentials", "error"); 
                return redirect('login');
            }
        
    }

    public function loggedOut()
    {
        $audit_trail = new AuditTrail;
        $audit_trail['user_id'] = Auth::user()->id;
        $audit_trail['action'] = "Logged-out";
        $audit_trail['user_role'] = Auth::user()->user_type;
        $audit_trail->save();
        Auth::logout();
        Alert::message("Success!", "Successfully logged out", "success"); 
        return redirect('login');
    }

}
