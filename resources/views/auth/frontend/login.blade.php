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

                        <div class="form-field">
                            <input type="email" placeholder="Email / Username" required />
                        </div>

                        <div class="form-field">
                            <input type="password" placeholder="Password" required />
                        </div>

                        <div class="form-field">
                            <button class="btn" type="submit">Log in</button>
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