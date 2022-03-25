<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shoppingcart()
    {   
        $buyer=Auth::user();

        if(!empty($buyer)){
            $buyer_id=$buyer->id;
            $cart_details=Cart::with(['product','image','productquantity'])
            ->where(['customer_id'=>$buyer_id,'is_checkout'=>'n','is_delete'=>'n'])
            ->get();  
            return view('frontend/add-to-card',compact('cart_details'));  

            // return view('frontend/add-to-card',['cart_details'=>$cart_details]);
        }
        else{
            return redirect('sign-in');
        }
        
    }


    public function cartListing(Request $request)
    {

        if ($request->ajax()) {
            try {
                $buyer=Auth::user();

                $buyer_id=$buyer->id;
                $cart_details=Cart::with(['product','image'])
                ->where(['customer_id'=>$buyer_id,'is_checkout'=>'n','is_delete'=>'n'])
                ->orderBy('id', 'DESC')
                ->get();  

                $without_discount=0;
                $with_discount=0;
                $total_discount=0;
                $shipping_price=0;
                $total_amount=0;

                foreach($cart_details as $details){

                    $without_discount=$without_discount+($details->price*$details->quantity);

                    $shipping_price+=$details->product->shipping_price;

                    $with_discount=$with_discount+(($details->price - ($details->price*$details->discount/100))*$details->quantity);

                }

                $total_amount=$with_discount+$shipping_price;
                $address=Address::where(['userId'=>$buyer_id,'isActive'=>'y','address_type'=>'delivery'])
                ->get();
                $completeSessionView = view(
                    'frontend/add-to-card-list')
                    ->with([
                            'cart_details'=>$cart_details,
                            'without_discount'=>$without_discount,
                            'shipping_price'=>$shipping_price,
                            'with_discount'=>$with_discount,
                            'total_amount'=>$total_amount,
                            'address'=>$address
                            ])
                    ->render();

                    // ,'without_discount'=>$without_discount

                if ($cart_details->isNotEmpty()) {
                    return response()->json(
                        [
                            'success' => true,
                            'data' =>
                            [
                                'completeSessionView' => $completeSessionView,
                                'total_amount'=>$total_amount
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

    public function cartAdd(Request $request){
        if ($request->ajax()){

            try {

                $cart=Cart::create($request->all());
                
                if(!empty($cart)) {
                    return response()->json(
                        [
                            'success' => true,
                           'message'=>"Successfully updated"
                        ]
                    );
                }
                return response()->json(
                    [
                        'success' => true, 
                        'message'=>"failed"
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
    public function cartEdit(Request $request){
        if ($request->ajax()){

            try {
                $buyer_id=Auth::user();
                $card=Cart::find($request->id);
                $card->quantity=$request->quantity;
                
                if ($card->save()) {
                    return response()->json(
                        [
                            'success' => true,
                           'message'=>"Successfully updated"
                        ]
                    );
                }
                return response()->json(
                    [
                        'success' => true, 
                        'message'=>"failed"
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


    public function cartDelete(Request $request){
        if ($request->ajax()){

            try {
                $buyer_id=Auth::user();
                $card=Cart::find($request->id);
                $card->is_delete='y';
                
                if ($card->save()) {
                    return response()->json(
                        [
                            'success' => true,
                           'message'=>"Successfully updated"
                        ]
                    );
                }
                return response()->json(
                    [
                        'success' => true, 
                        'message'=>"failed"
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
    public function myorder(){


        $userid=Auth::user()->id;

        $productlist = OrderItem::where('seller_id',$userid)
                    ->orderBy("id",'desc')
                    ->paginate(2);

        return view('frontend/seller/my-order',
        compact(
            'productlist',
        ));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
