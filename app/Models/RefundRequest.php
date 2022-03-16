<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class RefundRequest extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_refund_details';
    public $with=['order_details','product','buyer_details'];



    // public function user(){
    //     return $this->belongsTo(User::class, 'buyerId', 'id');
    // }

    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }


    public function buyer_details() {
        return $this->hasOne(User::class, 'id', 'buyer_id');
    }

    public function order_details() {
        return $this->hasOne(Order::class, 'id', 'order_item_id');
    }

    public function productWithRepectUser($userid,$product_id){
        $details=Product::where(['user_id'=>$userid,'id'=>$product_id]);
        return $details;
    }


}
