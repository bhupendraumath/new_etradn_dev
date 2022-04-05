@extends('layouts.frontend.app')

@section('content')


@php

$favoriteProduct=new App\Models\Product;



@endphp

@php
Session::put('back_url', URL::full());
@endphp

<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
        <li data-target="#myCarousel" data-slide-to="4" class=""></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                    <h4 class="banner-save-50"> Order Consolidation </h4>
                    <h3 class="banner-save">Save 50% For</h3>
                    <span class="first-purchase">
                        First Purchase
                    </span>
                    <br />
                    <a class="hvr-outline-out button2" href="{{url('product-list/noav/noav/noav/popular')}}">Shop Now </a>
                </div>
            </div>
        </div>
        <div class="item item2">
            <div class="container">
                <div class="carousel-caption">
                    <!-- <h3>Summer <span>Collection</span></h3>
						<p>New Arrivals On Sale</p>
						<a class="hvr-outline-out button2" href="mens.html">Shop Now </a> -->
                </div>
            </div>
        </div>
        <div class="item item3">
            <div class="container">
                <div class="carousel-caption">

                    <h3>New products </h3>
                    <p class="paraghraph">Apple Hand Pipe, Zig-zag original rolling tips</p>
                    <a class="hvr-outline-out button2" href="{{url('product-list/noav/noav/noav/popular')}}">Shop Now </a>
                </div>
            </div>
        </div>
        <div class="item item4">
            <div class="container">
                <div class="carousel-caption">
                    <h3>Summer <span>Collection</span></h3>
                    <p>New Arrivals On Sale</p>
                    <a class="hvr-outline-out button2" href="{{url('product-list/noav/noav/noav/popular')}}">Shop Now </a>
                </div>
            </div>
        </div>
        <div class="item item5">
            <div class="container">
                <div class="carousel-caption">
                    <h3>The Biggest <span>Sale</span></h3>
                    <p>Special for today</p>
                    <a class="hvr-outline-out button2" href="{{url('product-list/noav/noav/noav/popular')}}">Shop Now </a>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!-- The Modal -->
</div>

<!-- //hot-item and popular items -->

<div id="hot-items-row">

</div>

<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

@endsection

@push('scripts')



<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

</script>
<script src="{{ asset('assets/js/frontend/product/home-page-listing.js') }}"></script>


<script>
/*function addedFav(product_id,quantity_id,fav_id,user_exists){

if(user_exists=='auth_required'){

    swal({
    title: "Your Favorite List is Empty",
    text: "Add in your favorite list",
    icon: "warning",
    buttons: {
        cancel: true,
        confirm: "Sign in Your Account",
    }
    }).then(
    function(isConfirm) {
        if (isConfirm) {                  
            window.location.href = "{{url('sign-in')}}";
        } else {
            return false;
        }
    },
    );

}else{

    
    $.ajax({
        url: "{{url('add-in-fav-list')}}"+'/'+product_id+'/'+quantity_id+'/'+fav_id,
        type: "GET",
        dataType: 'json',
        success: function (response) {
                if (response.success) {
                    toastr.clear();
                    toastr.success(response.message, { timeOut: 2000 });
                    location.reload();
                } else {
                    toastr.clear();
                    toastr.error(response.message, { timeOut: 2000 });
                }
            },
        
    });

}


}
*/


$.get("https://ipinfo.io/json", function (response) {
    $("#ip").html("IP: " + response.ip);
    $("#addressip").html("Location: " + response.city + ", " + response.region);
    $("#detailsip").html(JSON.stringify(response, null, 4));

    console.log("ocation  ",JSON.stringify(response, null, 4))
}, "jsonp");


</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> -->

<!-- <script src="{{url('assets/js/frontend/slick.js')}}"></script> -->
@endpush