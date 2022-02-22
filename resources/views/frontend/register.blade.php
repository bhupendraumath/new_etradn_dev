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
                    <form>
                        <label for="fname" class="label-11">First Name*</label>
                        <div class="form-field">
                            <input type="text" id="fname" placeholder="Please enter your first name" required />
                        </div>

                        <label for="lname" class="label-11">Last Name*</label>
                        <div class="form-field">
                            <input type="text" id="lname" placeholder="Please enter your last name" required />
                        </div>
                        <label for="email" class="label-11">Phone Number or Email*</label>
                        <div class="form-field">
                            <input type="email" id="email" placeholder="Email / Username" required />
                        </div>
                        <label for="lname" class="label-11">Telephone*</label>
                        <div class="form-field">
                            <input type="text" id="lname" placeholder="Please enter your telephone" required />
                        </div>
                        <label for="password" class="label-11">Password*</label>
                        <div class="form-field">
                            <input type="password" id="password" placeholder="Password" required />
                        </div>
                        <label for="password" class="label-11">Confirm Password*</label>
                        <div class="form-field">
                            <input type="password" id="password" placeholder="Password" required />
                        </div>

                        <div class="form-field">
                            <button class="btn color-chnage-btn" type="submit">SEND</button>
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

<!-- login -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body modal-spa">
                <div class="login-grids">
                    <div class="login">
                        <div class="login-bottom">
                            <h3>Sign up for free</h3>
                            <form>
                                <div class="sign-up">
                                    <h4>Email :</h4>
                                    <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">
                                </div>
                                <div class="sign-up">
                                    <h4>Password :</h4>
                                    <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">

                                </div>
                                <div class="sign-up">
                                    <h4>Re-type Password :</h4>
                                    <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">

                                </div>
                                <div class="sign-up">
                                    <input type="submit" value="REGISTER NOW">
                                </div>

                            </form>
                        </div>
                        <div class="login-right">
                            <h3>Sign in with your account</h3>
                            <form>
                                <div class="sign-in">
                                    <h4>Email :</h4>
                                    <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">
                                </div>
                                <div class="sign-in">
                                    <h4>Password :</h4>
                                    <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="single-bottom">
                                    <input type="checkbox" id="brand" value="">
                                    <label for="brand"><span></span>Remember Me.</label>
                                </div>
                                <div class="sign-in">
                                    <input type="submit" value="SIGNIN">
                                </div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //login -->
<a href="#sign-up" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

@endsection