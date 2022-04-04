@extends('layouts.frontend.app')

@section('content')


<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>SELLER<span> DASHBOARD </span></h3>

    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">
        @include('frontend/include/seller-side-bar')


        <div class="col-md-12 col-sm-12 col-lg-8 col-xl-8 col-xs-12">
            <div class="card-dashboard  col-12uy">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY REVIEW AND RATING
                            </h4>
                            <div class="gray-number">{{sellerRatingCount()}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('review-rating')}}">VIEW MORE</a></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                BUSINESS ADDRESS
                            </h4>
                            <div class="gray-number">{{sellerBusinessAddressCount('business')}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('business-address')}}">VIEW MORE</a></span>
                        </div>
                    </div>
                <!-- </div>

                <div class="row"> -->
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY UPLOAD PRODUCTS
                            </h4>
                            <div class="gray-number">{{sellerUploadProductCount()}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('myUploadProduct')}}">VIEW MORE</a></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                BIDS PLACED ON MY <br />LISTED PRODUCT
                            </h4>
                            <div class="gray-number">{{sellerBidPlacedCount()}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('bidsPlaced')}}">VIEW MORE</a></span>
                        </div>
                    </div>
                <!-- </div>

                <div class="row"> -->
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY ORDERS
                            </h4>
                            <div class="gray-number">{{sellerorderCount()}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('my-order')}}">VIEW MORE</a></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY DELIVARY AREAS
                            </h4>
                            <div class="gray-number">{{sellerBusinessAddressCount('delivery')}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('delivery-areas')}}">VIEW MORE</a></span>
                        </div>
                    </div>
                <!-- </div>
                <div class="row"> -->
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                REFUND REQUESTS
                            </h4>
                            <div class="gray-number">{{sellerRefundCount()}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('refund-request')}}">VIEW MORE</a></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                ACCOUNT SETTINGS
                            </h4>
                            <div class="gray-number"></div><br />
                            <span class="view-more dashboard"><a href="{{route('accountSetting')}}">VIEW MORE</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> -->
@endsection