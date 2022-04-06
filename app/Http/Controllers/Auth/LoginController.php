<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

      /**
     * Method logout
     * 
     * @param Request $request 
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        if (Auth::guard('web')->check()) {
            $this->guard('web')->logout();
        }
        $request->session()->flush();
        $request->session()->regenerate();
        $msg = trans('admin.admin_logout');
        if (!empty($_GET['status'])) {
            $msg = 'Your account is deactivated by Admin. Please contact to Admin.';
        }
        return redirect('/')
            ->with('success', $msg)
            ->with('status', 'success')
            ->withInput();
    }
}
