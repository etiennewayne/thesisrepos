<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if(strtolower(Auth::user()->position) == 'administrator'){
            return $next($request);
        }

        if(strtolower(Auth::user()->position) == 'research personnel'){
            return redirect('/home')->with('error', 'You dont have admin access.');
        }
        return redirect('client/home')->with('error', 'You dont have admin access.');
    }
}
