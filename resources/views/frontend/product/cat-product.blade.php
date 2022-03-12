@extends('layouts.frontend.app')

@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Products..<span> </span></h3>

    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner_bottom_agile_info">
    <div class="container-fluid  newclass">
        <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-12">
            <div class="card">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <p class="font-family-change">PRODUCT's FILTER :</p>
                        <hr />
                    </div>
                </div>
              {{--  <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <input type="hidden" id="pathimage" value="{{url('assets/images/product-images/')}}">

                        <input type="hidden" id="url" value="{{url('product-details')}}">
                        <span class="sorting-pagination">Sort By :</span>

                        <select class="sorting-low-high" id="order">
                            <option disabled selected>--Select--</option>
                            <!-- <option value="atoz">A to Z</option>
                                    <option value="ztoa">Z to A</option> -->
                            <option value="higher">Highest Price</option>
                            <option value="lower">Lowest Price</option>
                        </select>

                    </div>
                </div>
--}}

                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <span class="show-pagination sorting-pagination">Show :</span>
                        <select class="sorting-low-high" id="page_limit">
                            <option disabled selected>--Select--</option>
                            <option value="12">12</option>
                            <option value="48">48</option>
                            <option value="60">60</option>
                            <option value="100">100</option>
                        </select>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                        <span class="sorting-pagination">Brand By :</span><br />
                        @if(!empty($brand_list))
                        <select class="sorting-low-high brand-select" id="brand">
                            <option disabled selected>--Select--</option>
                            @foreach($brand_list as $brand)
                            <option value="{{$brand->id}}">{{$brand->brandName}}</option>
                            @endforeach
                        </select>
                        @endif


                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                        <span class="sorting-pagination">Category By :</span><br />
                        @if(!empty($category_list))
                        <select class="sorting-low-high brand-select" id="category">
                            <option value="{{ request()->route('id') }}" selected>--Select--</option>
                            @foreach($category_list as $cat)
                            <option value="{{$cat->id}}">{{$cat->categoryName}}</option>
                            @endforeach
                        </select>
                        @endif


                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                        <button class="filter-button" onclick="filter()" id="filterr">Submit</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-12">
            <div class="card">

                <div class="row">

                    <div class="col-12 col-md-9 col-sm-9 col-lg-9 col-xl-9 product-list-page">
                        <p class="font-family-change">PRODUCT'S LIST</p>
                    </div>

                    <div class="col-12 col-md-3 col-sm-3 col-xl-3">
                        {{--{!! $data->links() !!}--}}

                        <div id="pagination"></div>
                    </div>
                </div>
                <hr class="margin-top-bottom">
                <div>
                    <!-- <div class="row" id="filters_card_show_here"></div> -->
                    <div class="products row" id='listing'>
                    </div>
                </div>

            </div>


        </div>

    </div>
</div>


@endsection
@push('scripts')
<script>
     var pageno = 1;
    $(document).ready(function() {
       
        filter(pageno);

    })
  

    function filter(pageno) {
        var order = $('#order').val();
        var page_limit = $('#page_limit').val();
        var brand = $('#brand').val();
        var category = $('#category').val();
        var path = $('#pathimage').val();
        var url_file = $('#url').val();

        $.ajax({
            url: "{{url('product-list')}}",
            type: "POST",
            data: {
                'order': order,
                'page_limit': page_limit,
                'brand': brand,
                'category': category,
                'page': pageno,
                _token: '{{csrf_token()}}'
            },
            success: function success(response) {
                $('#listing').html('');
                $('#listing').html(response.data.completeSessionView)

            },
            error: function error(data) {
                $('#listing').html('');
                if (data.status === 422) {
                    var responseText = $.parseJSON(data.responseText);
                    toastr.error(responseText.error.message);
                }
                if (data.status === 400) {
                    var responseText = $.parseJSON(data.responseText);
                    toastr.error(responseText.message);
                }
            }
        });



    }

    $("body").on('click', '.page-link', function() {
        var url = $(this).data('url');
        let newurl = url.substring(url.lastIndexOf('=') + 1);
        filter(newurl);
    });
</script>
@endpush