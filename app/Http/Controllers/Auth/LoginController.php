<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\LoginRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     * Load login form frontend
     *
     * @return void
     */
    public function loginForm()
    {

        return view('auth/frontend/login');
    }
    public function loginAction(Request $request)
    {


        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }

        $user = User::checkLoginStatus($request);

        $this->incrementLoginAttempts($request);
        if (!empty($user)) {

            if (!Hash::check($request->password, $user->password)) {
                return $this->sendFailedLoginResponse(
                    $request,
                    trans('auth.passwordnotmatch')
                );
            } else if ($user->status == 'inactive') {
                return response()->json(
                    [
                        'success' => false, 'data' => [],
                        'message' => trans('auth.status')
                    ],
                    401
                );
            } else {

                if ($this->attemptLogin($request, 'web')) {
                    return $this->sendLoginResponse($request, $user);
                }
            }
        } else {
            return $this->sendFailedLoginResponse(
                $request,
                trans('auth.email_not_registered')
            );
        }
    }

    /**  
     * Method sendLoginResponse
     *    
     * @param Request $request 
     * 
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    protected function sendLoginResponse(Request $request, $user)
    {


        $request->session()->regenerate();
        $this->clearLoginAttempts($request);

        if ($user->user_type == 's') {
            $redirectionUrl = url('dashboard');
        } else if ($user->user_type == 'b') {
            $redirectionUrl = url('buyer-dashboard');
        }


        return response()->json(
            [
                'success' => true, 'data' => $redirectionUrl,
                'message' => "Login is successfull."
            ],
            200
        );

        // return redirect('dashboard')->with( 'message', 'Login is successfull.');

    }

    /**
     * Attempt to log the user into the application.
     *
     * @param \Illuminate\Http\Request $request 
     * @param string                   $guard   
     * 
     * @return bool
     */
    protected function attemptLogin(Request $request, string $guard)
    {

        $remember_me = $request->has('remember') ? true : false;
        $username = $request->email;
        $password = $request->password;
        if ($remember_me) {
            setcookie("login_email", $username, time() + (365 * 24 * 60 * 60));
            setcookie("login_password", $password, time() + (365 * 24 * 60 * 60));
        } else {
            if (isset($_COOKIE["login_email"])) {
                setcookie("login_email", "");
            }
            if (isset($_COOKIE["login_password"])) {
                setcookie("login_password", "");
            }
        }

        return $this->guard($guard)
            ->attempt($this->credentials($request), $remember_me);
    }

    /**
     * Get the needed authorization credentials from the request.
     * 
     * @param \Illuminate\Http\Request $request  
     * 
     * @return array
     */
    protected function credentials(Request $request)
    {

        $credentials = $request->only($this->username(), 'password');
        $credentials['status'] = ['a'];

        return $credentials;
    }

    /**
     * Get the failed login response instance.
     *
     * @param \Illuminate\Http\Request $request 
     * @param $trans 
     * 
     * @return \Illuminate\Http\RedirectResponse 
     */
    protected function sendFailedLoginResponse(
        Request $request,
        $trans = 'Incorrect email or password.'
    ) {
        if ($request->expectsJson()) {
            if ($request['mobile_number']) {
                return response()->json(
                    [
                        'success' => false, 'data' => [],
                        'message' => trans('auth.incorrect_mobile_password')
                    ],
                    401
                );
            } else {
                return response()->json(
                    ['success' => false, 'data' => [], 'message' => $trans],
                    401
                );
            }
        }
    }
    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Get the guard to be used during authentication.
     * 
     * @param string $guard 
     * 
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard(string $guard)
    {


        return Auth::guard($guard);
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
        // $request->session()->regenerate();
        return redirect('sign-in')
            ->with('message', 'You are now signed out')
            ->with('status', 'success')
            ->withInput();
    }
}
