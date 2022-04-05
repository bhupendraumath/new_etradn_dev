@extends('layouts.frontend.app')

@section('content')
<style>
    img.images {
        width: 102px;
        height: 103px;
    }

    .area {
        border: 5px dotted #ccc;
        padding: 37px;
        width: 93%;
        text-align: center;
        margin-left: 3%;
    }

    .drag {
        border: 5px dotted green;
        background-color: #f2ae3d;
    }

    #result ul {
        list-style: none;
        margin-top: 20px;
    }

    #result ul li {
        border-bottom: 1px solid #ccc;
        margin-bottom: 10px;
    }

    ul.inline-css>li {
        display: inline;
    }

    .modal-backdrop {
        z-index: 0 !important;
    }
</style>

<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>Refund Details</span></h3>

    </div>
</div>
<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

        @include('frontend/include/seller-side-bar')
        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">

            <div class="card-dashboard  col-12uy">
                <h3>REFUND DETAILS </h3>
                <hr class="business-address" />
                
                
               <!-- -------------------- -->
                <div class="form-settings">
                @if(!empty($order_item_details))
                    <form method="post" enctype="multipart/form-data" >

                        <label class="left-align">Product Name</label>
                        <input type="text" name="product_name" disabled value="{{$order_item_details->product_name}}" placeholder="Product Name in English*" class="60per">


                        <label class="left-align">Buyer Name</label>
                        <input type="text" name="product_name" disabled placeholder="Product Name in English*" class="60per" value="{{$order_item_details->firstName .' '.$order_item_details->lastName   }}">

                         <label class="left-align">Order Number</label>
                        <input type="text" value="{{$order_item_details->order_number}}"  name="product_name" disabled placeholder="Product Name in English*" class="60per">
                        
                        <label class="left-align">Quantity</label>
                        <input type="text" value="{{$order_item_details->quantity}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">

                        <label class="left-align">Product price</label>
                        <input type="text" value="{{$order_item_details->product_price}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">


                        <label class="left-align">Shipping Amount</label>
                        <input type="text" value="{{$order_item_details->shipping_amount}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">


                        <label class="left-align">Total Amount</label>
                        <input type="text" value="{{$order_item_details->sub_total}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">


                        @php
                            if($order_item_details->delivery_status=='p')
                            $delivery_status='Pending';

                            else if($order_item_details->delivery_status=='c')
                            $delivery_status='Cencelled';

                            else if($order_item_details->delivery_status=='r')
                            $delivery_status='Rejected';

                            else
                            $delivery_status='Accepted';
                        @endphp

                         <label class="left-align">Delivery Status</label>
                        <input type="text" value="{{$delivery_status}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">


                        <label class="left-align">Payment Status</label>
                        <input type="text" value="{{$order_item_details->payment_status}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">


                        <label class="left-align">Is delivered</label>
                        <input type="text" value="{{$order_item_details->is_delivered=='n'?'NO':'YES'}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">

                        <label class="left-align">Selling Type</label>
                        <input type="text" value="{{$order_item_details->selling_type=='a'?'Auction':'Buy it now'}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">

                        <label class="left-align">Buyer description</label>
                        <input type="text" value="{{$order_item_details->buyer_desc}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">

                        @php

                        if($order_item_details->refund_seller_approval_status=='0')
                        $approval_status='Pending';

                        else if($order_item_details->refund_seller_approval_status=='1')
                        $approval_status='Accepted';
                        else
                        $approval_status='Rejected';

                        @endphp

                        <label class="left-align">Approval Status by Seller</label>
                        <input type="text" value="{{$approval_status}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">



                               
                    </form>
                    @endif
                </div>

            </div>

        </div>
    </div>
</div>

@include('frontend.common.profile-cropper')

@endsection
@push('scripts')
<script>

</script>
@endpush