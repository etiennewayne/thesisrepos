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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function username(){
        return 'username';
    }


     public function authenticate(Request $request)
    {
        //$credentials = $request->only('username', 'password');

      /*  if (Auth::attempt($credentials)) {
            // Authentication passed...
            //return redirect()->intended('dashboard');
            //return redirect()->intended($this->redirectPath());
        }*/


        /*if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            // The user is active, not suspended, and exists.
        }*/
    }


    public function redirectPath(){

        if(strtolower(Auth::user()->position) == 'administrator'){
            return 'home';
        }
        else if(strtolower(Auth::user()->position) == 'research personnel'){
            return 'home';
        }else{
            return 'client/home';
        }



    }

    
}
