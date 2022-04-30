<div class="col-12 col-md-12 col-sm-12">
<?php
use Carbon\Carbon;

?>


@if(!empty($bindlist) && count($bindlist)!=0)
<div class="row">
    @foreach($bindlist as $productvalue)

        <div class="product col-12 col-md-4 col-sm-4 col-lg-4 col-xl-4" data-id="aloe" data-category="green small medium africa">

                      
        <?php
                        
            $bid=new App\Models\Bids;

            $detail=Auth::user();

            // print_r( $detail['user_type']);
            if($detail['user_type']=='s'){
                $user_id=Auth::user()->id;
            }
            else{
                $user_id= $productvalue->user_id;
            }
            $bid_count=$bid->count_bids($user_id,$productvalue->product_id);  

            $b_count=count($bid_count);                        
            ?>
    

                <div class="images onhover-show-menus">
                    <div class="background-gray uploaded-image-edited">
                        @if(!empty($productvalue->product_img))
                        <img src="{{url('assets/images/product-images/'.$productvalue->product_img)}}" alt="" srcset="" onerror="this.src='{{url('assets/images/default.png')}}';" />
                        @else
                        <img src="{{url('assets/images/default.png')}}" alt="" srcset="" />
                        @endif
                     

                        <div class="hover-icons">
                                <div>
                                     
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

                                    @if(Auth::user()->user_type=='s')
                                    <a href="{{url('view-details-bids/'.$productvalue->product_id.'/'.$user_id)}}">
                                        
                                    @else
                                    <a href="{{url('product-details/'.$productvalue->product_id)}}">
                                    @endif                   
                                        <button class="circle"  title="View details"><i class="fa fa-eye color-delete"></i></button>
                                    </a>

                                    @if(Auth::user()->user_type=='b')
                                    <form id="addCartProductFrm" class="position-chnages-pay"method="post" class="formhidden">

                                        @if($productvalue->bid_status=="won")
                                                @php
                                                    $user=Auth::user();
                                                @endphp

                                                @if(!empty($user))
                                                <input type="hidden" name="customer_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" name="seller_id" value="{{$productvalue->user_id}}">
                                                <input type="hidden" name="product_id" value="{{$productvalue->id}}">
                                                <input type="hidden" name="paq_id" value="{{$productvalue->quantity->id}}">
                                                <input type="hidden" name="attribute_ids" value="{{$productvalue->quantity->id}}">
                                                <input type="hidden" name="attribute_value_ids" value="{{$productvalue->quantity->id}}">
                                                <input type="hidden" name="quantity" value="1" id="hiddenqty">
                                                <input type="hidden" name="price" value="{{$productvalue->quantity->price}}">
                                                <input type="hidden" name="discount" value="{{$productvalue->quantity->discount}}">
                                                <input type="hidden" name="pro_condition" value="{{$productvalue->quantity->condition_id}}">
                                                <input type="hidden" name="is_checkout" value="n">
                                                <input type="hidden" name="selling_type" value="{{$productvalue->want_to_list}}">
                                                <input type="hidden" name="is_delete" value="n">
                                                <input type="hidden" name="action" value="n">
                                                <input type="hidden" name="product_array" value="{{$productvalue->product}}">
                                                <input type="hidden" name="ip_address" value="0000">
                                                <input type="hidden" name="createdDate" value="{{Carbon::now()}}">
                                                <input type="hidden" name="updatedDate" value="{{Carbon::now()}}">

                                                {{--<input type="submit" name="submit" id="addCartProduct" value="Add to cart" class="button">--}}

                                                <button class="circle" type="submit" id="addCartProduct" title="You won this bid, please pay">
                                                <i class="fab fa-paypal color-delete"></i>
                                            </button>
                                                @endif

                                           
                                        @endif
                                    </form>
                                    
                                    @endif
                                    
                                </div>

                                <div class="bottom-on-hover">
                                        <span class="left-side-text" title="Category"><i class="fa fa-tag"></i> &nbsp;
                                        {{$productvalue->categoryName}}</span>
                                        <span title="Sub Category"><i class="fa fa-tag"></i>&nbsp;
                                        {{$productvalue->subCategoryName}}</span>
                                        @if(!empty($productvalue->brand))
                                        <span title="Brand"><i class="fa fa-gavel"></i>&nbsp;{{$productvalue->brandName}}</span>
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
                    
                   
                    <h4>{{$productvalue->product_name}}</h4>
                    <span>Minimum Bid: ${{$productvalue->bid_amount}}<span><br/>

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

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script src="{{ asset('assets/js/frontend/product/addCardProduct.js') }}"></script>