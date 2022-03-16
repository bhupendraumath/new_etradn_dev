<div class="col-12 col-md-12 col-sm-12">

@if(!empty($bindlist))
<div class="row">
    @foreach($bindlist as $productvalue)

    @php

    $refundRequest=new App\Models\RefundRequest;
    $refundRequestArray=$refundRequest->productWithRepectUser(Auth::user()->id,$productvalue->product_id)
    ->get();
    @endphp

    @if(count($refundRequestArray)!=0 )

        <div class="product col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" data-id="aloe" data-category="green small medium africa">


                <div class="images onhover-show-menus">
                    <div class="background-gray uploaded-image-edited">
                        @if(!empty($refundRequestArray[0]->image->product_img))
                        <img src="{{url('assets/images/product-images/'.$refundRequestArray[0]->image->product_img)}}" alt="" srcset="" onerror="this.src='{{url('assets/images/default.png')}}';" />
                        @else
                        <img src="{{url('assets/images/default.png')}}" alt="" srcset="" />
                        @endif
                        

                        <div class="hover-icons">

                           {{-- <select  id="seller_approve" class="seller_status circle-select" title="Status Manage by seller">
                            <option '<?php if($productvalue->seller_approval_status==0){ echo "selected";}  ?>' >-Status-</option>
                            <option value="1" <?php if($productvalue->seller_approval_status==1) echo "selected"; ?>>Accepted</option>
                            <option value="2" <?php if($productvalue->seller_approval_status==2) echo "selected"; ?>>Rejected</option>
                            </select>--}}
                            <a href="{{url('edit-details-refund/'.$productvalue->id)}}">                        
                                <button class="circle"  title="View details"><i class="fa fa-eye color-delete"></i></button>
                            </a>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    
                   
                    <h4>{{$refundRequestArray[0]->product_name}}</h4>
                        <span>
                            Total Amount: ${{$productvalue->order_details->total_order_amount}}<span><br/>
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
        @endif
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
