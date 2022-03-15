<div class="col-12 col-md-12 col-sm-12">

@if(!empty($productlist))
<div class="row">

    @foreach($productlist as $productvalue)

        <div class="product col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" data-id="aloe" data-category="green small medium africa">


            <a href="{{url('product-details/'.$productvalue->id)}}">
                <div class="images onhover-show-menus">
                    <div class="background-gray">
                        @if(!empty($productvalue->image->product_img))
                        <img src="{{url('assets/images/product-images/'.$productvalue->image->product_img)}}" alt="" srcset="" onerror="this.src='{{url('assets/images/default.png')}}';" />
                        @else
                        <img src="{{url('assets/images/default.png')}}" alt="" srcset="" />
                        @endif
                        
                       
                    </div>

                    <br />
                    <br />
                    
                    
                    <h4>{{$productvalue->product_name}}</h4>
                    <span><strike>$ {{(isset($productvalue->quantity->price)?$productvalue->quantity->price:'')}}</strike> &nbsp; <span> $
                    {{(isset($productvalue->quantity->price)?$productvalue->quantity->price:'')}}
                - 
                    {{(isset($productvalue->quantity->discount)? $productvalue->quantity->discount:'')}} </span></span>
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
            </a>
        </div>
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
