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
                <h3>{{$title}} </h3>  
                 <hr class="business-address" />
                <div class="form-settings">
                @if(!empty($details))

                <form id="businessUpdate"  class="businessInformation" method="post">
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
                        <input type="hidden" name="id" value="{{$details[0]->id}}">

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                            <label class="left-align">{{lang('SHOP_NAME')}}</label>

                            <input type="text"  name="name" value ="{{$details[0]->name}}"placeholder="Shop Name*" class="shopname"> 

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">{{lang('ADDRESS_ONE')}}</label>

                            <input type="text" value="{{$details[0]->address1}}"  name="address1" placeholder="Address Line1*" class="60per">


                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">{{lang('ADDRESS_LINE2')}}</label>
                            <input type="text"  value="{{$details[0]->address2}}" name="address2" placeholder="Address Line2*" class="60per"> 

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">{{lang('CITY')}}</label>
                            <input type="text" value="{{$details[0]->city}}" name="city" placeholder="City*" class="60per">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">{{lang('STATE')}}</label>
                            <input type="text" name="state" value="{{$details[0]->state}}"  placeholder="State*" class="60per">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">{{lang('COUNTRY')}}</label>
                            <input type="text" name="country" value="{{$details[0]->country}}" placeholder="Country*" class="60per">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">{{lang('ZIPCODE')}}</label>
                            <input type="text" name="zip_code" value="{{$details[0]->zip_code}}"  placeholder="Zip Code*" class="60per">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 primary-address">
                                @if($details[0]->isPrimary=='y')
                                 <input type="checkbox" id="primary" name="isPrimary" checked value='y' >{{lang('PRIMARY_ADDRESS')}}
                                @else
                                <input type="checkbox" id="primary" name="isPrimary"  value='y' > {{lang('PRIMARY_ADDRESS')}}
                                @endif
                            </div>
                        </div>
                        

                        <div class="row">
                        <div class="buttons">
                            <input type="submit" value="{{lang('SAVE_CHANGES')}}" class="save-changes" id="updateSubmitbtn">
                            <a href="{{url('business-address')}}" <input type="button" value="{{lang('CANCAL')}}" class="cancel">
                            </a>
                        </div>
                        </div>

                    </form>
               @endif
                </div>


            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')


{!! JsValidator::formRequest('App\Http\Requests\Frontend\BusinessAddRequest','#businessUpdate') !!}
<script type="text/javascript" src="{{asset('assets/js/frontend/profile/business.js')}}"></script>
@endpush