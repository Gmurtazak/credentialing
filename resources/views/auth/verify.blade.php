@extends('layouts.app')
@section('content')
    @if ($errors->has('email'))
        <span class="invalid-feedback">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
    <div class="row login-wrapper">
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
                            <form method="POST" class="theme-form" role="form" name="login" id="logins" action = {{route('user.activate')}}>
                                @csrf
                                <h4>Email Verified</h4>
                                <p>Welcome back! Enter your password to complete your account.</p>
                                <div class="mb-3">
                                    <input name="email" type="email" placeholder="Email" class="form-control" value="{{ $user->email }}" readonly>
                                    <input name="id" type="hidden" value="{{ $user->id }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <input name="password" type="password" placeholder="Password" class="form-control" id="exampleInputPassword1" required>
                                    <input name="is_active" type="hidden" value="1">
                                </div>

{{--                                <div class="mb-3">--}}
{{--                                    <input name="password" type="password" placeholder="Confirm Password" class="form-control" id="exampleInputPassword1" required>--}}
{{--                                </div>--}}
                                <button type="submit" class="btn btn-action col-12 mt-2">Submit</button>
                                @error('email')
                                <span class="invalid-feedback" role="alert" style="display: block!important;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


