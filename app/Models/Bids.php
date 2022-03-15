<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;


class Bids extends Model
{
    protected $table = 'tbl_bids';
    public $timestamps = false;
    use HasFactory;

    public $with=['image'];

    public function image()
    {
        return $this->hasOne(ImageUpload::class,'product_id', 'product_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id', 'product_id');
    }

    public function quantity()
    {
        return $this->hasOne(ProductQuantity::class,'id','paqid');
    }

    /**
     * Get the quantit associated with the product.
     */
    // public function review()
    // {
    //     return $this->hasMany(ProductReview::class, 'productId');
    // }
    

}
