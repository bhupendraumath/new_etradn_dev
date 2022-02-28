<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'tbl_cart';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'seller_id',
        'product_id',
        'paq_id',
        'attribute_ids',
        'attribute_value_ids',
        'quantity',
        'price',
        'discount',
        'pro_condition',
        'is_checkout',
        'selling_type',
        'is_delete',
        'action',
        'product_array',
        'ip_address',
        'createdDate',
        'updatedDate',
    ];

    public function addCart($request) {
        $product = Product::where('id', $request->product_id)->first();
        $productJson = json_encode($product);
        $addCart = Cart::create([
            'customer_id' => $request->customer_id,
            'seller_id' => $request->seller_id,
            'product_id' => $request->product_id,
            'paq_id' => $request->paq_id,
            'attribute_ids' => $request->attribute_ids,
            'attribute_value_ids' => $request->attribute_value_ids,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount' => $request->discount,
            'pro_condition' => $request->pro_condition,
            'is_checkout' => $request->is_checkout,
            'selling_type' => $request->selling_type,
            'is_delete' => 'n',
            'action' => 'n',
            'product_array' => $productJson,
            'ip_address' => 0000,
            'createdDate' => Carbon::now(),
            'updatedDate' => Carbon::now(),
        ]);
        return $addCart;
    }

    /**
     * Get the product associated with the cart.
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    /**
     * Get the product IMAGE associated with the cart.
     */
    public function image()
    {
        return $this->hasOne(ImageUpload::class, 'product_id', 'product_id');
    }

    public function myCart($id) {
        $myCart = Cart::where('customer_id', $id)->where('is_checkout', 'n')->with('product', 'image')->orderBy('id', 'DESC')->get();
        return $myCart;
    }

    public function cartProductById($id) {
        $myCartProduct = Cart::where('id', $id)->first();
        return $myCartProduct;
    }

    public function quantityUpdate($id, $quantity) {
        $cart = Cart::where('id', $id)->update([
            'quantity' => $quantity
        ]);
        return $cart;
    }

    public function alreadyProductInUserCart($customerId, $productId) {
        $alreadyCartProduct = Cart::where('customer_id', $customerId)->where('product_id', $productId)->where('is_checkout', 'n')->orderBy('id', 'DESC')->first();
        if ($alreadyCartProduct) {
            return ["yes", $alreadyCartProduct->id, $alreadyCartProduct->quantity];
        } else {
            return "no";
        }
    }
}
