<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\User;
use DB;

class Bids extends Model
{
    protected $table = 'tbl_bids';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'product_id',
        'paqid',
        'user_id',
        'seller_id',
        'cart_id',
        'bid_number',
        'quantity',
        'payment_type',
        'bid_amount',
        'payment_status',
        'bid_status',
        'is_buyer_late',
        'is_seller_late',
        'status',
    ];

    public $with=['image','quantity_product','product'];

    public function image()
    {
        return $this->hasOne(ImageUpload::class,'product_id', 'product_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id', 'product_id');
    }

    public function count_bids($seller_id,$product_id){

        $total_bid=Bids::where(['seller_id'=>$seller_id,'product_id'=>$product_id])
        ->get();
        return $total_bid;
    }
    public function quantity_product()
    {
        return $this->hasOne(ProductQuantity::class,'id','paqid');
    }


    public function user_details()
    {
        return $this->hasOne(User::class,'id','user_id');
    }


    /**
     * Get the quantit associated with the product.
     */
    // public function review()
    // {
    //     return $this->hasMany(ProductReview::class, 'productId');
    // }
    

}
