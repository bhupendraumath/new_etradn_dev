@extends('layouts.frontend.app')

@section('content')


<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>{{lang('MYORDERS')}}</h3>

    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">
        @include('frontend/include/seller-side-bar')


        <div class="col-md-12 col-sm-12 col-lg-8 col-xl-8 col-xs-12">

            <div class="card-dashboard  col-12uy">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-8 col-xs-12">
                        <h3>MY ORDER LIST</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12 float-right">
                    <!-- <span class="show-pagination sorting-pagination uploaded-product">Show Records :</span>     -->
                    <select class="sorting-low-high uploaded-product" id="order_searching_purchase">
                        <option disabled selected >-Listed-</option>
                        <option value="pending" >Pending</option>
                        <option value="paid" >Transferred</option>
                        <option value="cancelled">Cancelled</option>
                        <option value="failed">Failed</option>
                    </select> 
                    <!-- filter section    -->
                </div>
                <div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-xs-12 float-right">
                    <!-- <span class="show-pagination sorting-pagination uploaded-product">Show Records :</span>     -->
                    <select class="sorting-low-high uploaded-product" id="order-list_records">
                        <option disabled selected >-Show-</option>
                        <option value="6" >6</option>
                        <option value="12" >12</option>
                        <option value="48">48</option>
                        <option value="60">60</option>
                        <option value="100">100</option>
                    </select> 
                    <!-- filter section    -->
                </div>
                </div>
                <hr/>


                <!-- <div class="row">
                    <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                        <span class="show-pagination sorting-pagination uploaded-product">{{lang('SHOWRECORDS')}} :</span>    
                        <select class="sorting-low-high uploaded-product remove-css-margin" id="order-list_records">
                            <option value="3" selected >3</option>
                            <option value="6"  >6</option>
                            <option value="12" >12</option>
                            <option value="48">48</option>
                            <option value="60">60</option>
                            <option value="100">100</option>
                        </select> 
                    </div>
                </div> -->
                
                <div id= "seller-my-order-listing">

                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        
</script>
<script src="{{ asset('assets/js/frontend/product/order-list.js') }}"></script>
@endsection
