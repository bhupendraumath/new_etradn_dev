@extends('layouts.frontend.app')

@section('content')



<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
        <li data-target="#myCarousel" data-slide-to="4" class=""></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                    <h4 class="banner-save-50"> Order Consolidation </h4>
                    <h3 class="banner-save">Save 50% For</h3>
                    <span class="first-purchase">
                        First Purchase
                    </span>
                    <br />
                    <a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
                </div>
            </div>
        </div>
        <div class="item item2">
            <div class="container">
                <div class="carousel-caption">
                    <!-- <h3>Summer <span>Collection</span></h3>
						<p>New Arrivals On Sale</p>
						<a class="hvr-outline-out button2" href="mens.html">Shop Now </a> -->
                </div>
            </div>
        </div>
        <div class="item item3">
            <div class="container">
                <div class="carousel-caption">

                    <h3>New products </h3>
                    <p class="paraghraph">Apple Hand Pipe, Zig-zag original rolling tips</p>
                    <a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
                </div>
            </div>
        </div>
        <div class="item item4">
            <div class="container">
                <div class="carousel-caption">
                    <h3>Summer <span>Collection</span></h3>
                    <p>New Arrivals On Sale</p>
                    <a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
                </div>
            </div>
        </div>
        <div class="item item5">
            <div class="container">
                <div class="carousel-caption">
                    <h3>The Biggest <span>Sale</span></h3>
                    <p>Special for today</p>
                    <a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!-- The Modal -->
</div>


{{--{{ $data }}--}} 


<!-- //banner -->
<div class="banner_bottom_agile_info">
    <div class="container-fluid  newclass">

    <!-- Popular_list -->
        <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3 col-12">
            <div class="card ">
                <div class="row">
                    <div class="col-12 col-md-7 col-sm-7 col-lg-7 col-xl-7">
                        <p class="font-family-change">HOT ITEMS</p>

                    </div>

                    <div class="col-12 col-md-5 col-sm-5 col-lg-5 col-xl-5">
                        <div class="buttons-left-right">
                            <!-- <i class="fa fa-chevron-circle-left" style="font-size:24px"></i>
                            <i class="fa fa-chevron-circle-right" style="font-size:24px"></i> -->
                        </div>
                    </div>

                </div>
                <hr class="margin-top-bottom">
                <div>
                    <div class="row product-show-hot slider">
                    @if(!empty($popular_list))
                          @foreach ($popular_list as $cat)
                          @foreach ($cat->category_based_product as $product)
                        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 slide">
                        <div class="images image-left">
                                <div class="background-gray left-side">
                                @if(!empty($product->image))
                                    <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                @else
                                <img src="{{url('assets/images/frontend/ciyp-bulk-image1.png')}}" alt="" srcset="" />
                                @endif
                                </div>
                                    <br/>
                                    <h4>{{$product->product_name}}</h4>
                                    <span><strike>${{$product->bid_amount}}</strike> &nbsp; <span> ${{$product->shipping_price}} </span></span>
                                    
                                    @if(!empty($product->review) && (count($product->review)!=0))
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                    </div>
                                    @else
                                    <div>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                    </div>
                                    @endif
                                </div>
                            <!-- <div class="images image-left">
                                <div class="background-gray left-side">
                                    <img src="{{url('assets/images/frontend/ciyp-bulk-image1.png')}}" alt="" srcset="" />
                                </div>
                                <br />

                                <h4>{{$product->product_name}}</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>

                            </div> -->
                        </div>
                         @endforeach
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-9 col-lg-9 col-xl-9 col-12">
            <div class="card">
                <!-- ghkhfghj	 -->

                <div class="row">

                    <div class="col-12 col-md-5 col-sm-5 col-lg-5 col-xl-5">
                        <p class="font-family-change">POPULAR ITEMS</p>

                    </div>

                    <div class="col-12 col-md-7 col-sm-7 col-lg-7 col-xl-7">

                        <div class="buttons-left-right">
                        </div>
                        <ul class="popular-items tab">
                        @if(!empty($data))
                          @foreach ($data as $cat)
                            <li>
                                <button class="tablinks"  id="{{$loop->index==0?'defaultOpen':''}}" onclick="openCity(event, '{{$cat->categoryName}}')">{{$cat->categoryName}}</button>
                            </li>
                          @endforeach
                        @endif
                            

                        </ul>

                    </div>

                </div>
                <hr class="margin-top-bottom">

                @if(!empty($data))
                    @foreach ($data as $cat)

                    

                    <div id="{{$cat->categoryName}}" class="tabcontent">
                    
                    @if(!empty($cat->category_based_product))
                        <div class="row product-show-list slider">
                        @foreach ($cat->category_based_product as $product)
                            <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3 slide">

                            {{--{{$product->image['product_img']}}--}}

                                <div class="images">
                                @if(!empty($product->image))
                                    <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                @else
                                <img src="https://images.everydayhealth.com/images/ordinary-fruits-with-amazing-health-benefits-05-1440x810.jpg" alt="" srcset="" />
                                @endif
                                    <br/>
                                    <h4>{{$product->product_name}}</h4>
                                    <span><strike>${{$product->bid_amount}}</strike> &nbsp; <span> ${{$product->shipping_price}} </span></span>
                                    
                                    @if(!empty($product->review) && (count($product->review)!=0))
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                    </div>
                                    @else
                                    <div>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                    </div>
                                    @endif
                                </div>

                            </div>
                            
                            @endforeach                           
                           
                        </div>
                        

                    @endif
                    
                    </div>
                    @endforeach
                @endif 



            </div>

        </div>
    </div>
