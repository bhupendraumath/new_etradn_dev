<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ImageUpload;
use App\Models\ProductReview;
use App\Services\FileService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Models\Bids;
use DB;

class BidController extends Controller
{
   
    public function bidsPlaced()
    {
        
        return view('frontend/bid-placed/index');
    }


    public function view_details_bids($product_id,$user_id){

        $bind = Bids::with(['product','user_details'])->where(['product_id'=> $product_id,'seller_id'=>$user_id])
        ->orderBy('bid_amount','DESC')
        ->paginate(3);
        return view('frontend/bid-placed/view')->with('details',$bind);
    }


    public function update_status($id,$product_id,$user_id,$status_value){

            try {

                // $bindlist = Bids::where(["product_id"=>$product_id,"seller_id"=>$user_id])
                // ->update(['bid_status'=>'closed']);

                // if($bindlist){

                    $won = Bids::where(["id"=>$id])
                    ->update(['bid_status'=>$status_value]);

                    if($won){
                        return response()->json(
                            [
                                'success' => true,
                                'message'=>'Succussfully '.$status_value.' the bid'
                            ]
                        );

                    }

                // }
                // else{

                //     return response()->json(
                //         [
                //             'success' => false,
                //             'message'=>'Failed to won the bid'
                //         ]
                //     );
                // }

                
            } catch (\Exception $ex) {
                return response()->json(
                    [
                        'success' => false,
                        'message'=>'Failed to '. $status_value.' the bid',
                        'error' => ['message' => $ex->getMessage()]
                    ],
                    422
                );
            }
    }

    public function BidPlacePost(Request $request)
    {

        if ($request->ajax()) {
            try {

                $bindlist = Bids::where('seller_id', Auth::user()->id)
                ->groupBy('product_id')
                ->orderBy('id','desc')
                ->paginate($request->record);


                    
                $completeSessionView = view(
                    'frontend/bid-placed/bid-list',
                    compact('bindlist')
                )->render();

                if ($bindlist->isNotEmpty()) {
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

    public function buyerBidPlacePost(Request $request)
    {

        if ($request->ajax()) {
            try {

                // $bindlist = Bids::where('user_id', Auth::user()->id)
                // ->groupBy('product_id')
                // ->orderBy('id','desc')
                // ->paginate($request->record);

                $list =  DB::table('tbl_bids')
                        ->select('tbl_bids.*','tbl_product.product_name','tbl_product.want_to_list','tbl_product.product_name','tbl_product.bid_amount','tbl_product.bid_ending_datetime','tbl_product_attribute_quantity.quantity','tbl_product_attribute_quantity.price','tbl_product_attribute_quantity.id as q_id','tbl_product_attribute_quantity.discount','tbl_product_attribute_quantity.quantity','tbl_product_image.product_img','tbl_product_cat.categoryName','tbl_product_cat.id as c_id','tbl_product_sub_cat.subCategoryName','tbl_product_sub_cat.id as s_c_id','tbl_product_brand.brandName','tbl_product_brand.id as brand_id',)
                        ->join('tbl_product','tbl_product.id','=','tbl_bids.product_id')
                        ->leftJoin('tbl_product_attribute_quantity','tbl_product_attribute_quantity.product_id','=','tbl_bids.product_id')
                        ->join('tbl_product_image','tbl_product_image.product_id','=','tbl_bids.product_id')
                        ->join('tbl_product_cat','tbl_product_cat.id','=','tbl_product.cat_id')
                        ->join('tbl_product_sub_cat','tbl_product_sub_cat.id','=','tbl_product.sub_cat_id')
                        ->join('tbl_product_brand','tbl_product_brand.id','=','tbl_product.brand_id')
                        ->where('tbl_bids.user_id', Auth::user()->id);
                        // ->where('tbl_product.product_name', 'like', '%' .'appl' . '%')
                        // ->orderBy('tbl_bids.id','desc')
                        
                        // ->paginate($request->record);

                if(isset($request->searching))
                {
                    $list->where('tbl_product.product_name', 'like', '%' .$request->searching . '%');
                }

                $bindlist=$list->orderBy('tbl_bids.id','desc')                        
                ->paginate($request->record);


                // $bindlist =  DB::table('tbl_bids')
                // ->select('tbl_bids.*','tbl_product_attribute_quantity.quantity','tbl_product_attribute_quantity.price','tbl_product_attribute_quantity.id as q_id','tbl_product_attribute_quantity.discount','tbl_product_attribute_quantity.quantity','tbl_product_brand.brandName','tbl_product_brand.id as brand_id','tbl_product_sub_cat.subCategoryName','tbl_product_sub_cat.id as s_c_id','tbl_product_cat.categoryName','tbl_product_cat.id as c_id')
                // ->leftJoin('tbl_product_attribute_quantity','tbl_product_attribute_quantity.product_id','=','tbl_product.id')
                // ->join('tbl_product','tbl_product.id','=','tbl_bids.product_id')
                // ->join('tbl_product_image','tbl_product_image.product_id','=','tbl_product.id')
                // ->join('tbl_product_cat','tbl_product_cat.id','=','tbl_product.cat_id')
                // ->join('tbl_product_sub_cat','tbl_product_sub_cat.id','=','tbl_product.sub_cat_id')
                // ->join('tbl_product_brand','tbl_product_brand.id','=','tbl_product.brand_id')
                // ->get();

                // dd($bindlist);die;

                    
                $completeSessionView = view(
                    'frontend/bid-placed/bid-list',
                    compact('bindlist')
                )->render();

                if ($bindlist->isNotEmpty()) {
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
    
    public function bidPlaced(Request $request)
    {

        if ($request->ajax()) {
            try {

                $bindlist = Bids::create($request->all());

                if ($bindlist) {
                    return response()->json(
                        [
                            'success' => true,
                            'message'=>'Bid placed successfully'
                        ]
                    );
                }
                return response()->json(
                    [
                        'success' => true, 'message'=>'Bid place failed'
                    ]
                );
            } catch (\Exception $ex) {
                return response()->json(
                    [
                        'success' => false,
                        'error' => ['message' => $ex->getMessage()]
                    ],
                    422
                );
            }
        }
    }
}
