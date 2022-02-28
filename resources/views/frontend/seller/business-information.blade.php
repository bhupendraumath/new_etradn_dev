@extends('layouts.frontend.app')

@section('content')

<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>Account settings</span></h3>

    </div>
</div>



<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

        @include('frontend/include/seller-side-bar')
        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
            <div class="card-dashboard  col-12uy">
                <h3>BUSINESS INFORMATION</h3>
                <hr class="business-address" />
                <div class="form-settings">
                    <form action="#">
                        <input type="text" id="fname" name="shopname" placeholder="Shop Name*" class="shopname"> <br />

                        <input type="text" id="lname" name="address1" placeholder="Address Line1*" class="60per">
                        <input type="text" id="lname" name="address" placeholder="Address Line2*" class="60per"><br />
                        <input type="text" id="lname" name="city" placeholder="City*" class="60per">
                        <input type="text" id="lname" name="state" placeholder="State*" class="60per"><br />

                        <input type="text" id="lname" name="country" placeholder="Country*" class="60per">
                        <input type="text" id="lname" name="zipcode" placeholder="Zip Code*" class="60per"><br />

                        <div class="buttons">
                            <input type="submit" value="Save Changes" class="save-changes">
                            <input type="submit" value="Cancel" class="cancel">
                        </div>

                    </form>
                </div>


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
@endsection