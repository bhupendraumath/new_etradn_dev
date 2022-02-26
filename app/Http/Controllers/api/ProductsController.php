<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use App\Models\ImageUpload;
use App\Models\ProductQuantity;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public $product;
    public $productImage;
    public $productQuantity;
    public $productReview;
    public $favoriteProduct;

    public function __construct() {
        $this->product = new Product();
        $this->productImage = new ImageUpload();
        $this->productQuantity = new ProductQuantity();
        $this->productReview = new ProductReview();
        $this->favoriteProduct = new FavoriteProduct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('image', 'brand', 'category', 'subCategory' ,'quantity', 'review')
            ->where('is_delete', 'n')
            ->where('isActive', 'y')
            ->get();
        if ($products) {
            return response()->json([
                'status' => 200,
                'message' => 'Products are',
                'data' => $products
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong',
                'data' => []
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'product_name_eng' => 'required',
            'list_product' => 'required',
            'refund_request' => 'required',
            'shipped_address_from' => 'required',
            'shipping_type' => 'required',
            'image_name' => 'required',
            'condition_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'discount' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to save product',
                'error' => $validator->errors()
            ]);
        }
        $saveProduct = $this->product->storeProduct($request);
        if ($saveProduct) {
            //Save image
            $this->productImage->saveImageProduct($saveProduct->id, $request->image_name);
            //save PAQ
            $this->productQuantity->createORUpdatePAQ($saveProduct->id, $request);
            return response()->json([
                'status' => 200,
                'message' => 'Product saved successfully',
                'success' => 'Product saved successfully'
            ]);

        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to save product',
                'error' => 'Unable to save product'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::where('id', $id)->with('image', 'brand', 'category', 'subCategory' ,'quantity', 'review')->get();
        if ($products) {
            return response()->json([
                'status' => 200,
                'message' => 'Product detail',
                'data' => $products
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong',
                'data' => []
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'product_name_eng' => 'required',
            'list_product' => 'required',
            'refund_request' => 'required',
            'shipped_address_from' => 'required',
            'shipping_type' => 'required',
            'image_name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to save product',
                'error' => $validator->errors()
            ]);
        }
        $getProduct = $this->product->productById($id);
        if($getProduct) {
            $updateProduct = $this->product->updateProduct($request, $id);
            if ($updateProduct) {
                //update image
                $this->productImage->updateImageProduct($id, $request->image_name);
                //update PAQ
                $this->productQuantity->createORUpdatePAQ($id, $request);
                return response()->json([
                    'status' => 200,
                    'message' => 'Product updated successfully',
                    'success' => 'Product updated successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Product not updated',
                    'error' => 'Product not updated'
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found',
                'error' => 'Product not found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getProduct = $this->product->productById($id);
        if ($getProduct) {
            $this->product->deleteProduct($id);
            return response()->json([
                'status' => 200,
                'message' => 'Product deleted successfully',
                'success' => 'Product deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found',
                'error' => 'Product not found'
            ]);
        }
    }

    public function filter(Request $request) {
        $brands = isset($request->brands_id);
        $filter = Product::query();
        if ($brands) {
            $brandsId = $request->brands_id;
            $brandsIdArray = explode(', ', $brandsId);
            $products = $filter->whereIn('brand_id', $brandsIdArray);
        }
        $filteredProducts = $products->with('image', 'brand', 'category', 'subCategory' ,'quantity', 'review')
            ->where('is_delete', 'n')
            ->where('isActive', 'y')
            ->get();
        return response()->json([
            'status' => 200,
            'message' => 'Filter products are',
            'data' => $filteredProducts
        ]);
    }

    public function reviewProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'order_item_id' => 'required',
            'buyer_id' => 'required',
            'seller_id' => 'required',
            'product_id' => 'required',
            'description' => 'required',
            'rating' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Please provide rating',
                'error' => $validator->errors()
            ]);
        }
        $saveReview = $this->productReview->saveReview($request);
        if ($saveReview) {
            return response()->json([
                'status' => 200,
                'message' => 'Product review saved successfully',
                'success' => 'Product review successfully'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to review',
                'error' => 'unable to review'
            ]);
        }
    }

    public function addWishListProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'product_id' => 'required',
            'paq_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to save wishlist',
                'error' => $validator->errors()
            ]);
        }
        $checkWishList = $this->favoriteProduct->getWishlistProductByIdProductId($request->user_id, $request->product_id);
        if ($checkWishList == null) {
            $saveWishList = $this->favoriteProduct->saveWishList($request);
            if ($saveWishList) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Wish list saved successfully',
                    'success' => 'Wish list saved successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Unable to save wish list',
                    'error' => 'Unable to save wish list'
                ]);
            }
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'Product is already added in wishlist',
                'success' => 'Product is already added in wishlist'
            ]);
        }
    }

    public function myWishListProduct($id){
        $myWishList = $this->favoriteProduct->getWishlistById($id);
        if ($myWishList) {
            return response()->json([
                'status' => 200,
                'message' => 'Wish list ',
                'data' => $myWishList
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to get wish list',
                'error' => 'Unable to get wish list'
            ]);
        }
    }

    public function deleteWishListProduct($id) {
        $wishListProduct = $this->favoriteProduct->getWishlistProductById($id);
        if ($wishListProduct) {
            $wishListProduct->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Product removed from wish list successfully',
                'success' => 'Product removed from wish list successfully'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to get wish list product',
                'error' => 'Some thing went wrong'
            ]);
        }
    }

    public function subCategoryProducts($id) {
        $subCategory = $this->product->subCategoryProducts($id);
        return $subCategory;
    }

    public function deleteWishListProductFromDescription(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'product_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to update account',
                'error' => $validator->errors()
            ]);
        }
        $wishListProductFromDescription = $this->favoriteProduct->getWishlistProductByIdProductId($request->user_id, $request->product_id);
        if ($wishListProductFromDescription) {
            $wishListProductFromDescription->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Product removed from wish list successfully',
                'success' => 'Product removed from wish list successfully'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to get wish list product',
                'error' => 'Some thing went wrong'
            ]);
        }
    }

    public function search($search) {
        $products = Product::where('product_name', 'LIKE', '%'.$search.'%')->with('image', 'brand', 'category', 'subCategory' ,'quantity', 'review')
            ->where('is_delete', 'n')
            ->where('isActive', 'y')
            ->get();
        return response()->json([
            'status' => 200,
            'message' => 'Searched products are',
            'data' => $products
        ]);
    }

    public function sellerProducts($id) {
        $products = Product::where('user_id', $id)->with('image', 'brand', 'category', 'subCategory' ,'quantity', 'review')
            ->where('is_delete', 'n')
            ->get();
        if ($products) {
            return response()->json([
                'status' => 200,
                'message' => 'Seller products are',
                'data' => $products
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No product found',
                'data' => []
            ]);
        }
    }

    public function sellerProductsReviews($id) {
        $sellerProductReviews = $this->productReview->sellerProductsReviews($id);
        if ($sellerProductReviews) {
            return response()->json([
                'status' => 200,
                'message' => 'Seller products reviews are',
                'data' => $sellerProductReviews
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No product review found',
                'data' => []
            ]);
        }
    }
}
