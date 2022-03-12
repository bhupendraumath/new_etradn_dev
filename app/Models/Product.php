<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductQuantity;
use App\Models\ProductReview;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_product';
    public $timestamps = false;
    use HasFactory;
    protected $with=['image','review','quantity','image_many','category'];
    protected $fillable = [
        'user_id',
        'cat_id',
        'sub_cat_id',
        'brand_id',
        'product_name',
        'product_desc',
        'warranty_desc',
        'product_nameArabic',
        'product_descArabic',
        'warranty_descArabic',
        'want_to_list',
        'bid_amount',
        'bid_ending_datetime',
        'refund_request',
        'number_of_days',
        'policy_description',
        'shipped_address_from',
        'shipping_type',
        'shipping_price',
        'admin_product_notification',
        'product_formfiledname',
        'product_formoutput',
        'productformnamearabic',
        'createdDate',
        'updatedDate'
    ];

    /**
     * Get the image associated with the product.
     */
    public function image()
    {
        return $this->hasOne(ImageUpload::class, 'product_id');
    }

    public function image_many()
    {
        return $this->hasMany(ImageUpload::class, 'product_id');
    }

    /**
     * Get the brand associated with the product.
     */
    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    /**
     * Get the Category associated with the product.
     */
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'cat_id');
    }

    /**
     * Get the SubCategory associated with the product.
     */
    public function subCategory()
    {
        return $this->hasOne(SubCategory::class, 'id', 'sub_cat_id');
    }

    /**
     * Get the quantit associated with the product.
     */
    public function quantity()
    {
        return $this->hasOne(ProductQuantity::class, 'product_id');
    }

    /**
     * Get the quantit associated with the product.
     */
    public function review()
    {
        return $this->hasMany(ProductReview::class, 'productId');
    }

    public function productById($id) {
        $product = Product::find($id);
        return $product;
    }

    public function storeProduct($request) {
        $product = Product::create([
            'user_id' => $request->user_id,
            'cat_id' => $request->category_id,
            'sub_cat_id' => $request->sub_category_id,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name_eng,
            'product_desc' => $request->product_description_eng ?? '',
            'warranty_desc' => $request->warranty_description_eng ?? '',
            'product_nameArabic' => $request->product_name_arb ?? '',
            'product_descArabic' => $request->product_description_arb ?? '',
            'warranty_descArabic' => $request->warranty_description_arb ?? '',
            'want_to_list' => $request->list_product,
            'bid_amount' => $request->bid_amount ?? 0,
            'bid_ending_datetime' => $request->bid_ending_date_time ?? Carbon::now(),
            'refund_request' => $request->refund_request,
            'number_of_days' => $request->number_of_days ?? 0,
            'policy_description' => $request->refund_policy_description ?? '',
            'shipped_address_from' => $request->shipped_address_from,
            'shipping_type' => $request->shipping_type,
            'shipping_price' => $request->shipping_price,
            'admin_product_notification' => 1,
            'product_formfiledname' => '',
            'product_formoutput' => '',
            'productformnamearabic' => '',
            'createdDate' => Carbon::now()
        ]);
        return $product;
    }

    public function updateProduct($request, $id) {
        $updateProduct = Product::where('id', $id)->update([
            'user_id' => $request->user_id,
            'cat_id' => $request->category_id,
            'sub_cat_id' => $request->sub_category_id,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name_eng,
            'product_desc' => $request->product_description_eng ?? '',
            'warranty_desc' => $request->warranty_description_eng ?? '',
            'product_nameArabic' => $request->product_name_arb ?? '',
            'product_descArabic' => $request->product_description_arb ?? '',
            'warranty_descArabic' => $request->warranty_description_arb ?? '',
            'want_to_list' => $request->list_product,
            'bid_amount' => $request->bid_amount ?? 0,
            'bid_ending_datetime' => $request->bid_ending_date_time ?? Carbon::now(),
            'refund_request' => $request->refund_request,
            'number_of_days' => $request->number_of_days ?? 0,
            'policy_description' => $request->refund_policy_description ?? '',
            'shipped_address_from' => $request->shipped_address_from,
            'shipping_type' => $request->shipping_type,
            'shipping_price' => $request->shipping_price,
            'admin_product_notification' => 1,
            'product_formfiledname' => '',
            'product_formoutput' => '',
            'productformnamearabic' => '',
            'updatedDate' => Carbon::now()
        ]);
        return $updateProduct;
    }

    public function subCategoryProducts($id) {
        $subCategoryProducts = Product::where('sub_cat_id', $id)->with('image' ,'quantity', 'review')
            ->where('is_delete', 'n')
            ->where('isActive', 'y')
            ->get();
        return $subCategoryProducts;
    }

    public function deleteProduct($id) {
        $deleteProduct = Product::where('id', $id)->update([
            'is_delete' => 'y'
        ]);
        return $deleteProduct;
    }

    // public function averageRating($product_id) {
    //     $total_user_rating = 0;
    //     $reviewProduct = ProductReview::where('productId',$product_id)->get();

    //     foreach($reviewProduct as $row)
    //     {
    //         $total_user_rating = $total_user_rating + $row["rating"];
    //     }
    //     return $deleteProduct;
    // }



}
