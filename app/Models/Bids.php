<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\User;


class Bids extends Model
{
    protected $table = 'tbl_bids';
    public $timestamps = false;
    use HasFactory;

    public $with=['image','quantity_product','product'];

    public function image()
    {
        return $this->hasOne(ImageUpload::class,'product_id', 'product_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id', 'product_id');
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
