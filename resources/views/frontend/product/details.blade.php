@extends('layouts.frontend.app')

@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<?php
use Carbon\Carbon;

?>
<head>
    
</head>

@php
Session::put('back_url', URL::full());
@endphp
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>{{$product_details['product_name']}}</span></h3>

    </div>
</div>
    <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-12 col-sm-2 col-lg-2 col-xs-2">

                </div>
                <div class="col-md-4 col-12 col-sm-4 col-lg-4 col-xs-12 single-right-left ">
                    <div class="grid images_3_of_2" style="">
                        <div class="flexslider">

                            <ul class="slides">
								@if(!empty($product_details))
								@foreach($product_details['image_many'] as $imgList)
								<li data-thumb="{{url('assets/images/product-images/'.$imgList->product_img)}}">
									<div class="thumb-image add-class"> 
									<img src="{{url('assets/images/product-images/'.$imgList->product_img)}}" data-imagezoom="true" class="img-responsive" onerror="this.src='{{url('assets/images/default.png')}}';">
									</div>
								</li>
								@endforeach
							
								@else
							
								<li data-thumb="{{url('assets/images/product-images/NicePng_rakhi-clipart-png_3611849.png')}}">
									<div class="thumb-image add-class"> <img src="{{url('assets/images/product-images/NicePng_rakhi-clipart-png_3611849.png')}}" onerror="this.src='{{url('assets/images/default.png')}}';" data-imagezoom="true" class="img-responsive"> </div>
								</li>
								@endif
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 col-sm-6 col-lg-5 col-xs-12 single-right-left simpleCart_shelfItem">
                    <h3 class="product-details-heading">{{$product_details['product_name']}}  
                    
                    @if($product_details->want_to_list=='bo' ||$product_details->want_to_list=='a')
        
                    @if(Auth::user())
                    <a href="#" data-toggle="modal" title="Place bid" data-target="#newUser" id="openNewUserModal">
                        <span class="bid_hit" title="Place bid"  onclick="bid_hit('{{$product_details->id}}','{{$product_details->bid_amount}}','{{$product_details->bid_ending_datetime}}')"><i class="fa fa-gavel"></i> </span>
                    </a>
                    @else
        
                    <a href="#" title="Place bid">
                        <span class="bid_hit" title="Place bid"  onclick="swalPopup()"><i class="fa fa-gavel"></i> </span>
                    </a>
        
                    @endif
                
                    @endif
                
                    </h3>
        
                    <p class="product-details-page">{{$product_details['product_desc']}}</p>
                    <p>            
                    {{--<input type="hidden" id="rating_value" value="{{$product_details->review[0]['rating']}}">--}}
                    <div class="rating1">
                        <div class="mb-3">
                            <i class="fa fa-star star-light mr-1 main_star_1"></i>
                            <i class="fa fa-star star-light mr-1 main_star_1"></i>
                            <i class="fa fa-star star-light mr-1 main_star_1"></i>
                            <i class="fa fa-star star-light mr-1 main_star_1"></i>
                            <i class="fa fa-star star-light mr-1 main_star_1"></i>
                        </div>
                    </div>
        
                    <span class="item_price"><b>PRICE:</b> &nbsp;
                    <del>
                        @if(!empty($product_details->quantity->price))
                        ${{$product_details->quantity->price}} &nbsp;</del>
                       
                        
                        &nbsp;&nbsp;
                            <b id="modify_price">
                            ${{($product_details->quantity->price - ($product_details->quantity->price*$product_details->quantity->discount/100))}}</b> </span> </p>
        
                            <input type="hidden" id="price_with_discount" value="{{($product_details->quantity->price - ($product_details->quantity->price*$product_details->quantity->discount/100))}}">

                            @else
                            $ 
                        @endif
                    <div class="row">
                    @if(!empty($product_details->quantity))
                        <div class="col-md-2 col-6 col-sm-2 col-xs-5">
                                <div class="quantity buttons_added">
                                <input type="number" step="1" min="1" max="{{$product_details->quantity->quantity}}" name="quantity" value="1" title="Qty" class="input-text qty text numberofdigits" size="4" pattern="" inputmode="" id="selected_qty">
                                <input type="button" value="-" <?php if($product_details->quantity->quantity==0){echo 'disabled';}?> class="minus button_minus" id="minus">
                                <input type="button" value="+" <?php if($product_details->quantity->quantity==0){echo 'disabled';}?> class="plus button_plus" id="plus">
                                
                            </div>
                        </div>
        
        
                        <div class="col-md-10 col-12 col-sm-12 col-xs-7">
                            <div class="occasion-cart">
                                <div class="snipcart-details top_brand_home_details item_add single-item button2">
                    
                                    <form action="#" id="addCartProductFrm" method="post">
                                        <fieldset>
                                            @php
                                                $user=Auth::user();
                                            @endphp
                                            @if($product_details->quantity->quantity==0)
                                                <h3 style="color:red"> Out of stock</h3><br/>
                                            @else
                                                @if(!empty($user))
                                                
                                                
                                                <input type="hidden" name="customer_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" name="seller_id" value="{{$product_details->user_id}}">
                                                <input type="hidden" name="product_id" value="{{$product_details->id}}">
                                                <input type="hidden" name="paq_id" value="{{$product_details->quantity->id}}">
                                                <input type="hidden" name="attribute_ids" value="{{$product_details->quantity->id}}">
                                                <input type="hidden" name="attribute_value_ids" value="{{$product_details->quantity->id}}">
                                                <input type="hidden" name="quantity" value="1" id="hiddenqty">
                                                <input type="hidden" name="price" value="{{$product_details->quantity->price}}">
                                                <input type="hidden" name="discount" value="{{$product_details->quantity->discount}}">
                                                <input type="hidden" name="pro_condition" value="{{$product_details->quantity->condition_id}}">
                                                <input type="hidden" name="is_checkout" value="n">
                                                <input type="hidden" name="selling_type" value="{{$product_details->want_to_list}}">
                                                <input type="hidden" name="is_delete" value="n">
                                                <input type="hidden" name="action" value="n">
                                                <input type="hidden" name="product_array" value="{{$product_details}}">
                                                <input type="hidden" name="ip_address" value="0000">
                                                <input type="hidden" name="createdDate" value="{{Carbon::now()}}">
                                                <input type="hidden" name="updatedDate" value="{{Carbon::now()}}">

                                                <input type="submit" name="submit" <?php if($product_details->quantity->quantity==0){echo 'disabled';}?> id="addCartProduct" value="Add to cart" class="button">


                                                
                                                @else
                                                <input type="button" <?php if($product_details->quantity->quantity==0){echo 'disabled';}?> name="submit" onclick="checkSwal(event)" value="Add to cart" class="button">
                                                @endif
                                            @endif
                                        </fieldset>
                                    </form>
        
                                </div>
        
                            </div>
                        </div>
                       @endif
                    </div>
        
                    
                  
        
                    <span class="item_price"><b>SKU:</b> &nbsp; IFF_grapes_186</span> <br />
                    <span class="item_price"><b>Category:</b> &nbsp; <span class="uppercase">{{$product_details['category']['categoryName']}}</span></span><br />
                    <!-- <span class="item_price"><b>Tags:</b> &nbsp; Casual, Fashion, Loose, Stylish</span> -->
                    
                    <?php $user=Auth::user(); ?>
                    @if(!empty($user))
                    <input type="hidden" value="{{$user}}" id="user_details">
                    <input type="hidden" value="{{$user->id}}" id="user_id">
                    @endif
                    <input type="hidden" value="{{$product_details->id}}" id="product_id">
                    <input type="hidden" value="{{$product_details->user_id}}" id="seller_id">
                   
                   
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
            </div>

            <div class="clearfix"> </div>
            <!-- /new_arrivals -->

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xs-12" >
                        <div class="responsive_tabs_agileits">
                            <div id="horizontalTab">
                                <ul class="resp-tabs-list">
                                    <li>Description</li>
                                    <li>Reviews</li>
                                    <li>Seller Information</li>
                                </ul>

                                <div class="resp-tabs-container">
                            <!--/tab_one-->
                            <div class="tab1">

                                <div class="single_page_agile_its_w3ls">
                                    <h3 class="description-policy"> WARRANTY - </h3>
                                    <p>{{$product_details['warranty_desc']}}</p>

                                    <br/>
                                    <br/>
                                    <br/>

                                    <h3 class="description-policy"> REFUND POLICY - </h3>
                                    <!-- <h6>Lorem ipsum dolor sit amet</h6> -->
                                    @if($product_details['refund_request']=='y')
                                    <div>
                                        <b>Replacement Day's :</b> {{$product_details['number_of_days']}}
                                        <br/>
                                        <p>{{$product_details['policy_description']}}</p>
                                    </div>
                                    @else
                                    <p>Refund Policy Not Available</p>
                                    @endif
                                
                                </div>
                            </div>
                            <!--//tab_one-->
                            <div class="tab2">
                                <div class="card">
                                
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4 text-center">
                                                <h1 class="text-warning mt-4 mb-4">
                                                    <b><span id="average_rating">0.0</span> / 5</b>
                                                </h1>
                                                <div class="mb-3">
                                                    <i class="fa fa-star star-light mr-1 main_star"></i>
                                                    <i class="fa fa-star star-light mr-1 main_star"></i>
                                                    <i class="fa fa-star star-light mr-1 main_star"></i>
                                                    <i class="fa fa-star star-light mr-1 main_star"></i>
                                                    <i class="fa fa-star star-light mr-1 main_star"></i>
                                                </div>
                                                <h3><span id="total_review">0</span> Review</h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>
                                                    <div class="row">
                                                        <div class="col-4 col-xs-4 col-sm-3 center-text">
                                                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>
                                                        </div>                                               
                                                        <div class="col-7 col-xs-7 col-sm-7">
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 col-xs-2 col-sm-2">
                                                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                                        </div>
                                                    </div>
                                                </p>

                                                <p>
                                                    <div class="row">
                                                        <div class="col-4 col-xs-4 col-sm-3 center-text">
                                                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                                                        </div>
                                                        
                                                        <div class="col-7 col-xs-7 col-sm-7">
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 col-sm-2 col-xs-2">
                                                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                                        </div>
                                                    </div>
                                                </p>
                                                <p>
                                                    <div class="row">
                                                        <div class="col-xs-4 col-4 col-sm-3 center-text">
                                                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                                                        </div>
                                                        <div class="col-xs-7 col-7 col-sm-7">
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 col-xs-2 col-sm-2">
                                                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                                                        </div>
                                                    </div>
                                                </p>

                                                <p>
                                                    <div class="row">
                                                        <div class="col-4 col-xs-4 col-sm-3 center-text">
                                                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                                                        </div>
                                                        <div class="col-7 col-xs-7 col-sm-7">
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 col-2 col-sm-2">
                                                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                                        </div>
                                                    </div>
                                                </p>

                                                <p>
                                                    <div class="row">
                                                        <div class="col-4 col-xs-4 col-sm-3 center-text">
                                                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                                                        </div>                                               
                                                        <div class="col-7 col-xs-7 col-sm-7">
                                                            <div class="progress ">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 col-sm-2 col-xs-2">
                                                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                                                        </div>
                                                    </div>
                                                </p>
                                            
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <!-- <h3 class="mt-4 mb-3">Write Your Review Here</h3> -->
                                                <?php $user=Auth::user();?>
                                            {{-- @if(!empty($user))--}}
                                                <button type="button" name="add_review" id="add_review" class="btn btn-primary">Your Review</button>
                                            {{-- @else
                                                <button type="button" name="add_review"  class="btn btn-primary" onclick="confirm('Please login before giving your review and rating...')"><a href="{{route('login')}}">Your Review</a></button>
                                                @endif --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5" id="review_content"></div>
                            </div>
                            <div class="tab3">

                                <div class="single_page_agile_its_w3ls">

                                <div class="card">

                                    <div class="inline-boxes row">
                                        <div class="col-md-2 col-xs-12 col-sm-2 col-lg-2 col-12">
                                            <div class="imageAvt">
                                                <img src="{{url('assets/images/logo/'.$product_details->user_information['business_logo'])}}"
                                                    onerror="this.src='{{url('assets/images/logo/bigbasket.png')}}';" alt=""
                                                    srcset="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6 col-12">
                                            <div class="details change-font-syle-here">
                                                Business Name :  {{$product_details->user_information['business_name']}}<br/>

                                                Email :  {{$product_details->user_information['email']}}<br />
                                                Delivery Areas :- <br />
                                                <ul class="change-ul-style">
                                                    @foreach($product_details->user_delivery_address as $address)
                                                    <li>{{$address->name}}, {{$address->state}}, {{$address->country}}</li>
                                                    @endforeach
                                                </ul>
                                                

                                            </div>
                                        </div>
                                    


                                    </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                            </div>
                          
                        </div>
                      
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xs-12">
                       

                    </div>
                </div>
            </div>

        </div>
        <!--//single_page-->
    </div>
 <!-- ---------------------------------------------------------------------- -->
 <!-- -------------------------------------------------------------- -->
<!-- model here -->
<div id="review_modal" class="modal model-review" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Review -</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<!-- <div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div> -->
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>


<div class="modal fade addbitplaced" id="newUser" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Place Bid</h4>
      </div>
      <div id="newUserHTMLBody">
        <form method="post" id="new_user_form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" class="nofocus">
          <div class="modal-body">
            <div class="tabbable-custom">

              <div class="tab-content">
                <div class="tab-pane active">
                  <div class="row">

                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group form-md-line-input form-md-floating-label input-icon counter-time">
                        <p class="counter-time" id="demo"></p>                       
                      </div>
                    </div>


                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group form-md-line-input form-md-floating-label input-icon">
                        <label for="mini" class="color-black">
                          Minimum Bid Amount ($)
                        </label>

                        <input type="text" disabled value="{{$product_details->bid_amount}}" name="minimum_amount"   class="form-control">

                        <input type="hidden" value="{{$product_details->id}}" name="product_id" >

                        @if(Auth::user())

                        <input type="hidden" name="user_id"  value="{{Auth::user()->id}}" >

                        @endif
                        <input type="hidden" name="seller_id"  value="{{$product_details->user_id}}" >

                        <input type="hidden" name="quantity"  value="1"  >

                        <input type="hidden" name="paqid"  value="{{$product_details->quantity->id}}" >

                        <input type="hidden" name="payment_status"  value="pending"   >

                        <input type="hidden" name="bid_status"  value="0"   >
                        <input type="hidden" name="cart_id"  value="0"   >
                        <input type="hidden" name="bid_number"  value="bid_{{time()}}"   >
                        
                        <input type="hidden" name="is_buyer_late"  value="0">

                        <input type="hidden" name="is_seller_late"  value="1" >

                        <input type="hidden" name="status"  value="0" >

                       
                       
                       
                      </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group form-md-line-input form-md-floating-label input-icon">
                        <label for="bid_amount" class="color-black">
                          Bid Amound($)
                        </label>
                        <input id="currency"  type="number"  min="{{$product_details->bid_amount}}"   name="bid_amount" class="form-control" >
                       
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="form-group">
              <div class="inline-buttons">
                <a class="btn btn-default" data-dismiss="modal" id="cancel" name="cancel">
                  Cancel
                </a>
                
                <button type="submit"  class="btn btn-primary"  id="newUserButton">
                   Save
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{!! JsValidator::formRequest('App\Http\Requests\Frontend\BidRequest','#new_user_form') !!}

 <!-- ---------------------------------------------------------------------- -->

 @push('scripts')

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
<script src="{{ asset('assets/js/frontend/product/add-bid-placed.js') }}"></script>

<script>

</script>
@endpush

    <script>






    function swalPopup(){

        swal({
        title: "Your Bid Basket is empty",
        text: "Want to Place Bid Please login",
        icon: "warning",
        buttons: {
            cancel: true,
            confirm: "Sign in Your Account",
        }
        }).then(
        function(isConfirm) {
            if (isConfirm) {
                window.location.href = "{{url('login')}}";
            } else {
                return false;
            }
        },
        );
    }


    function bid_hit(id,amount,enddate){
        // console.log("bide hid ",id,amount,enddate);
        $('#mini').val(amount);
        // $('#lastdate').val(enddate);
        $('#id').val(id);


            date_counter(enddate);

    }

    function date_counter(enddate){
        // Set the date we're counting down to
        var countDownDate = new Date(enddate).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();
            
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
            
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";
            
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
            $('#newUserButton').prop('disabled', true);

        }
        }, 1000);
    }

    $('#currency').change(function() {
        var min = Globalize.parseFloat($(this).attr("min"));
        var max = Globalize.parseFloat($(this).attr("max"));
        var value = Globalize.parseFloat($(this).val());
        if(value < min) { value = min; }        
        if(value > max) { value = max; }
        $(this).val(value);
        //value = Globalize.format(value,"c");
        console.log(value);
        
    });

    function checkSwal(e){

        // e.preventDefault();
        console.log("calling me...")
        swal({
        title: "Your Basket is empty",
        text: "Shop today’s deals",
        icon: "warning",
        buttons: {
            cancel: true,
            confirm: "Sign in Your Account",
        }
        }).then(
        function(isConfirm) {
            if (isConfirm) {
                window.location.href = "{{url('login')}}";
            } else {
                return false;
            }
        },
        );
    }

    $("#minus").click(function(){
        var quantity=$("#selected_qty").val();
        var max= $('#selected_qty').attr('max');
       
        quantity=quantity>1?quantity-1:quantity;
        if(quantity<=max){
            updateProductquantity(quantity);
        }

    })

    $("#plus").click(function(){
        var quantity=$("#selected_qty").val();
        var max= $('#selected_qty').attr('max');
        quantity=parseInt(quantity)+1;
        if(quantity<=max){
            updateProductquantity(quantity);
        }
    })

    function updateProductquantity(quantity){                
        var qty = document.getElementById("hiddenqty");
         qty.value = quantity;
        var price=$("#price_with_discount").val();
        price=price*quantity;

        $("#modify_price").empty();
        $("#modify_price").html("$"+price);
        

        console.log("price ",price)
        
    }

    $(document).ready(function() {

        // var rating_value=$("#rating_value").val();
        // document.getElementById(`rating${rating_value}`).checked = true;

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

 

    var rating_data = 0;
    var user=$('#user_details').val();
    var user_id=$('#user_id').val();
    
    
    var id=$('#product_id').val();//product id

    var seller_id=$('#seller_id').val();
    var buyerId=user_id;
    var orderId;

    $('#add_review').click(function(){
       console.log("user id --- ",user);

        if((user!=undefined )){

            
            $.ajax({
                url:"{{url('checking_order_existing')}}",
                method:"POST",
                data:{
                    productId:id,
                    seller_id:seller_id,                 
                    buyerId:buyerId,
                    _token: '{{csrf_token()}}'
                    },
                success:function(res)
                {
                    orderId=res.data.orderId;
                    console.log("order-id",orderId)

                    if(orderId==""){   
                        
                        swal({
                        title: "You did not ordered",
                        text: "Please order this item first",
                        icon: "warning",
                        })
                    }
                    else if(res.message=="You are already submitted Review & Rating."){
                        swal({
                        title: "Already Submitted",
                        text: "You are already submitted Review & Rating",
                        icon: "warning",
                        })
                        // toastr.error(res.message, { timeOut: 2000 });
                    }
                    else{
                        console.log("order exist")
                        $('#review_modal').modal('show');

                    }

                }
            })


        }
        else{
                swal({
                title: "Review this product",
                text: "Share your thoughts with other customers",
                type: "#ffa301",
                buttons: {
                cancel: true,
                confirm: "Sign in Your Account",
                }
                }).then(
                function(isConfirm) {
                if (isConfirm) {
                    window.location.href = "{{url('login')}}";
                } else {
                return false;
                }
                },
                );
        }
    });

    $(document).on('mouseenter', '.submit_star', function(){
        var rating = $(this).data('rating');
        reset_background();
        for(var count = 1; count <= rating; count++)
        {
            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');
            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();
        for(var count = 1; count <= rating_data; count++)
        {
            $('#submit_star_'+count).removeClass('star-light');
            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){
        rating_data = $(this).data('rating');
    });


    $('#save_review').click(function(){
        
        var user_review = $('#user_review').val();
        if(user_review == '')
        {
            toastr.error('Please Fill Both Field', { timeOut: 2000 });
            return false;
        }
        else
        {

            $.ajax({
                url:"{{url('submit_rating')}}",
                method:"POST",
                data:{
                    productId:id,
                    orderItemId:orderId,
                    sellerId:seller_id,
                    buyerId:buyerId,
                    description:user_review,
                    rating:rating_data,
                    status:'a',
                    _token: '{{csrf_token()}}'
                    },
                success:function(data)
                {

                    $('#review_modal').modal('hide');
                    toastr.success("Successfully Added your review & rating..", { timeOut: 2000 });
                    load_rating_data();
                    

                }
            })
        }
    })

    load_rating_data();

    function load_rating_data()
    {
        var id=$('#product_id').val();
        $.ajax({
            url:"{{url('submit_rating_load')}}",
            method:"POST",
            data:{
                action:'load_data',
                id:id,
                 _token: '{{csrf_token()}}'
            },
            dataType:"JSON",
            success:function(res)
            {
                // console.log("data---> ",res.data);
                //     return false;
                $('#average_rating').text(res.data.average_rating);
                $('#total_review').text(res.data.total_review);

                var count_star = 0;
                var  count_star1=0
                $('.main_star').each(function(){
                    count_star++;

                    if(Math.ceil(res.data.average_rating) >= count_star)
                    {
                        console.log("main_star_1 --- > ",this);
                        $(this).addClass('text-warning');

                        $(this).addClass('star-light');

                    }
                    else{
                        $(this).removeClass('fa fa-star');
                        $(this).addClass('fa fa-star-o star-light checked');
                    }
                });

                $('.main_star_1').each(function(){
                    count_star1++;
                    if(Math.ceil(res.data.average_rating) >= count_star1)
                    {
                        console.log("main_star_1 --- > ",this);
                        $(this).addClass('text-warning');

                        $(this).addClass('star-light');

                    }
                    else{
                        $(this).removeClass('fa fa-star');
                        $(this).addClass('fa fa-star-o star-light checked');
                    }
                });

                $('#total_five_star_review').text(res.data.five_star_review);
                $('#total_four_star_review').text(res.data.four_star_review);
                $('#total_three_star_review').text(res.data.three_star_review);
                $('#total_two_star_review').text(res.data.two_star_review);
                $('#total_one_star_review').text(res.data.one_star_review);
                $('#five_star_progress').css('width', (res.data.five_star_review/res.data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (res.data.four_star_review/res.data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (res.data.three_star_review/res.data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (res.data.two_star_review/res.data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (res.data.one_star_review/res.data.total_review) * 100 + '%');


                if(res.data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < res.data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+res.data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+res.data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(res.data.review_data[count].rating >= star)
                            {
                                class_name = ' text-warning';
                            }
                            else
                            {
                                class_name = '-o star-light checked';
                            }

                            html += '<i class="fa fa-star'+class_name+' mr-1"></i>';
                        }

                        html += '<br />';
                        html += res.data.review_data[count].user_review;
                        html += '</div>';
                        html += '<div class="card-footer text-right">On '+res.data.review_data[count].datetime+'</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }

                    $('#review_content').html(html);
                    // console.log("html ",html)
                }
            }
        })
    }




    </script>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script src="{{ asset('assets/js/frontend/product/addCardProduct.js') }}"></script>
@endsection