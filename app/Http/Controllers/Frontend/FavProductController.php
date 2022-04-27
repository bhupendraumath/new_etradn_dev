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
use App\Models\FavoriteProduct;
use DB;


class FavProductController extends Controller
{

    public function myUploadProductPost(Request $request)
    {


        if ($request->ajax()) {
            try {


                
                // $product =  DB::table('tbl_favorite_products')
                // ->select('tbl_favorite_products.*','tbl_product_attribute_quantity.quantity',
                // 'tbl_product.id','tbl_product.cat_id','tbl_product.sub_cat_id','tbl_product.brand_id',
                // 'tbl_product_attribute_quantity.price','tbl_product_attribute_quantity.id as q_id','tbl_product_attribute_quantity.discount','tbl_product_attribute_quantity.quantity','tbl_product_brand.brandName','tbl_product_brand.id as brand_id','tbl_product_sub_cat.subCategoryName','tbl_product_sub_cat.id as s_c_id','tbl_product_cat.categoryName','tbl_product_cat.id as c_id')
                // ->join('tbl_product','tbl_product.id','tbl_favorite_products.product_id')
                // ->leftJoin('tbl_product_attribute_quantity','tbl_product_attribute_quantity.product_id','=','tbl_product.id')
                // ->join('tbl_product_image','tbl_product_image.product_id','=','tbl_product.id')
                // ->join('tbl_product_cat','tbl_product_cat.id','=','tbl_product.cat_id')
                // ->join('tbl_product_sub_cat','tbl_product_sub_cat.id','=','tbl_product.sub_cat_id')
                // ->join('tbl_product_brand','tbl_product_brand.id','=','tbl_product.brand_id')
                // ->where('tbl_favorite_products.user_id', Auth::user()->id)
                // ->paginate($request->record);

                // dd($product);die;
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

    public function addInFavList($product_id, $quantity_id, $fav_id)
    {

        try {

            $user_details = Auth::user();

            if (!empty($user_details)) {

                $user_id = Auth::user()->id;

                $fav_exists = new FavoriteProduct();
                $exists = $fav_exists->where(['product_id' => $product_id, 'paq_id' => $quantity_id, 'user_id' => $user_id])
                    ->get();

                if (count($exists) == 0) {
                    $fav = new FavoriteProduct;
                    $fav->product_id = $product_id;
                    $fav->paq_id = $quantity_id;
                    $fav->user_id = $user_id;

                    if ($fav->save()) {
                        return response()->json(
                            [
                                'success' => true, 'message' => "Added in your favorite list."

                            ]
                        );
                    } else {
                        return response()->json(
                            [
                                'success' => false, 'message' => "Please Try Again Later .."
                            ]
                        );
                    }
                } else {
                    $find = FavoriteProduct::find($fav_id);
                    if ($find->delete()) {
                        return response()->json(
                            [
                                'success' => true, 'message' => "Removed in your favorite list."

                            ]
                        );
                    } else {
                        return response()->json(
                            [
                                'success' => false, 'message' => "Please Try Again Later .."
                            ]
                        );
                    }
                }
            } else {
                return response()->json(
                    [
                        'success' => false, 'message' => "Please Login first..."
                    ]
                );
            }
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

    public function deleteFavorite($fav_id)
    {

        try {
            $user_id = Auth::guard('web')->user()->id;

            $delete = FavoriteProduct::whereId($fav_id)
                ->delete();

            return response()->json(
                [
                    'success' => true, 'message' => "Delete Successfully"
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

    public function allDeleteFavorite()
    {

        try {
            $user_id = Auth::guard('web')->user()->id;

            $delete = FavoriteProduct::whereUserId($user_id)
                ->delete();
            return response()->json(
                [
                    'success' => true, 'message' => "Delete Successfully"
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
