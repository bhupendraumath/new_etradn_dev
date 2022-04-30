<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function myorder(){


        $userid=Auth::user()->id;

        $productlist = OrderItem::where('seller_id',$userid)
                    ->orderBy("id",'desc')
                    ->paginate(5);

        return view('frontend/seller/my-order',
        compact(
            'productlist',
        ));

    }

    public function myOrderPost(Request $request){

        if ($request->ajax()) {
            try {
                $userid=Auth::user()->id;

                // $productlist = OrderItem::where('seller_id',$userid)
                //             ->orderBy("id",'desc')
                //             ->paginate($request->record);


                $product_list = DB::table('tbl_order_items')
                ->select('tbl_order_items.*', 'tbl_orders.buyer_id','tbl_orders.total_order_amount','tbl_orders.payment_type','tbl_orders.payment_status as order_payment_status','tbl_orders.txn_id','tbl_orders.order_number','tbl_refund_details.seller_approval_status','tbl_refund_details.admin_approval_status as tbl_refund_details_record ','tbl_users.firstName','tbl_users.lastName' )
                ->join('tbl_orders','tbl_order_items.order_number','=','tbl_orders.order_number')
                ->leftJoin('tbl_refund_details','tbl_refund_details.order_item_id','tbl_order_items.id')
                ->join('tbl_users','tbl_users.id','tbl_order_items.seller_id')
                ->where('tbl_order_items.seller_id',$userid);

                
                if(isset($request->searching) && $request->searching!=null)
                {
                    $product_list->where('tbl_orders.payment_status',$request->searching);
                }

                $productlist=$product_list->orderBy("id",'desc')->paginate($request->record);


                $completeSessionView = view(
                    'frontend/seller/my-order-list',
                    compact('productlist')
                )->render();

                if ($productlist->isNotEmpty()) {
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
