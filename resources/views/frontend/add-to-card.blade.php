@extends('layouts.frontend.app')

@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>SHOPPING CART</h3>

    </div>
</div>

<div class="banner-bootom-w3-agileits blog-our-top">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12 blog-our-aligment">
                                <div class="image-card-blog">
                                    <img src="{{url('assets/images/frontend/Layer_55.png')}}" alt="" srcset="">
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
                                <h3 class="cart-heading">A Standard Blog Post</h3>
                                <p class="whoareparagraph cart-add">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                </p>

                                <div class="row">
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
                                        <span class="item_price"><b>PRICE:</b> &nbsp;<del class="del">- $190 &nbsp;</del>
                                            &nbsp;&nbsp;<b>$100</b> </span><br/>
                                        <span class="item_price"><b>Shipping Amount:</b> &nbsp; <span  class="del">$20</span></span> <br />
                                        <span class="item_price"><b>Sub total:</b> &nbsp; <span
                                                class="uppercase del">$120</span></span><br />
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                                        <div class="quantity buttons_added cart-added-plus-minus">
                                            <input type="number" step="1" min="1" max="10" name="quantity" value="1"
                                                title="Qty" class="input-text qty text numberofdigits" size="4"
                                                pattern="" inputmode="">
                                            <input type="button" value="-" class="minus button_minus">
                                            <input type="button" value="+" class="plus button_plus">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <hr class="handle-margin"/>
            </div>

            <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
               <div class="card ">
                   <h4 class="delivery-address-cart"> <i class="fa fa-map-o orange"></i> DELIVERY ADDRESS</h4>
                    <hr/>
                    <button class="checkout-address-cart">
                        Add a Delivery Address to Checkout
                    </button>
                    <br/>
                    <br/>
                    <h4 class="delivery-address-cart"> <i class="fa fa-shopping-basket orange"></i> DELIVERY ADDRESS</h4>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
                            <span class="item_price"><b>PRICE:</b> &nbsp;<del class="del">- $190 &nbsp;</del>
                                &nbsp;&nbsp;<b>$100</b> </span><br/>
                            <span class="item_price"><b>Shipping Amount:</b> &nbsp; <span  class="del">$20</span></span> <br />
                            <span class="item_price"><b>Sub total:</b> &nbsp; <span
                                    class="uppercase del">$120</span></span><br />
                        </div>
                    </div>
                    <button class="continue">
                        Continue
                    </button>
               </div>
            </div>
        </div>

    </div>
</div>



<a href="#about" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;">
    </span></a>
@endsection