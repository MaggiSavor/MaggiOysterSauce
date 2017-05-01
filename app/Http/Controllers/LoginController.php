<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Resident;
use App\Models\User;
use App\Models\AuditTrail;
use Request;
use Alert;
use Auth;
use Hash;

class LoginController extends Controller
{
    
    public function registerUser(){
       
       $addUser = Request::all();
       $username = User::where('username', $addUser['inputUsername'])->exists();
       $user = User::where('fullname', $addUser['SearchName'])->exists();
       $email = User::where('email', $addUser['inputEmail'])->exists();

       if($email){
           return response()->json(array('error' =>'Email Exists!'));
       }else if($username){
           return response()->json(array('error' =>'Username Exists!'));
       }else if($user){
           return response()->json(array('error' =>'User Exists!'));
       }
       else{
        $resident = Resident::where('fullname', $addUser['SearchName'])->exists();
        if ($resident){
          try{
            //users
            $addUser = Request::all();
            $user = new User;
            $user['fullname'] = $addUser['SearchName'];
            $user['user_type'] = $addUser['inputUserType'];
            $user['username'] = $addUser['inputUsername'];
            $user['email'] = $addUser['inputEmail'];
            $user['password'] = bcrypt($addUser['password']);
            $user['security_question'] = $addUser['inputSecQuestion'];
            $user['security_answer'] = $addUser['inputSecAnswer'];
            $user['remember_token'] = $addUser['_token'];
            $user->save();            
            return response()->json(array('success' =>'Successfully Saved!'));  
              
          }catch(Exception $e){
           return response()->json(array('error' =>'Error Occured!'));
          }

        }else{
          return response()->json(array('error' =>"Not a Resident!"));
        }
         
       }

   //     $credentials = Request::all();
   //      $rules = array(
   //          'SearchName'    => 'required|unique:Users,username',
   //          'inputUsername' => 'required|unique:Users,username',
   //          'emailAddress'  => 'required|unique:Users,email|email'

   //      );
   //      $validator = Validator::make(Request::all(), $rules);
   //      if($validator->fails()){
   //          return response()->json(array(
   //              'success' => false,
   //              'errors' => $validator->getMessageBag()->toArray(),
   //              'message' => 'Please fill -up the required fields'

   //          ), 400); // 400 being the HTTP code for an invalid request.
   //      }
   //      else{
   //          $credentials = Request::all();
   //          $user = new User;
   //          $user['fullname'] = $addUser['SearchName'];
   //          $user['user_type'] = $addUser['inputUserType'];
   //          $user['username'] = $addUser['inputUsername'];
   //          $user['email'] = $addUser['inputEmail'];
   //          $user['password'] = bcrypt($addUser['password']);
   //          $user['security_question'] = $addUser['inputSecQuestion'];
   //          $user['security_answer'] = $addUser['inputSecAnswer'];
   //          $user['remember_token'] = $addUser['_token'];
   //          $user->save();               
   //          return response()->json(array(
   //              'success' =>'Successfully Saved!'
   //              ));
   //      }
   //     $addUser = Request::all();
   //     $username = User::where('username', $addUser['inputUsername'])->exists();
   //     $resident = Resident::where('fullname', $addUser['SearchName'])->count() = 0;
   //     $email = User::where('email', $addUser['inputEmail'])->exists();
   //     if($email){
   //         return response()->json(array('error' =>'Email Exists!'));
   //     }else if($username){
   //         return response()->json(array('error' =>'Username Exists!'));
   //     }else if($resident){
   //         return response()->json(array('error' =>'Resident does not Exists!'));
   //     }else{
       
   //       try{
   //          //users
   //          $addUser = Request::all();
   //          $user = new User;
   //          $user['fullname'] = $addUser['SearchName'];
   //          $user['user_type'] = $addUser['inputUserType'];
   //          $user['username'] = $addUser['inputUsername'];
   //          $user['email'] = $addUser['inputEmail'];
   //          $user['password'] = bcrypt($addUser['inputPassword']);
   //          $user['security_question'] = $addUser['inputSecQuestion'];
   //          $user['security_answer'] = $addUser['inputSecAnswer'];
   //          $user['remember_token'] = $addUser['_token'];
   //          $user->save();
   //          if($user){              
   //                return response()->json(["success" => "yes"]);
   //            }else{
   //                return response()->json(["error" => "yes"]);
   //            }
   //        }catch(Exception $e){
   //         return response()->json(array('error' =>'Error Occured!'));
   //        }
   //     }
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
        // $audit_trail = new AuditTrail;
        // $audit_trail['user_id'] = Auth::user()->id;
        // $audit_trail['action'] = "Logged-out";
        // $audit_trail['user_role'] = Auth::user()->user_type;
        // $audit_trail->save();

        
        Auth::logout();
        Alert::message("Success!", "Successfully logged out", "success"); 
        return redirect('login');
    }

}
