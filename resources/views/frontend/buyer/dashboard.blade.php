@extends('layouts.frontend.app')

@section('content')


<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>BUYER<span> DASHBOARD </span></h3>

    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">
     {{--   @include('frontend/include/buyer-side-bar') --}}
        
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
            <div class="  col-12uy">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                        <div class="card-2 card-personal">
                            <h4 class="review-dashbord personal-information">
                                MY PERSONAL INFORMATION
                            </h4>
                            <div class="margin-top-padding">
                            <span>
                            <i class="fas fa-user"></i>&nbsp;  {{Auth::user()->firstName}}
                            </span>   
                            <br/>                      
                            <span>
                                <i class="far fa-envelope"></i> &nbsp;{{Auth::user()->email}}
                            </span> <br/><br/>                           

                            </div>
                              
                            <span class="view-more dashboard personal-information">
                                <a href="{{route('buyerPersonalDetails')}}">Edit></a></span><br/>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                               MY FAVORITE PRODUCTS
                            </h4>
                            <div class="gray-number">{{buyerFavoriteProductCount()}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('favoriteProduct')}}">VIEW MORE</a></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY PLACED BIDS
                            </h4>
                            <div class="gray-number">{{buyerBidPlacedCount()}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('buyer.bidsPlaced')}}">VIEW MORE</a></span>
                        </div>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY PURCHASE HISTORY
                            </h4>
                            <div class="gray-number">{{buyerOrderCount()}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('buyer.purchaseHistory')}}">VIEW MORE</a></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY DELIVERY AREAS
                            </h4>
                            <div class="gray-number">{{sellerBusinessAddressCount('delivery')}}</div><br />
                            <span class="view-more dashboard"><a href="{{route('buyer.deliveryArea')}}">VIEW MORE</a></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                ACCOUNT SETTINGS
                            </h4>
                            <div class="gray-number"></div>
                            <br />
                            <span class="view-more dashboard"><a href="{{route('buyer.buyerAccountSetting')}}">VIEW MORE</a></span>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <br/><br/><br/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> -->
@endsection
