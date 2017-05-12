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
use App\Models\Settings;
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

            $settings = new Settings;
            $settings['navbar'] = '#F8F8F8';
            $settings['bg_image_toggle'] = '0';
            $settings['bg_image'] = '';
            $settings['filter'] = '255,255,255,1';
            $settings->save();
            return response()->json(array('success' =>'Successfully Saved!'));  
              
          }catch(Exception $e){
           return response()->json(array('error' =>'Error Occured!'));
          }

        }else{
          return response()->json(array('error' =>"Not a Resident!"));
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
                Alert::message("", "Invalid Credentials", "error"); 
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
        Alert::message("", "Successfully logged out", "success"); 
        return redirect('login');
    }

    public function resetOptions(){
        return view('admin.resetOption');
    }

    public function resetPass(){
        return view('admin.resetPass');
    }

    public function resetPasswordUpdate($id){
      $data = Request::all();
      $update = User::where('id', '=', $id)->first();
      $update['password'] = bcrypt($data['password']);
      $update->save();

      if((Auth::attempt(['email' =>$data['email'], 'password' => $data['password']])) || (Auth::attempt(['username' =>$data['email'], 'password' => $data['password']]))) {
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
      //     Alert::message("Error!", "Invalid Credentials", "error"); 
          return redirect('login');
      }

    }

    public function checkUser(){
      $email = Request::all();
      $exist = User::where('email', '=', $email['email'])->exists();
      $exist1 = User::where('username', '=', $email['email'])->exists();
      if($exist){
        $result = User::where('email', '=', $email['email'])->get();
      }else if($exist1){
        // Alert::message("Error!", "User not found!", "error"); 
        $result = User::where('username', '=', $email['email'])->get();
      }
      return response()->json(['data'=> $result]);
    }

    public function resetPassword(){

          $answer = Request::all();
          
          $exist = User::where('email', '=', $answer['email'])->exists();
          $exist1 = User::where('username', '=', $answer['email'])->exists();
          if($exist){
            $userInfo = User::where('email', '=', $answer['email'])->first();

            if($userInfo['security_answer'] == $answer['answer']) {

                $userInfo = User::where('email', '=', $answer['email'])->first();
                return view('admin.resetPassword')
                  ->with('userInfo', $userInfo);
            }
            else{
                Alert::message("", "Invalid Answer!", "error"); 
                return redirect::back();
            }


          }else if($exist1){
            $userInfo2 = User::where('username', '=', $answer['email'])->first();
            if($userInfo2['security_answer'] == $answer['answer']) {

                $userInfo = User::where('username', '=', $answer['email'])->first();
                return view('admin.resetPassword')
                  ->with('userInfo', $userInfo);
                
            }
            else{
                Alert::message("", "Invalid Answer!", "error"); 
                return redirect::back();
            }
          }


    }


}
