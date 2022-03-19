@extends('layouts.frontend.app')

@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Products..<span> </span></h3>
<span style="color:white" ><a href="{{route('home')}}" style="color:#f2ae3d" >Home</a> > Product </span>
    </div>
</div>



<!-- banner-bootom-w3-agileits -->
<div class="banner_bottom_agile_info">
    <div class="container-fluid  newclass">
        <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-12">
            <div class="card remove-showdow">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <p class="font-family-change">FILTER OPTIONS :</p>
                        <hr />
                    </div>
                </div>
              {{--  <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <input type="hidden" id="pathimage" value="{{url('assets/images/product-images/')}}">

                        <input type="hidden" id="url" value="{{url('product-details')}}">
                        <span class="sorting-pagination">Sort By :</span>

                        <select class="sorting-low-high" onchange="priceOrder()" id="order">
                            <option disabled selected>--Select--</option>
                            <option value="higher">Highest Price</option>
                            <option value="lower">Lowest Price</option>
                        </select>

                    </div>
                </div>
--}}

               {{-- <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <select class="sorting-low-high remove-borders" onchange="showRecords()" id="page_limit">
                            <option disabled selected>Show records</option>
                            <option value="6">6</option>
                            <option value="12">12</option>
                            <option value="48">48</option>
                            <option value="60">60</option>
                            <option value="100">100</option>
                        </select>

                    </div>
                </div>--}}

                <div class="row margin-top-filter">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                        @if(!empty($category_list))
                        <select class="sorting-low-high brand-select remove-borders" onchange="selectedCategory()" id="category">
                            @php
                             $route_cat_id=request()->route('id');
                            @endphp


                            <option value="{{ $route_cat_id }}" selected>Select Category</option>
                            @foreach($category_list as $cat)
                            <option value="{{$cat->id}}">{{$cat->categoryName}}</option>
                            @endforeach
                        </select>
                        @endif


                    </div>
                </div>

                <div class="row margin-top-filter">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                        
                        <select class="sorting-low-high brand-select remove-borders" onchange="selectedSubCategory()" id="subcategory">
                            <!-- <option  selected disabled>Select Subcategory</option> -->

                        </select>
                        
                    </div>
                </div>


                <div class="row margin-top-filter">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                    
                   <b> BRAND</b>
                    <hr class="hr-width"/>
                        <div class="myBoxBrand">
                        @if(!empty($brand_list))
                        @foreach($brand_list as $brand)
                            <input class="checkboxes" type = "checkbox"  value = "{{$brand->id}}" />{{$brand->brandName}} <br/>
                         @endforeach
                        @endif
                        </div>


                    </div>
                </div>

                
                <div class="row margin-top-filter">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                   <b> PRICE RANGE</b>
                    <hr class="hr-width"/>
                        <div class="price-range">
                            <input type="range" class="price-range-input" id="price-range" min="1" max="1500" value="0">
                            <span class="min-price" id="min-price">$0 </span>- $15000
                        </div>


                    </div>
                </div>


                <div class="row margin-top-filter">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                   <b> CONDITION</b>
                    <hr class="hr-width"/>

                    
                        <div class="condition">
                        
                            @if(!empty($condition_list))
                            @foreach($condition_list as $condition)
                                <input class="checkboxes" type = "checkbox"  value = "{{$condition->id}}" />{{$condition->conditionTypeName}} <br/>
                            @endforeach
                            @endif
                            <!-- <input class="checkboxes" type = "checkbox"  value = "1" />New <br/>
                            <input class="checkboxes" type = "checkbox"  value = "2" />Used <br/>
                            <input class="checkboxes" type = "checkbox"  value = "3" />Non <br/>
                            <input class="checkboxes" type = "checkbox"  value = "4" />Brand new, unopened and undamaged <br/>
                        -->
                        </div>


                    </div>
                </div>

               {{-- <div class="row margin-top-filter">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                   <b> DISCOUNT %</b>
                    <hr class="hr-width"/>
                        <div class="discount">                        
                            <input class="checkboxes" type = "checkbox"  value = "0-15" />Less then 15% <br/>
                            <input class="checkboxes" type = "checkbox"  value = "16-30" />16% - 30% <br/>
                            <input class="checkboxes" type = "checkbox"  value = "31-45" />31% - 45% <br/>
                            <input class="checkboxes" type = "checkbox"  value = "46-100" />46% or More <br/>
                       
                        </div>


                    </div>
                </div>--}}

              {{--  <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                        <button class="filter-button" onclick="filter()" id="filterr">Submit</button>

                    </div>
                </div>--}}
            </div>
        </div>

        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-12 cat-product">
                    <div class="row margin-top-cat-products">
                        @php
                            $favoriteProduct=new App\Models\Product;
                            $value= $favoriteProduct->where('cat_id',$route_cat_id)->get();
                        @endphp 
                        <div class="col-md-10 col-sm-10 col-lg-10 col-xl-10 col-xs-12"><br/<br/>
                            <h3 class="favorite-heading ">PRODUCTS
                                {{--<span class="color-yellow-number">({{count($value)}})</span>--}}
                            </h3>
                        </div>
                        <div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-xs-12 float-right">
                            <select class="sorting-low-high remove-borders margin-top" onchange="showRecords()" id="page_limit">
                                <option disabled selected>Show records</option>
                                <option value="6">6</option>
                                <option value="12">12</option>
                                <option value="48">48</option>
                                <option value="60">60</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    <hr class="favorite"/><br/>
                <div class="card remove-showdow">
                    <div class="products row" id='listing'>
                    </div>
                 </div>


        </div>

    </div>
