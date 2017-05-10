<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Alert;
use redirect;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) 
        {
            if ($request->ajax() || $request->wantsJson()) 
            {

                return response('Unauthorized.', 401);
            }
            else
            {
                Alert::message("Error!", "You must log in first!", "error"); 
                return redirect()->guest('login');
            }
        }
       
        return $next($request);
    }
}

class Admin{
    
    public function handle($request, Closure $next){
        if(Auth::check() && Auth::user()->user_type == 'Admin'){
            return $next($request);
        }
        else{
            Alert::message("Error!", "Access denied!", "error");
            return redirect()->back();
        }

    }
}
/**
* 
*/
class User{
    
    public function handle($request, Closure $next){
        if(Auth::check() && Auth::user()->user_type == 'Standard User'){
            return $next($request);
        }
        else{
            Alert::message("Error!", "Access denied!", "error");
            return redirect()->back();
        }
    }
}
