<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Order extends Model
{
    protected $table = 'tbl_orders';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'txn_id',
        'txn_fee',
        'payer_email',
        'receiver_email',
        'transaction',
        'order_number',
        'shipping_address',
        'admin_commission_per',
        'admin_commission',
        'seller_amount',
        'total_order_amount',
        'payment_status',
        'payment_type',
        'ip_address',
        'order_secret',
        'add_signature',
        'createdDate'
    ];

    /**
     * Get the image associated with the product.
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_number', 'order_number');
    }

    /**
     * Get the user associated with the order.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'buyer_id');
    }

    public function orderByBuyerId($id, $type) {
        $orders = Order::where('buyer_id', $id)
            ->with(array('getOrderItems' => function($query) use ($type) {
                $query->select('order_number', 'delivery_status', 'quantity');
            }))->orderBy('id', 'DESC')->get();
        $myOrderData = [];
        foreach($orders as $key => $order) {
            $myOrderData[$key]['order_id'] = $order->id;
            $myOrderData[$key]['order_number'] = $order->order_number;
            $myOrderData[$key]['date_time'] = $order->createdDate;
            $myOrderData[$key]['total_amount'] = $order->total_order_amount;
            $myOrderData[$key]['shipping_address'] = $order->shipping_address;
            $quantitySum = 0;
            foreach($order->toArray()['get_order_items'] as $keys => $orderItem) {
                $quantitySum += $orderItem['quantity'];
                $myOrderData[$key]['quantity'] = $quantitySum;
                $myOrderData[$key]['status'] = $orderItem['delivery_status'];
            }
        }
        foreach ($myOrderData as $key => $orderData) {
            if($orderData['status'] != $type) {
                unset($myOrderData[$key]);
            }
        }
        return array_values($myOrderData);
    }

    public function orderSummary($id){
        $order = Order::where('order_number', $id)->with('getOrderItems', 'user')->get();
        foreach ($order as $key => $value) {
            foreach ($value->getOrderItems as $orderItem) {
                //get product name
                $productJson = json_decode($orderItem->product_detail_1);
                $productJsonArabic = json_decode($orderItem->product_detail_5);
                $orderItem['product_id'] = intval($productJson->id);
                $orderItem['product_name'] = $productJson->product_name;
                $orderItem['product_name_arabic'] = $productJsonArabic->product_name;
                // get product rating
                $rating  = ProductReview::where('orderItemId', $orderItem->id)->first();
                $orderItem['is_rating'] = $rating ? '1' : '0';
                $orderItem['rating'] = $rating ? $rating : null;
            }
        }
        return $order;
    }

    public function sellerOrderSummary($id, $sellerId){
        $order = Order::where('order_number', $id)->with('getOrderItems', function($q) use($sellerId){
            $q->where('seller_id', '=', $sellerId);
        })->with('user')->get();
        foreach ($order as $key => $value) {
            foreach ($value->getOrderItems as $orderItem) {
                //get product name
                $productJson = json_decode($orderItem->product_detail_1);
                $productJsonArabic = json_decode($orderItem->product_detail_5);
                $orderItem['product_id'] = intval($productJson->id);
                $orderItem['product_name'] = $productJson->product_name;
                $orderItem['product_name_arabic'] = $productJsonArabic->product_name;
                // get product rating
                $rating  = ProductReview::where('orderItemId', $orderItem->id)->first();
                $orderItem['is_rating'] = $rating ? '1' : '0';
                $orderItem['rating'] = $rating ? $rating : null;
            }
        }
        $calOrderAmount = OrderItem::where('seller_id', '=', $sellerId)->where('order_number', $id)->sum('seller_amount');
        $order_amount = round($calOrderAmount,2);
        return [$order, $order_amount];
    }

    public function generateOrderNumber() {
        $generateNumber = mt_rand(1000000000, 9999999999);
        $number = 'odr_'.$generateNumber;
        $orderNumberExists = $this->orderNumberExists($number);
        if ($orderNumberExists) {
            return $this->generateOrderNumber();
        }
        return $number;
    }

    public function orderNumberExists($number) {
        return Order::where('order_number',$number)->exists();
    }

    public function placeOrderItem($carts,$orderNumber) {
        foreach ($carts as $key => $value) {
            //get product info
            $productJson = json_decode($value->product_array);
            $quantity = $value->quantity;
            $price = $value->price;
            $discount = $value->discount;
            $productDiscount = ($discount/100) * $price;
            $productPrice = $price - $productDiscount;
            $shippingAmount = $productJson->shipping_price;
            $subTotal = ($quantity * $productPrice) + $shippingAmount;
            $adminCommissionPer = 5;
            $adminCommission = ($subTotal/100) * $adminCommissionPer;
            $sellerAmount = $subTotal - $adminCommission;
            OrderItem::create([
                'seller_id' => $value->seller_id,
                'cart_id' => $value->id,
                'bid_id' => 0,
                'order_number' => $orderNumber,
                'quantity' => $value->quantity,
                'product_price' => $productPrice,
                'shipping_amount' => $shippingAmount,
                'sub_total' => $subTotal,
                'admin_commission_per' => $adminCommissionPer,
                'admin_commission' => $adminCommission,
                'seller_amount' => $sellerAmount,
                'transaction_seller_detail' => '',
                'order_status' => 'o',
                'delivery_status' => 'p',
                'payment_status' => 'pending',
                'is_redeemed' => 0,
                'is_delivered' => 'n',
                'redeem_request' => 0,
                'selling_type' => $value->selling_type,
                'product_detail' => '',
                'product_detail_10' => '',
                'product_detail_8' => '',
                'product_detail_7' => '',
                'product_detail_6' => '',
                'product_detail_5' => $value->product_array,
                'product_detail_1' => $value->product_array,
                'ip_address' => '',
                'status' => 'a',
                'order_secret_code' => '',
                'add_signature' => '',
                'createdDate' => Carbon::now(),
            ]);
        }
        $sumSubTotal = OrderItem::where('order_number', $orderNumber)->sum('sub_total');
        $sumShippingTotal = OrderItem::where('order_number', $orderNumber)->sum('shipping_amount');
        $subTotal = $sumSubTotal - $sumShippingTotal;
        return [$subTotal, $sumShippingTotal];
    }

    public function placeOrder($buyerId, $orderNumber, $paymentType) {
        $buyer = User::where('id', $buyerId)->first();
        $sumSubTotal = OrderItem::where('order_number', $orderNumber)->sum('sub_total');
        $adminCommissionPer = 5;
        $adminCommission = ($sumSubTotal/100) * $adminCommissionPer;
        $sellerAmount = $sumSubTotal - $adminCommission;
        $orderPlaced = Order::create([
            'buyer_id' => $buyerId,
            'txn_id' => '',
            'txn_fee' => 0.00,
            'payer_email' => '',
            'receiver_email' => $buyer->email,
            'transaction' => '',
            'order_number' => $orderNumber,
            'shipping_address' => $buyer->address,
            'admin_commission_per' => $adminCommissionPer,
            'admin_commission'=> $adminCommission,
            'seller_amount' => $sellerAmount,
            'total_order_amount' => $sumSubTotal,
            'payment_status' => 'pending',
            'payment_type' => $paymentType,
            'ip_address' => '',
            'order_secret' => '',
            'add_signature' => '',
            'createdDate' => Carbon::now()
        ]);

        return [$orderPlaced, $buyer->email];
    }

    public function checkOutEmailSent($email, $orderNumber){
        $details = [
            'order_number' => $orderNumber,
        ];
        Log::info("Checkout Email sending to ==> ".$email);
        \Mail::to($email)->send(new \App\Mail\CheckOutEmail($details));
        Log::info("Checkout Email Email sent to ==> ".$email);
    }

    public function getSellerOrders($id, $type) {
        $sellerOrders = Order::whereHas('getOrderItems', function($q) use($id, $type){
            $q->where('seller_id', '=', $id)->where('delivery_status', $type);
        })->orderBy('id', 'DESC')->get();
        $productsAmount = Order::whereHas('getOrderItems', function($q) use($id, $type){
            $q->where('seller_id', '=', $id)->where('delivery_status', $type);
        })->sum('seller_amount');
        $order_amount = round($productsAmount,2);
        return [$sellerOrders, $order_amount];
    }
}
