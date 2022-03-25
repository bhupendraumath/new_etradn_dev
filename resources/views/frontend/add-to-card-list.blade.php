<div class="banner-bootom-w3-agileits blog-our-top">
    <div class="container">
        @if(!empty($cart_details) && count($cart_details)!=0)
        <div class="row">
            <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
                @foreach($cart_details as $detail)
                <div class="row">
                    @php
                    $index=$loop->index;
                    @endphp

                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12 blog-our-aligment">
                                <div class="background-gray uploaded-image-edited">
                                    @if(!empty($detail->image->product_img))
                                    <img src="{{url('assets/images/product-images/'.$detail->image->product_img)}}" alt="" srcset="" onerror="this.src='{{url('assets/images/default.png')}}';" />
                                    @else
                                    <img src="{{url('assets/images/default.png')}}" alt="" srcset="" />
                                    @endif
                                    
                                    <div class="hover-icons">
                                    <!-- return confirm('Are you sure,want to remove? ') -->
                                        <a href="#">                        
                                            <button class="circle" onclick="deleteCartProduct({{$detail->id}})"><i class="fa fa-trash-o color-delete"></i> </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
                                <h3 class="cart-heading"> {{$detail->product->product_name}}</h3>
                                <p class="whoareparagraph cart-add">
                                    {{$detail->product->product_desc}}
                                </p>


                                <div class="row">
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
                                        <span class="item_price"><b>PRICE:</b> &nbsp;
                                            <del class="del">-
                                                ${{$detail->price}} &nbsp;
                                            </del>&nbsp;&nbsp;
                                            <b>
                                                ${{($detail->price - ($detail->price*$detail->discount/100))*$detail->quantity}}
                                                &nbsp;&nbsp;&nbsp;
                                            </b>
                                            <input type="hidden"
                                                value="{{$detail->price - $detail->price*$detail->discount/100}}"
                                                id="price_per_product-{{$index}}">
                                            <span id="price_with_respect_quantity-{{$index}}"> </span>
                                        </span><br />


                                        <span class="item_price">
                                            <b>Shipping Amount:</b> &nbsp;
                                            <span class="del">
                                                @if($detail->product->shipping_type=='f')
                                                Free
                                                @else
                                                ${{$detail->product->shipping_price}}</span>
                                            @endif
                                        </span> <br />

                                        <span class="item_price">
                                            <b>Sub total:</b> &nbsp;
                                            <span class="uppercase del" id="including_shipping-{{$index}}">
                                                ${{$detail->product->shipping_price+ (($detail->price - $detail->price*$detail->discount/100)*$detail->quantity)}}</span>
                                        </span><br />

                                        <input type="hidden" value="{{$detail->product->shipping_price}}"
                                            id="shipping_price-{{$index}}">
                                        <input type="hidden" name="price" value="{{$detail->price}}">

                                        <input type="hidden" name="discount" value="{{$detail->discount}}">
                                        <input type="hidden" name="discount" id="value_id-{{$index}}" value="{{$detail->id}}">

                                    </div>
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                                        <div class="quantity buttons_added cart-added-plus-minus">

                                            <input type="number" step="1" min="1" id="value_quantity-{{$index}}"
                                                max="{{$detail->productquantity->quantity}}" name="quantity" value="{{$detail->quantity}}" title="Qty"
                                                class="input-text qty text numberofdigits" size="{{$detail->productquantity->quantity-1}}" pattern=""
                                                inputmode="">

                                            <input type="button" value="-" id="get_value_minus-{{$index}}"
                                                class="minus button_minus">

                                            <input type="button" value="+" id="get_value_plus-{{$index}}"
                                                class="plus button_plus">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <hr class="handle-margin" />
                @endforeach
            </div>

            <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                <div class="card ">
                    <h4 class="delivery-address-cart"> <i class="fa fa-map-o orange"></i> DELIVERY ADDRESS</h4>
                    <hr />
                    @if(empty($address)||count($address)==0)
                    <button class="checkout-address-cart" >
                    <a href="{{route('add-delivery-area-buyer')}}" > Add a Delivery Address to Checkout</a>
                       
                    </button>
                    @else
                    <div>
                        Please select Address <span style="color:red">*</span><br/><br/>
                        @foreach($address as $ads)
                        <input type="radio" class="radio" id="{{$ads->id}}" name="fav_language" value="{{$ads->id}}">
                        <label class="label-address" for="{{$ads->id}}">{{$ads->name}},{{$ads->street_name}},{{$ads->address1}} ,{{$ads->city}}                      
                        </label>
                        <br>
                        @endforeach
                    </div>
                    @endif
                    <br />

                    <h4 class="delivery-address-cart"> <i class="fa fa-shopping-basket orange"></i> DELIVERY ADDRESS
                    </h4>
                    <hr />

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
                            <span class="item_price">
                                <b>PRICE:</b>

                                &nbsp;
                                <del class="del">- ${{$without_discount}} &nbsp;</del>
                                &nbsp;&nbsp;<b>${{$with_discount}}</b>
                            </span><br />

                            <span class="item_price"><b>Shipping Amount:</b> &nbsp; <span class="del">
                            @if($shipping_price==0)
                            Free
                            @else
                            ${{$shipping_price}}
                            @endif    
                            </span></span>
                            <br />
                            <span class="item_price"><b>Sub total:</b> &nbsp; <span
                                    class="uppercase del">${{$total_amount}}</span></span><br />
                        </div>
                    </div>
                    <button class="continue">
                        Continue
                    </button>
                    <button class="continue pay">
                        Pay
                    </button>
                </div>
            </div>
        </div>

        @else
        <div class="height-top-bottom">
            <h2>No products!</h2>
        </div>
        @endif
        
    </div>
</div>

<script src="{{ asset('assets/js/frontend/product/cart-list.js') }}"></script>
