<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use DB;

class ProductReview extends Model
{
    protected $table = 'tbl_product_review';
    use HasFactory;
    public $timestamps = false;
    // public $with=['review_average'];

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

    public function user(){
        return $this->belongsTo(User::class, 'buyerId', 'id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'productId', 'id');
    }

    public function product_details($userid){

        $product=  Product::where('user_id',$userid);
        return $product;
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


    public function review_average($product_id)
    {
    
            // $userid=Auth::user()->id;
           $total_review=0;
           $total_rating=0;
            $average_review = ProductReview::where('productId',$product_id)
            ->get();

            foreach($average_review as $row){
                $total_review++;
                $total_rating=$total_rating+$row['rating'];
            }

            if($total_review!=0){
              return ($total_rating/$total_review);
            } 
            else{
                return 0;
            }  
    }
}
