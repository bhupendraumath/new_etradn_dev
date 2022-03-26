@extends('layouts.frontend.app')

@section('content')

<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>BUSINESS INFORMATION LIST</span></h3>

    </div>
</div>

{{-- {{$list}} --}}
<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

        @include('frontend/include/seller-side-bar')
        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
            <div class="card-dashboard  col-12uy">
                @if(session()->has('message'))
                <div class="alert alert-success">
                {{ session()->get('message') }}
                </div>
                @endif

                <div class="form-settings">
                <!-- <input type="text" class="searching-business-address icon-rtl" id="search" placeholder="Type to search"> -->

                <div class="inner-addon left-addon">
                    <i class="fa fa-search glyphicon"></i>
                    <input type="text" id="search" class="searching-business-address" name="search" placeholder="Searching..." />
                </div>

                <button class="business-adding" > <a href="{{route('businessInformation')}}" >Add New</a></button>

                
                
                    <table class="table table-striped" id="table" >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Shop Name</th>
                                <th>Address Line 1</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Zipcode</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @if(isset($list))
                            @foreach($list as $user)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->address1}}</td>
                                <td>{{$user->city}}</td>
                                <td>{{$user->state}}</td>
                                <td>{{$user->country}}</td>
                                <td>{{$user->zip_code}}</td>
                                <td>
                                   <a href="{{url('business-address-edit'.'/'.$user->id)}}">
                                    <i class="fa fa-pencil-square-o edit" aria-hidden="true"></i>
                                    </a> 
                                    | 
                                    <!-- <a href="{{route('business-address-delete',$user->id)}}" > -->
                                        
                                        <i class="fa fa-trash-o detele" onclick="business_address_delete({{$user->id}},'business-address')" aria-hidden="true"></i>
                                    <!-- </a> -->
                                   
                                </td>
                               
                            </tr>
                            @endforeach
            
                        @else
                        <tr>
                            <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth no-records">
                                <div>No Records Found</div>
                            </div>
                        </tr>
                        @endif
                    
                        </tbody>
                    </table>
                    {!! $list->render('frontend.common.pagination') !!}

               
                    


                    <!-- <form id="businessFrm" class="businessInformation" method="post">
                        @csrf
                        <input type="hidden" name="address_type" value="business">
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                            <input type="text"  name="name" placeholder="Shop Name*" class="shopname"> 

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6">
                            <input type="text"  name="address1" placeholder="Address Line1*" class="60per">


                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                            <input type="text"  name="address2" placeholder="Address Line2*" class="60per"> 

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6">
                            <input type="text" name="city" placeholder="City*" class="60per">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                            <input type="text" name="state" placeholder="State*" class="60per">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6">
                            <input type="text" name="country" placeholder="Country*" class="60per">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                            <input type="text" name="zip_code" placeholder="Zip Code*" class="60per">
                            </div>
                        </div>


                        <div class="row">
                        <div class="buttons">
                            <input type="submit" value="Save Changes" class="save-changes" id="submitbtn">
                            <a href="{{url('dashboard')}}" <input type="button" value="Cancel" class="cancel">
                            </a>
                        </div>
                        </div>

                    </form> -->
                </div>


            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')



<script>

var $rows = $('#table tbody tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});

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