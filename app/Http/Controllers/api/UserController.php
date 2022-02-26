<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $users;

    public function __construct() {
        $this->users = new User();
    }

    public function getUser($id){
        $getUser = $this->users->userById($id);
        if ($getUser) {
            return response()->json([
                'status' => 200,
                'message' => 'User detail',
                'data' => $getUser
            ]);
        } else {
            return response()->json([
            'status' => 404,
            'message' => 'User not found',
            'error' => 'User not found'
            ]);
        }
    }

    public function updateUser(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'user_language' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to update account',
                'error' => $validator->errors()
            ]);
        }
        $getUser = $this->users->userById($id);
        if ($getUser) {
            $this->users->updateUser($request, $id);
            return response()->json([
                'status' => 200,
                'message' => 'User updated successfully',
                'success' => 'User updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'error' => 'User not found'
            ]);
        }
    }

    public function userNotificationStatus($id, $status) {
        $getUser = $this->users->userById($id);
        if ($getUser) {
            $this->users->updateNotificationStatus($id, $status);
            return response()->json([
                'status' => 200,
                'message' => 'Notification status updated successfully',
                'success' => 'Notification status updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'error' => 'User not found'
            ]);
        }
    }

    public function saveUserPassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'address' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to update account',
                'error' => $validator->errors()
            ]);
        }
        $getUser = $this->users->userById($request->id);
        if ($getUser) {
            $this->users->saveUserAddress($request->id, $request->address);
            return response()->json([
                'status' => 200,
                'message' => 'Address saved successfully',
                'success' => 'Address saved successfully'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'error' => 'User not found'
            ]);
        }
    }

    public function imageUploadUser(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to upload image',
                'error' => $validator->errors()
            ]);
        }
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        User::where('id', $request->id)->update([
            'profile_img' => $imageName
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Image uploaded successfully',
            'image' => $imageName
        ]);
    }

    public function updateSeller(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'business_name' => 'required',
            'category' => 'required',
            'business_type_id' => 'required',
            'business_address' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to update account',
                'error' => $validator->errors()
            ]);
        }
        $getUser = $this->users->userById($id);
        if ($getUser) {
            $this->users->updateSeller($request, $id);
            return response()->json([
                'status' => 200,
                'message' => 'User updated successfully',
                'success' => 'User updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'error' => 'User not found'
            ]);
        }
    }

    public function sellerWallet($id) {
        $sellerOrdersAmount = $this->users->getSellerOrdersAmount($id);
        return response()->json([
            'status' => 200,
            'message' => 'Seller wallet info',
            'data' => $sellerOrdersAmount
        ]);
    }

    public function bankDetail() {
        $bankDetail = BankDetail::where('account_status', 1)->get();
        return response()->json([
            'status' => 200,
            'message' => 'Bank details are',
            'data' => $bankDetail
        ]);
    }
}
