@extends('layouts.frontend.app')

@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>{{lang('REQUEST_OF_QUOTA')}}</h3>

    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12 col-sm-offset-2 col-md-2">
            <div class="card-dashboard  col-12uy">
                <div class="form-settings-account">
                    <h3>&nbsp; {{lang('REQUEST_OF_QUOTA')}} *</h3>
                    <hr />
                    <form class="rfq-form" id="rfq-form" enctype="multipart/form-data" method="post">
                        <div class="rfq-form">
                            {{csrf_field()}}
                            {{--<input type="hidden" name="user_type" value="{{Auth::user()->user_type}}"> --}}
                            <div class="row">
                                <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                    <div class="inner-addon left-addon">
                                        <label for=""> &nbsp;{{lang('PRODUCT_NAME')}}</label>
                                        <input type="text" class="form-control" name="rfq_product_name" placeholder="Product Name*" value="" />
                                    </div>
                                </div>
                                <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                    <div class="inner-addon left-addon">
                                        <label for=""> &nbsp;
                                        {{lang('CATEGORY')}}
                                        </label>
                                        <select class="form-control" name="rfq_product_categories">
                                            <option value="">
                                            {{lang('SELECT_CATEGORY')}}
                                            </option>
                                            @if(!empty($category))

                                            @foreach($category as $cat)
                                            <option value="{{$cat->id}}">
                                                {{$cat->categoryName}}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                    <div class="inner-addon left-addon">
                                        <label for=""> &nbsp;
                                        {{lang('SOURCING_TYPE')}}
                                        </label>
                                        <select class="form-control" name="rfq_Sourcing">
                                            <option value="">{{lang('SELECT_SOURCE_TYPE')}}
                                            
                                            </option>
                                            <option value="Customized Product" selected>{{lang('CUSTOMIZED_PRODUCT')}}</option>
                                            <option value="Non-customized Product">
                                            {{lang('NON_CUSTOMIZED_PRODUCT')}}
                                            </option>
                                            <option value="total product">{{lang('TOTAL_SOLUTION')}}</option>
                                            <option value="Customized Product">{{lang('BUSINESS_SERVICE')}}</option>
                                            <option value="other">{{lang('OTHER')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                    <div class="inner-addon left-addon">
                                        <label for=""> &nbsp;{{lang('SOURCING_PURPOSE')}}</label>
                                        <select class="form-control" name="rfq_sPurpose">
                                            <option value="">{{lang('SELECT_SOURCING_PURPOSE')}}</option>
                                            <option value="Wholesale" selected>{{lang('WHOLESALE')}}</option>
                                            <option value="Retail">{{lang('RETAIL')}}</option>
                                            <option value="Production Equipment">{{lang('PRODUCTION_EQUIPMENT')}}</option>
                                            <option value="Raw Materials for Production">{{lang('RAW_MATERIAL_FOR_PRODUCTION')}}</option>
                                            <option value="Corporate Consumption">{{lang('CORPORATE_CONSUMPTION')}}</option>
                                            <option value="Personal Use">{{lang('PERSONAL_USE')}}</option>
                                            <option value="Other">{{lang('OTHER')}}</option>
                                        </select>

                                        <select class="form-control rfq" name="rfq_part">
                                            <option value="">{{lang('SELECT_SOURCING_PURPOSE')}}</option>
                                            <option value="Acres" selected>Acres</option>
                                            <option value="Amperes">Amperes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                    <div class="inner-addon left-addon">
                                        <label for=""> &nbsp;
                                        {{lang('INVENTORY')}}
                                        </label>

                                        <input type="text" class="form-control" name="rfq_Quantity" placeholder="Inventory*" value="" />
                                    </div>
                                </div>
                                <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                    <div class="inner-addon left-addon">
                                        <label for=""> &nbsp;
                                        {{lang('TREDE_TERMS')}}</label>
                                        <select class="form-control" name="rfq_Trade">
                                            <option value="FOB" selected>FOB</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                    <div class="inner-addon left-addon">
                                        <label for=""> &nbsp; {{lang('PREFERRED_UNIT_PRICE')}}</label>
                                        <input type="number" name="rfq_Preferred">

                                        <select class="form-control" name="rfq_carrency">
                                            <option value=""> {{lang('SELECT_CURRECY')}}</option>
                                            <option value="USD" selected>USD</option>
                                            <option value="INR">INR</option>
                                            <option value="ALL">ALL</option>


                                            {{-- @foreach($businesstype as $businesstypevalue)
                                                <option value="{{$businesstypevalue->id}}"
                                            @if(Auth::user()->business_type_id==$businesstypevalue->id)selected @endif
                                            >{{$businesstypevalue->typeName}}</option>
                                            @endforeach--}}
                                        </select>
                                    </div>
                                </div>

                                <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form ">
                                    <div class="inner-addon">
                                        <label for="">
                                        {{lang('DETAILS')}}
                                        </label>
                                        <textarea name="rfq_Details" placeholder="Description" required="" value=""></textarea>
                                    </div>

                                </div>

                                <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                    <div class="inner-addon left-addon">
                                        <label for=""> &nbsp;
                                        {{lang('ATTACHMENTS')}}
                                        </label>
                                        <input type="file" value="upload" class="form-control" name="rfq_Attachments" />
                                    </div>
                                </div>

                                <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                    <div class="inner-addon left-addon">
                                        <label for=""> &nbsp;
                                        {{lang('CERTICATIONS')}}
                                        </label>
                                        <select class="form-control" name="rfq_Certifications">
                                            <option value=""> {{lang('CERTICATIONS')}}</option>
                                            <option value="ISO22000" selected>ISO22000</option>

                                        </select>
                                    </div>
                                </div>

                                <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                    <div class="inner-addon left-addon">
                                        <label for="">
                                        {{lang('OTHER_REQUIREMENT')}}
                                        </label>
                                        <textarea name="rfq_otherRequirements" placeholder="Other Requirement" required="" value=""></textarea>
                                    </div>
                                </div>


                                <h3 class="shipping-payment"> {{lang('SHIPPING_AND_PAYMENT')}}<h3>

                                        <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                            <div class="inner-addon left-addon">
                                                <label for="">{{lang('SHIPPING_METHOD')}}</label>

                                                <select class="form-control rfq" name="rfq_Shipping">
                                                    <option value="">{{lang('PLEASE_SELECT')}}</option>
                                                    <option value="Sea freight" selected>{{lang('SEA_FREIGHT')}}</option>
                                                    <option value="Air freight">{{lang('AIR_FREIGHT')}}</option>
                                                    <option value="Express">
                                                    {{lang('EXPRESS')}}
                                                    </option>
                                                    <option value="Land freight"> {{lang('LAND_FREIGHT')}}</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                            <div class="inner-addon left-addon">
                                                <label for=""> {{lang('DESTINATION')}}</label>
                                                <select class="form-control" name="rfq_country">
                                                    <option value="213">Saudi Arabia</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                            <div class="inner-addon left-addon">
                                                <label for=""> {{lang('LEAD_TIME_SHIP_IN')}}</label>
                                                <input type="number" class="form-control" name="rfq_Leadtime" placeholder="Product Name" required="">

                                            </div>
                                        </div>

                                        <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                            <div class="inner-addon left-addon">
                                                <label for="">
                                                {{lang('PAYMENT_TERM')}}
                                                </label>
                                                <select class="form-control" name="rfq_Payment_Term">
                                                    <option value="TT">TT</option>
                                                    <option value="LC">LC</option>
                                                </select>
                                            </div>
                                        </div>
                            </div>

                            <div class="col-md-12">
                                <input type="checkbox" class="checkbox" name="rfq_agree" value="1">
                                <span class="right-float">{{lang('I_AGREE_TO_SHARE_MY_BUSINESS_CARD_SUPPLIERS')}}</span>
                            </div>
                            <div class="col-md-12">

                                <input type="checkbox" class="checkbox" name="" value="2">
                                <span class="right-float">{{lang('I_HAVE_READ_UNDERSTOOD_AND_AGREED')}}</span>
                            </div>

                            
                            <div class="row">
                                <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                    <br /><br />
                                    <div class="buttonsnew-fsd">
                                        <input type="submit" value="{{lang('SUBMIT')}}" class="save-changes" id="rfq-btn">
                                        
                                        <a href="{{route('home')}}"><input type="button" value="{{lang('CANCEL')}}" class="cancel" id="rfq-btn">
                                        </a>
                                    </div>
                                </div>

                            </div>

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

@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Frontend\RfqFormRequest','#rfq-form') !!}
<script type="text/javascript" src="{{asset('assets/js/frontend/profile/rfq-form.js')}}"></script>
@endpush