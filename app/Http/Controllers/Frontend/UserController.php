<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\UserRequest;
use App\Http\Requests\Frontend\UserUpdateRequest;
use App\Models\BusinessCategory;
use App\Models\BusinessType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class UserController extends Controller
{

    public $users;

    public function __construct()
    {
        $this->users = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesstype = BusinessType::where('isActive', '=', 'y')->get();
        $businessCategory = BusinessCategory::where('isActive', '=', 'y')->get();

        return view('frontend/register', compact('businesstype', 'businessCategory'));
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
    public function registrationAction(UserRequest $request)
    {
        try {
            $result = $this->users->createUser($request);
            if ($result) {
               
                return response()->json(
                    [
                        'success' => true,
                        'data' => $result,
                        'message' => Lang::get(
                            trans('admin.user_registration')
                        )
                    ]
                );
            } else {
                return response()->json(
                    [
                        'success' => false,
                        'data' => [],
                        'error' => [
                            'message' => Lang::get(
                                trans('api.something_went_wrong')
                            )
                        ]
                    ],
                    422
                );
            }
        } catch (\Exception $ex) {
            return response()->json(
                [
                    'success' => false,
                    'data' => [],
                    'error' => [
                        'message' => $ex->getMessage()
                    ]
                ],
                422
            );
        }
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
     * Update admin profile action page
     *
     * @param \Illuminate\Http\Request $request request data
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(UserUpdateRequest $request)
    {
        try {
            $user = User::updateSellerWeb($request, Auth::user()->id);
            if (!empty($user)) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => trans('admin.update_profile')
                    ]
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
