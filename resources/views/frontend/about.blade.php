@extends('layouts.frontend.app')

@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>ABOUT<span> US </span></h3>

    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid">
        <div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-xs-12">
        </div>
        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12 about-us">

            <h3 class="whoareheading">WHO WE ARE</h3>
            <p class="whoareparagraph">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
            </p>
        </div>
    </div>
    <div class="container-fluid backgroundgary">

        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
            <img src="{{url('assets/images/frontend/Layer_59.png')}}" class="images_about-us">
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 margin-right-side">
            <h3>ABOUT US</h3> <br />
            <p class="about-us-paragraph"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.

                <br />
                <br />

                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
            </p>

            <button class="contact-us">
                <a style="color:white" href="{{url('contact-us')}}">
                Contact

                </a>
            </button>

        </div>

    </div>



    <div class="container margin-top--23">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
            <h3 class="our-team-heading">OUR TEAM</h3>

        </div>
        <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
            <img src="{{url('assets/images/frontend/t1.jpg')}}" alt="" class="image-team">
            <br /><br />
            <h4 class="team_memebr">JacksonA Roby
                <br />
                CEO
            </h4>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
            <img src="{{url('assets/images/frontend/t2.jpg')}}" class="image-team" alt="">
            <br /><br />
            <h4 class="team_memebr">Smith Josh
                <br />
                Manager
            </h4>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
            <img src="{{url('assets/images/frontend/t3.jpg')}}" class="image-team" alt="">
            <br /><br />
            <h4 class="team_memebr">Tom Angelina
                <br />
                Executive
            </h4>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
            <img src="{{url('assets/images/frontend/t4.jpg')}}" class="image-team" alt="">
            <br /><br />
            <h4 class="team_memebr">Gorge Josh
                <br />
                Accountant
            </h4>
        </div>
    </div>
    <!--//single_page-->


    <a href="#about" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    @endsection