<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class userAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    if($request->session()->has('USER_LOGIN')){


        }else{
            session()->flash('access','Access denied');
            return redirect('/');
        }
    return $next($request);

    }
}
