<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = redirectpath();

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function username(){
        return 'username';
    }


    public function redirectTo(){

        if(strtolower(Auth::user()->position) == 'administrator'){
            return '/admin/home';
        }
        else if(strtolower(Auth::user()->position) == 'research personnel'){
            return '/admin/home';
        }else{
            return '/client/home';
        }

    }

    
}
