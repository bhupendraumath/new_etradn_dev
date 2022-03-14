@extends('layouts.frontend.app')

@section('content')


<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>MY WALLET</h3>
    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">
        @include('frontend/include/seller-side-bar')


        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
            <div class="card-dashboard  col-12uy">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
                        <h3 class="amount">AMOUNT</h3>
                    </div>
                </div>
                <hr/>
                
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-3">
                            <h3 class="review-dashbord wallet">
                                ON HOLD AMOUNT 
                            </h3>
                            <p class="on-hold-amount">
                                The amount which the seller has <br/>asked to be redeemed
                            </p>
                            <!-- <div class="gray-number">0</div><br/> -->
                            <div class="hold-amount wallet">SAR0.00</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="card-3">
                            <h3 class="review-dashbord wallet">
                                AVAILABLE AMOUNT
                            </h3>

                            <p class="available-amount">
                                The amount which the buyer has paid <br/> and the real amount is with the admin <br/>the virtual calculation is shown<br/> here
                            </p>
                            <div class="available-amount wallet">SAR0.00</div>
                        </div>
                    </div>
                </div>

                <div class="row margin-top-redeem">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
                        <h3 class="request-redeem">REQUEST TO REDEEM THE AMOUNT</h3>
                    </div>
                </div>
                <hr/>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
                        <div class="inner-addon left-addon">
                        <i class="fa fa-dollar-sign glyphicon"></i>
                        <!-- <i class="glyphicon glyphicon-lock"></i> -->
                        <input type="text" class="form-control 60per lock" name="Redeem Amount" placeholder="Redeem Amount*" />
                        </div>
                    </div>
                </div>

                <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
                            <div class="buttons-account-seetings"> 
                            <input type="submit" value="SEND REQUEST" class="change-password">
                            </div>
                        </div>
                        
                    </div>  
        </div>
</div>

<script>
    $(document).ready(function() {
        // var rating_value=$("#rating_value").val();
        // document.getElementById(`rating${rating_value}`).checked = true;
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
@endsection
