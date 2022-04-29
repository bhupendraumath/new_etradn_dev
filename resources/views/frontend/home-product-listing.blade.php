

@php
$favoriteProduct=new App\Models\Product;
@endphp

             


<!-- <div  class="tabcontent"> -->

    @if(!empty($popular_list) && count($popular_list)!=0)
        <!-- <div class="row product-show-list"> -->
        @foreach ($popular_list as $product)
            <div class="col-12 col-md-12 col-sm-12 col-lg-3 col-xl-3 col-xs-12 slide">

                <div class="images image-left">                                   

                    <div class="background-gray left-side favorite-product-hover">
                        @if(!empty($product->image))                                  

                            <img src="{{url('assets/images/product-images/'.$product->image->product_img)}}" alt="herer" onerror="this.src='{{url('assets/images/default.png')}}';" >
                        @else
                            <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="heere2" srcset="" />
                        @endif
                        <div class="hover-icons">
                            <a href="{{url('product-details/'.$product->id)}}" title="product's details">
                                    <span class="left-buy-it" >
                                            @if($product->want_to_list=='b')
                                            Buy It Now
                                            @elseif($product->want_to_list=='a')
                                            Auction
                                            @else
                                            Both
                                            @endif
                                            
                                            <i class="fas fa-angle-double-right"></i>
                                    </span>

                                    </a>
                                    

                                <?php
                                $user=Auth::user();
                                if(!empty($user))
                                {
                                
                                    $value= $favoriteProduct->favorite_product_details($product->id,Auth::user()->id);
                                    

                                    if(count($value)!=0){
                                        $title= 'Remove in your favorite list';
                                        $color=1;
                                    }
                                    else{
                                        $title= 'Add in favorite list';
                                        $color=2;
                                    }
                                }
                                else{
                                    //  $value=[];
                                    $title= 'Add in favorite list';
                                    $color=0;
                                }
                                ?>

                            @if(!empty($product->quantity->id))
                                @if($color==1)
                                        <button class="circle" title="{{$title}}" onclick="addedFav({{$product->id}},{{$product->quantity->id}},{{$value[0]->id}},'user_exists')">
                                            <i class="fas fa-heart" style="color:red"></i>
                                        </button>
                                    @elseif($color==2)
                                        <button class="circle" title="{{$title}}" onclick="addedFav({{$product->id}},{{$product->quantity->id}},'not__yet','user_empty')">
                                                <i class="fa fa-heart-o"></i>
                                        </button>
                                    @else

                                            <button class="circle" title="{{$title}}" onclick="addedFav({{$product->id}},{{$product->quantity->id}},'not__yet','auth_required')">
                                                <i class="fa fa-heart-o"></i>
                                        </button>
                                    @endif
                            @else
                                <button class="circle" title="Quantity id not available" >
                                        <i class="fa fa-heart-o"></i>
                                </button>
                            
                            @endif                               


                                
                            <!-- <button class="circle" >
                                <i class="fa fa-heart-o"></i>
                            </button> -->
                                
                            <div class="bottom-on-hover">
                                    <span class="left-side-text" title="Category"><i class="fa fa-tag"></i> &nbsp;
                                    {{$product->category->categoryName}}</span>
                                    <span title="Sub Category"><i class="fa fa-tag"></i>&nbsp;
                                    {{$product->subCategory->subCategoryName}}</span>
                                    @if(!empty($product->brand))
                                    <span title="Brand"><i class="fa fa-gavel"></i>&nbsp;{{$product->brand->brandName}}</span>
                                    @endif
                                    <span title="Bid" class="hide"><i class="fa fa-gavel"></i>&nbsp;Bid 0</span>
                            </div>                                
                        </div>
                    </div>
                    <br/>
                    <a href="{{url('product-details/'.$product->id)}}" title="product's details">

                        <h4>{{$product->product_name}}</h4>
                        @if(!empty($product->quantity))
                        <span><strike>${{$product->quantity->price}}</strike> &nbsp; <span> ${{$product->quantity->price - ($product->quantity->discount*$product->quantity->price/100)}}</span></span>
                        @else
                        <span><strike>$0</strike> &nbsp; <span> $0</span></span>
                        @endif
                        

                        <div class="rating-review-upload">

                            <?php
                            
                            $review=new App\Models\ProductReview;
                            $avg_review=$review->review_average($product->id);            
                            ?>


                            @for($star = 1; $star <= 5; $star++)
                            <?php  $class_name = ''; ?>
                        
                                @if($avg_review >= $star)
                                <?php $class_name = ' text-warning'; ?>
                                @else
                                <?php $class_name = '-o star-light checked'; ?>
                                @endif
                            
                            <i class="fa fa-star<?php echo $class_name ?>  mr-1"></i>
                            @endfor

                        

                        </div>
                    </a>
                    </div>

            </div>                                
        @endforeach 
        <!-- </div> -->
    @else
    <div class="product-not-available">
        <h4 class="not-avaiable"> {{lang('POPULARITEMNOTAVAILABLE')}}</h4>
    </div>
    @endif

<!-- </div> -->
    




<script type="text/javascript" style="display:none">

$(function(){

    $(".top-posts-slider").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: true,
        dots: false,
        pauseOnHover: true,
        prevArrow: '<i class="slick-prev fa fa-chevron-circle-left  top-left"></i>',
        nextArrow: '<i class="slick-next fa fa-chevron-circle-right top-right"></i>',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 1500,
                    arrows: true,
                    dots: false,
                    pauseOnHover: true,
                }
            },
            {
                breakpoint: 720,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                    pauseOnHover: true,
                }
            },
            // {
            //     breakpoint: 600,
            //     settings: {
            //         slidesToShow: 2,
            //         slidesToScroll: 2,
            //         pauseOnHover: true,
            //     }
            // },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    pauseOnHover: true,
                }
            }
        ]

    });


    // $(".top-latest-slider").slick({
    //     infinite: true,
    //     slidesToShow: 4,
    //     slidesToScroll: 1,
    //     autoplay: true,
    //     autoplaySpeed: 1500,
    //     arrows: true,
    //     dots: false,
    //     pauseOnHover: true,
    //     prevArrow: '<i class="slick-prev fa fa-chevron-circle-left  top-left"></i>',
    //     nextArrow: '<i class="slick-next fa fa-chevron-circle-right top-right"></i>',
    //     responsive: [{
    //             breakpoint: 1024,
    //             settings: {
    //                 slidesToShow: 4,
    //                 slidesToScroll: 3,
    //                 infinite: true,
    //                 dots: true
    //             }
    //         },
    //         {
    //             breakpoint: 600,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 2
    //             }
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1
    //             }
    //         }
    //     ]

    // });

})



</script>



