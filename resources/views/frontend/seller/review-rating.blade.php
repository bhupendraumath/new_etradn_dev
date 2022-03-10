@extends('layouts.frontend.app')

@section('content')


<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>MY REVIEW & RATING</h3>

    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">
        @include('frontend/include/seller-side-bar')


        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">

        <div class="card-dashboard  col-12uy">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
                        <h3>REVIEW & RATING</h3>
                    </div>
                </div>
                <hr/>
                
            @if($productlist)
            @foreach($productlist as $list)


            @if(!empty($list) && ($list->product!=null))
                <div class="row ">
                    <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth  border-bottom">

                        <div class="col-3 col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-12">
                            <div class="background-gray rating new-size">
                                <img src="{{url('assets/images/product-images/'.$list->product->image->product_img)}}" alt="" srcset=""/>
                            </div>
                        </div>
                        <div class="col-9 col-md-9 col-sm-9 col-lg-9 col-xl-9 reducewidth col-xs-12 text-left">
                            <h3>{{$list->product->product_name}}</h3>
                            <p class="rating-paragraph">{{$list->description}}
                            </p>
                            <br/>
                            <!-- <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star-o checked"></span>
                                <span class="fa fa-star-o checked"></span>
                                
                            </div> -->

                            <input type="hidden" id="rating_value" value="{{$list->rating}}">
                            <div class="rating1">
                                <span class="starRating">
                                    <input id="rating5" type="radio" name="rating" value="5">
                                    <label for="rating5">5</label>
                                    <input id="rating4" type="radio" name="rating" value="4">
                                    <label for="rating4">4</label>
                                    <input id="rating3" type="radio" name="rating" value="3" >
                                    <label for="rating3">3</label>
                                    <input id="rating2" type="radio" name="rating" value="2"  >
                                    <label for="rating2">2</label>
                                    <input id="rating1" type="radio" name="rating" value="1" >
                                    <label for="rating1">1</label>
                            
                                </span>
                            </div>
                            <br/>
                        </div>

                    </div>            


                </div>
                @endif
                @endforeach
            @endif
            <div class="row">
           {{-- {{ $productlist->links() }} --}}
            </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var rating_value=$("#rating_value").val();
        document.getElementById(`rating${rating_value}`).checked = true;
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
@endsection
