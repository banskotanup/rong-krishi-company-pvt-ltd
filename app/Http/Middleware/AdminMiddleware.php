<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check()) && Auth::user()->is_admin == 1){
            return $next($request);
        }
        else{
            Auth::logout();
            return redirect('/')->with('warning',"⚠︎WARNING!!!⚠︎ You're not an Admin! So, You can't proceed further. Please login with your admin username & password or ask for admin credential to access the content.");
        }
    }
}
        