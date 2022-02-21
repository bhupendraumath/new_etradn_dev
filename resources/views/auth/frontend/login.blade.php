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
                    ACCOUNT LOGIN
                </h3>
                <form>
                <label for="email" class="label-11">Phone Number or Email*</label>
                <div class="form-field">
                    <input type="email" id="email" placeholder="Email / Username" required/>
                </div>
                <label for="password" class="label-11">Password*</label>
                <div class="form-field" >
                    <input type="password" id="password" placeholder="Password" required/>                         
                </div>
                
                <div class="form-field">
                    <button class="btn color-chnage-btn" type="submit" >SEND</button>
                </div>

                <div class="form-field bottom">
                    <a href="#" class="forget-btn">Forget your password?</a>
                    <a href="{{route('registration')}}" class="signup">Not a Member, Sign Up Now</a>
                </div>
                </form>
            </div>
        </div>
        <!-- <div class="col-2 col-md-2 col-lg-12 col-sm-2"></div> -->
    </div>


</div>




</div>

<!-- partial -->

<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
@endsection