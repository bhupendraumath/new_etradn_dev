@php
$favoriteProduct=new App\Models\Product;
@endphp
<div class="banner_bottom_agile_info">
    <div class="container-fluid  newclass">

        <div class="col-md-3 col-sm-12 col-lg-3 col-xl-3 col-12 col-xs-12 remove-padding-here">
            <div class="card ">
                <div class="row">
                    <div class="col-12 col-md-7 col-sm-7 col-lg-7 col-xl-7">
                        <p class="font-family-change">{{lang('HOTITEM')}}</p>

                    </div>

                    <div class="col-12 col-md-5 col-sm-5 col-lg-5 col-xl-5">
                        <div class="buttons-left-right">

                        </div>
                    </div>

                </div>
                <hr class="margin-top-bottom">
                <div>
                    <div class="row hot-item-slider slider">
                        @if(!empty($hot_products))

                        @foreach ($hot_products as $product)
                        @if($product!=null)
                        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 slide">
                            {{-- <a href="{{url('product-details/'.$product->id)}}">--}}

                            <div class="images image-left">

                                <div class="background-gray left-side favorite-product-hover">
                                    @if(!empty($product->image))

                                    <img src="{{url('assets/images/product-images/'.$product->image->product_img)}}" alt="herer" onerror="this.src='{{url('assets/images/default.png')}}';">
                                    @else
                                    <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" srcset="" />
                                    @endif
                                    <div class="hover-icons">
                                        <div>
                                            <a href="{{url('product-details/'.$product->id)}}" title="product's details">

                                                <span class="left-buy-it">
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
                                            $user = Auth::user();

                                            if (!empty($user)) {

                                                $value = $favoriteProduct->favorite_product_details($product->id, Auth::user()->id);


                                                if (count($value) != 0) {
                                                    $title = 'Remove in your favorite list';
                                                    $color = 1;
                                                } else {
                                                    $title = 'Add in favorite list';
                                                    $color = 2;
                                                }
                                            } else {
                                                //  $value=[];
                                                $title = 'Add in favorite list';
                                                $color = 0;
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
                                            <button class="circle" title="Quantity id not available">
                                                <i class="fa fa-heart-o"></i>
                                            </button>

                                            @endif


                                        </div>
                                        <div class="bottom-on-hover">

                                            @if(!empty($product->category->categoryName))
                                            <span class="left-side-text" title="Category"><i class="fa fa-tag"></i> &nbsp;
                                                {{$product->category->categoryName}}</span>
                                            @endif
                                            @if(!empty($product->subCategory->subCategoryName))
                                            <span title="Sub Category"><i class="fa fa-tag"></i>&nbsp;
                                                {{$product->subCategory->subCategoryName}}</span>
                                            @endif
                                            @if(!empty($product->brand))
                                            <span title="Brand"><i class="fa fa-gavel"></i>&nbsp;{{$product->brand->brandName}}</span>
                                            @endif
                                            <span title="Bid" class="hide"><i class="fa fa-gavel"></i>&nbsp;Bid 0</span>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <a href="{{url('product-details/'.$product->id)}}" title="product's details">

                                    <h4>{{$product->product_name}}</h4>
                                    @if(!empty($product->quantity))
                                    <span><strike>${{$product->quantity->price}}</strike> &nbsp; <span> ${{$product->quantity->price - ($product->quantity->discount*$product->quantity->price/100)}}</span></span>
                                    @else
                                    <span><strike>$0</strike> &nbsp; <span> $0</span></span>
                                    @endif


                                    <div class="rating-review-upload">

                                        <?php

                                        $review = new App\Models\ProductReview;
                                        $avg_review = $review->review_average($product->id);
                                        ?>


                                        @for($star = 1; $star <= 5; $star++) <?php $class_name = ''; ?> @if($avg_review>= $star)
                                            <?php $class_name = ' text-warning'; ?>
                                            @else
                                            <?php $class_name = '-o star-light checked'; ?>
                                            @endif

                                            <i class="fa fa-star<?php echo $class_name ?>  mr-1"></i>
                                            @endfor



                                    </div>
                                </a>
                            </div>
                            {{--</a>--}}
                        </div>
                        @endif
                        @endforeach

                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-9 col-xl-9 col-12 col-xs-12 remove-padding-here">
            <div class="card">

                <div class="row">

                    <div class="col-12 col-md-6 col-sm-6 col-lg-6 col-xl-6">
                        <p class="font-family-change">{{lang('POPULAR_PRODUCTS')}}</p>

                    </div>

                    <div class="col-12 col-md-6 col-sm-6 col-lg-6 col-xl-6">



                        <div class="buttons-left-right">
                        </div>
                        <div id="popular_id_acive">

                            <ul class="popular-items tab">
                                @if(!empty($category_list))
                                <li class="active">
                                    <button class="tablinks" onclick="filtering('all')">{{lang('ALL')}}</button>
                                </li>
                                @foreach ($category_list as $cat)
                                <li>
                                    <button class="tablinks" onclick="filtering({{$cat->id}})">{{$cat->categoryName}}</button>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>
                <hr class="margin-top-bottom">


                <ul class="row product-show-list top-posts-slider">
                    <div class="" id="home-product-popular-product"></div>
                </ul>




            </div>

        </div>
    </div>
</div>


<!-- //special and adspaners -->


<div class="banner_bottom_agile_info_bottom---5">
    <div class="container-fluid  newclass">


        <div class="col-md-3 col-sm-12 col-lg-3 col-xl-3 col-12 remove-padding-here">
            <div class="row">

                <!-- special item start here -->
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12 remove-padding-here">
                    <div class="card ">
                        <div class="row">
                            <div class="col-12 col-md-8 col-sm-8 col-lg-8 col-xl-8">
                                <p class="font-family-change">{{lang('SPEACIALITEMS')}}</p>
                            </div>

                            <div class="col-12 col-md-4 col-sm-4 col-lg-4 col-xl-4">
                                <div class="buttons-left-right">

                                </div>
                            </div>

                        </div>
                        <hr class="margin-top-bottom">
                        <div>
                            <div class="row hot-item-slider slider">
                                @if(!empty($special_products))

                                @foreach ($special_products as $product)
                                @if($product!=null)
                                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 slide">
                                    {{-- <a href="{{url('product-details/'.$product->id)}}">--}}

                                    <div class="images image-left">

                                        <div class="background-gray left-side favorite-product-hover">
                                            @if(!empty($product->image))

                                            <img src="{{url('assets/images/product-images/'.$product->image->product_img)}}" alt="herer" onerror="this.src='{{url('assets/images/default.png')}}';">
                                            @else
                                            <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" srcset="" />
                                            @endif
                                            <div class="hover-icons">
                                                <div>
                                                    <a href="{{url('product-details/'.$product->id)}}" title="product's details">

                                                        <span class="left-buy-it">
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
                                                    $user = Auth::user();

                                                    if (!empty($user)) {

                                                        $value = $favoriteProduct->favorite_product_details($product->id, Auth::user()->id);


                                                        if (count($value) != 0) {
                                                            $title = 'Remove in your favorite list';
                                                            $color = 1;
                                                        } else {
                                                            $title = 'Add in favorite list';
                                                            $color = 2;
                                                        }
                                                    } else {
                                                        //  $value=[];
                                                        $title = 'Add in favorite list';
                                                        $color = 0;
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
                                                    <button class="circle" title="Quantity id not available">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>

                                                    @endif


                                                </div>
                                                <div class="bottom-on-hover">

                                                    @if(!empty($product->category->categoryName))
                                                    <span class="left-side-text" title="Category"><i class="fa fa-tag"></i> &nbsp;
                                                        {{$product->category->categoryName}}</span>
                                                    @endif
                                                    @if(!empty($product->subCategory->subCategoryName))
                                                    <span title="Sub Category"><i class="fa fa-tag"></i>&nbsp;
                                                        {{$product->subCategory->subCategoryName}}</span>
                                                    @endif
                                                    @if(!empty($product->brand))
                                                    <span title="Brand"><i class="fa fa-gavel"></i>&nbsp;{{$product->brand->brandName}}</span>
                                                    @endif
                                                    <span title="Bid" class="hide"><i class="fa fa-gavel"></i>&nbsp;Bid 0</span>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                        <a href="{{url('product-details/'.$product->id)}}" title="product's details">

                                            <h4>{{$product->product_name}}</h4>
                                            @if(!empty($product->quantity))
                                            <span><strike>${{$product->quantity->price}}</strike> &nbsp; <span> ${{$product->quantity->price - ($product->quantity->discount*$product->quantity->price/100)}}</span></span>
                                            @else
                                            <span><strike>$0</strike> &nbsp; <span> $0</span></span>
                                            @endif


                                            <div class="rating-review-upload">

                                                <?php

                                                $review = new App\Models\ProductReview;
                                                $avg_review = $review->review_average($product->id);
                                                ?>


                                                @for($star = 1; $star <= 5; $star++) <?php $class_name = ''; ?> @if($avg_review>= $star)
                                                    <?php $class_name = ' text-warning'; ?>
                                                    @else
                                                    <?php $class_name = '-o star-light checked'; ?>
                                                    @endif

                                                    <i class="fa fa-star<?php echo $class_name ?>  mr-1"></i>
                                                    @endfor



                                            </div>
                                        </a>
                                    </div>
                                    {{--</a>--}}
                                </div>
                                @endif
                                @endforeach

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- special item end here -->

                <!-- start news letter here -->
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12 margin-top-add remove-padding-here">
                    <div class="card ">
                        <div class="row">
                            <div class="col-12 col-md-8 col-sm-8 col-lg-8 col-xl-8">
                                <p class="font-family-change">{{lang('NEWSLETTERS')}}</p>

                            </div>
                        </div>
                        <hr class="margin-top-bottom">
                        <div>
                            <div class="row">

                                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                                    <div class="images image-left">
                                        <div class="background-white">
                                            <span class="newslatter">
                                                {{lang('SIGNUPNEWSLATTERS')}}
                                            </span>
                                            <div class="inputfieldform">
                                                <input type="text" class="inputfield">
                                            </div>
                                            <div>
                                                <input type="button" value="{{lang('SUBSCRIBE')}}" class="buttonSubscribe">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end news letter here -->
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12 adv-image-left remove-padding-here" style="background: url('assets/images/frontend/Layer_63.png');
                margin-left: 15px;
                background-repeat: no-repeat;
                ">

                </div>

            </div>

        </div>
        <div class="col-md-12 col-sm-12 col-lg-9 col-xl-9 col-12 reducewidth remove-padding-here">
            <div class="row">
                <!-- adds banner start here -->
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12 remove-padding-here">
                    <div class="card">

                        <div class="row">

                            <div class="col-12 col-md-6 col-sm-6 col-lg-6 col-xl-6">

                                <div class="module" style="background: url(assets/images/frontend/download.png);background-attachment: fixed;
									  background-position: center;
									">

                                    <header>
                                        <div class="rotationclass">
                                            <h1 class="yearColor">
                                                2022

                                            </h1>
                                            <span class="Deals">
                                                BEST DEAL<br />
                                            </span>
                                            <br /><br />
                                            <span class="anchor-tag">
                                                <a href="#" class="buynow">BUY NOW</a>
                                            </span>
                                            <p class="bottom-heading">
                                                *on selected items only
                                            </p>
                                        </div>
                                    </header>
                                </div>

                            </div>

                            <div class="col-12 col-md-6 col-sm-6 col-lg-6 col-xl-6">


                                <div class="module" style="background: url('assets/images/frontend/download (1).png');background-attachment: fixed;
									  background-position: center;
									">

                                    <header>
                                        <div class="rotationclass">
                                            <h1 class="yearColor">
                                                2022

                                            </h1>
                                            <span class="Deals">
                                                BEST DEAL<br />
                                            </span>
                                            <br /><br />
                                            <span class="anchor-tag">
                                                <a href="#" class="buynow">BUY NOW</a>
                                            </span>
                                            <p class="bottom-heading">
                                                *on selected items only
                                            </p>
                                        </div>
                                    </header>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>

                <!-- adds banner end here -->

                <!-- start latest product -->
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12 margin-top-add remove-padding-here">
                    <div class="card">

                        <div class="row">

                            <div class="col-12 col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                <p class="font-family-change">{{lang('LATESTITEMS')}}</p>
                            </div>

                            <div class="col-12 col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                <div class="buttons-left-right">
                                </div>
                                <div id="latest_id_acive">

                                    <ul class="popular-items tab">
                                        @if(!empty($category_list))
                                        <li class="active">
                                            <button class="tablinks" onclick="filteringLetest('all')">{{lang('ALL')}}</button>
                                        </li>
                                        @foreach ($category_list as $cat)
                                        <li>
                                            <button class="tablinks" onclick="filteringLetest({{$cat->id}})">{{$cat->categoryName}}</button>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <hr class="margin-top-bottom">
                        <ul class="row product-show-list product-latest-slider">
                            <div class="" id="home-product-latest-product"></div>
                        </ul>

                    </div>

                </div>
                <!-- end latest product -->


                <!-- wholesale start -->
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12 adv-right-side margin-top-add">
                    <div class="adv-right">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-12">
                            <img src="{{url('assets/images/frontend/download (2).png')}}" class="ad-right" alt="">

                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-12">
                            <div class="right-adv">
                                <h1 class="wholesale">{{lang('WHOLESALEPRODUCTS')}}</h1>

                                <a href="{{url('product-list/noav/noav/noav/popular')}}">

                                    <button class="colorBlack">{{lang('SHOPNOW')}}</button>
                                </a>

                            </div>
                        </div>

                    </div>

                </div>
                <!-- wholesale end -->

                <!-- featured start here -->
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12 margin-top-add">
                    <div class="card">

                        <div class="row">

                            <div class="col-12 col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                <p class="font-family-change">{{lang('FEATUREDPRODUCTS')}}</p>

                            </div>

                            <div class="col-12 col-md-6 col-sm-6 col-lg-6 col-xl-6">

                                <div class="buttons-left-right">
                                    <!-- <i class="fa fa-chevron-circle-left" style="font-size:24px"></i>
                                    <i class="fa fa-chevron-circle-right" style="font-size:24px"></i> -->
                                </div>
                                <ul class="popular-items tab">
                                    {{--
                                    @if(!empty($feature_list))
                                        @foreach ($feature_list as $cat)
                                            <li>
                                                <button class="tablinks3"  id="{{$loop->index==0?'defaultOpen3':''}}" onclick="open3(event, '{{$cat->categoryName}}3')">{{$cat->categoryName}}</button>
                                    </li>
                                    @endforeach
                                    @endif --}}


                                </ul>

                            </div>

                        </div>
                        <hr class="margin-top-bottom">


                        @if(!empty($featured_products))

                        <div class="tabcontent3">

                            @if(!empty($featured_products))
                            <div class="row product-feature_list slider">
                                @foreach ($featured_products as $product)
                                <a href="{{url('product-details/'.$product->id)}}" title="product's details">
                                    <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth slide">

                                        <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                            <div class="background-gray new-size">
                                                @if(!empty($product->image))
                                                <img src="{{url('assets/images/product-images/'.$product->image->product_img)}}" alt="" srcset="" class="resize-images" onerror="this.src='{{url('assets/images/default.png')}}';" />
                                                @else
                                                <img src="https://images.everydayhealth.com/images/ordinary-fruits-with-amazing-health-benefits-05-1440x810.jpg" alt="" srcset="" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                            <h4>{{$product->product_name}}</h4>
                                            @if(!empty($product->quantity))
                                            <span><strike>${{$product->quantity->price}}</strike> &nbsp; <span> ${{$product->quantity->price - ($product->quantity->discount*$product->quantity->price/100)}}</span></span>
                                            @else
                                            <span><strike>$0</strike> &nbsp; <span> $0</span></span>
                                            @endif

                                            <div class="rating-review-upload">

                                                <?php

                                                $review = new App\Models\ProductReview;
                                                $avg_review = $review->review_average($product->id);
                                                ?>

                                                @for($star = 1; $star <= 5; $star++) <?php $class_name = ''; ?> @if($avg_review>= $star)
                                                    <?php $class_name = ' text-warning'; ?>
                                                    @else
                                                    <?php $class_name = '-o star-light checked'; ?>
                                                    @endif

                                                    <i class="fa fa-star<?php echo $class_name ?>  mr-1"></i>
                                                    @endfor



                                            </div>
                                        </div>



                                    </div>
                                </a>
                                @endforeach

                            </div>


                            @endif

                        </div>

                        @endif


                        <!-- <div id="Fruits3" class="tabcontent3">
                            <div class="row">

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" onerror="this.src='{{url('assets/images/default.png')}}';" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$0.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" onerror="this.src='{{url('assets/images/default.png')}}';" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$0.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" onerror="this.src='{{url('assets/images/default.png')}}';" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$0.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                

                            </div>
                        </div>  -->



                    </div>

                </div>
                <!-- featured end here -->
            </div>


        </div>

    </div>
</div>






<script src="{{ asset('assets/js/frontend/product/home-page-listing.js') }}"></script>

<script>
    $(document).ready(function() {

        $('#popular_id_acive ul li button').click(function() {
            //removing the previous selected menu state
            $('#popular_id_acive').find('li.active').removeClass('active');
            //adding the state for this parent menu
            console.log($(this).parents("li").addClass('active'));

        });

        $('#latest_id_acive ul li button').click(function() {
            //removing the previous selected menu state
            $('#latest_id_acive').find('li.active').removeClass('active');
            //adding the state for this parent menu
            console.log($(this).parents("li").addClass('active'));

        });



    })
</script>