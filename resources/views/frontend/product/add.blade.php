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
                    <form method="post" enctype="multipart/form-data" id="addProductFrm">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <!-- <input type="file" class="files-class-hide"> -->
                        <div id="drop_area" class="area">
                            <div>
                                <label for="files" class="btn center-drag-drop"><b>Choose or Drag & Drop
                                    <br/> Your Product Images Here! </b></label>
                                <input id="files" style="visibility:hidden;" type="file">
                            </div>
                        </div>

                        <div id="result"></div>
                        <br />
                        <label class="left-align">Category</label>
                        <select name="category_id" id="Category" class="shopname">
                            <option value=""">--Select Category-- </option>
                            @foreach($category as $category_value)
                            <option value=" {{$category_value->id}}">{{$category_value->categoryName}}</option>
                            @endforeach
                        </select>

                        <label class="left-align">Sub Category</label>
                        <select name="sub_category_id" id="subcategory" class="shopname form-control">
                            <option value=""">--Select sub category-- </option>
                        </select>

                        <label class="left-align">Brand</label>

                        <select name=" brand_id" id="60per" class="shopname">
                            <option value=""">--Select Brand-- </option>
                            @foreach($brand as $brand_value)
                            <option value=" {{$brand_value->id}}">{{$brand_value->brandName}}</option>
                            @endforeach
                        </select>

                        <br /><br />
                        <h3 class="change-side">ENGLISH LANGUAGE*</h3>
                        <hr class="business-address" />

                        <label class="left-align">Product Name</label>
                        <input type="text" name="product_name_eng" placeholder="Product Name in English*" class="60per">

                        <label class="left-align">Product Description</label>
                        <textarea name="product_description_eng" placeholder="Product Description English*" required=""></textarea>

                        <label class="left-align">Product Warranty</label>
                        <input type="text" name="warranty_description_eng" placeholder="Product warranty in English*" class="60per">

                        <br /><br />
                        <h3 class="change-side">LIST PRODUCT*</h3>
                        <hr class="business-address" />

                        <div class="change-position">
                            <input type="radio" name="list_product" value="b" checked>
                            <label for="buyitnow"><span></span>Buy it Now</label> &nbsp;&nbsp;&nbsp;

                            <input type="radio" name="list_product" value="a">
                            <label for="Auction"><span></span>Auction</label>&nbsp;&nbsp;&nbsp;

                            <input type="radio" name="list_product" value="bo">
                            <label for="both"><span></span>Both</label>
                        </div>
                        <br />

                        <h3 class="change-side">REFUND REQUEST</h3>
                        <hr class="business-address" />

                        <div class="change-position">
                            <input type="radio" name="refund_request" value="y" checked>
                            <label for="Existing"><span></span>Yes</label> &nbsp;&nbsp;&nbsp;

                            <input type="radio" name="refund_request" value="n">
                            <label for="new"><span></span>No</label><br /><br />
                        </div>
                        <br />
                        <h3 class="change-side">SHIPPED ADDRESS FROM PRODUCT</h3>
                        <hr class="business-address" />

                        <div class="change-position">
                            <input id="Existing" type="radio" name="address" value="Existing" checked>
                            <label for="Existing"><span></span>Existing Address</label> &nbsp;&nbsp;&nbsp;

                            <input id="new" type="radio" name="new" value="new">
                            <label for="new"><span></span>New Address</label><br /><br /><br />
                        </div>
                        <h3 class="change-side">SHIPPING TYPE PRODUCT</h3>
                        <hr class="business-address" />

                        <div class="change-position">
                            <input type="radio" name="shipping_type" value="f" checked>
                            <label for="Existing"><span></span>Free</label> &nbsp;&nbsp;&nbsp;

                            <input type="radio" name="shipping_type" value="new">
                            <label for="p"><span></span>Paid</label><br /><br /><br />
                        </div>


                        <div class="buttons">
                            <input type="submit" value="ADD PRODUCT" class="save-changes" id="submitbtn">
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>



@endsection
@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Frontend\ProductRequest','#addProductFrm') !!}
<script src="{{ asset('assets/js/frontend/product/product.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#Category').on('change', function() {
            var category_id = this.value;
            $("#subcategory").html('');
            $.ajax({
                url: "{{url('getsubCategroy')}}",
                type: "POST",
                data: {
                    category_id: category_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {

                    $('#subcategory').html('<option value="">Select sub category</option>');
                    console.log(result.data);
                    var template;
                    for (var i = 0; i < result.data.length; i++) {
                        template += '<option value="' + result.data[i].id + '">' + result.data[i].subCategoryName + '</option>';
                    }


                    $("#subcategory").append(template);

                    // $.each(result.data, function(key, value) {
                    //     $("#subcategory").append('<option value="' + value
                    //         .id + '">' + value.subCategoryName + '</option>');
                    // });
                    // $('#subcategory').html('<option value="">--Select Sub category--</option>');
                }
            });
        });
    });

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
@endpush