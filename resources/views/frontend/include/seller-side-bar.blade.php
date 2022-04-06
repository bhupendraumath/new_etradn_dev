


<div  class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12 card-dashboard change-color backgound-remove">
    <div class="border-round">

        <div class="row">
            <div class="col-md-5 col-sm-5 col-lg-5 col-xl-5 col-xs-12">
                <div class="imageAvt">

                @php

                $profile_img=Auth::user()->profile_img;

                @endphp
                
                    <img  src="{{url('assets/images/my-profile/'. $profile_img)}}"  onerror="this.src='{{url('assets/images/frontend/user3.jpg')}}';" alt="" srcset="">

                </div>
            </div>

            <div class="col-md-7 col-sm-7 col-lg-7 col-xl-7 col-xs-12">
                <div class="details-right">
                    <h3 class="seller-h3"> {{Auth::user()->firstName}}
                        {{Auth::user()->lastName}}
                    </h3>
                    <p class="sellerr-pagamil">{{Auth::user()->email}}</p>
                </div>
            </div>
        </div>
        <div class="row border-row border-top">
            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
                <div class="row  class-row-color-change">
                    <div class="col-md-5 col-sm-5 col-lg-5 col-xl-5 col-xs-6 edit-button">
                        <h4 class="Heading-h4-button">EDIT></h4>
                    </div>

                    <div class="col-md-7 col-sm-7 col-lg-7 col-xl-7 col-xs-6">

                        <a href="{{route('personInformation')}}">

                            <div class="details-right-settings">
                                <button class="view-more-button">
                                    VIEW MORE
                                </button>
                            </div>
                        </a>
                    </div>
                </div>


                <!-- <h4 class="Heading-h4-button">EDIT></h4>
                        <button class="view-more-button">
                            VIEW MORE
                        </button> -->
                <!-- <h4 class="Heading-yellow-h4">3128804060</h4> -->
            </div>
        </div>

    </div>
    <div class="borderOrStyle" onclick="mysellersidebar()">
       
        

        @if(Route::current()->getName()=='seller.dashboard')
        Dashboard

        @elseif(Route::current()->getName()=='add-product')
        Add product
        
        @elseif(Route::current()->getName()=='my-order')
        My order

        @elseif(Route::current()->getName()=='myUploadProduct')
        My Uploaded Product

        @elseif(Route::current()->getName()=='review-rating')
        review rating

        @elseif(Route::current()->getName()=='business-address')
        business address

        @elseif(Route::current()->getName()=='delivery-areas')
        delivery areas

        @elseif(Route::current()->getName()=='bidsPlaced')
        bids Placed

        @elseif(Route::current()->getName()=='refund-request')
        refund request

        @elseif(Route::current()->getName()=='wallet')
        wallet

        @elseif(Route::current()->getName()=='accountSetting')
        Account Setting

        @elseif(Route::current()->getName()=='rfq_list')
        rfq list

        @else
        {{Route::current()->getName()}}
        @endif
        <i style="float:right" class="fas fa-angle-down"></i></i>
    </div>
   

    <div id="sellersidebar" class="background-gredient">
        <!-- <hr class="margin-bottom"/> -->
        <a href="{{route('seller.dashboard')}}">
            <div class="row border-row-top-border top-vv">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <span><i class="fas fa-list margin-leftor-right"></i> <b class="heading-business">DASHBOARD</b> </span>
                </div>
            </div>
        </a>

       

        <a href="{{route('add-product-page')}}">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <span><i class="fas fa-plus margin-leftor-right"></i> <b class="heading-business">ADD PRODUCT</b> </span>
                </div>
            </div>
        </a>

        <a href="{{route('my-order')}}">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <!-- <i class="fas fa-bags-shopping"></i> -->
                    <!-- <i class="fa-solid fa-bag-shopping"></i> -->
                    <span><i class="fa fa-shopping-bag margin-leftor-right"></i> <b class="heading-business">MY ORDERS</b> </span>
                </div>
            </div>
        </a>
        <a href="{{route('myUploadProduct')}}">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <span><i class="fas fa-file-upload margin-leftor-right"></i> <b class="heading-business">MY UPLOADED PRODUCTS</b> </span>
                </div>
            </div>
        </a>

        <a href="{{route('review-rating')}}">

            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <span><i class="fa fa-star margin-leftor-right"></i> <b class="heading-business">MY REVIEW AND RATING</b> </span>
                </div>
            </div>
        </a>


{{--        <a href="{{route('businessInformation')}}">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <span><i class="fas fa-user-alt margin-leftor-right"></i> <b class="heading-business">BUSINESS INFORMATION</b> </span>
                </div>
            </div>
        </a> --}}

        <a href="{{route('business-address')}}">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <span><i class="fas fa-map-marker-alt margin-leftor-right"></i> <b class="heading-business">BUSINESS ADDRESSES</b> </span>
                </div>
            </div>
        </a>

        <a href="{{route('delivery-areas')}}">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row" href="delivary-area.php">
                    <span><i class="fa fa-truck margin-leftor-right"></i> <b class="heading-business">MY DELIVERY AREAS</b> </span>
                </div>
            </div>
        </a>


        <a href="{{route('bidsPlaced')}}">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row" >
                    <span><i class="fas fa-gavel margin-leftor-right"></i> <b class="heading-business">BIDS PLACED</b> </span>
                </div>
            </div>
        </a>

        <a href="{{route('refund-request')}}">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <span><i class="fas fa-hand-holding-usd margin-leftor-right"></i> <b class="heading-business">REFUND REQUEST</b> </span>
                </div>
            </div>
        </a>

        <a href="{{route('wallet')}}">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row" href="wallet.php">
                    <span><i class="fas fa-wallet margin-leftor-right"></i> <b class="heading-business">WALLET</b> </span>
                </div>
            </div>
        </a>

        <a href="{{route('accountSetting')}}" class="top-borders">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row" href="account-settings.php">
                    <span><i class="fas fa-cog margin-leftor-right"></i> <b class="heading-business">ACCOUNT SETTINGS</b> </span>
                </div>
            </div>
        </a>

        <a href="{{route('rfq_list')}}">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row" >
                    <span><i class="fas fa-wallet margin-leftor-right"></i> <b class="heading-business">RFQ LIST</b> </span>
                </div>
            </div>
        </a>

    </div>

</div>


<script>
    jQuery(function($) {
        var path = window.location.href;
        // console.log("pa/thfdf  ",path)
        $('a').each(function() {
            if (path == this.href) {

                //   console.log("added...")
                $(this).addClass('left-active');
            }

        })
    })

    function mysellersidebar() {
    var x = document.getElementById("sellersidebar");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    }
</script>