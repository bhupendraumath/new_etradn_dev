@extends('layouts.frontend.app')

@section('content')


<style>
    img.images {
        width: 102px;
        height: 103px;
    }

    /* .area {
    border: 5px dotted #ccc;
    padding: 37px;
    width: 93%;
    text-align: center;
    margin-left: 3%;
} */

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
                <!-- <h3>PASSWORD SETTINGS</h3>
                <hr class="business-address"/> -->

                <div class="card-profile">
                    <img src="{{url('assets/images/frontend/t1.jpg')}}" alt="">
                </div>
                <div class="form-settings-account">
                    <form action="#" class="personal-details">

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <!-- <i class="glyphicon glyphicon-lock"></i> -->
                                    <input type="text" class="form-control 60per lock" name="fname" placeholder="First Name*" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <!-- <i class="glyphicon glyphicon-lock"></i> -->
                                    <input type="text" class="form-control 60per lock" name="lastname" placeholder="Last Name*" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <!-- <i class="glyphicon glyphicon-lock"></i> -->
                                    <input type="text" class="form-control 60per lock" name="fname" placeholder="Prefered language*" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <!-- <i class="glyphicon glyphicon-lock"></i> -->
                                    <input type="text" class="form-control 60per lock" name="lastname" placeholder="Phone*" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <!-- <i class="glyphicon glyphicon-lock"></i> -->
                                    <input type="text" class="form-control 60per lock" name="fname" placeholder="Business Name*" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <!-- <i class="glyphicon glyphicon-lock"></i> -->
                                    <input type="text" class="form-control 60per lock" name="lastname" placeholder="Minimum order*" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <!-- <i class="glyphicon glyphicon-lock"></i> -->
                                    <input type="text" class="form-control 60per lock" name="fname" placeholder="Addresss*" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <!-- <i class="glyphicon glyphicon-lock"></i> -->
                                    <input type="text" class="form-control 60per lock" name="lastname" placeholder="Online Business*" />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <!-- <i class="glyphicon glyphicon-lock"></i> -->
                                    <input type="text" class="form-control 60per lock" name="fname" placeholder="Business Category*" />
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
                                <textarea name="Message" placeholder="Business Description" required=""></textarea>
                            </div>
                        </div>

                        <!-- <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                            <div class="inner-addon left-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                            <input type="text" class="form-control" name="Confirm-password" placeholder="Confirm Password*"/>
                            </div>
                        </div>
                        
                    </div> -->

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
                                <!-- *(Only Jpg, PDF, DOC files allowed) -->
                                <div id="drop_area" class="area fields drag-area">
                                    <div>

                                        <label for="files" class="btn">Upload Ducuments.


                                        </label>
                                        <div class="drop-drag-imgaes-or-files">DROP FILES</div>
                                        <input id="files" style="visibility:hidden;" type="file">
                                    </div>
                                </div>

                                <div id="result"></div>
                                <br />
                                <br />
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="buttonsnew-fsd">
                                    <input type="submit" value="Save Changes" class="save-changes">
                                    <input type="submit" value="Cancel" class="cancel">
                                </div>
                            </div>

                        </div>



                    </form>
                </div>


            </div>
        </div>
    </div>


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