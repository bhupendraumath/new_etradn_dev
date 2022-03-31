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
use App\Models\RefundRequestDetails;
use DB;

class RefundController extends Controller
{
   

    

    public function edit_details_refund($id){

        $refund = RefundRequest::where('id', $id)
        ->get();

        $order_number=$refund[0]->order_details->order_number;

        $order_item_details=OrderItem::where('order_number',$order_number)->get();
        

        return view('frontend/product/edit-refund')->with(['details'=>$refund,'order_item_details'=>$order_item_details]);
    }


    public function createRequest(Request $request)
    {

        if ($request->ajax()) {
            try {


                $refundRequest=RefundRequest::create($request->all());
               
                if($refundRequest){

                    $proof=new RefundRequestDetails;
                    $proof->refund_id=$refundRequest->id;
                    $proof->type='b';
                    $proof->type_id='557';
                    $proof->status='a';

                    if($request->hasFile('image')){

                        $image=$request->file('image');
                        $name=time().'.'.$image->getClientOriginalExtension();
                        $proof->refund_img=$name;
                        $destnation_path=public_path('assests/images/');
                        $store=$image->move( $destnation_path,$name);                    
                    }
                    

                    // refund_img
                    if($proof->save()){
                        return response()->json(
                            ['success' => true, 'message' => "Refund Request sent succussfully"]
                        );
                    }
                }
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


    public function refund_request_list_post(Request $request)
    {

        if ($request->ajax()) {
            try {

                 $id=   Auth::user()->id;


                //  $bindlist = DB::table('tbl_refund_details')
                //  ->select('tbl_product.id','tbl_product.product_name','tbl_product.user_id','tbl_product.user_id','tbl_refund_details.id as ref_id', 'tbl_refund_details.*','tbl_orders.total_order_amount')
                //  ->join('tbl_product','tbl_product.id','=','tbl_refund_details.product_id')
                //  ->leftJoin('tbl_orders','tbl_orders.id','=','tbl_refund_details.order_item_id')
                //  ->where('tbl_product.user_id',$id)
                //  ->paginate($request->record);


                $bindlist = DB::table('tbl_refund_details')
                ->select('tbl_product.id','tbl_product.product_name','tbl_product.user_id','tbl_product.user_id','tbl_refund_details.id as ref_id', 'tbl_refund_details.*','tbl_product_image.product_img','tbl_product_image.product_id','tbl_order_items.sub_total as total_order_amount','tbl_product.want_to_list','tbl_product.cat_id','tbl_product.sub_cat_id','tbl_product.brand_id','tbl_product_cat.*','tbl_product_brand.*','tbl_product_sub_cat.*')
                ->join('tbl_product','tbl_product.id','=','tbl_refund_details.product_id')
                ->leftJoin('tbl_order_items','tbl_order_items.id','=','tbl_refund_details.order_item_id')
                ->leftJoin('tbl_product_image','tbl_product_image.product_id','=','tbl_product.id')
                ->leftJoin('tbl_refund_proof','tbl_refund_proof.refund_id','=','tbl_refund_details.id')

                ->leftJoin('tbl_product_cat','tbl_product_cat.id','=','tbl_product.cat_id')
                ->leftJoin('tbl_product_brand','tbl_product_brand.id','=','tbl_product.brand_id')
                ->leftJoin('tbl_product_sub_cat','tbl_product_sub_cat.id','=','tbl_product.sub_cat_id')
                ->where('tbl_product.user_id',$id)
                ->distinct('tbl_product_image.product_id')
                ->orderBy('tbl_refund_details.id','desc')
                ->paginate($request->record);



                // $bindlist = RefundRequest::paginate($request->record);                   

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


    public function changeRequest(Request $request)
    {

        if ($request->ajax()) {
            try {

                $refundRequest=RefundRequest::find($request->id);
                $refundRequest->seller_approval_status=$request->status;
                
                if($refundRequest->save()){
                   
                    return response()->json(
                        ['success' => true, 'message' => 'Updated refund request status']
                    );
                }
                else{
                    return response()->json(
                        ['success' => false, 'message' => 'Failed refund request status']
                    );
                }
                
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