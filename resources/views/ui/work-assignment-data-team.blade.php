@extends('layouts.app')

@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <form method="get" class="col-md-12 " action="" id="" name="">

                <div class="row top-bar">
                    <div class="col-sm-12 col-xl-7">
                        <h2>Work Assignment - Data Team</h2>
                    </div>
                    <div class="col-sm-12 col-xl-5">
                        <div class="row">
                            <div class="row justify-content-end m-0">
                                <button type="button" class="btn btn-default cbtn col-2" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-action cbtn col-2" style="width: 150px;">+ Add Assignment</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="login-box-wrap d-block p-4" style="background-color: #F5F5F5;border-radius: 10px;">
                                <div class="login-main row m-0">
                                    <div class="col-md-4 mb-3">
                                        <label for="">Assigned date <span class="text-danger">*</span></label>
                                        <input name="name" type="date" placeholder="Choose Date" class="form-control" required="">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="">Assigned to <span class="text-danger">*</span></label>
                                        <select class="form-control" aria-label="">
                                            <option selected>Enter Name</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="">Received on <span class="text-danger">*</span></label>
                                        <input name="email" type="date" placeholder="Choose Date" class="form-control" required="">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="">File Name <span class="text-danger">*</span></label>
                                        <input name="plan_group" type="text" placeholder="Enter File Name" class="form-control" required="">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="">Insurance * <span class="text-danger">*</span></label>
                                        <select class="form-control" aria-label="">
                                            <option selected>Choose Insurance</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="">Pages <span class="text-danger">*</span></label>
                                        <select class="form-control" aria-label="">
                                            <option selected>Choose pages</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="">Project <span class="text-danger">*</span></label>
                                        <select class="form-control" aria-label="">
                                            <option selected>Choose Project</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="">Project Type <span class="text-danger">*</span></label>
                                        <select class="form-control" aria-label="">
                                            <option selected>Choose Project Type</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="">Entity <span class="text-danger">*</span></label>
                                        <select class="form-control" aria-label="">
                                            <option selected>Choose Entity</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="">Date of Service <span class="text-danger">*</span></label>
                                        <input name="email" type="email" placeholder="Enter Email" class="form-control" required="">

                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="">Amount <span class="text-danger">*</span></label>
                                        <input name="amount" type="text" placeholder="Enter Amount" class="form-control" required="">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="">Assigned DOS <span class="text-danger">*</span></label>
                                        <input name="amount" type="text" placeholder="Enter Assigned DOS" class="form-control" required="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Hours <span class="text-danger">*</span></label>
                                        <input name="amount" type="text" placeholder="Enter Hours" class="form-control" required="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">File Link <span class="text-danger">*</span></label>
                                        <input name="amount" type="text" placeholder="Enter File Link" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-8">
                </div>
                <div class="col-sm-12 col-xl-4">
                    <div class="row">
                        <form method="get" class="col-md-12" action="" id="search_form" name="search_form">
                            <div class="row">
                                <div class="col-md-10 p-0 search-wrap">
                                    <i class="bi bi-search"></i>
                                    <input type="text" name="keyword" id="keyword" class="form-control search-input" placeholder="Search Assignment.." value="">
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <button type="button" class="btn btn-sm" style="border: 1px solid #ECEFEF;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                            <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"></path>
                                        </svg>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="body-container">
                <div class="col-12">
                    <div class="pl-table">
                        <div class="pl-thead tall">
                            <div class="row">
                                <div class="col" style="flex: 0;"></div>
                                <div class="col" style="flex: 1;">ASSIGNED DATE</div>
                                <div class="col" style="flex: 50px;">ASSIGNED TO</div>
                                <div class="col" style="flex: 70px">FILE NAME</div>
                                <div class="col" style="flex: 50px;">RECEIVED ON</div>
                                <div class="col" style="flex: 40px;">INSURANCE</div>
                                <div class="col" style="flex: 60px;">ACCOUNT</div>
                                <div class="col" style="flex: 70px;">CLIENT</div>
                                <div class="col" style="flex: 70px;">CARTEGORY</div>

                            </div>
                        </div>
                        <div class="pl-tbody">
                            <div class="row">
                                <div class="col" style="flex: 0;">
                                    <div class="form-check p-0">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                    </div>
                                </div>
                                <div class="col">18/3/2022</div>
                                <div class="col" style="flex: 50px;">Billy Herman</div>
                                <div class="col" style="flex: 70px;">EOD-11-22-202</div>
                                <div class="col" style="flex: 50px;">
                                    18/3/2022
                                </div>
                                <div class="col" style="flex: 50px;">HOPD</div>
                                <div class="col" style="flex: 50px;">PP-Zakhray</div>
                                <div class="col" style="flex: 70px">
                                       <span class="badge bg-blue">
                                        Client Name
                                    </span>
                                </div>
                                <div class="col" style="flex: 70px">Payment posting</div>
                            </div>
                            <div class="row">
                                <div class="col" style="flex: 0;">
                                    <div class="form-check p-0">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                    </div>
                                </div>
                                <div class="col">18/3/2022</div>
                                <div class="col" style="flex: 50px;">Billy Herman</div>
                                <div class="col" style="flex: 70px;">EOD-11-22-202</div>
                                <div class="col" style="flex: 50px;">
                                    18/3/2022
                                </div>
                                <div class="col" style="flex: 50px;">HOPD</div>
                                <div class="col" style="flex: 50px;">PP-Zakhray</div>
                                <div class="col" style="flex: 70px">
                                       <span class="badge bg-blue">
                                        Client Name
                                    </span>
                                </div>
                                <div class="col" style="flex: 70px">Payment posting</div>
                            </div>
                            <div class="row">
                                <div class="col" style="flex: 0;">
                                    <div class="form-check p-0">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                    </div>
                                </div>
                                <div class="col">18/3/2022</div>
                                <div class="col" style="flex: 50px;">Billy Herman</div>
                                <div class="col" style="flex: 70px;">EOD-11-22-202</div>
                                <div class="col" style="flex: 50px;">
                                    18/3/2022
                                </div>
                                <div class="col" style="flex: 50px;">HOPD</div>
                                <div class="col" style="flex: 50px;">PP-Zakhray</div>
                                <div class="col" style="flex: 70px">
                                       <span class="badge bg-blue">
                                        Client Name
                                    </span>
                                </div>
                                <div class="col" style="flex: 70px">Payment posting</div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
