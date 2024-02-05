@extends('layouts.app')

@section('content')
    <div class="row login-wrapper">
        <div class="col-xl-6 b-center bg-size" style="background-image: url('/assets/images/login_image.png?v=1.0'); background-repeat: no-repeat; background-size: contain; background-position: left center; display: block;">

        </div>
        <div class="col-xl-6 p-0">
            <div class="login-box-wrap">
                <div class="card">
                    <div class="card-body">
                        <div class="login-main">
                            <form method="post" class="theme-form" role="form" name="login" id="login">
                                @csrf
                                <h4>Reset Password</h4>
                                <div class="mb-3">
                                    <input name="email" type="email" placeholder="Email" class="form-control" aria-describedby="emailHelp" required>
                                </div>

                                <button type="submit" class="btn btn-action col-12 mt-2">Reset password</button>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
