<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CheckLogin Class
 */
class CheckLogin
{

    /**
     * Method handle
     *
     * @param Request $request [explicite description]
     * @param Closure $next    [explicite description]
     * @param string  $guard   [explicite description]
     *
     * @return void
     */
    public function handle(Request $request, Closure $next, string $guard)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/dashboard');
        }
        $response = $next($request);
        return $response->header('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
}
