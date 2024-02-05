@extends('layouts.app')

@section('content')
    @if ($errors->has('email'))
        <span class="invalid-feedback">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
    <section class="loginSec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 loginBanner">


                </div>
                <div class="col-12 col-lg-5 loginColumn">
                    <div class="loginText container">
                        <div class="row">
                        <div class="col-12 text-center">
                            <img src="assets/images/arthurLawrence.png" class="loginLogo" alt="logo">
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col-12 login-main">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <form method="post" class="theme-form" role="form" name="login" id="logins">
                                @csrf
                                <h4>Login To Credentialing Portal</h4>
                                <p>Welcome back! Enter your credentials to access your account</p>
                                <div class="mb-3">
                                    <input name="email" type="email" placeholder="Email" class="form-control" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <input name="password" type="password" placeholder="Password" class="form-control" id="exampleInputPassword1" required>
                                    <input name="is_active" type="hidden" value="1">
                                </div>
                                <button type="submit" class="btn btn-danger col-12 mt-2">Login</button>
                                @error('email')
                                <span class="invalid-feedback" role="alert" style="display: block!important;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="col-12 mt-4 justify-content-between d-flex">
                                    <div class="mb-3">
                                        <input type="checkbox" id="remember_me" name="remember_me" value="1">
                                        <label class="text-muted" for="remember_me">Remember password</label>
                                    </div>
                                    <div class="mb-3">
                                        <a href="/password/reset" class="text-dark font-bold no-underline">Forgot password?</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    </div>
                    <img src="assets/images/loginCircle.png" class="loginCircle" alt="circle">
                </div>
            </div>
        </div>

    </section>
  {{--  <div class="row login-wrapper">
        <div class="col-xl-6 b-center bg-size" style="background-image: url('/assets/images/login_image.png?v=1.0'); background-repeat: no-repeat; background-size: contain; background-position: left center; display: block;">
        </div>
        <div class="col-xl-6 p-0">
            <div class="login-box-wrap">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="login-main">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <form method="post" class="theme-form" role="form" name="login" id="logins">
                                @csrf
                                <h4>Login To Credentialing Portal</h4>
                                <p>Welcome back! Enter your credentials to access your account</p>
                                <div class="mb-3">
                                    <input name="email" type="email" placeholder="Email" class="form-control" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <input name="password" type="password" placeholder="Password" class="form-control" id="exampleInputPassword1" required>
                                    <input name="is_active" type="hidden" value="1">
                                </div>
                                <button type="submit" class="btn btn-danger col-12 mt-2">Login</button>
                                @error('email')
                                <span class="invalid-feedback" role="alert" style="display: block!important;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="col-12 mt-4 justify-content-between d-flex">
                                    <div class="mb-3">
                                        <input type="checkbox" id="remember_me" name="remember_me" value="1">
                                        <label class="text-muted" for="remember_me">Remember password</label>
                                    </div>
                                    <div class="mb-3">
                                        <a href="/password/reset" class="text-dark font-bold no-underline">Forgot password?</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
@endsection
