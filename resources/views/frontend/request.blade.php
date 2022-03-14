@extends('layouts.frontend.app')

@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>REQUEST OF QUOTA</h3>

    </div>
</div>

    <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
        <div class="container-fluid dashboard-container">

            <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12 col-sm-offset-2 col-md-2">
                <div class="card-dashboard  col-12uy">
                    <div class="form-settings-account">
                        <h3>&nbsp; Request for quatation *</h3>
                        <hr/>
                        <form class="rfq-form" id="rfq-form" enctype="multipart/form-data" method="post">
                            <div class="rfq-form">
                                {{csrf_field()}}
                                {{--<input type="hidden" name="user_type" value="{{Auth::user()->user_type}}"> --}}
                                <div class="row">
                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                        <div class="inner-addon left-addon">
                                            <label for=""> &nbsp;Product Name</label>
                                            <input type="text" class="form-control" name="product_name" placeholder="Product Name*" value="" />
                                        </div>
                                    </div>
                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                        <div class="inner-addon left-addon">
                                            <label for=""> &nbsp;Category</label>
                                            <select class="form-control" name="product_categories">
                                                <option value="">Select Category</option>
                                                @if(!empty($category))

                                                @foreach($category as $cat)
                                                    <option value="{{$cat->id}}">
                                                    {{$cat->categoryName}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                        <div class="inner-addon left-addon">
                                            <label for=""> &nbsp;Sourcing Type</label>       
                                            <select class="form-control"  name="sourcing"  >
                                                <option value="">Select Source Type</option>
                                                <option value="Customized Product" selected>Customized Product</option>
                                                <option value="Non-customized Product">Non-customized Product</option>
                                                <option value="Customized Product">Total Solution</option>
                                                <option value="Customized Product">Business Service</option>
                                                <option value="Customized Product">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                        <div class="inner-addon left-addon">
                                            <label for=""> &nbsp;Sourcing Purpose</label> 
                                            <select class="form-control" name="purpose" >
                                                <option value="">Select Sourcing Purpose</option>
                                                <option value="Wholesale" selected>Wholesale</option>
                                                <option value="Retail">Retail</option>
                                                <option value="Production Equipment">Production Equipment</option>
                                                <option value="Raw Materials for Production">Raw Materials for Production</option>
                                                <option value="Corporate Consumption">Corporate Consumption</option>
                                                <option value="Personal Use">Personal Use</option>
                                                <option value="Other">Other</option>
                                            </select>

                                            <select class="form-control rfq" name="part" >
                                                <option value="">Select Sourcing Purpose</option>
                                                <option value="Acres" selected>Acres</option>
                                                <option value="Amperes">Amperes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                        <div class="inner-addon left-addon">
                                            <label for=""> &nbsp;Inventory</label> 

                                            <input type="text" class="form-control" name="quantity	" placeholder="Inventory*" value="" />
                                        </div>
                                    </div>
                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                        <div class="inner-addon left-addon">
                                            <label for=""> &nbsp;Trade Terms</label> 
                                            <select class="form-control" name="trade" >
                                                <option value="FOB" selected>FOB</option>                                            
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                        <div class="inner-addon left-addon">
                                            <label for=""> &nbsp;Preferred Unit Price</label> 
                                            <input type="number" name="preferred">

                                            <select class="form-control" name="carrency" >
                                                <option value="">Select Currency</option>
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
                                            <label for="">Details</label>
                                            <textarea  name="details" placeholder="Description" required="" value=""></textarea>
                                        </div>
                                    
                                    </div>

                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                        <div class="inner-addon left-addon">
                                            <label for=""> &nbsp;Attachments</label> 
                                            <input type="file" value="upload" class="form-control" name="attachments"  />
                                        </div>
                                    </div>

                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                        <div class="inner-addon left-addon">
                                            <label for=""> &nbsp;Certications</label> 
                                            <select class="form-control" name="certifications" >
                                                <option value="">Select Certications</option>
                                                <option value="ISO22000" selected>ISO22000</option>
                                            
                                            </select>
                                        </div>
                                    </div>

                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                    <div class="inner-addon left-addon">
                                        <label for="">Other Requirement</label>
                                        <textarea name="other_requirements" placeholder="Other Requirement" required="" value=""></textarea>
                                    </div>
                                    </div>


                                    <h3 class="shipping-payment">Shipping and Payment<h3>

                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                        <div class="inner-addon left-addon">
                                            <label for="">Shipping method</label>

                                            <select class="form-control rfq" name="shipping" >
                                            <option value="">Please select</option>
                                            <option value="Sea freight" selected>Sea freight</option>
                                            <option value="Air freight">Air freight</option>
                                            <option value="Express">Express</option>
                                            <option value="Land freight">Land freight</option>                                           
                                            </select>

                                        </div>
                                    </div>

                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                        <div class="inner-addon left-addon">
                                            <label for="">Destination</label>
                                            <select class="form-control" name="country" >
                                                    <option value="213">Saudi Arabia</option>                                          
                                            </select>

                                        </div>
                                    </div>

                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                        <div class="inner-addon left-addon">
                                            <label for="">Lead time Ship in</label>
                                            <input type="number" class="form-control" name="leadtime" placeholder="Product Name" required="">

                                        </div>
                                    </div>

                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                        <div class="inner-addon left-addon">
                                            <label for="">Payment Term</label>
                                            <select class="form-control" name="payment_Term" >
                                                <option value="TT">TT</option>
                                                <option value="LC">LC</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-md-12">
                                    <input type="checkbox" class="checkbox" name="agree[]" value="1">
                                    <span class="right-float">I agree to share my Business Card with quoted suppliers.</span>
                                </div>
                                <div class="col-md-12">
                                
                                    <input type="checkbox" class="checkbox" name="agree[]" value="2">
                                    <span class="right-float">I have read, understood and agreed to abide by the Buying Request Posting Rules.</span>
                                </div>

                                <div class="col-md-12">
                                    <input type="hidden" name="rfq" value="rfq">
                                </div>
                                <div class="row">
                                    <div class=" col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12 col-rqf-form">
                                    <br/><br/>
                                        <div class="buttonsnew-fsd">
                                            <input type="submit" value="Submit" class="save-changes" id="rfq-btn">
                                            <a href="{{route('home')}}"><input type="button" value="Cancel" class="cancel" id="rfq-btn">
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