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
use App\Models\RefundRequest;
use App\Models\OrderItem;

class RefundController extends Controller
{
   

    

    public function edit_details_refund($id){

        $refund = RefundRequest::where('id', $id)
        ->get();

        $order_number=$refund[0]->order_details->order_number;

        $order_item_details=OrderItem::where('order_number',$order_number)->get();
        

        return view('frontend/product/edit-refund')->with(['details'=>$refund,'order_item_details'=>$order_item_details]);
    }


  


    public function refund_request_list_post(Request $request)
    {

        if ($request->ajax()) {
            try {
                $bindlist = RefundRequest::paginate($request->record);                   

                $completeSessionView = view(
                    'frontend/product/refund-list',
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
}
