<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ChangePasswordRequest;
use App\Models\BusinessCategory;
use App\Models\BusinessType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{

    public function home()
    {


        return view('frontend/home');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function personInformation()
    {
        $businesstype = BusinessType::where('isActive', '=', 'y')->get();
        $businessCategory = BusinessCategory::where('isActive', '=', 'y')->get();

        return view(
            'frontend/seller/personal-information',
            compact('businesstype', 'businessCategory')
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accountSetting()
    {
        return view('frontend/seller/account-settings');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Function saveChangePasswordREquest
     *
     * @param AdminChangePasswordRequest $request 
     * 
     * @return void
     */
    public function saveChangePassword(ChangePasswordRequest $request)
    {
        try {
            $id = Auth::guard('web')->user()->id;
            $data = array(
                'password' => bcrypt($request->password)
            );

            $changePassword = User::where('id', $id)->update($data);
            if (!empty($changePassword)) {
                return response()->json(
                    ['success' => true, 'message' => trans('admin.password_changed')]
                );
            }
            return response()->json(
                [
                    'success' => false,
                    'message' => trans('admin.something_went_wrong')
                ]
            );
        } catch (\Exception $e) {
            return response()->json(
                ['success' => false, 'message' => $e->getMessage()]
            );
        }
    }
}
