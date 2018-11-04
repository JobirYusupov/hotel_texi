<?php

namespace App\Http\Middleware;

use Closure;

class admin
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
        if (\Auth::user()->role_id == NULL)
        {
            return $next($request);
        }else{
             \Auth::logout();
             return redirect('/login')->with(['error'=>'You are not admin']);
            //return view('auth.login', ['error'=>'You are not admin']);
        }
    }
}
