         
    @if($productlist)
    @if(!empty($productlist) && count($productlist)!=0)
        @foreach($productlist as $list)


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
                            if(!empty($id_remove2[0])){
                            $product_id=$id_remove2[0];
                            }
                            else{
                            $product_id=$id_remove2[1];

                            }
                        //end

                        $upload_image=new App\Models\ImageUpload;
                        $image_upload=$upload_image->imageProductById($product_id);

                        $product_detials=new App\Models\Product;
                        $product_detial=$product_detials->productById($product_id);

                    @endphp
                    <div class="col-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12 order-seller">

                        <div class="background-gray rating new-size order-image-gary">
                            <img src="{{url('assets/images/product-images/'.$image_upload->product_img)}}" alt="" srcset="" class="order-image" onerror="this.src='{{url('assets/images/default.png')}}';"/>
                        </div>
                    </div>
                    <div class="col-8 col-md-8 col-sm-8 col-lg-8 col-xl-8 reducewidth col-xs-12 text-left">
                        
                        <h3> {{$pro_name}}</h3>
                        <div class="order-date">
                            <b class="orderd-date-time">
                            SAR {{$list->sub_total}}                                    
                            </b>
                            <br/> 
                            
                            @if($list->payment_status=='failed')
                                <button class="failed-transferd" disabled> Failed</button>

                            @elseif($list->payment_status=='paid')
                                
                                <button class="paid-transferd" disabled> Transferred</button>
                            @else
                            
                                <button class="paid-pending" disabled> Pending</button>
                            @endif
                        </div> 

                        <div class="color-size">
                            <b class="normal-style">Inventory : </b>{{$list->quantity}} 
                            <br/>           
                            <b class="normal-style">ORDER ID : </b>

                            <span class="order-number tooltip1">{{$list->order_number}} &nbsp;
                                <button class="circle-?">?</button>
                                <div class="tooltiptext">
                                    <div class="order-information">
                                        <div>
                                            <b>Order Information</b>
                                        </div>
                                    </div>
                                    

                                    <div class="details-order">
                                    Payment status : {{$list->payment_status}}<br>
                                    Order Number : {{$list->order_number}}<br>
                                    Payment Type : {{$list->payment_type}}<br>
                                    Transaction Id :{{$list->transaction}} <br>
                                    Transaction Date : {{$list->createdDate}}<br>
                                    </div>

                                </div>
                            
                            </span><br/>

                            <b class="normal-style">Buyer Name : </b>
                            <span>{{$list->firstName.' '.$list->lastName}} </span><br/>


                            <b class="normal-style">Transaction Date: </b>
                            <span >{{$list->createdDate}} </span><br/>

                            <b class="normal-style">Purchased Via: </b>
                            <span >
                                @if(!empty($product_detial))
                                    @if($product_detial->want_to_list=="b")
                                    Buy it now
                                    @elseif($product_detial->want_to_list=="a")
                                    Auction
                                    @elseif($product_detial->want_to_list=="bo")
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
        @endforeach

        <div class="row text-aligin-center">
            {{ $productlist->links('frontend.common.pagination') }}
        </div>

        @else
        <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth  border-bottom no-records">
            <div>No Records Found</div>
        </div>

        @endif
    @endif


