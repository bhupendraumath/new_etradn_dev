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

    @include('frontend/include/seller-side-bar')

        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
            <div class="card-dashboard  col-12uy">
                <h3>{{$title}}</h3>
                             <hr class="business-address" />
                <div class="form-settings">
                @if(!empty($details))

                <form id="businessUpdate"  class="businessInformation" method="post">
                        @csrf
                        
                        @php
                        if($title=="Delivery Address"){
                            $address_type="shipping";
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
                            <label class="left-align">Shop Name</label>

                            <input type="text"  name="name" value ="{{$details[0]->name}}"placeholder="Shop Name*" class="shopname"> 

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">Address Line1</label>

                            <input type="text" value="{{$details[0]->address1}}"  name="address1" placeholder="Address Line1*" class="60per">


                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">Address Line2</label>
                            <input type="text"  value="{{$details[0]->address2}}" name="address2" placeholder="Address Line2*" class="60per"> 

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">City</label>
                            <input type="text" value="{{$details[0]->city}}" name="city" placeholder="City*" class="60per">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">State</label>
                            <input type="text" name="state" value="{{$details[0]->state}}"  placeholder="State*" class="60per">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">Country</label>
                            <input type="text" name="country" value="{{$details[0]->country}}" placeholder="Country*" class="60per">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                            <label class="left-align">Zip Code</label>
                            <input type="text" name="zip_code" value="{{$details[0]->zip_code}}"  placeholder="Zip Code*" class="60per">
                            </div>
                        </div>


                        <div class="row">
                        <div class="buttons">
                            <input type="submit" value="Save Changes" class="save-changes" id="updateSubmitbtn">
                            <a href="{{url('business-address')}}" <input type="button" value="Cancel" class="cancel">
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