@extends('layouts.frontend.app')

@section('content')

<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>{{$title}}</span></h3>

    </div>
</div>



<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

    @include('frontend/include/buyer-side-bar')
        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
            <div class="card-dashboard  col-12uy">
            <a href="{{url()->previous()}}" class="back-button">{{lang('BACK')}}</a>
                <h3>{{$title}}</h3>
                <hr class="business-address" />
                <div class="form-settings">

                    <form id="businessFrm" class="businessInformation" method="post">
                        @csrf

                        
                        @php
                        if($title=="Delivery Address"){
                            $address_type="delivery";
                        }
                        else{
                            $address_type="business";
                        }
                        @endphp
                        
                        <input type="hidden" name="address_type" value="{{$address_type}}">
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                            <label class="left-align">{{lang('SHOP_NAME')}}</label>

                            <input type="text"  name="name" placeholder="Shop Name*" class="shopname"> 

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">{{lang('ADDRESS_ONE')}}</label>

                            <input type="text"  name="address1" placeholder="Address Line1*" class="60per">


                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">{{lang('ADDRESS_LINE2')}}</label>

                            <input type="text"  name="address2" placeholder="Address Line2*" class="60per"> 

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">{{lang('CITY')}}</label>

                            <input type="text" name="city" placeholder="City*" class="60per">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">{{lang('STATE')}}</label>

                            <input type="text" name="state" placeholder="State*" class="60per">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">{{lang('COUNTRY')}}</label>
                            <input type="text" name="country" placeholder="Country*" class="60per">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">{{lang('ZIPCODE')}}</label>
                            <input type="text" name="zip_code" placeholder="Zip Code*" class="60per">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 primary-address">
                               
                                <input type="checkbox" id="primary" name="isPrimary"  value='y' >{{lang('PRIMARY_ADDRESS')}}
                                
                            </div>
                        </div>
                        <div class="row">
                        <div class="buttons">
                            <input type="submit" value="{{lang('SAVE_CHANGES')}}" class="save-changes" id="submitbtn">
                            <a href="{{url('business-address')}}" <input type="button" value="{{lang('CANCEL')}}" class="cancel">
                            </a>
                        </div>
                        </div>

                    </form>
                   
                </div>


            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    jQuery(function($) {
        var path = window.location.href;
        console.log("pathfdf  ", path)
        $('a').each(function() {
            if (path == this.href) {
                $(this).addClass('left-active');
            }

        })
    })
</script>

{!! JsValidator::formRequest('App\Http\Requests\Frontend\BusinessAddRequest','#businessFrm') !!}
<script type="text/javascript" src="{{asset('assets/js/frontend/profile/business.js')}}"></script>
@endpush