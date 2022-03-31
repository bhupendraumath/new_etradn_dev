<div class="col-12 col-md-12 col-sm-12">

@if(!empty($bindlist))
<div class="row">
    @foreach($bindlist as $productvalue)


        <div class="product col-12 col-md-4 col-sm-4 col-lg-4 col-xl-4" data-id="aloe" data-category="green small medium africa">

                                
        <?php
                        
                        $bid=new App\Models\Bids;
                        if(Auth::user()->usertype=='s'){
                            $user_id=Auth::user()->id;
                        }
                        else{
                            $user_id= $productvalue->product->user_id;
                        }
                        $bid_count=$bid->count_bids($user_id,$productvalue->product_id);    
                        $b_count=count($bid_count);                        
                        ?>
                    
                <div class="images onhover-show-menus">
                    <div class="background-gray uploaded-image-edited">
                        @if(!empty($productvalue->image->product_img))
                        <img src="{{url('assets/images/product-images/'.$productvalue->image->product_img)}}" alt="" srcset="" onerror="this.src='{{url('assets/images/default.png')}}';" />
                        @else
                        <img src="{{url('assets/images/default.png')}}" alt="" srcset="" />
                        @endif

                        <div class="hover-icons">
                                <div>

                                    <span class="left-buy-it" >
                                            @if($productvalue->product->want_to_list=='b')
                                            Buy It Now
                                            @elseif($productvalue->product->want_to_list=='a')
                                            Auction
                                            @else
                                            Both
                                            @endif
                                            
                                            <i class="fas fa-angle-double-right"></i>
                                    </span>

                                    @if(Auth::user()->user_type=='s')
                                    <a href="{{url('view-details-bids/'.$productvalue->product_id.'/'.$user_id)}}">
                                    @else
                                    <a href="{{url('product-details/'.$productvalue->product_id)}}">
                                    @endif                   
                                        <button class="circle"  title="View details"><i class="fa fa-eye color-delete"></i></button>
                                    </a>
                                    
                                </div>

                                <div class="bottom-on-hover">
                                        <span class="left-side-text" title="Category"><i class="fa fa-tag"></i> &nbsp;
                                        {{$productvalue->product->category->categoryName}}</span>
                                        <span title="Sub Category"><i class="fa fa-tag"></i>&nbsp;
                                        {{$productvalue->product->subCategory->subCategoryName}}</span>
                                        @if(!empty($productvalue->product->brand))
                                        <span title="Brand"><i class="fa fa-gavel"></i>&nbsp;{{$productvalue->product->brand->brandName}}</span>
                                        @endif
                                        <span title="Bid"><i class="fa fa-gavel"></i>&nbsp;Bid {{$b_count}}</span>
                                        
                                        @if(Auth::user()->user_type=="b")
                                        <span>Your Bid: <span style="color:red">${{$productvalue->bid_amount}}</span><span><br/>

                                        <span>Bid status: <span style="color:red">
                                        {{$productvalue->bid_status}}
                                        </span><span><br/>

                                        @endif
                                </div>
                        
                        </div>
                    </div>
                    <br/>
                    
                   
                    <h4>{{$productvalue->product->product_name}}</h4>
                    <span>Minimum Bid: ${{$productvalue->product->bid_amount}}<span><br/>

                    <!-- <span>{{$productvalue->bid_status}}<span> -->
                   </span>
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
                </div>
            <!-- </a> -->
        </div>
    @endforeach
</div>
@else
        <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth no-records">
            <div>No Records Found</div>
        </div>
@endif
<div class="row">
@if(!empty($bindlist))
    <div class="col-12  right-side-column">
          {{ $bindlist->links('frontend.common.pagination') }}
    </div>
@endif
</div>


</div>
