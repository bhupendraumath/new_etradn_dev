@extends('layouts.frontend.app')

@section('content')

<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>MY UPLOAD PRODUCT</h3>

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
                            <input type="text" id="uploaded_product_searching" class="form-control 60per lock change-style-search" name="payment-id" placeholder="Searching..." />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12 float-right">
                         <span class="show-pagination sorting-pagination uploaded-product">Show Records :</span>    
                        <select class="sorting-low-high uploaded-product" id="uploaded_product_page">
                            <!-- <option disabled selected >--Show--</option> -->
                            <option value="6" selected >6</option>
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
                    </div>
                </div>

                <br /><br />


                <div class="products row" id='listing'>
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
<script src="{{ asset('assets/js/frontend/product/product-list.js') }}"></script>

@endpush