<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductReview;
use App\Models\OrderItem;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function checking_order_existing(Request $request){
        
        $product_review=ProductReview::where(['buyerId'=>$request->buyerId,
                    'sellerId'=>$request->seller_id,
                    'productId'=>$request->productId
                    ])
                    ->get();

                    
        if(count($product_review)==0){
           

            $buyerId=$request->buyerId;
            $order_item=OrderItem::with(['getOrder'=>function($q) use($buyerId){
                $q->where("buyer_id",$buyerId);
            }])
            ->where('seller_id',$request->seller_id)
            ->get();

            $order_id='';



            if(!empty($order_item)){

                for($i=0;$i<count($order_item);$i++){
                   
                    if(!empty($order_item[$i]['product_detail_1'])){

                    $encode=json_encode($order_item[$i]['product_detail_1']);
                    $decode=json_decode($encode,true);

                    $my_str_arr = preg_split ("/,/", $decode);
                    $id_convert=preg_split ("/{/", $my_str_arr[0]);
                    $id_remove=  preg_split ('/"id":/', $id_convert[1]);
                    $id_remove2=  preg_split ('/"/', $id_remove[1]);
                    // $product_id=$id_remove2[1];
                    if(!empty($id_remove2[0])){
                        $product_id=$id_remove2[0];
                        }
                        else{                            
                        $product_id=$id_remove2[1];
                        }

                    if($product_id==$request->productId){
                        $order_id=$order_item[$i]['id'];
                        // return $order_id;
                        return response()->json(
                            [
                                'success' => true,
                                'message'=>'Order id exist',
                                'data' =>
                                ['orderId'=>$order_id]
                                
                            ]
                        );
                    }
                    else{
                        if($i==count($order_item)-1)
                        return response()->json(
                            [
                                'success' => false,
                                'message'=>'Order id not exist',
                                'data' =>
                                ['orderId'=>$order_id]
                                
                            ]
                        );
                    }
                    
                   /* if($product_id==$request->productId){

                        $order_id=$order_item[$i]['id'];
                        // return $order_id;
                        return response()->json(
                            [
                                'success' => true,
                                'message'=>'Order id exist',
                                'data' =>
                                ['orderId'=>$order_id]
                                
                            ]
                        );

                    }
                   */
                    }
                }               

            }
            else{
                // return $order_id;
                return response()->json(
                    [
                        'success' => false,
                        'message'=>'Order id not exist',
                        'data' =>
                        ['orderId'=>$order_id]
                        
                    ]
                );
            }
        }
        else{
            return response()->json(
                [
                    'success' => false,
                    'message'=>'You are already submitted Review & Rating.',
                    'data' =>$product_review
                    
                ]
            );
        }
    }

    public function submit_rating(Request $request ){

        $product=ProductReview::create($request->all());

        if(!empty($product)){
            return response()->json(
                [
                    'success' => true,
                    'message'=>'Your Review & Rating Successfully Submitted',
                    'data' =>
                    [
                        'data' => $product
                    ]
                ]
            );
        }
        else{

            return response()->json(
                [
                    'success' => false,
                    'message'=>'Failed try again leter',
                    
                     'data' => $product
                    
                ]
            );
        }
    }

    public function submit_rating_load(Request $request){

        $average_rating = 0;
        $total_review = 0;
        $five_star_review = 0;
        $four_star_review = 0;
        $three_star_review = 0;
        $two_star_review = 0;
        $one_star_review = 0;
        $total_user_rating = 0;
        $review_content = array();

        $product=ProductReview::with("user")->where("productId",$request->id)
        ->orderBy("id",'desc')
        ->get();


        // print_r($product);die;
        foreach($product as $row)
        {
            $review_content[] = array(
                'user_name'		=>	$row->user->firstName,
                'user_review'	=>	$row["description"],
                'rating'		=>	$row["rating"],
                // 'datetime'		=>	date('l jS, F Y h:i:s A', $row["createdDate"])
                'datetime'		=>	$row["createdDate"]
                
            );

            if($row["rating"] == '5')
            {
                $five_star_review++;
            }

            if($row["rating"] == '4')
            {
                $four_star_review++;
            }

            if($row["rating"] == '3')
            {
                $three_star_review++;
            }

            if($row["rating"] == '2')
            {
                $two_star_review++;
            }

            if($row["rating"] == '1')
            {
                $one_star_review++;
            }

            $total_review++;

            $total_user_rating = $total_user_rating + $row["rating"];

        }

        $average_rating = $total_user_rating / $total_review;

        $output = array(
            'average_rating'	=>	number_format($average_rating, 1),
            'total_review'		=>	$total_review,
            'five_star_review'	=>	$five_star_review,
            'four_star_review'	=>	$four_star_review,
            'three_star_review'	=>	$three_star_review,
            'two_star_review'	=>	$two_star_review,
            'one_star_review'	=>	$one_star_review,
            'review_data'		=>	$review_content
        );

        // $product=ProductReview::create($request->all());

        if(!empty($product)){
            return response()->json(
                [
                    'success' => true,
                    'message'=>'Success',
                    'data' =>$output
                  
                ]
            );
        }
        else{

            return response()->json(
                [
                    'success' => false,
                    'message'=>'Failed try again leter',
                    'data' =>
                    [
                        'data' => $output
                    ]
                ]
            );
        }
    }
    public function review_rating()
    {
    
            $userid=Auth::user()->id;
            $productlist = ProductReview::where('sellerid',$userid)
            ->with('product')
            ->paginate(4);

            return view('frontend/seller/review-rating',
            compact(
                'productlist',
            ));

    }





}
