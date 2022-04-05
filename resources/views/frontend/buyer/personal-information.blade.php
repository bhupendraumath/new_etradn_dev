@extends('layouts.frontend.app')

@section('content')


<style>
    img.images {
        width: 102px;
        height: 103px;
    }


    .drag {
        border: 5px dotted green;
        background-color: #f2ae3d;
    }

    #result ul {
        list-style: none;
        margin-top: 20px;
    }

    #result ul li {
        border-bottom: 1px solid #ccc;
        margin-bottom: 10px;
    }

    ul.inline-css>li {
        display: inline;
    }
</style>


<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3><span>EDIT PERSONAL INFORMATION</span></h3>

    </div>
</div>



<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12 col-sm-offset-2 col-md-2">
            <div class="card-dashboard  col-12uy">



                <div class="form-settings-account">

                    <form class="personal-details" id="profile-update-form" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}

                        <div class="card-profile">
                            <img id="previewImage" src="{{url('assets/images/my-profile')}}/{{Auth::user()->profile_img}}"   onerror="this.src='assets/images/frontend/user3.jpg'">
                            <input type="file" id="uploadImage" onChange="setImage(this,'profile_image');" accept="image/png,image/jpg,image/jpeg">
                        </div>

                        <input type="hidden" name="profile_imgg" id="imagedata">
                        <input type="hidden" name="user_type" value="{{Auth::user()->user_type}}">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <!-- <i class="glyphicon glyphicon-lock"></i> -->
                                    <input type="text" class="form-control 60per lock" name="first_name" placeholder="First Name*" value="{{Auth::user()->firstName}}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <!-- <i class="glyphicon glyphicon-lock"></i> -->
                                    <input type="text" class="form-control 60per lock" name="last_name" placeholder="Last Name*" value="{{Auth::user()->lastName}}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <!-- <i class="glyphicon glyphicon-lock"></i> -->
                                    <input type="text" class="form-control 60per lock" name="user_language" placeholder="Prefered language*" value="{{Auth::user()->user_language}}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <!-- <i class="glyphicon glyphicon-lock"></i> -->
                                    <input type="text" class="form-control 60per lock" name="phone_number" placeholder="Phone*" value="{{Auth::user()->phone_number}}" />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="buttonsnew-fsd">
                                    <input type="submit" value="Save Changes" class="save-changes" id="profile-btn">
                                    <a href="{{url('dashboard')}}"><input type="button" value="Cancel" class="cancel" id="profile-btn">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    @include('frontend.common.profile-cropper')

    <script>
        function dragHandler(event) {
            event.stopPropagation();
            event.preventDefault();

            var drop_area = document.getElementById("drop_area");
            drop_area.className = "area drag";
        }

        function filesDroped(event) {
            event.stopPropagation();
            event.preventDefault();

            drop_area.className = "area";

            var files = event.dataTransfer.files; //It returns a FileList object
            var filesInfo = "";

            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                console.log(URL.createObjectURL(file));

                filesImg = '<img class="images" src="' + URL.createObjectURL(file) + '" />'

                filesInfo += "<li> " + filesImg + "</li>";

            }

            var output = document.getElementById("result");

            output.innerHTML = "<ul class='inline-css'>" + filesInfo + "</ul>";
        }

        window.onload = function() {

            //Check File API support
            if (window.File && window.FileList) {
                var drop_area = document.getElementById("drop_area");

                drop_area.addEventListener("dragover", dragHandler);
                drop_area.addEventListener("drop", filesDroped);

            } else {
                console.log("Your browser does not support File API");
            }
        }
    </script>
    @endsection

    @push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Frontend\UserUpdateRequest','#profile-update-form') !!}
    <script type="text/javascript" src="{{asset('assets/js/frontend/profile/update-user.js')}}"></script>
    @endpush