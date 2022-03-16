@extends('layouts.frontend.app')

@section('content')


<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>MY ORDERS</h3>

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
                        <h3>MY ORDER LIST</h3>
                    </div>
                </div>
                <hr/>

                
                
            @if($productlist)
            @foreach($productlist as $list)

                @if(!empty($list))
                    <div class="row ">
                        <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth  border-bottom">


                        @php

                        $encode=json_encode($list->product_detail_1);
                        $decode=json_decode($encode,true);

                        // for product name
                        $my_str_arr = preg_split ("/,/", $decode);
                        $my_str_arr_name = preg_split ('/"product_name":/', $my_str_arr[5]);
                        $product_name = preg_split ('/"/',$my_str_arr_name[1]);
                        $pro_name=$product_name[1];
                        // end

                        //For product Id
                        $id_convert=preg_split ("/{/", $my_str_arr[0]);
                        $id_remove=  preg_split ('/"id":/', $id_convert[1]);
                        $id_remove2=  preg_split ('/"/', $id_remove[1]);
                        $product_id=$id_remove2[1];
                        //end

                        $upload_image=new App\Models\ImageUpload;
                        $image_upload=$upload_image->imageProductById($product_id);

                        @endphp

                            <div class="col-4 col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                                <div class="background-gray rating new-size order-image-gary">
                                    <img src="{{url('assets/images/product-images/'.$image_upload->product_img)}}" alt="" srcset="" class="order-image" onerror="this.src='{{url('assets/images/default.png')}}';"/>
                                </div>
                            </div>
                            <div class="col-8 col-md-8 col-sm-8 col-lg-8 col-xl-8 reducewidth col-xs-12 text-left">
                                
                                <h3> {{$pro_name}}</h3>
                                <div class="order-date"><b class="orderd-date-time">Ordered Date & Time : </b><br/>{{$list->createdDate}} </div> 

                                <div class="color-size">
                                    <b>QUANTIITY : </b>{{$list->quantity}} <br/>           
                                    <b >ORDER ID : </b>{{$list->order_number}} <br/>
                                    <b>PRODUCT PRICE : </b>{{$list->product_price}} <br/>
                                    <b>SHIPPING AMOUNT : </b>{{$list->shipping_amount}} <br/>
                                    <b>TOTAL AMOUNT : </b>{{$list->sub_total}} <br/>
                                    <b>ORDER STATUS : </b> @if($list->order_status=="o")
                                                            Ordered
                                                            @elseif($list->order_status=="c")
                                                            Cancelled
                                                            @elseif($list->order_status=="d")
                                                                Deliverd
                                                            @endif
                                                            <br>

                                    <b>DELIVERY STATUS : </b> @if($list->delivery_status=="p")
                                                                Pending
                                                            @elseif($list->delivery_status=="a")
                                                                Accepted
                                                            @elseif($list->order_status=="r")
                                                                Rejcted
                                                            @elseif($list->order_status=="c")
                                                                Cancelled
                                                            @endif<br/>

                                    <b>PAYMENT STATUS : </b> {{$list->payment_status}}

                                </div>
                                
                            {{-- <p class="rating-paragraph">{{$list->description}}
                                </p>--}}
                                <br/>

                                <!-- <input type="hidden" id="rating_value" value="{{$list->rating}}"> -->
                                {{-- <div class="rating1">

                                @for($star = 1; $star <= 5; $star++)
                                    <?php  $class_name = ''; ?>
                                @if($list->rating >= $star)
                                        <?php $class_name = 'text-warning'; ?>
                                    @else
                                        <?php $class_name = 'star-light'; ?>
                                    @endif
                                    <i class="fas fa-star <?php echo $class_name ?>  mr-1"></i>
                                @endfor

                                </div> --}}
                                <br/>
                            </div>

                        </div>            


                    </div>
                @else
                <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth  border-bottom no-records">
                    <div>No Records Found</div>
                </div>

                @endif
                @endforeach
            @endif
            <div class="row">
           {{ $productlist->links('frontend.common.pagination') }}
            </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // var rating_value=$("#rating_value").val();
        // document.getElementById(`rating${rating_value}`).checked = true;
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
@endsection
