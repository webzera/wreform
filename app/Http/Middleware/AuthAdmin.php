<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;

use Auth;

class AuthAdmin
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
        if(Auth::user()->utype === 'ADM')
        {
            return $next($request);
        }
        else
        {
            return redirect(RouteServiceProvider::HOME);
        }


        // if(session('utype') === 'ADM')
        // {
        //     return $next($request);
        // }
        // else
        // {
        //     sessioni()->flush();
        //     return redirect()->route('login');
        // }
        // return $next($request);
    }
}
