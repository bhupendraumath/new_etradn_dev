<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'customer_id' => 'required',
            'seller_id' => 'required',
            'product_id' => 'required',
            'paq_id' => 'required',
            'attribute_ids' => 'required',
            'attribute_value_ids' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'pro_condition' => 'required',
            'is_checkout' => 'required',
            'selling_type' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to save product',
                'error' => $validator->errors()
            ]);
        }
        $cart = new Cart();
        // is product in already in cart then add qunantity
        [$alreadyCartProduct, $cartId, $cartProductQuantity] = $cart->alreadyProductInUserCart($request->customer_id, $request->product_id);
        if ($alreadyCartProduct == "yes") {
            $quantity = $cartProductQuantity + $request->quantity;
            $increaseProductQuantity = $cart->quantityUpdate($cartId, $quantity);
            if ($increaseProductQuantity) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Added to cart successfully',
                    'success' => 'Added to cart successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Unable to update cart quantity',
                    'error' => 'Unable to update cart quantity'
                ]);
            }
        } else {
            $addCart = $cart->addCart($request);
            if ($addCart) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Added to cart successfully',
                    'success' => 'Added to cart successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Unable to add to cart',
                    'error' => 'Unable to add to cart'
                ]);
            }
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
        $cart = new Cart();
        $myCart = $cart->myCart($id);
        if ($myCart) {
            return response()->json([
                'status' => 200,
                'message' => 'My cart',
                'data' => $myCart
            ]);

        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to get my cart',
                'error' => 'Something went wrong'
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
            'quantity' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to update cart product quantity',
                'error' => $validator->errors()
            ]);
        }
        $cart = new Cart();
        $checkCart = $cart->cartProductById($id);
        if ($checkCart) {
            $cart->quantityUpdate($id, $request->quantity);
            return response()->json([
                'status' => 200,
                'message' => 'Cart product quantity Updated successfully',
                'success' => 'Cart product quantity Updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to update cart product quantity',
                'error' => 'Cart product not found'
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
        $cart = new Cart();
        $cartProductById = $cart->cartProductById($id);
        if ($cartProductById) {
            $cartProductById->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Product removed from cart successfully',
                'success' => 'Product removed from cart successfully'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to remove cart product',
                'error' => 'Something went wrong'
            ]);
        }
    }
}
