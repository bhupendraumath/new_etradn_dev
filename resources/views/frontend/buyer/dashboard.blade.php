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
                            <i class="fas fa-user"></i>&nbsp;  pixer
                            </span>   
                            <br/>                      
                            <span>
                                <i class="far fa-envelope"></i> &nbsp;Taiba@gmail.com
                            </span> <br/><br/>                           

                            </div>
                              
                            <span class="view-more dashboard personal-information"><a href="review-and-rating.php">Edit></a></span><br/>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                               MY FAVORITE PRODUCTS
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more dashboard"><a href="business-address.php">VIEW MORE</a></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY PLACED BIDS
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more dashboard"><a href="upload-product.php">VIEW MORE</a></span>
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
                            <div class="gray-number">0</div><br />
                            <span class="view-more dashboard"><a href="bids-placed.php">VIEW MORE</a></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY SHIPPING ADDRESS
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more dashboard"><a href="orders.php">VIEW MORE</a></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                ACCOUNT SETTINGS
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more dashboard"><a href="delivary-area.php">VIEW MORE</a></span>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
@endsection
