@extends('layouts.frontend.app')

@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Fruits<span> </span></h3>

    </div>
</div>

 <!-- banner-bootom-w3-agileits -->
 <div class="banner_bottom_agile_info">
    <div class="container-fluid  newclass">
        <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-12">
            <div class="card">
                    <div class="row">
                        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                            <span class="sorting-pagination">Sort By :</span>

                            <select class="sorting-low-high">
                                <option value="" disabled>Sort</option>
                                <option value="atoz">A to Z</option>
                                <option value="ztoa">Z to A</option>
                                <option value="higher">Highest Price</option>
                                <option value="lower">Lowest Price</option>
                            </select>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                            <span class="show-pagination sorting-pagination">Show :</span>    
                            <select class="sorting-low-high">
                                <option value="12">12</option>
                                <option value="48">48</option>
                                <option value="60">60</option>
                                <option value="100">100</option>
                            </select>                           
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">

                            <span class="sorting-pagination">Brand By :</span><br/>
                                @if(!empty($brand_list))
                                    @foreach($brand_list as $brand)
                                    <input type="checkbox" id="{{$brand->brandName}}" name="{{$brand->brandName}}" value="{{$brand->id}}">
                                    <label class="brand" for="{{$brand->brandName}}"> {{$brand->brandName}}</label><br>
                                    @endforeach
                                @endif
                            

                        </div>
                    </div>
            </div>
        </div>
        
        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-12">
            <div class="card">

                <div class="row">
                    
                    <div class="col-12 col-md-6 col-sm-6 col-lg-6 col-xl-6 product-list-page">
                        <p class="font-family-change">PRODUCT'S LIST</p>                        
                    </div>                   
                  					

                </div>
                <hr class="margin-top-bottom">
                <div class="row">



                    @if(!empty($list))
                        @foreach($list as $product)
                        <div class="col-12 col-md-4 col-sm-4 col-lg-4 col-xl-4">
                            <div class="images images-padding">
                                <div class="background-gray1">
                                    
                                    <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset=""/>
                                </div>
                                
                                <br/>
                            
                                <h4>{{$product->product_name}}</h4>
                                <span><strike>${{$product->bid_amount}}</strike> &nbsp; <span> ${{$product->shipping_price}} </span></span>
                                
                                @if(!empty($product->review) && (count($product->review)!=0))
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                </div>
                                @else
                                <div>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                </div>
                                @endif
                            </div>
                            
                        </div>
                        @endforeach
                    @endif
                </div>
               
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12 text-align-right">
                         <?php echo $list->render(); ?>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div> 
</div>  


@endsection
@push('scripts')
<script>
  $('#myselect').select2({
    width: '100%',
    placeholder: "Select an Option",
    allowClear: true
  });
</script>
@endpush