<div class="col-12 col-md-12 col-sm-12">

<div class="row">
@foreach($productlist as $productvalue)
<div class="product col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" data-id="aloe" data-category="green small medium africa">
    <!-- {{$productvalue}} -->

    <a href="{{url('product-details/'.$productvalue->id)}}">
        <div class="images onhover-show-menus">
            <div class="background-gray">
                <img src="{{url('assets/images/product-images/'.$productvalue->image->product_img)}}" alt="" srcset="" />
            </div>

            <br />
            
            
            <h4>{{$productvalue->product_name}}</h4>
            <span><strike>${{$productvalue->quantity->price}}</strike> &nbsp; <span> ${{$productvalue->quantity->price - $productvalue->quantity->discount}} </span></span>
            <div>

               {{-- @for($star = 1; $star <= 5; $star++)
                <?php  $class_name = ''; ?>
               @if(!empty($productvalue->review))
                    @if($productvalue->review->rating >= $star)
                    <?php $class_name = 'text-warning'; ?>
                    @else
                    <?php $class_name = 'star-light'; ?>
                    @endif
                @endif
                <i class="fas fa-star <?php echo $class_name ?>  mr-1"></i>
                @endfor--}}

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
<div class="row">
    <div class="col-12  right-side-column">
          {{ $productlist->links('frontend.common.pagination') }}
    </div>
</div>


</div>
