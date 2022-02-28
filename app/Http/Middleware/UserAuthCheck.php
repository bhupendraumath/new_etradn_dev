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
        if (auth::check()) {
            $request['user']=Auth::user();
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
