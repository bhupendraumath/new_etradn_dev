@extends('layouts.frontend.app')

@section('content')


<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>{{lang('RFQ_LIST')}}</h3>
    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">
        @include('frontend/include/seller-side-bar')


        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
           
            <div class="card-dashboard  col-12uy rfq-list-right">
                <div class="">
                    <span class="show-pagination sorting-pagination uploaded-product">{{lang('SHOWRECORDS')}} :</span>    
                    <select class="sorting-low-high uploaded-product" id="rfq-page">
                        <option value="10" selected >10</option>
                        <option value="20" >20</option>
                        <option value="48">48</option>
                        <option value="60">60</option>
                        <option value="100">100</option>
                    </select> 
                </div>
                 <div id="rfq-list"></div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        // var rating_value=$("#rating_value").val();
        // document.getElementById(`rating${rating_value}`).checked = true;
    });
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> -->
@endsection


@push('scripts')
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

</script>
<script src="{{ asset('assets/js/frontend/product/rfq-list.js') }}"></script>
@endpush