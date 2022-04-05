@extends('layouts.frontend.app')

@section('content')

<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>CONTACT<span> US </span></h3>

    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid width-100">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 about-us">
            <!-- <div id="map"></div> -->
            <div class="contact-w3-agile1 map" data-aos="flip-right">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100949.24429313939!2d-122.44206553967531!3d37.75102885910819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1472190196783" class="map" style="border:0" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</div>


<div class="container backgroundgary">

    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 card-contact-us">
        <div class="row card-1222">
            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                <!-- <div class="col-md-5 col-sm-5 col-lg-5 col-xs-12"> -->
                <div class="home-house">
                    <img src="{{url('assets/images/frontend/Layer_45.png')}}" alt="" srcset="">
                </div>
                <div class="djhfdkfghjdg">
                    +1000 111 6666
                </div>
                <!-- </div> -->

            </div>
            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                <div class="home-house">
                    <!-- <img src="images/Layer_45.png" alt="" srcset=""> -->
                    <i class="fa fa-phone contact-us-font" aria-hidden="true"></i>

                </div>
                <div class="djhfdkfghjdg">
                    info@B2B.com
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                <div class="home-house">
                    <!-- <img src="images/Layer_45.png" alt="" srcset=""> -->
                    <i class="fa fa-envelope contact-us-font" aria-hidden="true"></i>

                </div>

                <div class="djhfdkfghjdg trrr">
                    1998 St.Unit, <br />
                    Colorado 80306 <br />USA
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container contact-form-contact-us">
    <div class="add-review">
        <h2>GET IN TOUCH</h2>
        <form action="#" method="post" class="review-contact-us">
            <div class="row">
                <div class="col-12 col-md-6 col-sm-6 col-xl-12 col-xs-12">
                     <input type="text" name="Name" placeholder="Name" required="Name">
                </div>

                <div class="col-12 col-md-6 col-sm-6 col-xl-12 col-xs-12">
                    <input type="text" name="Phone" placeholder="Phone" required="Phone">
                </div>

                <div class="col-12 col-md-6 col-sm-6 col-xl-12 col-xs-12">
                    <input type="text" name="Phone" placeholder="Phone" required="Phone">
                </div>

                <div class="col-12 col-md-6 col-sm-6 col-xl-12 col-xs-12">
                     <input type="email" placeholder="Email" name="Email" required="Email">
                </div>

                <div class="col-12 col-md-12 col-sm-12 col-xl-12 col-xs-12">
                    <textarea name="Message" placeholder="Message" required=""></textarea>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12 col-xl-12 col-xs-12">
                    <input type="submit" class="buttonsubmit" value="SEND">
                </div>

            </div>
        </form>
    </div>
</div>
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
@endsection