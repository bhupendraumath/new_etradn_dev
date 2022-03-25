<div class="col-12 col-md-12 col-sm-12">

@if(!empty($address))
<div class="row">
    
    @foreach($address as $productvalue)

        <div class="product col-12 col-md-6 col-sm-6 col-lg-6 col-xl-6" data-id="aloe" data-category="green small medium africa">

               <div class="images onhover-show-menus">
                    <div class="background-gray uploaded-image-edited delivery-areas">
                        <h3>{{$productvalue->name}}</h3>    
                        <h4 class="delivery-address">
                            {{$productvalue->street_name!=null?$productvalue->street_name:''}} {{$productvalue->address1}}, {{$productvalue->city}}
                        </h4>    
                        <h4 class="delivery-address">{{$productvalue->state}}, {{$productvalue->country}}, {{$productvalue->zip_code}} </h4>               
                        <div class="hover-icons">   
                                <a href="{{url('delivery-address-edit-buyer/'.$productvalue->id)}}">                        
                                    <button class="circle"><i class="fa fa-edit fa-lg color-edit"></i> </button>
                                </a>
                                <a href="{{route('business-address-delete',$productvalue->id)}}">                        
                                    <button class="circle" onclick="return confirm('Are you sure, you want to delete it? ')"><i class="fa fa-trash-o color-delete"></i> </button>
                                </a>
                        </div>
                    </div>
                    <br/>

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
