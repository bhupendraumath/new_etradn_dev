<div class="col-12 col-md-12 col-sm-12">

<div class="row">
@foreach($list as $productvalue)
<div class="product col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" data-id="aloe" data-category="green small medium africa">
    <div class="images onhover-show-menus">

        <div class="background-gray">
            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
        </div>
        <br />

        <h4>{{$productvalue->product_name}}</h4>
        <span><strike>$110.00</strike> &nbsp; <span> $90.00 </span></span>
        <div>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star-o checked"></span>
            <span class="fa fa-star-o checked"></span>

        </div>
    </div>

</div>
@endforeach
</div>
<div class="row">
    <div class="col-12  right-side-column">
    <!-- 'frontend.common.pagination' -->
          {{ $list->links() }}
    </div>
</div>


</div>
