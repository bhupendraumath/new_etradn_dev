@extends('layouts.frontend.app')

@section('content')

<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>MY FAVORITE PRODUCT</h3>

    </div>
</div>



<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

        @include('frontend/include/buyer-side-bar')
       
        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
            <div class="card-dashboard  col-12uy">
                <div class="row">
                         @php
                            $favoriteProduct=new App\Models\FavoriteProduct;
                            $value= $favoriteProduct->where('user_id',Auth::user()->id)->get();
                        @endphp 
                    <div class="col-md-6 col-sm-6 col-lg-9 col-xl-9 col-xs-7">

                    <h3 class="favorite-heading">MY FAVORITES <span class="color-yellow-number">({{count($value)}})</span></h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3 col-xl-3 col-xs-5 float-right" >
                    <!-- filter section    -->
                        @if(count($value)!=0)
                        <button class="filter-button remove-color-black" onclick="allremove()"  >REMOVE ALL </button>
                        <br/>
                        @endif
                    </div>

                    <!-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12 float-right">                   


                       <span class="show-pagination sorting-pagination uploaded-product">listed  :</span>    
                       <select class="sorting-low-high uploaded-product" id="both_auctions">
                           <option value="all" selected >All</option>
                           <option value="b" >Buy now </option>
                           <option value="a">Auction </option>
                           <option value="bo">Both</option>
                       </select> 
                   </div> -->

                </div>
                <hr class="favorite"/>

                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 danger">
                    <br/>
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                        {{ session()->get('message') }}
                        </div>
                @endif
                    </div>
                </div>
              
                <br /><br />


                <div class="products row" id="fav-product">
                </div>
                <br /><br />
            </div>
        </div>
    </div>
</div>
<script>

    
</script>



@push('scripts')
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});






</script>
<script src="{{ asset('assets/js/frontend/product/my-fav-product-list.js') }}"></script>


@endpush
@endsection