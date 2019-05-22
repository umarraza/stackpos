<?php

namespace App\Http\Middleware;

use Closure;
use User;
use Auth;

class Employee
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
         if(Auth::User()->role=="Admin"){
            return $next($request);
        }
        return redirect()->back();
    }
}
