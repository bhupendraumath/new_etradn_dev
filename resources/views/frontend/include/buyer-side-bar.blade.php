<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12 card-dashboard change-color backgound-remove">
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
                        <h4 class="Heading-h4-button">{{lang('EDIT')}}></h4>
                    </div>

                    <div class="col-md-7 col-sm-7 col-lg-7 col-xl-7 col-xs-6">

                        <a href="{{route('buyerPersonalDetails')}}">

                            <div class="details-right-settings">
                                <button class="view-more-button">
                                {{lang('VIEW_MORE')}}
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="borderOrStyle" onclick="mybuyersidebar()">
       

       @if(Route::current()->getName()=='dashboard')
       Dashboard

       @elseif(Route::current()->getName()=='favoriteProduct')
       Favorite Product
       
       @elseif(Route::current()->getName()=='buyer.bidsPlaced')
        My Placed Bid

       @elseif(Route::current()->getName()=='buyer.purchaseHistory')
       My Purchase History

       @elseif(Route::current()->getName()=='buyer.deliveryArea')
       Delivery Area

       @elseif(Route::current()->getName()=='buyer.buyerAccountSetting')
       Account Setting

       @elseif(Route::current()->getName()=='delivery-areas')
       delivery areas

       @elseif(Route::current()->getName()=='bidsPlaced')
       bids Placed
       @else
       {{Route::current()->getName()}}
       @endif
       <i style="float:right" class="fas fa-angle-down"></i></i>
   </div>

    <div id="sellersidebar" class="background-gredient">
        <!-- <hr class="margin-bottom"/> -->
        <a href="{{route('buyer.dashboard')}}">
            <div class="row border-row-top-border top-vv">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <span><i class="fas fa-list margin-leftor-right"></i> <b class="heading-business">{{lang('DASHBOARD')}}</b> </span>
                </div>
            </div>
        </a>

        <a href="{{route('favoriteProduct')}}">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <span><i class="fa fa-heart-o add-to-favorite margin-leftor-right"></i> <b class="heading-business">
                    {{lang('MY_FAVORITE_PRODUCTS')}}</b> </span>
                </div>
            </div>
        </a>

        <a href="{{route('buyer.bidsPlaced')}}">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row" href="bids-placed.php">
                    <span><i class="fas fa-gavel margin-leftor-right"></i> <b class="heading-business">{{lang('BIDS_PLACED')}}</b> </span>
                </div>
            </div>
        </a>


        <a href="{{route('buyer.purchaseHistory')}}">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <span><i class="fas fa-file-upload margin-leftor-right"></i> <b class="heading-business">{{lang('MY_PURCHASE_HISTORY')}}</b> </span>
                </div>
            </div>
        </a>


        <a href="{{route('buyer.deliveryArea')}}">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row">
                    <span><i class="fas fa-map-marker-alt margin-leftor-right"></i> <b class="heading-business">{{lang('MY_DELIVERY_AREAS')}}</b> </span>
                </div>
            </div>
        </a>

        <!-- <a href="#">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row" href="delivary-area.php">
                    <span><i class="fa fa-truck margin-leftor-right"></i> <b class="heading-business">MY DELIVERY AREAS</b> </span>
                </div>
            </div>
        </a> -->


        <a href="{{route('buyer.buyerAccountSetting')}}" class="top-borders">
            <div class="row border-row-top-border">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 class-row" href="account-settings.php">
                    <span><i class="fas fa-cog margin-leftor-right"></i> <b class="heading-business">{{lang('ACCOUNT_SETTINGS')}}</b> </span>
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

    function mybuyersidebar() {
    var x = document.getElementById("sellersidebar");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    }
</script>