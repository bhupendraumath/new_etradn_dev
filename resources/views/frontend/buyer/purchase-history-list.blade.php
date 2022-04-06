

@if(!empty($productlist) && count($productlist)!=0)
    @foreach($productlist as $list)

    @if(!empty($list))
    <div class="row ">

        @php


        $index=$loop->index;
        $product_details_1=$list->product_detail_1;
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
        $id_remove= preg_split ('/"id":/', $id_convert[1]);
        $id_remove2= preg_split ('/"/', $id_remove[1]);

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


        <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth  border-bottom">

            <div class="col-4 col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">

                <div class="background-gray rating new-size order-image-gary  uploaded-image-edited">
                    @if($image_upload)
                    <img src="{{url('assets/images/product-images/'.$image_upload->product_img)}}" alt="" srcset=""
                        class="order-image" onerror="this.src='{{url('assets/images/default.png')}}';" />
                    @else
                    <img src="{{url('assets/images/default.png')}}" alt="" srcset="" class="order-image"
                        onerror="this.src='{{url('assets/images/default.png')}}';" />
                    @endif

                    <div class="hover-icons">
                            <div>
                                <a href="{{url('product-details/'.$product_id)}}" title="Refund request status">


                                @if(!empty($list->seller_approval_status))

                            
                                    <span class="left-buy-it" >
                                            @if($list->seller_approval_status==1)
                                        
                                            <span class="accepted-request">
                                                Request Accepted
                                            </span>
                                            @elseif($list->seller_approval_status==2)
                                            <span class="rejected-request">
                                            Request Rejected
                                            </span>
                                            
                                            @else
                                            <span class="pending-request">
                                            Request Pending
                                            </span>
                                            @endif
                                            
                                    </span>
                                @endif
                                

                                </a>                                        
                            {{-- <button class="circle" onclick="deleteOrder({{$list->id}})"><i class="fa fa-trash-o color-delete"></i> </button>--}}
                                    
                            </div>
                                        
                        </div>




                </div>
            </div>
            <div class="col-8 col-md-8 col-sm-8 col-lg-8 col-xl-8 reducewidth col-xs-12 text-left">

                <h3> {{$pro_name}}</h3>

                <div class="order-date">
                    <b class="orderd-date-time">
                        SAR {{$list->total_order_amount}}
                    </b>
                    <br />

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
                    <br />
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
                                Transaction Id :{{$list->txn_id}} <br>
                                Transaction Date : {{$list->createdDate}}<br>
                            </div>

                        </div>

                    </span><br />

                    <b class="normal-style">Seller Name : </b>
                    
                    <span>{{$list->firstName.' '.$list->lastName}}
                    </span><br />

                    <b class="normal-style">Transaction Date: </b>
                    <span>{{$list->createdDate}} </span><br />

                    <b class="normal-style">Purchased Via: </b>
                    <span>
                        @if(!empty($list->selling_type))
                        @if($list->selling_type=="b")
                        Buy it now
                        @elseif($list->selling_type=="a")
                        Auction
                        @elseif($list->selling_type=="bo")
                        Both
                        @endif
                        @else
                        &nbsp;&nbsp; -
                        @endif
                    </span><br />

                </div>
                <br />
            </div>

        </div>
        <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 tooltips-row">
            <div class="row">
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
                            <p>No Warranty Description</p>
                            @endif
                            @else
                            <p>No Warranty Description</p>
                            @endif
                        </div>

                    </span>

                </div>

                @if($product_detial->refund_request=='y')
                <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 bottom-shipping">
                    <span class="refund-policy-1">
                        @php
                        $index=$loop->index;

                            $date = $list->createdDate;

                            $replacement_days=$product_detial->number_of_days;
                            $order_date=date('Y-m-d', strtotime($date));
                            $after_replacement=date('Y-m-d', strtotime($order_date.  + $replacement_days .' days'));

                            $date1 = strtotime(str_replace("_", "-",$after_replacement));
                            $date2 = strtotime(str_replace("_", "-",date('Y-m-d')));

                            //compare the dates
                            if($date1 < $date2){
                                $expiry=1;
                            }else{
                                $expiry=0;
                            }
                        @endphp

@php
$refundProduct=new App\Models\RefundRequest;
$pro_id=idBasedOrderDetails($list->product_detail_1);
$details=$refundProduct->refund_request_exist($list->cart_id);


