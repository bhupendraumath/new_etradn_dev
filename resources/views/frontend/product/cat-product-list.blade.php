@php

$favoriteProduct=new App\Models\Product;

@endphp
<div class="col-12 col-md-12 col-sm-12">

@if(!empty($productlist) && (count($productlist)!=0))
<div class="row">

    @foreach($productlist as $productvalue)

    @if(!empty($productvalue->quantity))
        <div class="product col-12 col-md-4 col-sm-4 col-lg-4 col-xl-4" data-id="aloe" data-category="green small medium africa">
         {{--   <a href="{{url('product-details/'.$productvalue->id)}}">--}}
                <div class="images onhover-show-menus">
                    <div class="background-gray uploaded-image-edited cat-product">
                        @if(!empty($productvalue->image->product_img))
                        <img src="{{url('assets/images/product-images/'.$productvalue->image->product_img)}}" alt="" srcset="" onerror="this.src='{{url('assets/images/default.png')}}';" />
                        @else
                        <img src="{{url('assets/images/default.png')}}" alt="" srcset="" />
                        @endif                      
                       

                        <div class="hover-icons">

                        <div>
                            <a href="{{url('product-details/'.$productvalue->id)}}" title="product's details">
                                <span class="left-buy-it" >
                                        @if($productvalue->want_to_list=='b')
                                        Buy It Now
                                        @elseif($productvalue->want_to_list=='a')
                                        Auction
                                        @else
                                        Both
                                        @endif
                                        
                                        <i class="fas fa-angle-double-right"></i>
                                </span>
                            </a>
                                     <?php
                                            $user=Auth::user();

                                            if(!empty($user))
                                            {
                                                $value= $favoriteProduct->favorite_product_details($product->id,Auth::user()->id);
                                                
                                                if(count($value)!=0){
                                                    $title= 'Already added in your favorite list';
                                                    $color=1;
                                                }
                                                else{
                                                    $title= 'Add in favorite list';
                                                    $color=0;
                                                }
                                            }
                                            else{
                                                //  $value=[];
                                                $title= 'Add in favorite list';
                                                $color=0;
                                            }
                                        ?>                       
                                <button class="circle" title="{{$title}}" onclick="addedFav({{$productvalue->id}},{{$productvalue->quantity->id}})">
                                    @if( $color)
                                    <!-- <i class="fa fa-heart-o" style="color:red"></i> -->
                                    <i class="fas fa-heart" style="color:red"></i>
                                    @else
                                    <i class="fa fa-heart-o"></i>

                                    @endif

                                </button>
                            <!-- </a> -->
                        </div>
                        <a href="{{url('product-details/'.$productvalue->id)}}" title="product's details">
                        <div class="bottom-on-hover">
                                <span class="left-side-text" title="Category"><i class="fa fa-tag"></i> &nbsp;
                                {{$productvalue->category->categoryName}}</span>
                                <span title="Sub Category"><i class="fa fa-tag"></i>&nbsp;
                                {{$productvalue->subCategory->subCategoryName}}</span>
                                @if(!empty($productvalue->brand))
                                <span title="Brand"><i class="fa fa-gavel"></i>&nbsp;{{$productvalue->brand->brandName}}</span>
                                @endif
                                <span title="Bid" class="hide"><i class="fa fa-gavel"></i>&nbsp;Bid 0</span>
                        </div>
                            </a>
                        </div>
                    </div>
                    <br />
                    
                    <a href="{{url('product-details/'.$productvalue->id)}}">

                        <h4>{{$productvalue->product_name}}</h4>
                        @if(!empty($productvalue->quantity))
                        <span>
                                <strike>
                                $ {{$productvalue->quantity->price}}
                                </strike> &nbsp;
                                <span class="price-original"> $                                 
                                    {{$productvalue->quantity->price-($productvalue->quantity->price * $productvalue->quantity->discount/100)}}           
                                </span>
                               {{-- <span class="discount-price">
                                    &nbsp;
                                {{$productvalue->quantity->discount!=0?$productvalue->quantity->discount.'% Off':''}} 
                                </span>--}}
                        </span>
                        @else
                        Price Pending
                        @endif
                        <div class="rating-review-upload">

                            <?php
                            
                            $review=new App\Models\ProductReview;
                            $avg_review=$review->review_average($productvalue->id);            
                            ?>


                            @for($star = 1; $star <= 5; $star++)
                            <?php  $class_name = ''; ?>
                        
                                @if($avg_review >= $star)
                                <?php $class_name = ' text-warning'; ?>
                                @else
                                <?php $class_name = '-o star-light checked'; ?>
                                @endif
                            
                            <i class="fa fa-star<?php echo $class_name ?>  mr-1"></i>
                            @endfor

                            <!-- <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star-o checked"></span>
                            <span class="fa fa-star-o checked"></span> -->

                        </div>
                    </a>
                    

                    
                </div>
         {{--   </a>--}}
        </div>
    @endif
    @endforeach
</div>
@else
        <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth no-records">
            <div>No Records Found</div>
        </div>
@endif
<div class="row">
@if(!empty($productlist))
    <div class="col-12  right-side-column">
          {{ $productlist->links('frontend.common.pagination') }}
    </div>
@endif
</div>


</div>


<script>
    function addedFav(product_id,quantity_id){
        // console.log(process.env.MIX_APP_URL + "/add-in-fav-list/"+product_id+'/'+quantity_id);

        // return false;
        // var path="/add-in-fav-list/"+product_id+'/'+quantity_id;
        
        $.ajax({
            url: "{{url('add-in-fav-list')}}"+'/'+product_id+'/'+quantity_id,
            type: "GET",
            dataType: 'json',
            success: function (response) {
                    if (response.success) {
                        toastr.clear();
                        toastr.success(response.message, { timeOut: 2000 });
                        location.reload();
                    } else {
                        toastr.clear();
                        toastr.error(response.message, { timeOut: 2000 });
                    }
                },
            
        });

    }
</script>
