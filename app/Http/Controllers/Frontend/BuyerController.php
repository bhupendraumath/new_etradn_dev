<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessCategory;
use App\Models\BusinessType;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItem;
use App\Models\Order;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('frontend/buyer/dashboard');
    }
    /**
     * 
     
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function businessInformation()
    {
        return view('frontend/seller/business-information');
    }


    public function buyer_personal_details(){
        $businesstype = BusinessType::where('isActive', '=', 'y')->get();
        $businessCategory = BusinessCategory::where('isActive', '=', 'y')->get();

        return view(
            'frontend/buyer/personal-information',
            compact('businesstype', 'businessCategory')
        );
    }


    public function favorite_product(){
        return view('frontend/buyer/my-favorite-product');
    }

    public function buyer_bids_placed(){
        return view('frontend/buyer/bids-places');
    }
    

    public function purchase_history(){

        $userid=Auth::user()->id;
        // $userid=846;
        $productlist = Order::with('get_order_items')->where('buyer_id',$userid)
                    ->orderBy("id",'desc')
                    ->paginate(4);

        return view('frontend/buyer/purchase-history',
        compact(
            'productlist',
        ));

        // return view('frontend/buyer/purchase-history');
    }

    public function delivery_area(){
        return view('frontend/buyer/delivery-areas');
    }

    public function buyer_account_setting(){
        return view('frontend/buyer/account-settings');
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