@endphp
                        <!-- here for refund request manage -->
                       @if(!empty($details) && count($details)!=0)
                        
                        <button disabled class="refundRequestBtn" style="color:blue">
                            Sent Refund Request
                        </button>

                        @else
                        @if($expiry)
                            <span class="refund-policy-1 tooltip1">
                                Send Refund Request <i class="fa fa-angle-up"></i>

                                <div class="tooltiptext">
                                    @if(!empty($product_detial))
                                        <div class="order-information">
                                            <div>
                                                <b> Refund Request</b>
                                            </div>
                                        </div>

                                        <div class="details-order">
                                        Replcement day's expired
                                        </div>
                                    @endif
                                </div>

                            </span>

                            
                            @else
                                <button onclick="modelOpen('{{$product_id}}','{{$list->cart_id}}','{{$list->id}}')"
                                class="refundRequestBtn">
                                Send Refund Request
                                </button>
                            @endif
                      @endif

                    </span>

                </div>
                @endif

                <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 bottom-shipping">
                        <button class="shipping-toggle" id="shippingToggleButton-{{$index}}">
                            Shipping Status 
                        </button>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12">
                    <div class="shipping-menu" id="shipping_toggle-{{$index}}">
                        
                        <div class="track">
                            <div class="step <?php if($list->delivery_status =='p' || $list->delivery_status =='s'||$list->delivery_status =='d'){echo 'active';} ?>"> 
                                <span class="icon">
                                <i class="fa fa-user"></i> 
                                </span>                             
                                <span class="text">Pending</span>
                            
                            </div>
                            <div class="step <?php if($list->delivery_status =='s'||$list->delivery_status =='d'){echo 'active';} ?>"> 
                                <span class="icon"> 
                                <i class="fa fa-check"></i> 
                                </span>
                                <span class="text">Shipped</span>
                            </div>   
                            
                            <div class="step <?php if($list->delivery_status =='d'){echo 'active';} ?>">
                                <span class="icon"> <i class="fa fa-truck"></i>
                                </span> <span class="text">Delivered </span>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    @else
    <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth  border-bottom no-records">
        <div>No Records Found</div>
    </div>

    @endif
    @endforeach

@else
    <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth no-records">
        <div>No Records Found</div>
    </div>
@endif

<div class="row text-aligin-center">
    {{ $productlist->links('frontend.common.pagination') }}
</div>


<!-- The Modal -->
<div id="modelRefundRequest" class="refundRequestModel">

    <!-- Modal content -->
    <div class="refundRequestModel-content">
        <div class="refundRequestModel-header">
            <span class="refundRequestModel-close   refundRequestModel-close">&times;</span>
            <h2>Send Refund Request</h2>
            <hr />
        </div>
        <form method="post" enctype="multipart/form-data" id="refundProductRequest">
            {{csrf_field()}}
            <div class="refundRequestModel-body">
                <label>Refund Notes*</label>
                <textarea id="ref_note" name="buyer_desc" rows="2"></textarea>
                <div>
                    <label for="files" class="btn refund-request-send"> Upload New Documents</label>
                    <input id="files" style="visibility:hidden;" name="image" type="file">
                </div>
            </div>

            <input type="hidden" id="cart_id" name="cart_id" value="">

            <input type="hidden" id="order_item_id" name="order_item_id" value="">

            <input type="hidden" id="product_id" name="product_id" value="">

            <input type="hidden" name="seller_desc" value="">
            <input type="hidden" name="admin_approval_status" value="0">
            <input type="hidden" name="seller_approval_status" value="0">
            <input type="hidden" name="payment_status" value="pending">
            <input type="hidden" name="status" value="a">
            <input type="hidden" name="admin_notification" value="1">


            <div class="refundRequestModel-footer">
                <div class="refund-buttons">
                    <button type="submit" class="refund-amount" id="createRefundRequest">
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

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

{!! JsValidator::formRequest('App\Http\Requests\Frontend\RefundProductRequest','#refundProductRequest') !!}
<script src="{{ asset('assets/js/frontend/product/purchase-history-list.js') }}"></script>
<script>
function modelOpen(id, cart_id, order_item_id) {

    $('#cart_id').val(cart_id);
    $('#order_item_id').val(order_item_id);
    $('#product_id').val(id);


    var modal = document.getElementById("modelRefundRequest");

    model_screen = modal;
    // Get the button that opens the modal
    // var btn = document.getElementById("refundRequestBtn");

    // Get the <span> element that refundRequestModel-closes the modal
    var span = document.getElementsByClassName("refundRequestModel-close")[0];

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
}

// function shipping_toggle() {
//   var x = document.getElementById("shipping_toggle");
//   if (x.style.display === "none") {
//     x.style.display = "block";
//   } else {
//     x.style.display = "none";
//   }
// }


$("[id^='shippingToggleButton-']").click(function(){
    console.log("function calling")
    var num = this.id.split('-')[1];
    var x = document.getElementById("shipping_toggle-"+num);
    
    if (x.style.display== "none") {
        x.style.display = "block";
    } else {
    x.style.display = "none";
    }
})

</script>