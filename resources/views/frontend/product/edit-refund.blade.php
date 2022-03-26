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
                <!-- {{$order_item_details}} -->
                <div class="form-settings">
                @if(!empty($details[0]) && !empty($order_item_details[0]))
                    <form method="post" enctype="multipart/form-data" >

                        <label class="left-align">Product Name</label>
                        <input type="text" name="product_name" disabled value="{{$details[0]->product->product_name}}" placeholder="Product Name in English*" class="60per">

                        <label class="left-align">Buyer Name</label>
                        <input type="text" name="product_name" disabled placeholder="Product Name in English*" class="60per" value="{{$details[0]->order_details->buyer_details['firstName'] .' '.$details[0]->order_details->buyer_details['lastName']   }}">

                         <label class="left-align">Order Number</label>
                        <input type="text" value="{{$details[0]->order_details->order_number}}"  name="product_name" disabled placeholder="Product Name in English*" class="60per">
                        
                        <label class="left-align">Quantity</label>
                        <input type="text" value="{{$order_item_details[0]['quantity']}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">

                        <label class="left-align">Product price</label>
                        <input type="text" value="{{$order_item_details[0]['product_price']}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">


                        <label class="left-align">Shipping Amount</label>
                        <input type="text" value="{{$order_item_details[0]['shipping_amount']}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">


                        <label class="left-align">Total Amount</label>
                        <input type="text" value="{{$order_item_details[0]['sub_total']}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">


                        @php
                            if($order_item_details[0]['delivery_status']=='p')
                            $delivery_status='Pending';

                            else if($order_item_details[0]['delivery_status']=='c')
                            $delivery_status='Cencelled';

                            else if($order_item_details[0]['delivery_status']=='r')
                            $delivery_status='Rejected';

                            else
                            $delivery_status='Accepted';
                        @endphp

                         <label class="left-align">Delivery Status</label>
                        <input type="text" value="{{$delivery_status}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">


                        <label class="left-align">Payment Status</label>
                        <input type="text" value="{{$order_item_details[0]['payment_status']}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">


                        <label class="left-align">Is delivered</label>
                        <input type="text" value="{{$order_item_details[0]['is_delivered']=='n'?'NO':'YES'}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">

                        <label class="left-align">Selling Type</label>
                        <input type="text" value="{{$order_item_details[0]['selling_type']=='a'?'Auction':'Buy it now'}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">

                        <label class="left-align">Buyer description</label>
                        <input type="text" value="{{$details[0]['buyer_desc']}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">

                        @php

                        if($details[0]['seller_approval_status']=='0')
                        $approval_status='Pending';

                        else if($details[0]['seller_approval_status']=='1')
                        $approval_status='Accepted';
                        else
                        $approval_status='Rejected';

                        @endphp

                        <label class="left-align">Approval Status by Seller</label>
                        <input type="text" value="{{$approval_status}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">

                        {{-- <label class="left-align">Payment Status</label>
                        <input type="text" value="{{$details[0]['seller_approval_status']=='0'?'Pending':($details[0]['seller_approval_status']=='1':'Accepted'?'Rejected')}}"  name="product_name" disabled placeholder="Product Name in English*" class="60per">

                        <label class="left-align">Bid Status</label>
                        <input type="text" name="product_name" value="{{$details[0]['bid_status']}}"  disabled placeholder="Product Name in English*" class="60per">

                     <!-- <label class="left-align">Status</label>
                        <input type="text" value="{{$details[0]['status']}}" name="product_name" disabled placeholder="Product Name in English*" class="60per"> -->

                        <label class="left-align">Created Date & Time</label>
                        <input type="text" name="product_name" value="{{$details[0]['createdDate']}}" disabled placeholder="Product Name in English*" class="60per">

                        --}}

                               
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