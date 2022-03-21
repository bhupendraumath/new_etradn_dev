<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ImageUpload;
use App\Models\ProductQuantity;
use App\Models\RefundRequest;
use App\Models\ProductReview;
use App\Models\Address;
use App\Services\FileService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Redirect;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('isActive', 'y')->get();
        $brand = Brand::where('isActive', 'y')->get();
        return view(
            'frontend/product/add',
            compact(
                'category',
                'brand'
            )
        );
    }


    public function businessAddressEdit($id){
        $title="Delivery Address";
        $details=Address::whereId($id)->get();
        return view('frontend/seller/business-information',['details'=>$details,'title'=>$title]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delivery_areas()
    {
        return View(
            'frontend/seller/delivery-areas'
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addDeliveryArea()
    {
        $title="Delivery Address";
        return view('frontend/seller/business-information')->with('title',$title);
    }


    public function delivery_areas_post(Request $request)
    {

        if ($request->ajax()) {
            try {

                $user_id=Auth::user()->id;
                $address= Address::where(['address_type'=>'delivery','userId'=>$user_id])
                        ->paginate(4);
                // $bindlist = RefundRequest::paginate($request->record);                   

                $completeSessionView = view(
                    'frontend/seller/delivery-areas-list',
                    compact('address')
                )->render();

                if ($address->isNotEmpty()) {
                    return response()->json(
                        [
                            'success' => true,
                            'data' =>
                            [
                                'completeSessionView' => $completeSessionView
                            ]
                        ]
                    );
                }
                return response()->json(
                    [
                        'success' => true, 'data' =>
                        [
                            'completeSessionView' => $completeSessionView
                        ]
                    ]
                );
            } catch (\Exception $ex) {
                return response()->json(
                    [
                        'success' => false,
                        'data' => [],
                        'error' => ['message' => $ex->getMessage()]
                    ],
                    422
                );
            }
        }
    }
    
}