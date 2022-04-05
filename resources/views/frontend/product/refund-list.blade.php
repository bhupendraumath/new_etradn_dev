<div class="col-12 col-md-12 col-sm-12">

@if(!empty($bindlist) && count($bindlist)!=0)


<div class="row">
    @foreach($bindlist as $productvalue)



        <div class="product col-12 col-md-4 col-sm-4 col-lg-4 col-xl-4" data-id="aloe" data-category="green small medium africa">

                <div class="images onhover-show-menus">
                    <div class="background-gray uploaded-image-edited">
                        
                        <img src="{{url('assets/images/product-images/'.$productvalue->product_img)}}" alt="" srcset="" onerror="this.src='{{url('assets/images/default.png')}}';" />
                        
                        <div class="hover-icons">
                                <div>
                                    <a href="{{url('product-details/'.$productvalue->product_id)}}" title="product's details">

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
                                    <a href="{{url('edit-details-refund/'.$productvalue->ref_id)}}">                        
                                    <button class="circle"  title="View details"><i class="fa fa-eye color-delete"></i></button>
                                </a>
                                    
                                </div>
                                <div class="bottom-on-hover">
                                        <span class="left-side-text" title="Category"><i class="fa fa-tag"></i> &nbsp;
                                        {{$productvalue->categoryName}}</span>
                                        <span title="Sub Category"><i class="fa fa-tag"></i>&nbsp;
                                        {{$productvalue->subCategoryName}}</span>
                                        @if(!empty($productvalue->brandName))
                                        <span title="Brand"><i class="fa fa-gavel"></i>&nbsp;{{$productvalue->brandName}}</span>
                                        @endif
                                        <span title="Bid" class="hide"><i class="fa fa-gavel"></i>&nbsp;Bid 0</span>

                                        <select  id="seller_approve" class="seller_status circle-select" title="Please accept or reject refund request">

                                        <option value="0" data-rid="{{$productvalue->ref_id}}" <?php if($productvalue->seller_approval_status==0) echo "selected"; ?> >Pending</option>
                                        <option value="1"  data-rid="{{$productvalue->ref_id}}" <?php if($productvalue->seller_approval_status==1) echo "selected"; ?>>Accepted</option>
                                        <option value="2" data-rid="{{$productvalue->ref_id}}" <?php if($productvalue->seller_approval_status==2) echo "selected"; ?>>Rejected</option>

                                        </select>
                                </div>                                
                                        
                        </div>
                    </div>
                    <br/>

                    <h4>{{$productvalue->product_name}}</h4>
                        <span>
                            Total Amount: ${{$productvalue->total_order_amount}}
                        
                            <span><br/>
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
<script src="{{ asset('assets/js/frontend/product/refund-request-list.js') }}"></script>
<script>

</script>