@extends('layouts.frontend.app')


@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
@php
Session::put('back_url', URL::full());
@endphp
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>{{lang('PRODUCTS')}}..<span> </span></h3>
<span style="color:white" ><a href="{{route('home')}}" style="color:#f2ae3d" >{{lang('HOME')}}</a> > {{lang('PRODUCTS')}} </span>
    </div>
</div>



<!-- banner-bootom-w3-agileits -->
<div class="banner_bottom_agile_info">
    <div class="container-fluid  newclass">
        <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-12">
            <div class="card remove-showdow">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <p class="font-family-change">{{lang('FILTER_OPTIONS')}} 
                            <button class="hidebutton circle" title="show or hide filter list" onclick="myFilterlist()">></button>
</p>
                        <hr />
                    </div>
                </div>

                             @php
                             $popularList=request()->route('popularList');
                            @endphp

                            <input type="hidden" id="popular_list" value="{{$popularList}}">
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
                            <option disabled selected>{{lang('SHOWRECORDS')}}</option>
                            <option value="6">6</option>
                            <option value="12">12</option>
                            <option value="48">48</option>
                            <option value="60">60</option>
                            <option value="100">100</option>
                        </select>

                    </div>
                </div>--}}

                <div id='filterListCat'>

                <div class="row margin-top-filter">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                        @if(!empty($category_list))
                        <select class="sorting-low-high brand-select remove-borders"  id="category">
                           @php
                             $route_cat_id=request()->route('catid');
                            @endphp


                           <option value="{{$route_cat_id}}" selected>{{lang('SELECT_CATEGORY')}}</option>
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
                            @php
                            $route_subcat_id=request()->route('subid');
                            @endphp
                            <option value="{{ $route_subcat_id }}" selected>{{lang('SUBCATEGORY')}}</option>
                            <!-- <option  selected disabled>Select Subcategory</option> -->

                        </select>
                        
                    </div>
                </div>


                <div class="row margin-top-filter">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                    
                   <b> {{lang('BRAND')}}</b>
                    <hr class="hr-width"/>
                        <div class="myBoxBrand">
                        @if(!empty($brand_list))
                            @php
                            $route_brandid=request()->route('brandid');
                            @endphp

                            <input class="checkboxes" checked type = "hidden"  id="getbrandid" value = "{{$route_brandid}}" />

                        @foreach($brand_list as $brand)
                            <input class="checkboxes"  type = "checkbox" <?php if($route_brandid==$brand->id){ echo 'checked';}?>  value = "{{$brand->id}}" />{{$brand->brandName}} <br/>
                         @endforeach
                        @endif
                        </div>


                    </div>
                </div>

                
                <div class="row margin-top-filter">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                   <b>{{lang('PRICE_RANGE')}}</b>
                    <hr class="hr-width"/>
                        <div class="price-range">
                            <input type="range" class="price-range-input" id="price-range" min="1" max="1500" value="0">
                            <span class="min-price" id="min-price">$0 </span>- $15000
                        </div>


                    </div>
                </div>


                <div class="row margin-top-filter">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                   <b> {{lang('CONDITION')}}</b>
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

               </div>
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
                        <div class="col-md-10 col-sm-10 col-lg-10 col-xl-10 col-xs-8">
                            <h3 class="favorite-heading ">{{lang('PRODUCTS')}}
                                {{--<span class="color-yellow-number">({{count($value)}})</span>--}}
                            </h3>
                        </div>
                        <div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-xs-4 float-right">
                            <select class="sorting-low-high remove-borders margin-top" onchange="showRecords()" id="page_limit">
                                <option disabled selected>{{lang('SHOWRECORDS')}}</option>
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

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

</script>
<script src="{{ asset('assets/js/frontend/product/cat-product-list.js') }}"></script>
<script>

</script>
@endpush