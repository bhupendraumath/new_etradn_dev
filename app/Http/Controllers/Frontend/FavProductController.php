<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ImageUpload;
use App\Models\ProductQuantity;
use App\Models\ProductReview;
use App\models\ProductCondition;
use App\Services\FileService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\models\FavoriteProduct;



class FavProductController extends Controller
{
    
    public function myUploadProductPost(Request $request)
    {

        if ($request->ajax()) {
            try {

                
                $productlist = FavoriteProduct::where('user_id', Auth::user()->id)
                    ->paginate($request->record);

                    
                $completeSessionView = view(
                    'frontend/buyer/my-favoute-product-list',
                    compact('productlist')
                )->render();

                if ($productlist->isNotEmpty()) {
                    return response()->json(
                        [
                            'success' => true,
                            'data' =>
                            [
                                'completeSessionView' => $completeSessionView
                            ]
                        ]
                    );
                }
                return response()->json(
                    [
                        'success' => true, 'data' =>
                        [
                            'completeSessionView' => $completeSessionView
                        ]
                    ]
                );
            } catch (\Exception $ex) {
                return response()->json(
                    [
                        'success' => false,
                        'data' => [],
                        'error' => ['message' => $ex->getMessage()]
                    ],
                    422
                );
            }
        }
    }

    public function addInFavList($product_id,$quantity_id){

        try{
            $user_details=Auth::user();

            if(!empty($user_details)){
                $user_id=Auth::user()->id;

                $fav_exists=new FavoriteProduct;
                $exists=$fav_exists->where(['product_id'=>$product_id,'paq_id'=>$quantity_id,'user_id'=>$user_id])
                ->get();
                
                if(count($exists)==0){
                    $fav=new FavoriteProduct;
                    $fav->product_id=$product_id;
                    $fav->paq_id=$quantity_id;
                    $fav->user_id=$user_id;

                    if($fav->save()){
                        return response()->json(
                            [
                                'success' => true, 'message' =>"Added in your favorite list."
                                
                            ]
                        );
                    }
                    else{
                        return response()->json(
                            [
                                'success' => false, 'message'=>"Please Try Again Later .."
                            ]
                        );
                    }
                }else{
                    return response()->json(
                        [
                            'success' => false, 'message'=>"Already Added"
                        ]
                    );
                }
            }
            else{
                return response()->json(
                    [
                        'success' => false, 'message'=>"Please Login first..."
                    ]
                );
            }
        }catch (\Exception $ex) {
            return response()->json(
                [
                    'success' => false,
                    'data' => [],
                    'error' => ['message' => $ex->getMessage()]
                ],
                422
            );
        }
    }

    public function deleteFavorite($fav_id){

        $user_id = Auth::guard('web')->user()->id;

        $delete=FavoriteProduct::whereId($fav_id)
        ->delete();
     
        return Redirect::back()->with('message', 'Delete Successfully');

    }

    public function allDeleteFavorite(){

        $user_id = Auth::guard('web')->user()->id;

        $delete=FavoriteProduct::whereUserId($user_id)
        ->delete();
     
        return Redirect::back()->with('message', 'Delete Successfully');

    }

    
}