</div>


@endsection
@push('scripts')
<script>


$(document).ready(function() {

    $('#category').on('change', function() {
        var category_id = this.value;
        $("#subcategory").html('');

        filtersByValue(pageno,price_order,show_records,category,sub_category,brandArr,conditionArr,discountArr,priceRange);

        $.ajax({
            url: "{{url('getsubCategroy')}}",
            type: "POST",
            data: {
                category_id: category_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {

                $('#subcategory').html('<option value="">Select sub category</option>');
                console.log(result.data);
                var template;
                for (var i = 0; i < result.data.length; i++) {
                    template += '<option value="' + result.data[i].id + '">' + result.data[i].subCategoryName + '</option>';
                }


                $("#subcategory").append(template);

                // $.each(result.data, function(key, value) {
                //     $("#subcategory").append('<option value="' + value
                //         .id + '">' + value.subCategoryName + '</option>');
                // });
                // $('#subcategory').html('<option value="">--Select Sub category--</option>');
            }
        });
    });
});



    var brandArr=[];
    var conditionArr=[];
    var discountArr=[];
    var priceRange=15000;
    var price_order;
    var show_records;
    var category;
    var sub_category;
    var pageno = 1;

    function priceOrder(){
        var price_order = $('#order').val();
        filtersByValue(pageno,price_order,show_records,category,sub_category,brandArr,conditionArr,discountArr,priceRange)
    }

    function showRecords(){
        show_records = $('#page_limit').val();
        filtersByValue(pageno,price_order,show_records,category,sub_category,brandArr,conditionArr,discountArr,priceRange)
    }    

    
    function selectedSubCategory(){
        var sub_category = $('#subcategory').val();
        filtersByValue(pageno,price_order,show_records,category,sub_category,brandArr,conditionArr,discountArr,priceRange)
    }

    $('.myBoxBrand  input:checkbox').change(function(){

      var tempValue='';
      var arr=[];

      tempValue=$('.myBoxBrand  input:checkbox').map(function(n){
          if(this.checked){
          			arr.push(Number(this.value));
                    //   return  this.value;
              };
       }).get().join(',');
 
       brandArr=arr;
       filtersByValue(pageno,price_order,show_records,category,sub_category,brandArr,conditionArr,discountArr,priceRange)

    })


    $('.condition  input:checkbox').change(function(){
      var arr=[];
      tempValue=$('.condition  input:checkbox').map(function(n){
          if(this.checked){
          			arr.push(this.value);
              };
       });
 
       conditionArr=arr;
       filtersByValue(pageno,price_order,show_records,category,sub_category,brandArr,conditionArr,discountArr,priceRange)

    })


    $('.discount  input:checkbox').change(function(){
      var arr=[];
      tempValue=$('.discount  input:checkbox').map(function(n){
          if(this.checked){
          			arr.push(this.value);
              };
       });

       discountArr=arr; 
       filtersByValue(pageno,price_order,show_records,category,sub_category,brandArr,conditionArr,discountArr,priceRange)

    })

    $('#price-range').change(function(){ 
        var price_range=$('#price-range').val();
        document.getElementById("min-price").innerHTML = '$'+price_range;
        priceRange=price_range;
        console.log("---------------------",priceRange,discountArr,conditionArr,brandArr)
        filtersByValue(pageno,price_order,show_records,category,sub_category,brandArr,conditionArr,discountArr,priceRange)

    })


    $(document).ready(function() {
       
        // filter(pageno);

        filtersByValue(pageno,price_order,show_records,category,sub_category,brandArr,conditionArr,discountArr,priceRange)
    })
  

    function filtersByValue(pageno,price_order,show_records,category,sub_category,brandArr,conditionArr,discountArr,priceRange) {

        var category_value = $('#category').val();
        var subcategory_value = $('#subcategory').val();
        var order = $('#order').val();


        $.ajax({
            url: "{{url('product-list')}}",
            type: "POST",
            data: {
                'order': order,
                'page_limit': show_records,
                'category': category_value,
                'sub_category': subcategory_value,
                'brand': brandArr,
                'conditionArr': conditionArr,
                'discountArr': discountArr,
                'priceRange': priceRange,
                'page': pageno,
                _token: '{{csrf_token()}}'
            },
            success: function success(response) {
                $('#listing').html('');
                $('#listing').html(response.data.completeSessionView)
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 350;
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

    /*dfunction filter(pageno) {
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



    }*/

    $("body").on('click', '.page-link', function() {
        var url = $(this).data('url');
        let newurl = url.substring(url.lastIndexOf('=') + 1);
        filter(newurl);
    });
</script>
@endpush