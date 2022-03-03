<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'tbl_users';
    public $timestamps = false;

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_type',
        'firstName',
        'lastName',
        'email',
        'password',
        'phone_number',
        'phone_code',
        'business_logo',
        'business_name',
        'business_type_id',
        'business_address',
        'category',
        'description',
        'paypal_id',
        'sadad_id',
        'fp_code',
        'createdDate',
        'landmark',
        'loginWith',
        'identifier',
        'tocken',
        'redemption_amount',
        'redeem_request',
        'is_redeemed',
        'walletAmount',
        'minimum_order',
        'notification_admin',
        'admin_verify',
        'user_guest',
        'user_language',
        'isActive',
        'isApprove',
        'reset_password_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function createUser($request)
    {
        $password = $request->user_type == 't' ? Hash::make(Carbon::now()) : Hash::make($request->password);
        $token = Str::random(16);
        $user = User::create([
            'firstName' => $request->user_type == 't' ? 'Guest' : $request->first_name,
            'lastName' => $request->user_type == 't' ? 'User' : $request->last_name,
            'email' => $request->email,
            'password' => $password,
            'phone_number' => $request->user_type == 't' ? 000 - 0000000 : $request->phone,
            'user_type' => $request->user_type,
            'phone_code' => 00,
            'business_logo' => isset($request->business_logo) ? $request->business_logo : '',
            'business_name' => isset($request->business_name) ? $request->business_name : '',
            'business_type_id' => isset($request->business_type_id) ? $request->business_type_id : 0,
            'business_address' => isset($request->business_address) ? $request->business_address : '',
            'category' => isset($request->business_category) ? $request->business_category : '',
            'description' => '',
            'paypal_id' => '',
            'sadad_id' => '',
            'fp_code' => '',
            'landmark' => '',
            'createdDate' => Carbon::now(),
            'isApprove' => $request->user_type == 's' ? 'n' : 'y',
            'loginWith' => '',
            'identifier' => '',
            'tocken' => $token,
            'redemption_amount' => 0.00,
            'redeem_request' => 0,
            'is_redeemed' => 0,
            'walletAmount' => 0.00,
            'minimum_order' => 0,
            'notification_admin' => 0,
            'admin_verify' => 0,
            'user_guest' => '',
            'user_language' => '',
            'isActive' => $request->user_type == 't' ? 'y' : 'n'
        ]);
        if ($user) {
            // if ($request->user_type != 't') {
            //     $this->activeAccountEmailSent($user->id, $user->email, $user->user_type);
            // }
            return $user;
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong',
                'error' => 'Unable to register user'
            ]);
        }
    }

    public function activeAccountEmailSent($id, $email, $userType)
    {
        $idSalt = base64_encode($id);
        $activeUrl = Config::get('app.url') . '/api/active-account?registration=' . $idSalt . '&type=' . $userType;
        $details = [
            'url' => $activeUrl,
        ];
        Log::info("Email sending to ==> " . $email);
        \Mail::to($email)->send(new \App\Mail\ActiveAccountEmail($details));
        Log::info("Email sent to ==> " . $email);
    }

    public function paswordCodeEmailSent($email, $code)
    {
        $details = [
            'code' => $code,
        ];
        Log::info("Password Code Email sending to ==> " . $email);
        \Mail::to($email)->send(new \App\Mail\ResetPasswordCodeEmail($details));
        Log::info("Password Code Email sent to ==> " . $email);
    }

    public function getUserByEmail($email, $type)
    {
        $user = User::where('email', $email)->where('user_type', $type)->first();
        return $user;
    }

    public function generateResetPasswordCode($id)
    {
        $code = rand(1000, 9999);
        User::where('id', $id)->update([
            'reset_password_code' => $code
        ]);
        return $code;
    }

    public function verifyCode($id, $code)
    {
        $verified = User::where('id', $id)->where('reset_password_code', $code)->first();
        if ($verified) {
            $code = rand(1000, 9999);
            User::where('id', $id)->update([
                'reset_password_code' => $code
            ]);
        }
        return $verified;
    }

    public function setResetPassword($id, $password)
    {
        $password = Hash::make($password);
        $setPassword = User::where('id', $id)->update([
            'password' => $password
        ]);
        return $setPassword;
    }

    public function userById($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function updateUser($request, $id)
    {
        $updateUser = User::where('id', $id)->update([
            'firstName' => $request->first_name,
            'lastName' => $request->last_name,
            'phone_number' => $request->phone_number,
            'user_language' => $request->user_language,
        ]);
        return $updateUser;
    }

    public function updateNotificationStatus($id, $status)
    {
        $updateNotificationStatus = User::where('id', $id)->update([
            'notification_admin' => $status
        ]);
        return $updateNotificationStatus;
    }

    public function setToken($id)
    {
        $updateToken = User::where('id', $id)->update([
            'tocken' => '',
            'device_token' => ''
        ]);
        return $updateToken;
    }


    public function updateAuthToken($id)
    {
        $token = Str::random(16);
        $updateToken = User::where('id', $id)->update([
            'tocken' => $token
        ]);
        return $updateToken;
    }

    public function saveUserAddress($id, $address)
    {
        $saveUserAddress = User::where('id', $id)->update([
            'address' => $address
        ]);
        return $saveUserAddress;
    }

    public function updateSellerWeb($request, $id)
    {
        $updateSeller = User::where('id', $id)->update([
            //'business_logo' => $request->business_logo,
            'firstName' => $request->first_name,
            'lastName' => $request->last_name,
            'business_name' => $request->business_name,
            'category' => $request->category,
            'business_type_id' => $request->business_type_id,
            'address' => $request->address,
            'description' => $request->description,
            'minimum_order' => $request->minimum_order,
            'phone_number' => $request->phone_number
        ]);
        return $updateSeller;
    }

    public function getSellerOrdersAmount($id)
    {
        $onHoldAmount = OrderItem::whereHas('getOrder', function ($q) use ($id) {
            $q->where('seller_id', '=', $id)->where('delivery_status', 'p');
        })->sum('seller_amount');

        $availableAmount = OrderItem::whereHas('getOrder', function ($q) use ($id) {
            $q->where('seller_id', '=', $id)->where('delivery_status', 'd');
        })->sum('seller_amount');

        $totalOrdersAmount = OrderItem::whereHas('getOrder', function ($q) use ($id) {
            $q->where('seller_id', '=', $id);
        })->sum('seller_amount');

        $totalOrders = Order::whereHas('getOrderItems', function ($q) use ($id) {
            $q->where('seller_id', '=', $id);
        })->count('id');

        $totalOrdersDelivered = Order::whereHas('getOrderItems', function ($q) use ($id) {
            $q->where('seller_id', '=', $id)->where('delivery_status', 'd');
        })->count('id');

        $totalOrdersPending = Order::whereHas('getOrderItems', function ($q) use ($id) {
            $q->where('seller_id', '=', $id)->where('delivery_status', 'p');
        })->count('id');

        return [
            "on_hold_amount" => round($onHoldAmount, 2),
            "available_amount" => round($availableAmount, 2),
            "total_orders" => $totalOrders,
            "total_earning" => round($totalOrdersAmount, 2),
            "completed" => $totalOrdersDelivered,
            "pending" => $totalOrdersPending
        ];
    }

    /**

     * @param $query

     * @param string|null $status

     * @return mixed

     */

    public static function checkLoginStatus($request)
    {
        $where = array(
            'email' => $request->email,
            'status' => 'a'

        );
        $query = User::where($where)->first();
        return $query;
    }
}
