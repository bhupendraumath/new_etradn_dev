@extends('layouts.frontend.app')

@section('content')

<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>MY FAVORITE PRODUCT</h3>

    </div>
</div>



<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

        @include('frontend/include/buyer-side-bar')

        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
            <div class="card-dashboard  col-12uy">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">

                    <h3 class="favorite-heading">MY FAVORITES <span class="color-yellow-number">(4)</span></h3>
                        <!-- <div class="inner-addon left-addon search-bar">
                            <i class="fas fa-search glyphicon"></i>
                            <input type="text" class="form-control 60per lock change-style-search" name="payment-id" placeholder="Searching..." />
                        </div> -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12 float-right">
                        <!-- filter section    -->
                        <button class="filter-button remove-color-black">REMOVE ALL </button>



                        <!-- filter section    -->


                    </div>
                </div>
                <hr class="favorite"/>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <!-- <p class="no-results">No more results found</p> -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <!-- <div class="inner-addon left-addon">
                        <i class="fab fa-paypal glyphicon"></i>
                        <input type="text" class="form-control 60per lock" name="Current-password" placeholder="Payment gateway ID*" />
                        </div> -->
                    </div>
                </div>

                <br /><br />


                <div class="products row">

                    <div class="product col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" data-id="aloe" data-category="green small medium africa">
                        <div class="images onhover-show-menus">
                            <div class="operation-edit-delete">
                                <!-- <p>Lots of interesting information!
                                </p> -->
                            </div>
                            <div class="background-gray">
                                <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                            </div>

                            <br />

                            <h4>B2b Product Name</h4>
                            <span><strike>$110.00</strike> &nbsp; <span> $90.00 </span></span>
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star-o checked"></span>
                                <span class="fa fa-star-o checked"></span>

                            </div>
                        </div>

                    </div>
                    <div class="product col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" data-id="gorse" data-category="green yellow large europe">
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

                    <div class="product col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" data-id="hemp" data-category="green large asia">
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
                    <div class="product col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" data-id="lavendar" data-category="purple green medium africa europe">
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
                <br /><br />
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(function($) {
        var path = window.location.href;
        console.log("pathfdf  ", path)
        $('a').each(function() {
            if (path == this.href) {

                console.log("added...")
                $(this).addClass('left-active');
            }

        })
    })
</script>
@endsection