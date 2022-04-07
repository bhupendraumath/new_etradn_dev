{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}


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


                   
                    <form method="POST" id="loginFrm" action="{{ route('login') }}">
                        {{csrf_field()}}
                        <label for="email" class="label-11">Phone Number or Email*</label>
                        <div class="form-field">
                            <input type="email" id="email" name="email" placeholder="Enter email address" />
                        </div>
                        <label for="password" class="label-11">Password*</label>
                        <div class="form-field">
                            <input type="password" id="password" placeholder="Password" name="password" required />
                        </div>
                        <input type="hidden" name="remember" value="false">
                        <div class="form-field">

                        <!-- id="loginBtn" -->
                            <button class="btn color-chnage-btn" type="submit" id="loginBtn">LOGIN</button>
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
{!! JsValidator::formRequest('App\Http\Requests\Frontend\LoginRequest','#loginFrm') !!}
<!-- partial -->
<a href="#sign-in" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
@endsection
