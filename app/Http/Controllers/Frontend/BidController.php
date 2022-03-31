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

                $bindlist = Bids::where('user_id', Auth::user()->id)
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
