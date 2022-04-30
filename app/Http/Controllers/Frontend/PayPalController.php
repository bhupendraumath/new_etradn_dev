<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\ProductReview;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use DB;

class PayPalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('frontend.common.transaction');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */

    public function processTransaction(Request $request,$car_ids_arr,$payment_type,$shipping_address,$total_price)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction',['car_ids_arr'=>$car_ids_arr,'payment_type'=>$payment_type,'shipping_address'=>$shipping_address]),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $total_price
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                   return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */



    public function successTransaction (Request $request,$car_ids_arr,$payment_type,$shipping_address)
    {
        $payment_type="paypal";
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);



        if (isset($response['status']) && $response['status'] == 'COMPLETED') {


    
                    $carts=Cart::whereIn('id',json_decode($car_ids_arr))->get();              
    
                    $order_number="odr_".time();
                    $admin_commision=5;
                    $subtotal=0;
                    if($payment_type=="cod")
                    {
                        $payment_status="pending";
                        $payment_type="cash";
                    }
                    else if($payment_type=="bank"){
                        $payment_status="paid";
                        $payment_type="paypal";
        
                    }
                    else if($payment_type=="paypal"){
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
                        $order['shipping_address']=$shipping_address;
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
                            $update=Cart::whereIn('id',json_decode($car_ids_arr))->update(
                                ['is_checkout'=>'y']
                            );
        
                            if($update){    
                                // my-parchase-history

                                return redirect()
                                ->route('buyer.purchaseHistory')
                                ->with('success_message', 'Transaction complete.');
                                // return response()->json(
                                //     [
                                //     'success' => true,
                                //     'message'=>"Successfully Purchased"
                                //     ]
                                // );
                            }
                            else{

                                return redirect()
                                ->route('shopping-cart')
                                ->with('error', $response['message'] ?? 'Something went wrong.');
                                // return response()->json(
                                //     [
                                //         'success' => false,
                                //        'message'=>"Failed, PLease try again"
                                //     ]
                                // );
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
                    
                

            // return redirect()
            //     ->route('createTransaction')
            //     ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('shopping-cart')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('shopping-cart')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}