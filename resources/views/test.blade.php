@extends('layouts.app')

@section('content')
    <div class="row login-wrapper">
        <div class="col-xl-6 b-center bg-size" style="background-image: url('/assets/images/login_image.png?v=1.0'); background-repeat: no-repeat; background-size: contain; background-position: left center; display: block;">

        </div>
        @if (!empty($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (!empty($messages) > 0)
            <div class="alert alert-success">
                <ul>
                    @foreach ($messages as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-xl-6 p-0">
            <div class="login-box-wrap">
                <div class="card">
                    <div class="card-body">
                        <div class="login-main">
                            <form method="post" class="theme-form" name="login" id="logins" action="{{ route('test-save') }}">

                                @csrf
                                <input name="apiUrl" type="hidden" value="api/v1/user/authenticate">
                                <input name="apiUrlMethod" type="hidden" value="POST">
                                <h4>Login to PH Portal</h4>
                                <p>Welcome back! Enter your credentials to access your account</p>
                                <div class="mb-3">
                                    <input name="email" type="text" placeholder="Email" class="form-control" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <input name="password" type="password" placeholder="Password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-action col-12 mt-2">Login</button>

                                <div class="col-12 mt-4 justify-content-between d-flex">
                                    <div class="mb-3">
                                        <input type="checkbox" id="remember_me" name="remember_me" value="1">
                                        <label class="text-muted" for="remember_me">Remember password</label>
                                    </div>
                                    <div class="mb-3">
                                        <a href="" class="text-dark font-bold no-underline">Forgot password?</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
