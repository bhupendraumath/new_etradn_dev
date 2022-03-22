<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bids;

class OrderItem extends Model
{
    protected $table = 'tbl_order_items';
    public $timestamps = false;
    use HasFactory;
    public $with=['getOrder','seller_details_in_details'];

    protected $fillable = [
        'seller_id',
        'cart_id',
        'bid_id',
        'order_number',
        'quantity',
        'product_price',
        'shipping_amount',
        'sub_total',
        'admin_commission_per',
        'admin_commission',
        'seller_amount',
        'transaction_seller_detail',
        'order_status',
        'delivery_status',
        'payment_status',
        'is_redeemed',
        'is_delivered',
        'redeem_request',
        'selling_type',
        'product_detail',
        'product_detail_10',
        'product_detail_8',
        'product_detail_7',
        'product_detail_6',
        'product_detail_5',
        'product_detail_1',
        'ip_address',
        'status',
        'order_secret_code',
        'add_signature',
        'createdDate',
    ];

    /**
    * Get the image associated with the orders.
    */
    public function getOrder()
    {
        return $this->belongsTo(Order::class, 'order_number', 'order_number');
    }

    public function seller_details_in_details() {
        return $this->hasOne(User::class, 'id', 'seller_id');
    }

    public function bid_details()
    {
        return $this->belongsTo(Bids::class, 'id', 'bid_id');
    }

    public function getOrderItemsByOrderNumber($orderNumber) {
        $orderItems = OrderItem::where('order_number', $orderNumber)->get();
        return $orderItems;
    }

    public function cartIsCheckout($checkOrderItems) {
        foreach ($checkOrderItems as $key => $value) {
            Cart::where('id', $value->cart_id)->update([
                'is_checkout' => 'y'
            ]);
        }
    }
}
