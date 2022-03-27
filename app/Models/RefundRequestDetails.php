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
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    // protected $fillable = [
    //     'order_item_id',
    //     'cart_id',
    //     'product_id',
    //     'buyer_desc',
    //     'seller_desc',
    //     'admin_rejection_reason',
    //     'admin_approval_status',
    //     'seller_approval_status',
    //     'payment_status',
    //     'status',
    //     'admin_notification',
        
    // ];


    protected $table = 'tbl_refund_proof';



    // public function user(){
    //     return $this->belongsTo(User::class, 'buyerId', 'id');
    // }

   

}
