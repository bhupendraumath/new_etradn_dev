@if($productlist)
        @foreach($productlist as $list)

        @if(!empty($list))
            <div class="row ">

            @php

                        $index=$loop->index;
                        $product_details_1=$list->get_order_items->product_detail_1;
                        $encode=json_encode($product_details_1);
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
                        $product_detial=$product_detials->productById($product_id)
            @endphp


            <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth  border-bottom">

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
                            SAR {{$list->total_order_amount}}                                    
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
                                    Payment status : {{$list->payment_status}}<br>
                                    Order Number : {{$list->order_number}}<br>
                                    Payment Type : {{$list->payment_type}}<br>
                                    Transaction Id :{{$list->txn_id}} <br>
                                    Transaction Date : {{$list->createdDate}}<br>
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
                    
                    <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 bottom-shipping">
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

                    <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 bottom-shipping">
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

                    <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 bottom-shipping">
                        <span class="refund-policy-1">
                           @php 
                           $index=$loop->index;
                           @endphp
                        <button id="refundRequestBtn-{{$index}}" class="refundRequestBtn">
                            Send Refund Request
                        </button>

                            <!-- The Modal -->
                        <div id="modelRefundRequest-{{$index}}" class="refundRequestModel">

                            <!-- Modal content -->
                            <div class="refundRequestModel-content">
                                <div class="refundRequestModel-header">
                                    <span class="refundRequestModel-close-{{$index}}   refundRequestModel-close">&times;</span>
                                    <h2>Send Refund Request</h2>
                                    <hr/>
                                </div>
                                <form method="post" enctype="multipart/form-data" id="refundProductRequest">
                                    {{csrf_field()}}
                                <div class="refundRequestModel-body">
                                    <label>Refund Notes*</label>
                                    <textarea id="ref_note" name="buyer_desc" rows="2"></textarea>
                                    <div>
                                        <label for="files" class="btn refund-request-send"> Upload New Documents</label>
                                        <input id="files" style="visibility:hidden;" type="file">
                                    </div>
                                </div>

                                <input type="hidden" name="cart_id" value="{{$list->get_order_items->cart_id}}">

                                <input type="hidden" name="order_item_id" value="{{$list->id}}">

                                <input type="hidden" name="product_id" value="{{$product_id}}">

                                <input type="hidden" name="seller_desc" value="">
                                <input type="hidden" name="admin_approval_status" value="0">
                                <input type="hidden" name="seller_approval_status" value="0">
                                <input type="hidden" name="payment_status" value="pending">
                                <input type="hidden" name="status" value="a">
                                <input type="hidden" name="admin_notification" value="1">

                                
                                <div class="refundRequestModel-footer">
                                    <div class="refund-buttons">
                                        <button class="refund-amount" id="createRefundRequest">
                                            Refund Amount
                                        </button>

                                        <button class="refund-amount-close">
                                            Close
                                        </button>
                                    </div>
                                
                                </div>
                                </form>
                            </div>

                        </div>
                        </span>

                    </div>

                    <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 bottom-shipping">
                        <span class="refund-policy-1 tooltip1">
                            Shipping Description <i class="fa fa-angle-up"></i>

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
                                <p>No Description</p>
                                @endif
                            @else
                            <p>No Description</p>
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

    <div class="row text-aligin-center">
      {{ $productlist->links('frontend.common.pagination') }}
    </div>
    <script type="text/javascript">
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });


    </script>
    {!! JsValidator::formRequest('App\Http\Requests\Frontend\RefundProductRequest','#refundProductRequest') !!}
    <script src="{{ asset('assets/js/frontend/product/refundRequest.js') }}"></script>

    <script>
    // Get the modal

    var model_screen;
    $("[id^='refundRequestBtn-']").click(function(){

    var num = this.id.split('-')[1];
    var modal = document.getElementById("modelRefundRequest-"+num);

    model_screen=modal;
    // Get the button that opens the modal
    var btn = document.getElementById("refundRequestBtn-"+num);

    // Get the <span> element that refundRequestModel-closes the modal
    var span = document.getElementsByClassName("refundRequestModel-close-"+num)[0];

    // When the user clicks the button, open the modal 

    modal.style.display = "block";

    // When the user clicks on <span> (x), refundRequestModel-close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    if (event.target == modal) {
        modal.style.display = "none";
    }


    // When the user clicks anywhere outside of the modal, refundRequestModel-close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    })


    $(".refund-amount-close").click(function(){
        model_screen.style.display = "none";
      })
</script>
