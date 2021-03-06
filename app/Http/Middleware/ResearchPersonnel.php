<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ResearchPersonnel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::check()){
            if(strtolower(Auth::user()->position) == 'research personnel' || strtolower(Auth::user()->position) == 'administrator' ){
                return $next($request);
            }


            return back()->with('access', 'You are not allowed to access this page.');
        }else{

        }
        return redirect('/');



       
       //return redirect('/client/home')->with('error', 'You dont have admin access.');

    }
}
