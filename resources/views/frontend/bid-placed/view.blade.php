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
        <div class="col-md-12 col-sm-12 col-lg-8 col-xl-8 col-xs-12">

            <div class="card-dashboard  col-12uy">
                <a href="{{url()->previous()}}" class="back-button">back</a>
                <h3>BIDDING LIST <span style="color:red;font-size:12px">(*Order by bid amount)</span></h3>
                <hr class="business-address" />

                <div class="form-settings">
                    @if(!empty($details) && count($details)!=0 )
                        <div>
                        @foreach($details as $detail)
                        <div class="card">

                            <div class="inline-boxes row">
                                <div class="col-md-2 col-sm-2 col-lg-42 col-12">
                                    <div class="imageAvt">
                                        <img src="{{url('assets/images/my-profile/'.$detail->user_details->profile_img)}}"
                                            onerror="this.src='{{url('assets/images/frontend/user3.jpg')}}';" alt=""
                                            srcset="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                                    <div class="details">
                                        Buyer Name :  {{$detail->user_details->firstName .' '.$detail->user_details->lastName}} <br />

                                        Buyer Email : {{$detail->user_details->email}} <br />
                                        Bid Number : {{$detail->bid_number}}<br />
                                        Quantity : {{$detail->quantity}}<br />
                                        Bid Amount : <span style="color:#f2ae3d;text-transform: capitalize;">${{$detail->bid_amount}}</span><br />
                                        Bid Date : {{$detail->createdDate}}

                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                                    <div class="status-wonorcloed">
                                        <select onChange="changestatus('{{$detail->id}}','{{$detail->product->id}}','{{$detail->product->user_id}}')" name="bid_status" id="statuc_bid" class="hideborder">
                                            <option value="won" <?php if($detail->bid_status==''){echo "selected";} ?>  > -Select-</option>
                                            <option value="won" <?php if($detail->bid_status=='won'){echo "selected";} ?>  > Won</option>
                                            <option value="closed" <?php if($detail->bid_status=='closed'){echo "selected";} ?>> Closed</option>
                                            <option value="closed" <?php if($detail->bid_status=='lost'){echo "selected";} ?>> Lost</option>
                                            <option value="closed" <?php if($detail->bid_status=='cancelled'){echo "selected";} ?>> Cancelled</option>
                                        </select>
                                        <br />
                                        <div class="payment_status_bid">
                                            Payment : <span style="color:#f2ae3d;text-transform: capitalize;">{{$detail->payment_status}}</span>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>
                        
                        @endforeach
                            <div class="row hh">
                            {{$details->render()}}
                            </div>

                        </div>                   
                    @else
                    <div>
                        <h1>
                            No bid Yet
                        </h1>
                    </div>
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

function changestatus(id,product_id,seller_id){

    var status_value=$('#statuc_bid').val();


    console.log(id," ",product_id,"  ",seller_id)

    $.ajax({
        url: "{{url('update_status')}}"+'/'+id+'/'+product_id+'/'+seller_id+'/'+status_value,
        type: "GET",
        dataType: 'json',
        success: function (response) {
                if (response.success) {
                    console.log("response",response);
                    toastr.clear();
                    toastr.success(response.message, { timeOut: 2000 });
                    location.reload();
                } else {
                    toastr.clear();
                    toastr.error(response.message, { timeOut: 2000 });
                }
            },
        
    });
}


</script>
<!-- <script src="{{ asset('assets/js/frontend/product/bids-list.js') }}"></script> -->
@endpush