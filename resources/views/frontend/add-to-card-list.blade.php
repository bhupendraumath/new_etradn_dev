<div class="banner-bootom-w3-agileits blog-our-top">
    <div class="container">
        @if(!empty($cart_details) && count($cart_details)!=0)
        <div class="row">
            <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
                @php
                $arr_cart_id=array();
                @endphp
                @foreach($cart_details as $detail)
                <div class="row">
                    @php
                    $index=$loop->index;                   
                    array_push($arr_cart_id,$detail->id);
                    
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
                        
                        <input type="radio" <?php if($loop->index==0){ echo 'checked';}?> class="radio" id="{{$ads->id}}" name="fav_language" value="{{$ads->id}}">
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
                    <a href="{{url('/')}}">
                    <button class="continue" >
                       
                        Continue
                    </button>
                    </a>

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
        
            <!-- Modal HTML -->
    <div id="myModalPayment" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Choose a method of payment</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="color:black">
                    <div class="payment-type">
                        <h3>Payment Type</h3>
                        <div class="custom-radio">
                            <input type="radio" class="radio" checked id="cod" value="cod" name="payment_type">
                            <label for="cod" class="change_style_family">Wire transfer /Cash on Delivery</label><br/>
                            <input type="radio" class="radio"  id="bank" value="bank" name="payment_type">
                            <label for="bank" class="change_style_family">BANK TRANSFER</label>
                            <br/><br/>

                            <div id="bank_list_div" class="row" style="display:none">
                                <!--<h3>{AVAILABLE_BANKS}</h3>-->
                                <h3 style="margin-left: 13px;">Available Banks</h3>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <img style="width: 100%; height: 55px;" src="https://etradn.com/admin-nct/modules-nct/bank-nct/bank_logo/auto-784000_960_720.jpg"> 
                                    <p id="info_heading">bank Name: &nbsp;&nbsp; Test Bank</p>
                                    <p id="info_heading">Account Name: &nbsp;&nbsp; Account 1</p>
                                    <p id="info_heading">Account No: &nbsp;&nbsp; 12345678</p>
                                    <p id="info_heading">Account Iban: &nbsp;&nbsp; asd23e</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <img style="width: 100%; height: 55px;" src="https://etradn.com/admin-nct/modules-nct/bank-nct/bank_logo/436860.jpg"> 
                                    <p id="info_heading">bank Name: &nbsp;&nbsp; Test Bank</p>
                                    <p id="info_heading">Account Name: &nbsp;&nbsp; Account 2</p>
                                    <p id="info_heading">Account No: &nbsp;&nbsp; 1234567890</p>
                                    <p id="info_heading">Account Iban: &nbsp;&nbsp; TEST123</p>
                                </div>
                            </div>
                            <h3>Total Amount : ${{$total_amount}}</h3>
                        </div>
                    </div>
                </div>
                <div class="modal-footer add-css-changes">
                    <!-- <form action="">
                        <input type="hidden" name="buyer_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="txn_id" value="{{'O-'.time()}}">
                        <input type="hidden" name="txn_fee" value="0.00">
                        <input type="hidden" name="payer_email" value="{{Auth::user()->email}}">
                        <input type="hidden" name="receiver_email" value="">
                        <input type="hidden" name="transaction" value="">
                        <input type="hidden" name="order_number" value="{{'odr_'.time()}}">
                        <input type="hidden" name="shipping_address" value="indore">
                        <input type="hidden" name="admin_commission_per" value="5">

                        <?php

                            $admin_commision=$total_amount*5/100;
                            $seller_amount=$total_amount-$admin_commision;
                        ?>

                        <input type="hidden" name="admin_commission" value="{{$admin_commision}}">
                        <input type="hidden" name="seller_amount" value="{{$seller_amount}}">
                        <input type="hidden" name="shipping_address" value="indore">
                    </form> -->
                    @if(!empty($cart_details) && count($cart_details)!=0)
                    <input type="hidden" id="arr_value_ids" value="<?php echo json_encode($arr_cart_id); ?>">
                    @endif
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveButton()">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/frontend/product/cart-list.js') }}"></script>
<script>
    $(document).ready(function(){
        $(".pay").click(function(){
            $("#myModalPayment").modal('show');
        });
    });

    var payment_type="cod";
    var shipping_address='indore';

    function saveButton(){
        console.log(" payment_type " ,payment_type)
        var arr=$('#arr_value_ids').val();

             $.ajax({
                url: "{{url('order-product')}}",
                type: "POST",
                data: {
                    car_ids_arr: arr,
                    payment_type:payment_type,
                    shipping_address:shipping_address
                },
                processData: true,
                contentType: false,
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                dataType: 'JSON',
                cache: false,
                success: function success(response) {
                    console.log("response   ",response)
                    toastr.clear();
                    // btn.html('Save');
                    toastr.success(response.message, { timeOut: 1000 });
                    aftercheckout();
                    window.location.href="{{url('/purchase_history')}}"



                },
                error: function error(data) {
                    toastr.clear();
                    toastr.error(response.message, { timeOut: 1000 });
                    aftercheckout();
                    window.location.reload();

                }
            });
    }

    $('#bank').click(function(){
        console.log("clickme")
        payment_type="bank";
        $("#bank_list_div").attr("style", "display:block");


    })

    $('#cod').click(function(){
        console.log("clickme")
        payment_type="cod";
        $("#bank_list_div").attr("style", "display:none");

    })
    
</script>