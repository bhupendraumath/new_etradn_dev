@extends('layouts.frontend.app')

@section('content')
<style>
    img.images {
        width: 102px;
        height: 103px;
    }

    .area {
        border: 5px dotted #ccc;
        padding: 37px;
        width: 93%;
        text-align: center;
        margin-left: 3%;
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

<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>ADD PRODUCT</span></h3>

    </div>
</div>
<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

        @include('frontend/include/seller-side-bar')
        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">

            <div class="card-dashboard  col-12uy">
                <h3>IMAGES WILL REQUIRE A WIDTH:HEIGHT*</h3>
                <hr class="business-address" />

                <div class="form-settings">
                    <form action="#">

                        <!-- <input type="file" class="files-class-hide"> -->
                        <div id="drop_area" class="area">
                            <div>
                                <label for="files" class="btn center-drag-drop"><b>Choose or Drag & Drop Your Product Images Here! </b></label>
                                <input id="files" style="visibility:hidden;" type="file">
                            </div>
                        </div>

                        <div id="result"></div>
                        <br />
                        <select name="Category" id="Category" class="shopname">
                            <option disabled">--Select Category-- </option>
                            <option value="cat1">Category 1</option>
                            <option value="cat2">Category 2</option>
                            <option value="cat3">Category 3</option>
                            <option value="cat4">Category 4</option>
                        </select>


                        <select name="sub-category" id="60per" class="shopname">
                            <option disabled">--Select Sub category-- </option>
                            <option value="cat1">Category 1</option>
                            <option value="cat2">Category 2</option>
                            <option value="cat3">Category 3</option>
                            <option value="cat4">Category 4</option>
                        </select>

                        <select name="Brand" id="60per" class="shopname">
                            <option disabled">--Select Brand-- </option>
                            <option value="cat1">Brand 1</option>
                            <option value="cat2">Brand 2</option>
                            <option value="cat3">Brand 3</option>
                            <option value="cat4">Brand 4</option>
                        </select>

                        <br /><br />
                        <h3 class="change-side">ENGLISH LANGUAGE*</h3>
                        <hr class="business-address" />

                        <input type="text" id="product-name" name="product-name" placeholder="Product Name in English*" class="60per">

                        <textarea name="Message" placeholder="Product Description English*" required=""></textarea>


                        <br /><br />
                        <h3 class="change-side">LIST PRODUCT*</h3>
                        <hr class="business-address" />

                        <div class="change-position">
                            <input id="buyitnow" type="radio" name="user" value="buyitnow">
                            <label for="buyitnow"><span></span>Buy it Now</label> &nbsp;&nbsp;&nbsp;

                            <input id="Auction" type="radio" name="user" value="Auction">
                            <label for="Auction"><span></span>Auction</label>&nbsp;&nbsp;&nbsp;

                            <input id="both" type="radio" name="user" value="both">
                            <label for="both"><span></span>Both</label>
                        </div>


                        <br /><br />
                        <h3 class="change-side">SHIPPED ADDRESS FROM PRODUCT</h3>
                        <hr class="business-address" />

                        <div class="change-position">
                            <input id="Existing" type="radio" name="address" value="Existing">
                            <label for="Existing"><span></span>Existing Address</label> &nbsp;&nbsp;&nbsp;

                            <input id="new" type="radio" name="new" value="new">
                            <label for="new"><span></span>New Address</label><br /><br /><br />
                        </div>


                        <div class="buttons">
                            <input type="submit" value="ADD PRODUCT" class="save-changes">
                        </div>
                    </form>

                </div>

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