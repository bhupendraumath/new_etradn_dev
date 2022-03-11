@extends('layouts.frontend.app')

@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<head>
    
</head>
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
                <!-- <span class="starRating">
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
            
                </span> -->

                <div class="mb-3">
                    <i class="fas fa-star star-light mr-1 main_star_1"></i>
                    <i class="fas fa-star star-light mr-1 main_star_1"></i>
                    <i class="fas fa-star star-light mr-1 main_star_1"></i>
                    <i class="fas fa-star star-light mr-1 main_star_1"></i>
                    <i class="fas fa-star star-light mr-1 main_star_1"></i>
                </div>
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


                        <!-- ----------------------------------- -->


                        <div class="card">
                        
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 text-center">
                                        <h1 class="text-warning mt-4 mb-4">
                                            <b><span id="average_rating">0.0</span> / 5</b>
                                        </h1>
                                        <div class="mb-3">
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                        </div>
                                        <h3><span id="total_review">0</span> Review</h3>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>
                                            <div class="row">
                                                <div class="col-4 col-sm-3 center-text">
                                                    <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>
                                                </div>                                               
                                                <div class="col-7 col-sm-7">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 col-sm-2">
                                                    <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                                </div>
                                            </div>
                                        </p>

                                        <p>
                                            <div class="row">
                                                <div class="col-4 col-sm-3 center-text">
                                                    <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                                                </div>
                                                
                                                <div class="col-7 col-sm-7">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 col-sm-2">
                                                    <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                                </div>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row">
                                                <div class="col-4 col-sm-3 center-text">
                                                    <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                                                </div>
                                                <div class="col-7 col-sm-7">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 col-sm-2">
                                                    <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                                                </div>
                                            </div>
                                        </p>

                                        <p>
                                            <div class="row">
                                                <div class="col-4 col-sm-3 center-text">
                                                    <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                                                </div>
                                                <div class="col-7 col-sm-7">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 col-sm-2">
                                                    <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                                </div>
                                            </div>
                                        </p>

                                        <p>
                                            <div class="row">
                                                <div class="col-4 col-sm-3 center-text">
                                                    <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                                                </div>                                               
                                                <div class="col-7 col-sm-7">
                                                    <div class="progress ">
                                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 col-sm-2">
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


                        <!-- ----------------------------------- -->

                            <!-- <div class="single_page_agile_its_w3ls">
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

                            </div> -->
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


 <!-- ---------------------------------------------------------------------- -->
    <script>
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

    //    if(user!=undefined)
    // ||( user.length!=0)
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
                        // alert("Please order the product....");
                        toastr.error("Please order the product....", { timeOut: 2000 });
                    }
                    else if(res.message=="You are already submitted Review & Rating."){
                        // alert(res.message);
                        toastr.error(res.message, { timeOut: 2000 });
                    }
                    else{
                        console.log("order exist")
                        $('#review_modal').modal('show');

                    }

                }
            })


        }
        else{
            if(confirm('Please login before giving your review and rating...')){
                window.location="{{url('sign-in')}}"
            }
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
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('.main_star_1').each(function(){
                    count_star1++;
                    if(Math.ceil(res.data.average_rating) >= count_star1)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');

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
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
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

@endsection