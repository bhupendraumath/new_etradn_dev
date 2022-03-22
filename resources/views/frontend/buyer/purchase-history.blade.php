@extends('layouts.frontend.app')

@section('content')

<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>MY PURCHASE HISTORY</h3>

    </div>
</div>
<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

        @include('frontend/include/buyer-side-bar')
        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">

<div class="card-dashboard  col-12uy">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
            <h3>MY PURCHASE HISTORY</h3>
        </div>
    </div>
    <hr/>

    
    
    @if($productlist)
        @foreach($productlist as $list)

        @if(!empty($list))
            <div class="row ">


            <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth  border-bottom">
                    @php

                        $product_details_1=$list->get_order_items->product_detail_1;
                        $encode=json_encode($product_details_1);
                        $decode=json_decode($encode,true);

                        // for product name
                        $my_str_arr = preg_split ("/,/", $decode);
                        $my_str_arr_name = preg_split ('/"product_name":/', $my_str_arr[5]);
                        $product_name = preg_split ('/"/',$my_str_arr_name[1]);
                        $pro_name=$product_name[1];
                        // end


                        //get user_id details
                        $user_id_details = preg_split ('/"user_id":/', $my_str_arr[1]);

                        $user_id = preg_split ('/"/',$user_id_details[1]);
                        $userId=$user_id[0];

                        $user=new App\Models\Order;
                        $userDetails=$user->seller_details($userId);
                        //print_r($userDetails);die;
                        // end

                        //For product Id
                        $id_convert=preg_split ("/{/", $my_str_arr[0]);
                        $id_remove=  preg_split ('/"id":/', $id_convert[1]);
                        $id_remove2=  preg_split ('/"/', $id_remove[1]);
                        
                        $product_id=$id_remove2[0];
                        //end


                        $upload_image=new App\Models\ImageUpload;
                        $image_upload=$upload_image->imageProductById($product_id);

                        $product_detials=new App\Models\Product;
                        $product_detial=$product_detials->productById($product_id);

                    @endphp
                    <div class="col-4 col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">

                        <div class="background-gray rating new-size order-image-gary">
                            @if($image_upload)
                            <img src="{{url('assets/images/product-images/'.$image_upload->product_img)}}" alt="" srcset="" class="order-image" onerror="this.src='{{url('assets/images/default.png')}}';"/>
                            @else
                            <img src="{{url('assets/images/default.png')}}" alt="" srcset="" class="order-image" onerror="this.src='{{url('assets/images/default.png')}}';"/>
                            @endif
                        </div>
                    </div>
                    <div class="col-8 col-md-8 col-sm-8 col-lg-8 col-xl-8 reducewidth col-xs-12 text-left">
                        
                   
                        <h3> {{$pro_name}}</h3>
                        <div class="order-date">
                            <b class="orderd-date-time">
                            SAR {{$list->get_order_items->sub_total}}                                    
                            </b>
                            <br/> 
                            
                            @if($list->get_order_items->payment_status=='failed')
                                <button class="failed-transferd" disabled> Failed</button>

                            @elseif($list->get_order_items->payment_status=='paid')
                                
                                <button class="paid-transferd" disabled> Transferred</button>
                            @else
                            
                                <button class="paid-pending" disabled> Pending</button>
                            @endif
                        </div> 

                        <div class="color-size">
                            <b class="normal-style">Inventory : </b>{{$list->get_order_items->quantity}} 
                            <br/>           
                            <b class="normal-style">ORDER ID : </b>

                            <span class="order-number tooltip1">{{$list->get_order_items->order_number}} &nbsp;
                                <button class="circle-?">?</button>
                                <div class="tooltiptext">
                                    <div class="order-information">
                                        <div>
                                            <b>Order Information</b>
                                        </div>
                                    </div>
                                    
                                    <div class="details-order">
                                    Payment status : {{$list->get_order_items->payment_status}}<br>
                                    Order Number : {{$list->get_order_items->order_number}}<br>
                                    Payment Type : {{$list->get_order_items->payment_type}}<br>
                                    Transaction Id :{{$list->get_order_items->transaction}} <br>
                                    Transaction Date : {{$list->get_order_items->createdDate}}<br>
                                    </div>

                                </div>
                            
                            </span><br/>

                            <b class="normal-style">Seller Name : </b>

                           <span>{{$list->get_order_items->seller_details_in_details->firstName.' '.$list->get_order_items->seller_details_in_details->lastName}} </span><br/>

                            <b class="normal-style">Transaction Date: </b>
                            <span >{{$list->createdDate}} </span><br/>

                            <b class="normal-style">Purchased Via: </b>
                            <span >
                                @if(!empty($list->get_order_items))
                                    @if($list->get_order_items->selling_type=="b")
                                    Buy it now
                                    @elseif($list->get_order_items->selling_type=="a")
                                    Auction
                                    @elseif($list->get_order_items->selling_type=="bo")
                                        Both
                                    @endif 
                                @else    
                                &nbsp;&nbsp; -                               
                                @endif
                            </span><br/>

                        </div>
                        <br/>
                    </div>

                </div>            
                <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 tooltips-row">
                    <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 bottom-shipping"></div>
                    
                    <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 bottom-shipping">
                        <span class="refund-policy-1 tooltip1">
                        Refund Policy <i class="fa fa-question-circle"></i>

                            <div class="tooltiptext">
                                @if(!empty($product_detial))
                                    @if($product_detial->refund_request!='n')
                                            <div class="order-information">
                                                <div>
                                                    <b> {{$product_detial->number_of_days}} Days Replacement Policy</b>
                                                </div>
                                            </div>
                                            
                                            <div class="details-order">
                                            {{$product_detial->policy_description}}
                                            </div>

                                    @else
                                    <p>No Refund Policy</p>
                                    @endif

                                @else
                                    <p>No Refund Policy</p>
                                @endif
                            </div>

                        </span>

                    </div>

                    <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 bottom-shipping">
                        <span class="refund-policy-1 tooltip1">
                            Warranty Description <i class="fa fa-angle-up"></i>

                            <div class="tooltiptext">
                            @if(!empty($product_detial))
                                @if($product_detial->refund_request!='n')
                                        <div class="order-information">
                                            <div>
                                                <b> Warranty Description</b>
                                            </div>
                                        </div>
                                        
                                        <div class="details-order">
                                        {{$product_detial->warranty_desc}}
                                        </div>

                                @else
                                <p>No  Warranty Description</p>
                                @endif
                            @else
                            <p>No  Warranty Description</p>
                            @endif
                            </div>

                        </span>

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

@endsection