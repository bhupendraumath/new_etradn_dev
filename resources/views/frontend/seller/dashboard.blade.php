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
        <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12 card-dashboard">

            <div class="row">
                <div class="col-md-5 col-sm-5 col-lg-5 col-xl-5 col-xs-12">
                    <div class="imageAvt">
                        <img src="{{url('assets/images/frontend/t1.jpg')}}" alt="" srcset="">

                    </div>
                </div>

                <div class="col-md-7 col-sm-7 col-lg-7 col-xl-7 col-xs-12">
                    <div class="details-right">
                        <h3 class="seller-h3">{{Auth::user()->firstName. " ".Auth::user()->lastName }}</h3>
                        <p class="sellerr-pagamil">{{Auth::user()->email}} </p>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row border-row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <h4 class="Heading-h4">MINIMUM ORDER</h4>
                    <h4 class="Heading-yellow-h4">{{Auth::user()->minimum_order}}</h4>
                </div>
            </div>
            <hr />
            <div class="row border-row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <h4 class="Heading-h4">BUSINESS NAME</h4>
                    <h4 class="Heading-yellow-h4">{{Auth::user()->business_name}}</h4>
                </div>
            </div>
            <hr />
            <div class="row border-row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <h4 class="Heading-h4">BUSINESS ADDRESS</h4>
                    <h4 class="Heading-yellow-h4">{{Auth::user()->business_address}}</h4>
                </div>
            </div>
            <hr />
            <div class="row border-row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <h4 class="Heading-h4">PHONE NUMBER</h4>
                    <h4 class="Heading-yellow-h4">{{Auth::user()->phone_number}}</h4>
                </div>
            </div>
            <hr />
            <div class="row border-row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <h4 class="Heading-h4">BUSINESS TYPE</h4>
                    <h4 class="Heading-yellow-h4">{{Auth::user()->business_type_id}}</h4>
                </div>
            </div>
            <hr />
            <div class="row border-row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <h4 class="Heading-h4">BUSINESS CATEGORY</h4>
                    <h4 class="Heading-yellow-h4">{{Auth::user()->category}}</h4>
                </div>
            </div>
            <hr />
            <!-- <div class="row border-row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <h4 class="Heading-h4">PHONE Number</h4>
                    <h4 class="Heading-yellow-h4">3128804060</h4>
                </div>
            </div>
            <hr /> -->
            <div class="row border-row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <h4 class="Heading-h4">UPLOAD DOCUMENTS</h4>
                    <!-- <h4 class="Heading-yellow-h4">3128804060</h4> -->
                </div>
            </div>
            <hr />
            <div class="row border-row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <h4 class="Heading-h4">BUSINESS DESCRIPTION</h4>
                    <!-- <h4 class="Heading-yellow-h4">3128804060</h4> -->
                </div>
            </div>
            <hr />
            <div class="row border-row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <h4 class="Heading-h4">EDIT></h4>
                    <button class="view-more">
                        VIEW MORE
                    </button>
                    <!-- <h4 class="Heading-yellow-h4">3128804060</h4> -->
                </div>
            </div>

        </div>
        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
            <div class="card-dashboard">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY REVIEW AND RATING
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more">VIEW MORE</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY REVIEW AND RATING
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more">VIEW MORE</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY REVIEW AND RATING
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more">VIEW MORE</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY REVIEW AND RATING
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more">VIEW MORE</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY REVIEW AND RATING
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more">VIEW MORE</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY REVIEW AND RATING
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more">VIEW MORE</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY REVIEW AND RATING
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more">VIEW MORE</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY REVIEW AND RATING
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more">VIEW MORE</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY REVIEW AND RATING
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more">VIEW MORE</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY REVIEW AND RATING
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more">VIEW MORE</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY REVIEW AND RATING
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more">VIEW MORE</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-2">
                            <h4 class="review-dashbord">
                                MY REVIEW AND RATING
                            </h4>
                            <div class="gray-number">0</div><br />
                            <span class="view-more">VIEW MORE</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection