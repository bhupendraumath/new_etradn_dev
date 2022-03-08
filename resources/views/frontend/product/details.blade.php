@extends('layouts.frontend.app')

@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->

<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>{{$product_details['product_name']}}</span></h3>

    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits product-details">
    <div class="container">
        <div class="col-md-5 single-right-left ">
            <div class="grid images_3_of_2" style="">
                <div class="flexslider">

                    <ul class="slides">

                        @if(!empty($product_details))
                            @foreach($product_details['image_many'] as $imgList)
                            <li data-thumb="{{url('assets/images/product-images/'.$imgList->product_img)}}">
                                <div class="thumb-image add-class"> 
                                <img src="{{url('assets/images/product-images/'.$imgList->product_img)}}" data-imagezoom="true" class="img-responsive">
                                 </div>
                            </li>
                            @endforeach
                          
                        @else

                        
                        <li data-thumb="{{url('assets/images/product-images/NicePng_rakhi-clipart-png_3611849.png')}}">
                            <div class="thumb-image add-class"> <img src="{{url('assets/images/product-images/NicePng_rakhi-clipart-png_3611849.png')}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        @endif
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 single-right-left simpleCart_shelfItem">
            <h3 class="product-details-heading">{{$product_details['product_name']}} </h3>
            <p class="product-details-page">{{$product_details['product_desc']}}</p>
            <p>


            
            <input type="hidden" id="rating_value" value="{{$product_details->review[0]['rating']}}">
            <div class="rating1">
                <span class="starRating">
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5">5</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input id="rating3" type="radio" name="rating" value="3" >
                    <label for="rating3">3</label>
                    <input id="rating2" type="radio" name="rating" value="2"  >
                    <label for="rating2">2</label>
                    <input id="rating1" type="radio" name="rating" value="1" >
                    <label for="rating1">1</label>
            
                </span>
            </div>
            <span class="item_price"><b>PRICE:</b> &nbsp;<del>- ${{$product_details->quantity->price}} &nbsp;</del> &nbsp;&nbsp;<b>${{$product_details->quantity->price - $product_details->quantity->discount}}</b> </span> </p>

             <div class="row">
                <div class="col-md-2 col-6 col-sm-2 col-xs-12">
                        <div class="quantity buttons_added">
                        <input type="number" step="1" min="1" max="{{$product_details->quantity->quantity}}" name="quantity" value="1" title="Qty" class="input-text qty text numberofdigits" size="4" pattern="" inputmode="">
                        <input type="button" value="-" class="minus button_minus">
                        <input type="button" value="+" class="plus button_plus">
                        
                    </div>
                </div>


                <div class="col-md-10 col-12 col-sm-12 col-xs-12">
                    <div class="occasion-cart">
                        <div class="snipcart-details top_brand_home_details item_add single-item button2">
                            <form action="#" method="post">
                                <fieldset>
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="1">
                                    <input type="hidden" name="business" value=" ">
                                    <input type="hidden" name="item_name" value="Wing Sneakers">
                                    <input type="hidden" name="amount" value="650.00">
                                    <input type="hidden" name="discount_amount" value="1.00">
                                    <input type="hidden" name="currency_code" value="USD">
                                    <input type="hidden" name="return" value=" ">
                                    <input type="hidden" name="cancel_return" value=" ">
                                    <input type="submit" name="submit" value="Add to cart" class="button">
                                </fieldset>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <span class="item_price"><b>SKU:</b> &nbsp; IFF_grapes_186</span> <br />
            <span class="item_price"><b>Category:</b> &nbsp; <span class="uppercase">{{$product_details['category']['categoryName']}}</span></span><br />
            <!-- <span class="item_price"><b>Tags:</b> &nbsp; Casual, Fashion, Loose, Stylish</span> -->


            <ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
                <li class="share">SOCIAL MEDIA SHARE : </li>
                <li><a href="#">
                        <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                    </a></li>
                <li><a href="#">
                        <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                    </a></li>
                <li><a href="#">
                        <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                    </a></li>

            </ul>

        </div>
        <div class="clearfix"> </div>
        <!-- /new_arrivals -->

        <div class="container">

            <div class="responsive_tabs_agileits">
                <div id="horizontalTab">
                    <ul class="resp-tabs-list">
                        <li>Description</li>
                        <li>Reviews</li>
                        <li>Information</li>
                    </ul>
                    <div class="resp-tabs-container">
                        <!--/tab_one-->
                        <div class="tab1">

                            <div class="single_page_agile_its_w3ls">
                                <!-- <h6>Lorem ipsum dolor sit amet</h6> -->
                                <p>{{$product_details['product_desc']}}</p>
                               
                            </div>
                        </div>
                        <!--//tab_one-->
                        <div class="tab2">

                            <div class="single_page_agile_its_w3ls">
                                <div class="bootstrap-tab-text-grids">
                                    <div class="bootstrap-tab-text-grid">
                                        <div class="bootstrap-tab-text-grid-left">
                                            <img src="{{url('assets/images/frontend/t1.jpg')}}" alt=" " class="img-responsive">
                                        </div>
                                        <div class="bootstrap-tab-text-grid-right">
                                            <ul>
                                                <li><a href="#">Admin</a></li>
                                                <li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</a></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                                                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem
                                                vel eum iure reprehenderit.</p>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="add-review">
                                        <h4>add a review</h4>
                                        <form action="#" method="post">
                                            <input type="text" name="Name" placeholder="Name" required="Name">
                                            <input type="email" placeholder="Email" name="Email" required="Email">
                                            <textarea name="Message" placeholder="Message" required=""></textarea>
                                            <input type="submit" value="SEND">
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab3">

                            <div class="single_page_agile_its_w3ls">
                                <h6>Big Wing Sneakers (Navy)</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
                                <p class="w3ls_para">Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //new_arrivals -->
            <!--/slider_owl-->
        </div>
    </div>
    <!--//single_page-->
    <a href="#product-details" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    <script>
        $(document).ready(function() {

            var rating_value=$("#rating_value").val();
            document.getElementById(`rating${rating_value}`).checked = true;



            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion           
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                closed: 'accordion', // Start closed if in accordion view
                activate: function(event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
            $('#verticalTab').easyResponsiveTabs({
                type: 'vertical',
                width: 'auto',
                fit: true
            });
        });
    </script>

@endsection