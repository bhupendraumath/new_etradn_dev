@php

$favoriteProduct=new App\Models\Product;

@endphp
<div class="col-12 col-md-12 col-sm-12">

@if(!empty($productlist) && (count($productlist)!=0))
<div class="row">

    @foreach($productlist as $productvalue)

   {{-- @if(!empty($productvalue->quantity))--}}
        <div class="product col-12 col-md-4 col-sm-4 col-lg-4 col-xl-4" data-id="aloe" data-category="green small medium africa">
         {{--   <a href="{{url('product-details/'.$productvalue->id)}}">--}}
                <div class="images onhover-show-menus">
                    <div class="background-gray uploaded-image-edited cat-product">

                    
                        <?php

                        $images_product=new App\Models\ImageUpload;
                        $image_path_name=$images_product->imageProductById($productvalue->id);    
                        
                        // dd($image_path_name);die;
                        ?>


                        @if(!empty($image_path_name))
                        <img src="{{url('assets/images/product-images/'.$image_path_name->product_img)}}" alt="" srcset="" onerror="this.src='{{url('assets/images/default.png')}}';" />
                        @else
                        <img src="{{url('assets/images/default.png')}}" alt="" srcset="" />
                        @endif                      
                       

                        <div class="hover-icons">

                        <div>
                            <a href="{{url('product-details/'.$productvalue->id)}}" title="product's details">
                                <span class="left-buy-it">
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
                                
                                $value= $favoriteProduct->favorite_product_details($productvalue->id,Auth::user()->id);
                                

                                     if(count($value)!=0){
                                        $title= 'Remove in your favorite list';
                                        $color=1;
                                    }
                                    else{
                                        $title= 'Add in favorite list';
                                        $color=2;
                                    }
                                }
                                else{                                                     
                                //  $value=[];
                                    $title= 'Add in favorite list';
                                    $color=0;
                                }
                            ?>


                            
                                @if($color==1)
                                    <button class="circle" title="{{$title}}" onclick="addedFav({{$productvalue->id}},{{$productvalue->q_id}},{{$value[0]->id}},'user_exists')">
                                        <i class="fas fa-heart" style="color:red"></i>
                                    </button>
                                 @elseif($color==2)

                                     <button class="circle" title="{{$title}}" onclick="addedFav({{$productvalue->id}},{{$productvalue->q_id}},'not__yet','user_empty')">
                                            <i class="fa fa-heart-o"></i>
                                    </button>
                                @else
                                    <button class="circle" title="{{$title}}" onclick="addedFav({{$productvalue->id}},{{$productvalue->q_id}},'not__yet','auth_required')">
                                            <i class="fa fa-heart-o"></i>
                                    </button>
                                @endif
                            <!-- </a> -->
                        </div>
                        <a href="{{url('product-details/'.$productvalue->id)}}" title="product's details">
                        <div class="bottom-on-hover">
                                <span class="left-side-text" title="Category"><i class="fa fa-tag"></i> &nbsp;
                                {{$productvalue->categoryName}}</span>
                                <span title="Sub Category"><i class="fa fa-tag"></i>&nbsp;
                                {{$productvalue->subCategoryName}}</span>
                                @if(!empty($productvalue->brand_id))
                                <span title="Brand"><i class="fa fa-gavel"></i>&nbsp;{{$productvalue->brandName}}</span>
                                @endif
                                <span title="Bid" class="hide"><i class="fa fa-gavel"></i>&nbsp;Bid 0</span>
                        </div>
                            </a>
                        </div>
                    </div>
                    <br />
                    
                    <a href="{{url('product-details/'.$productvalue->id)}}">

                        <h4>{{$productvalue->product_name}}</h4>
                        @if(!empty($productvalue->q_id))
                        <span>
                                <strike>
                                $ {{$productvalue->price}}
                                </strike> &nbsp;
                                <span class="price-original"> $                                 
                                    {{$productvalue->price-($productvalue->price * $productvalue->discount/100)}}           
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
    {{--@endif--}}
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
</script>
