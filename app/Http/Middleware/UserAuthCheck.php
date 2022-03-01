<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class UserAuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
 
    public function handle($request, Closure $next)
    {
       
         if (!Auth::guard('web')->check()) {
            return  redirect()->route('login');
        }
        $request->user=Auth::user();       
        $response = $next($request);
        
        $response->headers->set('Access-Control-Allow-Origin' , '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');        
        return $response;
       
       
        // if (auth::check()) {
        //     $request['user']=Auth::user();
        //     return $next($request);
        // } else {
        //     return redirect()->route('login');
        // }
    }
}
