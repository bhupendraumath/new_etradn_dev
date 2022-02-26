<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $table = 'tbl_product_review';
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'buyerId',
        'sellerId',
        'orderItemId',
        'productId',
        'description',
        'rating',
        'CreatedDate',
        'ipAddress'
    ];

    public function saveReview($request) {
        $saveReview = ProductReview::create([
            'orderItemId' => $request->order_item_id,
            'buyerId' => $request->buyer_id,
            'sellerId'=> $request->seller_id,
            'productId'=> $request->product_id,
            'description'=> $request->description,
            'rating' => $request->rating,
            'CreatedDate' => Carbon::now(),
            'ipAddress' => ''
        ]);
        return $saveReview;
    }

    public function product() {
        return $this->belongsTo(Product::class, 'productId', 'id');
    }

    public function buyer() {
        return $this->belongsTo(User::class, 'buyerId', 'id');
    }

    public function sellerProductsReviews($id) {
        $reviews = ProductReview::where('sellerId', $id)
            ->with(array('product' => function($query) {
                $query->select('id','product_name','product_nameArabic');
            }))
            ->with(array('buyer' => function($query) {
                $query->select('id','firstName','lastName');
            }))
            ->orderBy('id', 'DESC')->get();
        return $reviews;
    }
}
