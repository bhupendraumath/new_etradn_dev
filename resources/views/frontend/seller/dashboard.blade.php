@extends('layouts.frontend.app')

@section('content')


<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>{{lang('SELLER')}}<span> {{lang('DASHBOARD')}} </span></h3>

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
                            {{lang('MY_REVIEW_AND_RATING')}}
                            </h4>
                            <div class="gray-number">{{sellerRatingCount()}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('review-rating')}}">{{lang('VIEW_MORE')}}</a></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                            {{lang('BUSINESS_ADDRESS')}}
                            </h4>
                            <div class="gray-number">{{sellerBusinessAddressCount('business')}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('business-address')}}">{{lang('VIEW_MORE')}}</a></span>
                        </div>
                    </div>
                <!-- </div>

                <div class="row"> -->
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                            {{lang('MY_UPLOADED_PRODUCTS')}}
                            </h4>
                            <div class="gray-number">{{sellerUploadProductCount()}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('myUploadProduct')}}">{{lang('VIEW_MORE')}}</a></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                            {{lang('BIDS_PLACED')}}
                            </h4>
                            <div class="gray-number">{{sellerBidPlacedCount()}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('bidsPlaced')}}">{{lang('VIEW_MORE')}}</a></span>
                        </div>
                    </div>
                <!-- </div>

                <div class="row"> -->
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                            {{lang('MYORDERS')}}
                            </h4>
                            <div class="gray-number">{{sellerorderCount()}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('my-order')}}">{{lang('VIEW_MORE')}}</a></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                            {{lang('MY_DELIVERY_AREAS')}}
                            </h4>
                            <div class="gray-number">{{sellerBusinessAddressCount('delivery')}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('delivery-areas')}}">{{lang('VIEW_MORE')}}</a></span>
                        </div>
                    </div>
                <!-- </div>
                <div class="row"> -->
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                            {{lang('REFUND_REQUEST')}}
                            </h4>
                            <div class="gray-number">{{sellerRefundCount()}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('refund-request')}}">{{lang('VIEW_MORE')}}</a></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                            {{lang('ACCOUNT_SETTINGS')}}
                            </h4>
                            <div class="gray-number"></div><br />
                            <span class="view-more dashboard"><a href="{{route('accountSetting')}}">{{lang('VIEW_MORE')}}</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> -->
@endsection