@extends('layouts.frontend.app')

@section('content')

<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>{{lang('REFUND_REQUEST')}}</h3>

    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

        @include('frontend/include/seller-side-bar')

        <div class="col-md-12 col-sm-12 col-lg-8 col-xl-8 col-xs-12">
            <div class="card-dashboard  col-12uy">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="inner-addon left-addon search-bar">
                            <i class="fa fa-search glyphicon"></i>
                            <input type="text" class="form-control 60per lock change-style-search" name="payment-id" placeholder="Searching..." />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12 float-right">
                       


                        <span class="show-pagination sorting-pagination uploaded-product">{{lang('SHOWRECORDS')}} :</span>    
                        <select class="sorting-low-high uploaded-product" id="bids_product_page">
                            <!-- <option disabled selected >--Show--</option> -->
                            <option value="4" selected >4</option>
                            <option value="12" >12</option>
                            <option value="48">48</option>
                            <option value="60">60</option>
                            <option value="100">100</option>
                        </select> 

                        <!-- filter section    -->


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <!-- <p class="no-results">No more results found</p> -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <!-- <div class="inner-addon left-addon">
                        <i class="fab fa-paypal glyphicon"></i>
                        <input type="text" class="form-control 60per lock" name="Current-password" placeholder="Payment gateway ID*" />
                        </div> -->
                    </div>
                </div>

                <br /><br />


                <div class="products row" id='listing-refund'>
                </div>
                <br /><br />
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

</script>
<script src="{{ asset('assets/js/frontend/product/refund-request-list.js') }}"></script>
@endpush