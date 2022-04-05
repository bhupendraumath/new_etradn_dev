<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\ProductQuantity;
use App\Models\ImageUpload;
use App\Models\User;


class FavoriteProduct extends Model
{
    protected $table = 'tbl_favorite_products';
    public $timestamps = false;

    use HasFactory;

    public $with = ['product', 'quantity', 'userDetails'];

    protected $fillable = [
        'user_id',
        'product_id',
        'paq_id'
    ];

    /**
     * Get the product associated with the wishlist.
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    /**
     * Get the quantit associated with the product.
     */
    public function quantity()
    {
        return $this->hasOne(ProductQuantity::class, 'id', 'paq_id');
    }

    public function userDetails()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Get the IMAGE associated with the product.
     */
    public function image()
    {
        return $this->hasOne(ImageUpload::class, 'product_id', 'product_id');
    }

    public function saveWishList($request)
    {
        $saveWishList = FavoriteProduct::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'paq_id' => $request->paq_id
        ]);
        return $saveWishList;
    }

    public function getWishlistById($id)
    {
        $wishList = FavoriteProduct::where('user_id', $id)->with('product', 'image', 'quantity')->orderBy('id', 'DESC')->get();
        return $wishList;
    }

    public function getWishlistProductById($id)
    {
        $wishListProduct = FavoriteProduct::where('id', $id)->first();
        return $wishListProduct;
    }

    public function getWishlistProductByIdProductId($useId, $productId)
    {
        $wishListProductFromDescription = FavoriteProduct::where('user_id', $useId)->where('product_id', $productId)->first();
        return $wishListProductFromDescription;
    }
}
