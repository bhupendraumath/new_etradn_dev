<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Redirect;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (Auth::user()->user_type == 's') {
            return view('frontend/seller/dashboard');
        } elseif (Auth::user()->user_type == 'b') {
            return view('frontend/buyer/dashboard');
        } else {
            echo "not permisssion";
            die;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function businessInformation()
    {
        $title = "Business Address";
        return view('frontend/seller/business-information')->with('title', $title);
    }


    public function businessAddress()
    {
        try {
            $id = Auth::guard('web')->user()->id;
            $addressList = Address::where(['userId' => $id, 'address_type' => 'business'])->paginate(10);

            return view('frontend/seller/business-addresses', ['list' => $addressList]);
        } catch (\Exception $e) {
            return response()->json(
                ['success' => false, 'message' => $e->getMessage()]
            );
        }
    }

    public function editBusinessAddress($id)
    {

        $title = "Delivery Address";
        $details = Address::whereId($id)->get();
        return view('frontend/seller/business-information', ['details' => $details, 'title' => $title]);
    }
    public function businessAddressEdit($id)
    {
        $title = "Business Address";
        $details = Address::whereId($id)->get();
        return view('frontend/seller/business-information', ['details' => $details, 'title' => $title]);
    }

    public function businessAddressDelete($id)
    {
        try {
            $user_id = Auth::guard('web')->user()->id;
            $delete = Address::whereId($id)->delete();

            if ($delete) {
                $addressList = Address::where(['userId' => $user_id, 'address_type' => 'business'])->paginate(10);

                return response()->json(
                    ['success' => true, 'message' => 'Delete Successfully']
                );
            }
        } catch (\Exception $e) {
            return response()->json(
                ['success' => false, 'message' => $e->getMessage()]
            );
        }
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
}
