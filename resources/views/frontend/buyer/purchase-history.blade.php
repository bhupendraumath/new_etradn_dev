@extends('layouts.frontend.app')

@section('content')

<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>MY PURCHASE HISTORY</h3>

    </div>
</div>
<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

        @include('frontend/include/buyer-side-bar')
        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">

<div class="card-dashboard  col-12uy">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
            <h3>MY PURCHASE HISTORY</h3>
        </div>
    </div>
    <hr/>

    <div id= "purchase-history">

    </div>
    


</div>
</div>
    </div>
</div>


@push('scripts')
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


</script>
<script src="{{ asset('assets/js/frontend/product/purchase-history-list.js') }}"></script>

@endpush

@endsection
