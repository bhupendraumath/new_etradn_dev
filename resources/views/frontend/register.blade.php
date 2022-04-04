@extends('layouts.frontend.app')

@section('content')
<!-- partial:index.partial.html -->
<div id="bg">

    <div class="container">
        <div class="row">
            <div class="col-2 col-md-2 col-lg-2 col-sm-2"></div>
            <div class="col-10 col-md-10 col-lg-10 col-sm-10 col-xs-12">
                <div class="cardlogin">
                    <h3 class="login-heading">
                        ACCOUNT REGISTER
                    </h3>
                    <form id="registrationFrm" method="post" action="{{route('registrationAction')}}" enctype="multipart/form-data">
                        {{csrf_field()}}


                        <label for="lname" class="label-11">User type*</label>
                        <div class="form-field">
                            <select class="form-control" name="user_type" id="usertype" onchange="showDivuser(this)">
                                <option value="">select</option>
                                <option value="s">seller</option>
                                <option value="b">buyer</option>
                            </select>
                        </div>

                        <label for="fname" class="label-11">First Name*</label>
                        <div class="form-field">
                            <input type="text" placeholder="Please enter your first name" required name="first_name" />
                        </div>

                        <label for="lname" class="label-11">Last Name*</label>
                        <div class="form-field">
                            <input type="text" placeholder="Please enter your last name" required name="last_name" />
                        </div>

                        <label for="email" class="label-11"> Email*</label>
                        <div class="form-field">
                            <input type="email" name="email" placeholder="Please enter your Email" />
                        </div>
                        <label for="lname" class="label-11">Telephone*</label>
                        <div class="form-field">
                            <input type="text" placeholder="Please enter your telephone" required name="phone" />
                        </div>
                        <div id="byseller">
                            <label for="lname" class="label-11">Upload Logo*</label>
                            <div class="form-field">
                                <input type="file" class="upload-logo" id="uploadImage" onChange="setImage(this,'profile_image');" accept="image/png,image/jpg,image/jpeg">
                            </div>
                            
                            <div class="image-logo-uploaded" id="image-logo-uploaded" style="display:none">
                                 <img id="previewImage" width="100" height="100">
                            </div>
                            <input type="hidden" name="business_logoo" id="imagedata">
                            <label for="lname" class="label-11">Business Name*</label>
                            <div class="form-field">
                                <input type="text" placeholder="Please enter your Business Name" required name="business_name" />
                            </div>
                            <label for="lname" class="label-11">Select Business Type*</label>
                            <div class="form-field">
                                <select class="form-control" name="business_type_id" id="category-b">
                                    <option value="">select</option>
                                    @foreach($businesstype as $businesstypevalue)
                                    <option value="{{$businesstypevalue->id}}">{{$businesstypevalue->typeName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="lname" class="label-11">Select Business Category*</label>
                            <div class="form-field">
                                <select class="form-control" name="business_category" id="business_type_id">
                                    <option value="">select</option>
                                    @foreach($businessCategory as $businessCategoryvalue)
                                    <option value="{{$businessCategoryvalue->id}}">{{$businessCategoryvalue->categoryName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="lname" class="label-11">Business Address*</label>
                            <div class="form-field">
                                <input type="text" placeholder="Please enter your Business Address" required name="business_address" />
                            </div>
                        </div>
                        <label for="password" class="label-11">Password*</label>
                        <div class="form-field">
                            <input type="password" placeholder="Password" required name="password" />
                        </div>
                        <label for="password" class="label-11">Confirm Password*</label>
                        <div class="form-field">
                            <input type="password" placeholder="Password" required name="password_confirmation" />
                        </div>

                        <div class="form-field">
                            <button class="btn color-chnage-btn" type="button" id="registerBtn">REGISTER</button>
                        </div>

                        <div class="form-field bottom">

                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="col-2 col-md-2 col-lg-12 col-sm-2"></div> -->
        </div>


    </div>




</div>

<!-- partial -->

@include('frontend.common.profile-cropper')

<!-- //login -->
<a href="#sign-up" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

{!! JsValidator::formRequest('App\Http\Requests\Frontend\UserRequest','#registrationFrm') !!}
@endsection
@push('scripts')
<script>
    function showDivuser(select) {
        if (select.value == 's') {
            document.getElementById('byseller').style.display = "block";
        } else {
            document.getElementById('byseller').style.display = "none";
        }
    }
</script>
<script src="{{ asset('assets/js/frontend/auth/registration.js') }}"></script>
@endpush