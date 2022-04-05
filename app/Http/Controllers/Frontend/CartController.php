<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shoppingcart()
    {   
        $buyer=Auth::user();

        if(!empty($buyer)){
            $buyer_id=$buyer->id;
            $cart_details=Cart::with(['product','image','productquantity'])
            ->where(['customer_id'=>$buyer_id,'is_checkout'=>'n','is_delete'=>'n'])
            ->get();  
            return view('frontend/add-to-card',compact('cart_details'));  

            // return view('frontend/add-to-card',['cart_details'=>$cart_details]);
        }
        else{
            return redirect('sign-in');
        }
        
    }


    public function cartListing(Request $request)
    {

        if ($request->ajax()) {
            try {
                $buyer=Auth::user();

                $buyer_id=$buyer->id;
                $cart_details=Cart::with(['product','image'])
                ->where(['customer_id'=>$buyer_id,'is_checkout'=>'n','is_delete'=>'n'])
                ->orderBy('id', 'DESC')
                ->get();  

                $without_discount=0;
                $with_discount=0;
                $total_discount=0;
                $shipping_price=0;
                $total_amount=0;

                foreach($cart_details as $details){

                    $without_discount=$without_discount+($details->price*$details->quantity);

                    $shipping_price+=$details->product->shipping_price;

                    $with_discount=$with_discount+(($details->price - ($details->price*$details->discount/100))*$details->quantity);

                }

                $total_amount=$with_discount+$shipping_price;
                $address=Address::where(['userId'=>$buyer_id,'isActive'=>'y','address_type'=>'delivery'])
                ->get();
                $completeSessionView = view(
                    'frontend/add-to-card-list')
                    ->with([
                            'cart_details'=>$cart_details,
                            'without_discount'=>$without_discount,
                            'shipping_price'=>$shipping_price,
                            'with_discount'=>$with_discount,
                            'total_amount'=>$total_amount,
                            'address'=>$address
                            ])
                    ->render();

                    // ,'without_discount'=>$without_discount

                if ($cart_details->isNotEmpty()) {
                    return response()->json(
                        [
                            'success' => true,
                            'data' =>
                            [
                                'completeSessionView' => $completeSessionView,
                                'total_amount'=>$total_amount
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

    public function cartAdd(Request $request){
        if ($request->ajax()){

            try {

                $cart=Cart::create($request->all());
                
                if(!empty($cart)) {
                    return response()->json(
                        [
                            'success' => true,
                           'message'=>"Successfully updated"
                        ]
                    );
                }
                return response()->json(
                    [
                        'success' => true, 
                        'message'=>"failed"
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


    public function orderProduct(Request $request){
        if ($request->ajax()){
            
            try {

                $carts=Cart::whereIn('id',json_decode($request->car_ids_arr))->get();              

                $order_number="odr_".time();
                $admin_commision=5;
                $subtotal=0;
                if($request->payment_type=="cod")
                {
                    $payment_status="pending";
                    $payment_type="cash";
                }
                else if($request->payment_type=="bank"){
                    $payment_status="paid";
                    $payment_type="paypal";
    
                }
    
                $records=array();
 
                //For order items
                foreach($carts as $cart){
    
                    $shipping_price= $cart->product->shipping_price==null?0:$cart->product->shipping_price;
                    $quantity=$cart->quantity;
                    $product_price=$cart->price;
                    $discount=$cart->discount;
    
                    $total_product_price=$product_price*$quantity;
                    $after_discount=$total_product_price-($total_product_price*$discount/100);
    
                    $total_price=$after_discount+$shipping_price;//with shipping price
                 // $total_price=$after_discount+$shipping_price;//without shipping price
                   
                    $total_commision=$total_price*$admin_commision/100;
                    $seller_amount=$total_price-$total_commision;
    
                    $subtotal=$subtotal+$total_price;  //tatal_price for all including shipping fee and discount
    
                    $record['seller_id']=$cart->seller_id;
                    $record['cart_id']=$cart->id;
                    $record['bid_id']=$cart->bid_id!=""?$cart->bid_id:0;
                    $record['order_number']=$order_number;
                    $record['quantity']=$quantity;
                    $record['product_price']=$product_price;
                    $record['shipping_amount']=$shipping_price;
                    $record['sub_total']=$total_price;
                    $record['admin_commission_per']=$admin_commision;
                    $record['admin_commission']=$total_commision;
                    $record['seller_amount']=$seller_amount;
                    $record['transaction_seller_detail']="";
                    $record['order_status']='o';
                    $record['delivery_status']='p';
                    $record['payment_status']=$payment_status;
                    $record['is_redeemed']='0';
                    $record['is_delivered']='n';
                    $record['redeem_request']='0';
                    $record['selling_type']=$cart->selling_type;
                    $record['product_detail']=$cart->product;
                    $record['product_detail_10']=$cart->product;
                    $record['product_detail_8']=$cart->product;
                    $record['product_detail_7']=$cart->product;
                    $record['product_detail_6']=$cart->product;
                    $record['product_detail_5']=$cart->product;
                    $record['product_detail_1']=$cart->product;
                    $record['ip_address']='000.000.000';
                    $record['status']='a';
                    $record['order_secret_code']=' ';
                    $record['add_signature']=' ';
    
                    array_push($records,$record);


                    //Logic for minus quantity
                    DB::table('tbl_product_attribute_quantity')->where('product_id',$cart->product_id)->decrement('quantity', $cart->quantity);
    
                }
    
                // dd($records);die;
                $orderItem=DB::table('tbl_order_items')->insert($records);
                // $orderItem=OrderItem::insert($records);

                // dd($orderItem);die;
            
                if($orderItem){
    
                    //Here for order table                        
                    $total_admin_commision= ($subtotal*$admin_commision/100);
                    $seller_remaining_amount=$subtotal-$total_admin_commision;
                    $orders=array();
    
                    $order['buyer_id']=Auth::user()->id;
                    $order['txn_id']="O-".time();
                    $order['txn_fee']=0.00;
                    $order['txn_fee']=0.00;
                    $order['payer_email']=Auth::user()->email;
                    $order['receiver_email']=Auth::user()->email;
                    $order['transaction']="";
                    $order['order_number']=$order_number;
                    $order['shipping_address']=$request->shipping_address;
                    $order['admin_commission_per']=$admin_commision;
                    $order['admin_commission']= $total_admin_commision;
                    $order['seller_amount']=$seller_remaining_amount;
                    $order['total_order_amount']=$subtotal;
                    $order['payment_status']=$payment_status;
                    $order['payment_type']=$payment_type;
                    $order['ip_address']='000.000.000';
                    $order['order_secret']=' ';
                    $order['add_signature']=' ';
    
                    array_push($orders,$order);
    
                    $orderInserted=Order::insert($orders);
    
                    if($orderInserted){
                        $update=Cart::whereIn('id',json_decode($request->car_ids_arr))->update(
                            ['is_checkout'=>'y']
                        );
                        if($update){
                            return response()->json(
                                [
                                    'success' => true,
                                'message'=>"Successfully Purchased"
                                ]
                            );
                        }
                        else{
                            return response()->json(
                                [
                                    'success' => false,
                                   'message'=>"Failed, PLease try again"
                                ]
                            );
                        }
                    }
                    else{
                        return response()->json(
                            [
                                'success' => false,
                               'message'=>"Failed, PLease try again"
                            ]
                        );
                    }
                    
                }
                
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

    public function cartEdit(Request $request){
        if ($request->ajax()){

            try {
                $buyer_id=Auth::user();
                $card=Cart::find($request->id);
                $card->quantity=$request->quantity;
                
                if ($card->save()) {
                    return response()->json(
                        [
                            'success' => true,
                           'message'=>"Successfully updated"
                        ]
                    );
                }
                return response()->json(
                    [
                        'success' => true, 
                        'message'=>"failed"
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


    public function cartDelete(Request $request){
        if ($request->ajax()){

            try {
                $buyer_id=Auth::user();
                $card=Cart::find($request->id);
                $card->is_delete='y';
                
                if ($card->save()) {
                    return response()->json(
                        [
                            'success' => true,
                           'message'=>"Successfully updated"
                        ]
                    );
                }
                return response()->json(
                    [
                        'success' => true, 
                        'message'=>"failed"
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

    public function myorder(){


        $userid=Auth::user()->id;

        $productlist = OrderItem::where('seller_id',$userid)
                    ->orderBy("id",'desc')
                    ->paginate(2);

        return view('frontend/seller/my-order',
        compact(
            'productlist',
        ));

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
