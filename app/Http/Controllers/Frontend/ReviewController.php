<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductReview;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


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

        $product=ProductReview::where("productId",$request->id)
        ->orderBy("id",'desc')
        ->get();


        foreach($product as $row)
        {
            $review_content[] = array(
                'user_name'		=>	"test",
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

            // $productlist = Product::withOut(['quantity','image_many','category'])
            // ->where('user_id', Auth::user()->id)
            // ->get();
    
            $userid=Auth::user()->id;
            $productreview=new ProductReview;

            $productlist=$productreview->with(['product'=>function($q) use($userid) {
                $q->whereUserId($userid)->get();
            }])
            ->get();

            return view('frontend/seller/review-rating',
            compact(
                'productlist',
            ));

    }
}
