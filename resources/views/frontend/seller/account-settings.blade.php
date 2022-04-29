@extends('layouts.frontend.app')

@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>{{lang('ACCOUNT_SETTINGS')}}</span></h3>

    </div>
</div>



<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

        @include('frontend/include/seller-side-bar')

        <div class="col-md-12 col-sm-12 col-lg-8 col-xl-8 col-xs-12">
            <div class="card-dashboard  col-12uy">
                <h3>{{lang('PASSWORD_SETTINGS')}}</h3>
                <hr class="business-address" />
                <div class="form-settings-account">
                    <form id="change-password-form" action="{{route('save/password') }}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                    <input type="text" class="form-control 60per lock" name="current_password" placeholder="Current Password*" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                    <input type="text" class="form-control 60per lock" name="password" placeholder="New Password*" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="inner-addon left-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                    <input type="text" class="form-control" name="confirm_password" placeholder="Confirm Password*" />
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                <div class="buttons-account-seetings">
                                    <input type="submit" value="{{lang('CHANGE_PASSWORD')}}" class="change-password" id="submit-btn">
                                    <!-- <button type="submit" id="submit-btn" class="btn btn-primary mw-210 ml-20 ripple-effect">CHANGE PASSWORD</button> -->
                                </div>
                            </div>

                        </div>
                    </form>

                </div>

                <h3 class="margin-top-heading">{{lang('NOTIFICATION_SETTINGS')}}</h3>
                <hr class="business-address" />

                <div class="form-notification">
                    <div class="notifications-list">
                        <span class="notification-text">{{lang('NOTI_S_REFUND_REQ')}}</span>
                        <label class="switch position-changes">
                            <input type="checkbox" id="togBtn">
                            <div class="slider-notification"></div>
                        </label>
                    </div>


                    <div class="notifications-list">
                        <span class="notification-text">{{lang('NOTIFICATION_WHEN_BID')}}</span>
                        <label class="switch position-changes">
                            <input type="checkbox" checked id="togBtn">
                            <div class="slider-notification"></div>
                        </label>
                    </div>


                    <div class="notifications-list">
                        <span class="notification-text">{{lang('NOTIFICATION_WHEN_BUYER_PLACES')}}</span>
                        <label class="switch position-changes">
                            <input type="checkbox" id="togBtn">
                            <div class="slider-notification"></div>
                        </label>
                    </div>


                    <div class="notifications-list">
                        <span class="notification-text">{{lang('NOTIFICATION_FOR_REDEEM_REQUEST')}}</span>
                        <label class="switch position-changes">
                            <input type="checkbox" id="togBtn">
                            <div class="slider-notification"></div>
                        </label>
                    </div>


                </div>


                <div class="payment-form">
                    <h3 class="margin-top-heading">{{lang('PAYMENT_GATEWAY_ID')}}</h3>
                    <hr class="business-address" />
                    <div class="form-settings-account">
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                    <div class="inner-addon left-addon">
                                        <i class="fa fa-paypal glyphicon"></i>
                                        <input type="text" class="form-control 60per lock" name="payment-id" placeholder="Sadad gateway ID*" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                    <div class="inner-addon left-addon">
                                        <i class="fa fa-paypal glyphicon"></i>
                                        <input type="text" class="form-control 60per lock" name="Current-password" placeholder="Payment gateway ID*" />
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                                    <div class="buttons-account-seetings">
                                        <input type="submit" value="{{lang('SAVE_CHANGES')}}" class="change-password">
                                    </div>
                                </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! JsValidator::formRequest('App\Http\Requests\Frontend\ChangePasswordRequest','#change-password-form') !!}
    <script type="text/javascript" src="{{asset('assets/js/frontend/auth/change_password.js')}}"></script>
    @endsection