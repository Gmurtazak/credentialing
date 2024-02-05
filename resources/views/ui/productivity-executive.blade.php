@extends('layouts.app')

@section('content')
<div class="page-body patient-book">
    <div class="container-fluid">
        <div class="row top-bar">
            <div class="col-sm-12 col-xl-8">
                <h2>Executive Wise-Productivity</h2>
            </div>
{{--            <div class="col-sm-12 col-xl-4">--}}
{{--                <div class="row">--}}
{{--                    <form method="get" class="col-12" action="" id="search_form" name="search_form">--}}
{{--                        <div class="row align-items-center">--}}

{{--                            <div class="col-md-10 p-0 search-wrap">--}}
{{--                                <i class="bi bi-search"></i>--}}
{{--                                <input type="text" name="keyword" id="keyword" class="form-control search-input"--}}
{{--                                       placeholder="Search Assignment..." value="">--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <button type="button" class="btn btn-sm" style="border: 1px solid #ECEFEF;">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"--}}
{{--                                         fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">--}}
{{--                                        <path--}}
{{--                                            d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"></path>--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </form>--}}

{{--                </div>--}}
{{--            </div>--}}
        </div>
        <form action="" class="row mt-4">
            <div class="col">
                <label for="">Assign Date From <span class="text-danger">*</span></label>
                <input name="date" id="date" type="date" class="form-control" required="">
            </div>
            <div class="col">
                <label for="">Assign Date To <span class="text-danger">*</span></label>
                <input name="date" id="To" type="date" class="form-control" required="">
            </div>
            <div class="col-3">
                <label for="">Ast. Manager</label>
                <select class="form-select mb-3 font-size-13" aria-label="example">
                    <option selected>Month</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-3">
                <label for="">Team Lead</label>
                <select class="form-select mb-3 font-size-13" aria-label="example">
                    <option selected>Month</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-3">
                <label for="">Executive</label>
                <select class="form-select mb-3 font-size-13" aria-label="example">
                    <option selected>Month</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-3">
                <label for="">Account</label>
                <select class="form-select mb-3 font-size-13" aria-label="example">
                    <option selected>Month</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-3">
                <label for="">Client</label>
                <select class="form-select mb-3 font-size-13" aria-label="example">
                    <option selected>Month</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-3">
                <label for="">Category</label>
                <select class="form-select mb-3 font-size-13" aria-label="example">
                    <option selected>Month</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-3">
                <label for="">Project</label>
                <select class="form-select mb-3 font-size-13" aria-label="example">
                    <option selected>Month</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-3">
                <label for="">Project Type</label>
                <select class="form-select mb-3 font-size-13" aria-label="example">
                    <option selected>Month</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-3">
                <label for="">Entity</label>
                <select class="form-select mb-3 font-size-13" aria-label="example">
                    <option selected>Month</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-3">
                <label for="">Utilization Status</label>
                <select class="form-select mb-3 font-size-13" aria-label="example">
                    <option selected>Month</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="row justify-content-end p-0 m-0">
                <div class="col-3">
                    <button type="submit" class="btn btn-action cbtn col-12">Search</button>
                </div>
            </div>
        </form>

        <div class="body-container">
            <ul class="nav nav-tabs">

                <li class="nav-item">
                    <a class="nav-link active" href="#">Executive Wise</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Summary</a>
                </li>

            </ul>
            <div class="col-12 mt-4">
                <div class="pl-table">
                    <div class="pl-thead tall">
                        <div class="row">
                            <div class="col" style="flex: 1;">Executive</div>
                            <div class="col">PRODUCTIVITY HIT</div>
                            <div class="col">SIGN OF HIT</div>
                            <div class="col">DOS COMPLETED</div>
                            <div class="col">HOURS UTILIZED</div>
                            <div class="col" style="flex: 70px;">ADJUSTMENT</div>
                            <div class="col">PRODUCTIVITY</div>

                        </div>
                    </div>
                    <div class="pl-tbody">
                        <div class="row">
                            <div class="col">DAVID</div>
                            <div class="col">FU-CBO</div>
                            <div class="col">23</div>
                            <div class="col">314</div>
                            <div class="col">10</div>
                            <div class="col">10</div>
                            <div class="col">0 </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-12">
            <b>Total</b>
        </div>
        <div class="row mb-4" style="background: #F5F5F5; padding: 30px; margin-top: 30px;">
            <div class="col">
                <small class="font-size-13">EXECUTIVE</small> <br>
                <b class="font-size-13 text-gray">david</b>
            </div>
            <div class="col">
                <small class="font-size-13">PRODUCTIVITY HIT</small> <br>
                <b class="font-size-13 text-gray">27.2</b>
            </div>
            <div class="col">
                <small class="font-size-13">SIGN OFF HIT</small> <br>
                <b class="font-size-13 text-gray">12</b>
            </div>
            <div class="col" style="flex: 70px;">
                <small class="font-size-13">DOS COMPLETED</small> <br>
                <b class="font-size-13 text-gray">125</b>
            </div>

            <div class="col">
                <small class="font-size-13">HOURS UTITLIZED</small> <br>
                <b class="font-size-13 text-gray">2325</b>
            </div>
            <div class="col">
                <small class="font-size-13">ADJUSTMENT</small> <br>
                <b class="font-size-13 text-gray">223423.5</b>
            </div>
            <div class="col">
                <small class="font-size-13">PRODUCTIVITY</small> <br>
                <b class="font-size-13 text-gray">2.5%</b>
            </div>
        </div>

    </div>
</div>

@endsection

