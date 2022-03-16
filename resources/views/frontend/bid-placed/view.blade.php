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
        <h3>Bids Details</span></h3>

    </div>
</div>
<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

        @include('frontend/include/seller-side-bar')
        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">

            <div class="card-dashboard  col-12uy">
                <h3>BID DETAILS <span style="color:red;font-size:12px">(*view only)</span></h3>
                <hr class="business-address" />

                <div class="form-settings">
                    <form method="post" enctype="multipart/form-data" >

                        <label class="left-align">Product Name</label>
                        <input type="text" name="product_name" disabled value="{{$details[0]['product']['product_name']  }}" placeholder="Product Name in English*" class="60per">

                        <label class="left-align">User Name</label>
                        <input type="text" name="product_name" disabled placeholder="Product Name in English*" class="60per" value="{{$details[0]['user_details']['firstName'] .' '.$details[0]['user_details']['lastName']   }}">

                        <label class="left-align">Bid Number</label>
                        <input type="text" value="{{$details[0]['bid_number']}}"  name="product_name" disabled placeholder="Product Name in English*" class="60per">

                        <label class="left-align">Quantity</label>
                        <input type="text" value="{{$details[0]['quantity']}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">

                        <label class="left-align">Bid Amount </label>
                        <input type="text" value="{{$details[0]['bid_amount']}}" name="product_name" disabled placeholder="Product Name in English*" class="60per">

                        <label class="left-align">Payment Status</label>
                        <input type="text" value="{{$details[0]['payment_status']}}"  name="product_name" disabled placeholder="Product Name in English*" class="60per">

                        <label class="left-align">Bid Status</label>
                        <input type="text" name="product_name" value="{{$details[0]['bid_status']}}"  disabled placeholder="Product Name in English*" class="60per">

                     <!-- <label class="left-align">Status</label>
                        <input type="text" value="{{$details[0]['status']}}" name="product_name" disabled placeholder="Product Name in English*" class="60per"> -->

                        <label class="left-align">Created Date & Time</label>
                        <input type="text" name="product_name" value="{{$details[0]['createdDate']}}" disabled placeholder="Product Name in English*" class="60per">

                    

                               
                    </form>

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