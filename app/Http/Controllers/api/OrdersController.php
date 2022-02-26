<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class OrdersController extends Controller
{
    public $orders;

    public function __construct() {
        $this->orders = new Order();
    }

    public function myOrders($id, $type) {
        $user = new User();
        $getUser = $user->userById($id);
        if($getUser) {
            $getMyOrders = $this->orders->orderByBuyerId($id, $type);
            return response()->json([
                'status' => 200,
                'message' => 'My orders are:',
                'data' => $getMyOrders
            ]);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No user found',
                'error' => 'No user found'
            ]);
        }
    }

    public function orderSummary($id) {
        $getOrderSummary = $this->orders->orderSummary($id);
        if ($getOrderSummary) {
            return response()->json([
                'status' => 200,
                'message' => 'Orders summary is:',
                'data' => $getOrderSummary
            ]);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'Orders summary not found',
                'error' => 'Orders summary not found'
            ]);
        }
    }

    public function sellerOrderSummary($id, $sellerId) {
        [$getOrderSummary, $orderAmount] = $this->orders->sellerOrderSummary($id, $sellerId);
        if ($getOrderSummary) {
            return response()->json([
                'status' => 200,
                'message' => 'Orders summary is:',
                'data' => $getOrderSummary,
                'order_amount' => $orderAmount
            ]);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'Orders summary not found',
                'error' => 'Orders summary not found'
            ]);
        }
    }

    public function placeOrderItems(Request $request) {
        $validator = Validator::make($request->all(), [
            'cart_ids' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to place order',
                'error' => $validator->errors()
            ]);
        }
        $generatedOrderNumber = $this->orders->generateOrderNumber();
        // get carts
        $cartIds = $request->cart_ids;
        $cartIdsArray = explode(', ', $cartIds);
        $getCarts = Cart::whereIn('id', $cartIdsArray)->get();
        //cart insert in order_items
        [$subTotal, $sumShippingTotal] = $this->orders->placeOrderItem($getCarts, $generatedOrderNumber);
        $total = $subTotal + $sumShippingTotal;
        if($total){
            return response()->json([
                'status' => 200,
                'message' => 'Order place successfully',
                'data' => [
                    'order_item' => $generatedOrderNumber,
                    'sub_total' => $subTotal,
                    'delivery_fee' => $sumShippingTotal,
                    'total' => $total
                ]
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to place order items',
                'error' => 'Something went wrong'
            ]);
        }
    }

    public function checkout(Request $request) {
        $validator = Validator::make($request->all(), [
            'buyer_id' => 'required',
            'order_number' => 'required',
            'payment_type' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to place order',
                'error' => $validator->errors()
            ]);
        }
        $buyerId = $request->buyer_id;
        $orderNumber = $request->order_number;
        $paymentType = $request->payment_type;
        // check order items exist
        $orderItems = new OrderItem();
        $checkOrderItems = $orderItems->getOrderItemsByOrderNumber($orderNumber);
        if (($checkOrderItems)->isNotEmpty()) {
            [$orderPlaced, $buyerEmail] = $this->orders->placeOrder($buyerId, $orderNumber, $paymentType);
            if ($orderPlaced) {
            // Cart id's from order_item checkout "y"
                $orderItems->cartIsCheckout($checkOrderItems);
            //sentEmail to buyer
                $this->orders->checkOutEmailSent($buyerEmail, $orderNumber);
                return response()->json([
                    'status' => 200,
                    'message' => 'Checkout successfully',
                    'data' => 'Order place successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Unable to checkout',
                    'error' => 'Something went wrong'
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to checkout due to order not found',
                'error' => 'Something went wrong'
            ]);
        }
    }

    public function sellerOrders($id, $type) {
        [$sellerOrders, $productsAmount] = $this->orders->getSellerOrders($id, $type);
        if ($sellerOrders) {
            return response()->json([
                'status' => 200,
                'message' => 'Seller orders are',
                'data' => $sellerOrders,
                'order_amount' => $productsAmount,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No orders found',
                'data' => []
            ]);
        }
    }
}
