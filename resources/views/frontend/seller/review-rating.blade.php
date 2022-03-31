@extends('layouts.frontend.app')

@section('content')


<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>MY REVIEW & RATING</h3>

    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">
        @include('frontend/include/seller-side-bar')


        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">

        <div class="card-dashboard  col-12uy">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
                        <h3>REVIEW & RATING</h3>
                    </div>
                </div>
                <hr/>


                
         @if(!empty($productlist) && count($productlist) !=0)
                @foreach($productlist as $list)

                    @if(!empty($list) && ($list->product!=null))
                        <div class="row ">
                            <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth  border-bottom">

                                <div class="col-4 col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                                    <div class="background-gray rating seller new-size uploaded-image-edited">
                                        <img src="{{url('assets/images/product-images/'.$list->product->image->product_img)}}" onerror="this.src='{{url('assets/images/default.png')}}';" alt="" srcset=""/>

                                        <div class="hover-icons">
                                            <div>
                                                <a href="{{url('product-details/'.$list->product->id)}}" title="product's details">

                                                    <span class="left-buy-it" >
                                                            @if($list->product->want_to_list=='b')
                                                            Buy It Now
                                                            @elseif($list->product->want_to_list=='a')
                                                            Auction
                                                            @else
                                                            Both
                                                            @endif
                                                            
                                                            <i class="fas fa-angle-double-right"></i>
                                                    </span>

                                                </a>                                          
                                                <a href="{{url('product-details/'.$list->product->id)}}">                        
                                                <button class="circle"  title="View details"><i class="fa fa-eye color-delete"></i></button>
                                            </a>
                                                
                                            </div>
                                            <div class="bottom-on-hover">
                                                    <span class="left-side-text" title="Category"><i class="fa fa-tag"></i> &nbsp;
                                                    {{$list->product->category->categoryName}}</span>
                                                    <span title="Sub Category"><i class="fa fa-tag"></i>&nbsp;
                                                    {{$list->product->subCategory->subCategoryName}}</span>
                                                    @if(!empty($productvalue->brandName))
                                                    <span title="Brand"><i class="fa fa-gavel"></i>&nbsp;{{$list->product->brand->brandName}}</span>
                                                    @endif
                                                                                               
                                            </div>                                
                                                    
                                    </div>


                                    </div>
                                </div>
                                <div class="col-8 col-md-8 col-sm-8 col-lg-8 col-xl-8 reducewidth col-xs-12 text-left">
                                    <h3>{{$list->product->product_name}}</h3>
                                    <p class="rating-paragraph">{{$list->description}}
                                    </p>
                                    <br/>

                                    <div class="rating1">                            
                                    @for($star = 1; $star <= 5; $star++)
                                        <?php  $class_name = ''; ?>
                                    @if($list->rating >= $star)
                                                <?php $class_name = ' text-warning'; ?>
                                        @else
                                        <?php $class_name = '-o star-light checked'; ?>
                                        @endif
                                    
                                    <i class="fa fa-star<?php echo $class_name ?>  mr-1"></i>
                                    @endfor
                                    </div>
                                    <br/>
                                </div>

                            </div>            


                        </div>
                    @endif
                @endforeach
                @else
                <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth no-records">
                    <div>No Records Found</div>
                </div>

                @endif
            <div class="row">
           {{ $productlist->render('frontend.common.pagination') }}
            </div>
            </div>
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