</div>


<!-- Special  -->

<div class="banner_bottom_agile_info_bottom---5">
    <div class="container-fluid  newclass">


        <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3 col-12 reducewidth nnnn">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12">
                    <div class="card ">
                        <div class="row">
                            <div class="col-12 col-md-8 col-sm-8 col-lg-8 col-xl-8">
                                <p class="font-family-change">SPEACIAL ITEMS</p>
                                <!-- special_list -->
                            </div>

                            <div class="col-12 col-md-4 col-sm-4 col-lg-4 col-xl-4">
                                <div class="buttons-left-right">
                                    <!-- <i class="fa fa-chevron-circle-left" style="font-size:24px"></i>
                                    <i class="fa fa-chevron-circle-right" style="font-size:24px"></i> -->
                                </div>
                            </div>

                        </div>
                        <hr class="margin-top-bottom">
                        <div>
                            <div class="row show-special-list slider">
                                @if(!empty($special_list))
                                @foreach ($special_list as $cat)
                                @foreach ($cat->category_based_product as $product)
                        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 slide">
                        <div class="images image-left">
                                <div class="background-gray left-side">
                                @if(!empty($product->image))
                                    <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                @else
                                <img src="{{url('assets/images/frontend/ciyp-bulk-image1.png')}}" alt="" srcset="" />
                                @endif
                                </div>
                                    <br/>
                                    <h4>{{$product->product_name}}</h4>
                                    <span><strike>${{$product->bid_amount}}</strike> &nbsp; <span> ${{$product->shipping_price}} </span></span>
                                    
                                    @if(!empty($product->review) && (count($product->review)!=0))
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                    </div>
                                    @else
                                    <div>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                        <span class="fa fa-star-o checked"></span>
                                    </div>
                                    @endif
                                </div>
                            <!-- <div class="images image-left">
                                <div class="background-gray left-side">
                                    <img src="{{url('assets/images/frontend/ciyp-bulk-image1.png')}}" alt="" srcset="" />
                                </div>
                                <br />

                                <h4>{{$product->product_name}}</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>

                            </div> -->
                        </div>
                         @endforeach
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12">
                    <div class="card ">
                        <div class="row">
                            <div class="col-12 col-md-8 col-sm-8 col-lg-8 col-xl-8">
                                <p class="font-family-change">NEWSLETTERS</p>

                            </div>
                        </div>
                        <hr class="margin-top-bottom">
                        <div>
                            <div class="row">

                                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                                    <div class="images image-left">
                                        <div class="background-white">
                                            <span class="newslatter">
                                                Sign Up for Our Newslatters!
                                            </span>
                                            <div class="inputfieldform">
                                                <input type="text" class="inputfield">
                                            </div>
                                            <div>
                                                <input type="button" value="SUBSCRIBE" class="buttonSubscribe">
                                            </div>
                                            <!-- <img src="images/pngkey.com-box-png-274941 (1).png" alt="" srcset=""/> -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12 adv-image-left" style="background: url('assets/images/frontend/Layer_63.png');
					margin-left: 15px;
					background-repeat: no-repeat;
				  ">

                </div>

            </div>

        </div>
        <div class="col-md-9 col-sm-9 col-lg-9 col-xl-9 col-12 reducewidth">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12">
                    <div class="card">

                        <div class="row">

                            <div class="col-12 col-md-6 col-sm-6 col-lg-6 col-xl-6">

                                <div class="module" style="background: url(assets/images/frontend/download.png);background-attachment: fixed;
									  background-position: center;
									">

                                    <header>
                                        <div class="rotationclass">
                                            <h1 class="yearColor">
                                                2021

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
                                                2021

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
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12">
                    <div class="card">

                        <div class="row">

                            <div class="col-12 col-md-5 col-sm-5 col-lg-5 col-xl-5">
                                <p class="font-family-change">LATEST PRODUCT</p>

                            </div>

                            <div class="col-12 col-md-7 col-sm-7 col-lg-7 col-xl-7">

                                <div class="buttons-left-right">
                                    <!-- <i class="fa fa-chevron-circle-left" style="font-size:24px"></i>
                                    <i class="fa fa-chevron-circle-right" style="font-size:24px"></i> -->
                                </div>
                                <ul class="popular-items tab">

                                    @if(!empty($latest_list))
                                    @foreach ($latest_list as $cat)
                                    <li>
                                    <button class="tablinks2"  id="{{$loop->index==0?'defaultOpen2':''}}" onclick="open2(event, '{{$cat->categoryName}}2')">{{$cat->categoryName}}</button>
                                    </li>
                                    @endforeach
                                    @endif

                                </ul>

                            </div>

                        </div>
                        <hr class="margin-top-bottom">

                        @if(!empty($latest_list))
                            @foreach ($latest_list as $cat)                            

                            <div id="{{$cat->categoryName}}2" class="tabcontent2 all">
                            
                            @if(!empty($cat->category_based_product))
                                <div class="row product-latest_list slider">
                                @foreach ($cat->category_based_product as $product)
                                    <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-12 slide">

                                    {{--{{$product->image['product_img']}}--}}

                                        <div class="images">
                                        @if(!empty($product->image))
                                            <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        @else
                                        <img src="https://images.everydayhealth.com/images/ordinary-fruits-with-amazing-health-benefits-05-1440x810.jpg" alt="" srcset="" />
                                        @endif
                                            <br/>
                                            <h4>{{$product->product_name}}</h4>
                                            <span><strike>${{$product->bid_amount}}</strike> &nbsp; <span> ${{$product->shipping_price}} </span></span>
                                            
                                            @if(!empty($product->review) && (count($product->review)!=0))
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star-o checked"></span>
                                                <span class="fa fa-star-o checked"></span>
                                            </div>
                                            @else
                                            <div>
                                                <span class="fa fa-star-o checked"></span>
                                                <span class="fa fa-star-o checked"></span>
                                                <span class="fa fa-star-o checked"></span>
                                                <span class="fa fa-star-o checked"></span>
                                                <span class="fa fa-star-o checked"></span>
                                            </div>
                                            @endif
                                        </div>

                                    </div>
                                    
                                    @endforeach                           
                                
                                </div>
                                

                            @endif
                            
                            </div>
                            @endforeach
                        @endif 


                        <!-- <div id="All2" class="tabcontent2 all">
                            <div class="row">

                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>

                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/product-2-191x132_copy.png')}}" alt="" srcset="" />
                                        </div>
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/pngkey.com-computer-png-44599.png')}}" alt="" srcset="" />
                                        </div>
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/imgbin_home-appliance-washing-machine-refrigerator-png.png')}}" alt="" srcset="" />
                                        </div>
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                        </div>

                        <div id="Vegetables2" class="tabcontent2">
                            <div class="row">

                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                        </div>

                        <div id="Meet2" class="tabcontent2">
                            <div class="row">

                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>

                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/product-2-191x132_copy.png')}}" alt="" srcset="" />
                                        </div>
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/pngkey.com-computer-png-44599.png')}}" alt="" srcset="" />
                                        </div>
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/imgbin_home-appliance-washing-machine-refrigerator-png.png')}}" alt="" srcset="" />
                                        </div>
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                        </div>

                        <div id="Fruits2" class="tabcontent2">
                            <div class="row">

                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                        </div> -->



                    </div>

                </div>

                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12 adv-right-side">
                    <div class="adv-right">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-12">
                            <img src="{{url('assets/images/frontend/download (2).png')}}" class="ad-right" alt="">

                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-12">
                            <div class="right-adv">
                                <h1 class="wholesale">WHOLESALE PRODUCTS</h1>
                                <h1 class="readytosell">READY TO SELL NOW 50% OFF!</h1>
                                <button class="colorBlack">SHOP NOW</button>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12">
                    <div class="card">

                        <div class="row">

                            <div class="col-12 col-md-5 col-sm-5 col-lg-5 col-xl-5">
                                <p class="font-family-change">FEATURED PRODUCTS</p>

                            </div>

                            <div class="col-12 col-md-7 col-sm-7 col-lg-7 col-xl-7">

                                <div class="buttons-left-right">
                                    <!-- <i class="fa fa-chevron-circle-left" style="font-size:24px"></i>
                                    <i class="fa fa-chevron-circle-right" style="font-size:24px"></i> -->
                                </div>
                                <ul class="popular-items tab">

                                    @if(!empty($feature_list))
                                        @foreach ($feature_list as $cat)
                                            <li>
                                                <button class="tablinks3"  id="{{$loop->index==0?'defaultOpen3':''}}" onclick="open3(event, '{{$cat->categoryName}}3')">{{$cat->categoryName}}</button>
                                            </li>
                                        @endforeach
                                    @endif
                                    <!-- <li>
                                        <button class="tablinks3" onclick="open3(event, 'Fruits3')">Fruits</button>
                                    </li>
                                    <li>
                                        <button class="tablinks3" onclick="open3(event, 'Meet3')">Meet</button>
                                    </li>
                                    <li>
                                        <button class="tablinks3" onclick="open3(event, 'Vegetables3')">Vegetables</button>
                                    </li>
                                    <li>
                                        <button class="tablinks3" onclick="open3(event, 'All3')" id="defaultOpen3">
                                            All</button>
                                    </li> -->

                                </ul>

                            </div>

                        </div>
                        <hr class="margin-top-bottom">


                        @if(!empty($feature_list))
                         @foreach ($feature_list as $cat)

                    

                            <div id="{{$cat->categoryName}}3" class="tabcontent3">
                            
                            @if(!empty($cat->category_based_product))
                                <div class="row product-feature_list slider">
                                @foreach ($cat->category_based_product as $product)
                                    <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth slide">

                                        <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                            <div class="background-gray new-size">
                                            @if(!empty($product->image))
                                                <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                            @else
                                                <img src="https://images.everydayhealth.com/images/ordinary-fruits-with-amazing-health-benefits-05-1440x810.jpg" alt="" srcset="" />
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                                <h4>{{$product->product_name}}</h4>
                                                <span><strike>${{$product->bid_amount}}</strike> &nbsp; <span> ${{$product->shipping_price}} </span></span>
                                                
                                                @if(!empty($product->review) && (count($product->review)!=0))
                                                <div>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star-o checked"></span>
                                                    <span class="fa fa-star-o checked"></span>
                                                </div>
                                                @else
                                                <div>
                                                    <span class="fa fa-star-o checked"></span>
                                                    <span class="fa fa-star-o checked"></span>
                                                    <span class="fa fa-star-o checked"></span>
                                                    <span class="fa fa-star-o checked"></span>
                                                    <span class="fa fa-star-o checked"></span>
                                                </div>
                                                @endif
                                        </div>



                                    </div>
                                    @endforeach                           
                                
                                </div>
                                

                            @endif
                            
                            </div>
                            @endforeach
                        @endif 


                        <div id="Fruits3" class="tabcontent3">
                            <div class="row">

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                        </div>

                        <!-- <div id="All3" class="tabcontent3 all">
                            <div class="row">

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/product-3-238x158_(1)_copy.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                                            <img src="{{url('assets/images/frontend/ciyp-bulk-image1.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                                            <img src="{{url('assets/images/frontend/istockphoto-1159952152-612x612.jpg')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                            <div class="row margin-top">

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/besan-besan-fortune-original-imag4gb4hzv2qzvy.jpeg')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                                            <img src="{{url('assets/images/frontend/dsc07685_1280.jpg')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                        </div>

                        <div id="Vegetables3" class="tabcontent3">
                            <div class="row">

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                        </div>

                        <div id="Meet3" class="tabcontent3">
                            <div class="row">

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                        </div>

                        <div id="Fruits3" class="tabcontent3">
                            <div class="row">

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
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
                        </div> -->

                    </div>

                </div>
            </div>


        </div>

    </div>
</div>
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

@endsection

@push('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
@endpush