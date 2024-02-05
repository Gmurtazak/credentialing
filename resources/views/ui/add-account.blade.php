@extends('layouts.app')

@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <form method="get" class="col-md-12 " action="" id="" name="">

                <div class="row top-bar">
                    <div class="col-sm-12 col-xl-7">
                        <h2>Add New Accounts & Benchmarks</h2>
                    </div>
                    <div class="col-sm-12 col-xl-5">
                        <div class="row">
                            <div class="row justify-content-end m-0">
                                <button type="button" class="btn btn-default cbtn col-2" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-action cbtn col-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="login-box-wrap d-block">
                                <div class="login-main">
                                    <div class="mb-3">
                                        <label for="">Account ID <span class="text-danger">*</span></label>
                                        <input name="name" type="text" placeholder="Enter Account ID" class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Category <span class="text-danger">*</span></label>
                                        <input name="date" id="date" type="date" placeholder="Enter Date of Category" class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Project <span class="text-danger">*</span></label>
                                        <input name="email" type="email" placeholder="Enter Project" class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Operational Benchmark/ HR <span class="text-danger">*</span></label>
                                        <input name="plan_group" type="text" placeholder="Enter Phone Operational Benchmark/ HR" class="form-control" required="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Status <span class="text-danger">*</span></label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            <label class="form-check-label text-gray" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label text-gray" for="inlineRadio2">Female</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="login-box-wrap d-block">
                                <div class="login-main">
                                    <div class="mb-3">
                                        <label for="">Account Name  <span class="text-danger">*</span></label>
                                        <input name="name" type="text" placeholder="Enter Full Name" class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Client <span class="text-danger">*</span></label>
                                        <select class="form-control" aria-label="">
                                            <option selected>Choose an option</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Project Type * <span class="text-danger">*</span></label>
                                        <select class="form-control" aria-label="">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Quality Benchmark/ HR <span class="text-danger">*</span></label>
                                        <input name="plan_group" type="text" placeholder="Enter Quality Benchmark/ HR" class="form-control" required="">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection
