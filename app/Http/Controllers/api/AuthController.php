<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public $users;

    public function __construct() {
        $this->users = new User();
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'unique:tbl_users,email|required',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required',
            'user_type' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'Unable to register account',
                'error' => $validator->errors()
            ]);
        }
        // Save User
        $userObj = $this->users->createUser($request);
        if ($userObj) {
            return response()->json([
                'status' => 200,
                'message' => 'Account registered successfully. Please check email to verify your account',
                'is_active' => 0
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Some thing went wrong',
                'error' => 'Some thing went wrong'
            ]);
        }
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            'user_type' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'Unable to login account',
                'error' => $validator->errors()
            ]);
        }
        $userType = $request->user_type;
        $userEmail = $request->email;
        $user = $this->users->getUserByEmail($userEmail, $userType);
        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'This email is not registered',
                'error' => 'This email is not registered'
            ]);
        }
        if (Hash::check($request->password, $user->password)) {
            if ($user->isActive == "n") {
                return response()->json([
                    'status' => 401,
                    'message' => 'This email is not active',
                    'error' => 'Account is not active. Please check email to activate your account'
                ]);
            }
//            if ($user->isApprove == "n") {
//                return response()->json([
//                    'status' => 401,
//                    'message' => 'This email is not approved',
//                    'error' => 'Account is not approved by admin yet'
//                ]);
//            }
            $updateToken = $this->users->updateAuthToken($user->id);
            $user = $this->users->userById($user->id);
            if ($updateToken) {
                return response()->json([
                    'status' => 200,
                    'message' => 'User',
                    'data' => $user
                ]);
            } else {
                return response()->json([
                    'status' => 401,
                    'message' => 'Unable to generate token',
                    'error' => 'Something went wrong'
                ]);
            }
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'invalid',
                'error' => 'Invalid credentials'
            ]);
        }
    }

    public function activeAccount(Request $request) {
        $validator = Validator::make($request->all(), [
            'registration' => 'required',
            'type' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'Unable to activate account',
                'error' => $validator->errors()
            ]);
        }
        $idDecode = base64_decode($request['registration']);
        $userType = $request['type'];
        $user = User::where('id', $idDecode)->where('user_type', $userType)->first();
        if ($user) {
            $user->update([
                'isActive' => 'y'
            ]);
            $status = 'success';
            return view('emails.active-account-status', compact('status'));
        }
        $status = 'error';
        return view('emails.active-account-status', compact('status'));
    }

    public function getResetPasswordCode(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'type' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'Unable to reset password',
                'error' => $validator->errors()
            ]);
        }
        $getUser = $this->users->getUserByEmail($request->email, $request->type);
        if (!$getUser) {
            return response()->json([
                'status' => 401,
                'message' => 'Unable to find user',
                'error' => 'User not found'
            ]);
        }
        $getCode = $this->users->generateResetPasswordCode($getUser->id);
        //Sent Email
        $this->users->paswordCodeEmailSent($getUser->email, $getCode);
        if ($getCode) {
            return response()->json([
                'status' => 200,
                'message' => 'Reset Password Code is sent to your email. Please check email',
                'data' => ['code' => $getCode, 'id' => $getUser->id]
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Unable to generate code',
                'error' => 'Unable to generate code'
            ]);
        }
    }

    public function verifyResetPasswordCode(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'code' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'Unable to reset password',
                'error' => $validator->errors()
            ]);
        }
        $verifyCode = $this->users->verifyCode($request->id, $request->code);
        if($verifyCode) {
            return response()->json([
                'status' => 200,
                'message' => 'Verified',
                'success' => 'Code Verified'
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Unable to verify',
                'error' => 'Invalid code'
            ]);
        }
    }

    public function resetPassword (Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'Unable to reset password',
                'error' => $validator->errors()
            ]);
        }
        $setPassword = $this->users->setResetPassword($request->id, $request->password);
        if($setPassword) {
            return response()->json([
                'status' => 200,
                'message' => 'Password reset successfully',
                'success' => 'Password reset successfully'
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Unable to reset password',
                'error' => 'Unable to reset password'
            ]);
        }
    }

    public function changePassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'Unable to change password',
                'error' => $validator->errors()
            ]);
        }
        $getUser = $this->users->userById($request->id);
        if ($getUser) {
            if (Hash::check($request->current_password, $getUser->password)) {
                $this->users->setResetPassword($request->id, $request->password);
                return response()->json([
                    'status' => 200,
                    'message' => 'Password changed successfully',
                    'success' => 'Password changed successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 401,
                    'message' => 'Incorrect old password',
                    'error' => 'Unable to change password'
                ]);
            }
        }
    }

    public function logout($id) {
        $getUser = $this->users->userById($id);
        if ($getUser) {
            $this->users->setToken($id);
            return response()->json([
                'status' => 200,
                'message' => 'Logged out successfully',
                'success' => 'Successfully logout'
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Unable to logout',
                'error' => 'user not found'
            ]);
        }
    }

    public function guestLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'unique:tbl_users,email|required',
            'user_type' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'Unable to register guest login account',
                'error' => $validator->errors()
            ]);
        }
        // Save Guest User
        $guestUserObj = $this->users->createUser($request);
        return response()->json([
            'status' => 200,
            'message' => 'Guest user registered successfully.',
            'data' => $guestUserObj
        ]);
    }
}
