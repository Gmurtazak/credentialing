@extends('layouts.app')

@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-8">
                    <h2>Client Wise-Quality</h2>
                </div>
                <div class="col-sm-12 col-xl-4">
                    <div class="row">
                        <form method="get" class="col-12" action="" id="search_form" name="search_form">
                            <div class="row align-items-center">

                                <div class="col-md-10 p-0 search-wrap">
                                    <i class="bi bi-search"></i>
                                    <input type="text" name="keyword" id="keyword" class="form-control search-input"
                                           placeholder="Search Assignment..." value="">
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-sm" style="border: 1px solid #ECEFEF;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                            <path
                                                d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"></path>
                                        </svg>
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <select class="form-select bg-light border-0 mb-3 font-size-13" aria-label=".form-select-lg example">
                        <option selected>Month</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-select bg-light border-0 mb-3 font-size-13" aria-label=".form-select-lg example">
                        <option selected>Month</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-select bg-light border-0 mb-3 font-size-13" aria-label=".form-select-lg example">
                        <option selected>Month</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-select bg-light border-0 mb-3 font-size-13" aria-label=".form-select-lg example">
                        <option selected>Month</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-select bg-light border-0 mb-3 font-size-13" aria-label=".form-select-lg example">
                        <option selected>Month</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-select bg-light border-0 mb-3 font-size-13" aria-label=".form-select-lg example">
                        <option selected>Month</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-select bg-light border-0 mb-3 font-size-13" aria-label=".form-select-lg example">
                        <option selected>Month</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-select bg-light border-0 mb-3 font-size-13" aria-label=".form-select-lg example">
                        <option selected>Month</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-select bg-light border-0 mb-3 font-size-13" aria-label=".form-select-lg example">
                        <option selected>Month</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-select bg-light border-0 mb-3 font-size-13" aria-label=".form-select-lg example">
                        <option selected>Month</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="body-container">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Project Wise</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Executive Wise</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Error Wtg Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Error Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Error Reversal Summary</a>
                    </li>
                </ul>
                <div class="col-12 mt-4">
                    <div class="pl-table">
                        <div class="pl-thead tall">
                            <div class="row">
                                <div class="col" style="flex: 0;"></div>
                                <div class="col" style="flex: 1;">CLIENT</div>
                                <div class="col">AMOUNT</div>
                                <div class="col">NO. OF DOS</div>
                                <div class="col">QC COMPLETED</div>
                                <div class="col">QC %</div>
                                <div class="col" style="flex: 70px;">ERROR STATUS</div>
                                <div class="col">TOTAL ERRORS</div>
                                <div class="col">MINOR WTG</div>
                                <div class="col">MINOR WTG</div>
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
                                <div class="col">
                                     <span class="badge bg-blue" style="width: 95px;">
                                       Altus
                                     </span>
                                </div>
                                <div class="col">FU-CBO</div>
                                <div class="col">23</div>
                                <div class="col">314</div>
                                <div class="col">
                                     55%
                                </div>
                                <div class="col" style="flex: 100px;">
                                     <span class="badge bg-inactive d-inline-flex" style="width: 50px;">
                                       C (1)
                                     </span>
                                    <span class="badge bg-yellow d-inline-flex" style="width: 50px;">
                                       M (12)
                                     </span>
                                    <span class="badge bg-red d-inline-flex" style="width: 50px;">
                                       Z (3)
                                     </span>
                                </div>
                                <div class="col">10</div>
                                <div class="col">10</div>
                                <div class="col">0 </div>
                            </div>
                            <div class="row">
                                <div class="col" style="flex: 0;">
                                    <div class="form-check p-0">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                     <span class="badge bg-blue" style="width: 95px;">
                                       Altus
                                     </span>
                                </div>
                                <div class="col">FU-CBO</div>
                                <div class="col">23</div>
                                <div class="col">314</div>
                                <div class="col">
                                    55%
                                </div>
                                <div class="col" style="flex: 100px;">
                                     <span class="badge bg-inactive d-inline-flex" style="width: 50px;">
                                       C (1)
                                     </span>
                                    <span class="badge bg-yellow d-inline-flex" style="width: 50px;">
                                       M (12)
                                     </span>
                                    <span class="badge bg-red d-inline-flex" style="width: 50px;">
                                       Z (3)
                                     </span>
                                </div>
                                <div class="col">10</div>
                                <div class="col">10</div>
                                <div class="col">0 </div>
                            </div>
                            <div class="row">
                                <div class="col" style="flex: 0;">
                                    <div class="form-check p-0">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                     <span class="badge bg-blue" style="width: 95px;">
                                       Altus
                                     </span>
                                </div>
                                <div class="col">FU-CBO</div>
                                <div class="col">23</div>
                                <div class="col">314</div>
                                <div class="col">
                                    55%
                                </div>
                                <div class="col" style="flex: 100px;">
                                     <span class="badge bg-inactive d-inline-flex" style="width: 50px;">
                                       C (1)
                                     </span>
                                    <span class="badge bg-yellow d-inline-flex" style="width: 50px;">
                                       M (12)
                                     </span>
                                    <span class="badge bg-red d-inline-flex" style="width: 50px;">
                                       Z (3)
                                     </span>
                                </div>
                                <div class="col">10</div>
                                <div class="col">10</div>
                                <div class="col">0 </div>
                            </div>
                            <div class="row">
                                <div class="col" style="flex: 0;">
                                    <div class="form-check p-0">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                     <span class="badge bg-blue" style="width: 95px;">
                                       Altus
                                     </span>
                                </div>
                                <div class="col">FU-CBO</div>
                                <div class="col">23</div>
                                <div class="col">314</div>
                                <div class="col">
                                    55%
                                </div>
                                <div class="col" style="flex: 100px;">
                                     <span class="badge bg-inactive d-inline-flex" style="width: 50px;">
                                       C (1)
                                     </span>
                                    <span class="badge bg-yellow d-inline-flex" style="width: 50px;">
                                       M (12)
                                     </span>
                                    <span class="badge bg-red d-inline-flex" style="width: 50px;">
                                       Z (3)
                                     </span>
                                </div>
                                <div class="col">10</div>
                                <div class="col">10</div>
                                <div class="col">0 </div>
                            </div>
                            <div class="row">
                                <div class="col" style="flex: 0;">
                                    <div class="form-check p-0">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                     <span class="badge bg-blue" style="width: 95px;">
                                       Altus
                                     </span>
                                </div>
                                <div class="col">FU-CBO</div>
                                <div class="col">23</div>
                                <div class="col">314</div>
                                <div class="col">
                                    55%
                                </div>
                                <div class="col" style="flex: 100px;">
                                     <span class="badge bg-inactive d-inline-flex" style="width: 50px;">
                                       C (1)
                                     </span>
                                    <span class="badge bg-yellow d-inline-flex" style="width: 50px;">
                                       M (12)
                                     </span>
                                    <span class="badge bg-red d-inline-flex" style="width: 50px;">
                                       Z (3)
                                     </span>
                                </div>
                                <div class="col">10</div>
                                <div class="col">10</div>
                                <div class="col">0 </div>
                            </div>
                            <div class="row">
                                <div class="col" style="flex: 0;">
                                    <div class="form-check p-0">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                     <span class="badge bg-blue" style="width: 95px;">
                                       Altus
                                     </span>
                                </div>
                                <div class="col">FU-CBO</div>
                                <div class="col">23</div>
                                <div class="col">314</div>
                                <div class="col">
                                    55%
                                </div>
                                <div class="col" style="flex: 100px;">
                                     <span class="badge bg-inactive d-inline-flex" style="width: 50px;">
                                       C (1)
                                     </span>
                                    <span class="badge bg-yellow d-inline-flex" style="width: 50px;">
                                       M (12)
                                     </span>
                                    <span class="badge bg-red d-inline-flex" style="width: 50px;">
                                       Z (3)
                                     </span>
                                </div>
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
            <div class="row" style="background: #F5F5F5; padding: 30px; margin-top: 30px;">
                <div class="col">
                    <small class="font-size-13">CLIENT</small> <br>
                    <b class="font-size-13 text-primary">Altus</b>
                </div>
                <div class="col">
                    <small class="font-size-13">ACCOUNT</small> <br>
                    <b class="font-size-13 text-gray">27.2</b>
                </div>
                <div class="col">
                    <small class="font-size-13">NO. OF DOS</small> <br>
                    <b class="font-size-13 text-gray">12.5%</b>
                </div>
                <div class="col" style="flex: 70px;">
                    <small class="font-size-13">QC COMPLETED</small> <br>
                    <b class="font-size-13 text-gray">12.5</b>
                </div>

                <div class="col">
                    <small class="font-size-13">QC %</small> <br>
                    <b class="font-size-13 text-gray">2.5</b>
                </div>
                <div class="col" style="flex: 120px;">
                    <p class="font-size-13 text-center">ERROR STATUS</p>

                    <div class="col" style="flex: 100px;">
                                     <span class="badge bg-inactive d-inline-flex" style="width: 50px;">
                                       C (1)
                                     </span>
                        <span class="badge bg-yellow d-inline-flex" style="width: 50px;">
                                       M (12)
                                     </span>
                        <span class="badge bg-red d-inline-flex" style="width: 50px;">
                                       Z (3)
                                     </span>
                    </div>
                </div>
                <div class="col">
                    <small class="font-size-13">TOTAL ERRORS</small> <br>
                    <b class="font-size-13 text-gray">2.5</b>
                </div>
                <div class="col">
                    <small class="font-size-13">MINOR WTG</small> <br>
                    <b class="font-size-13 text-gray">2.5</b>
                </div>
                <div class="col">
                    <small class="font-size-13">CRITICAL WTG</small> <br>
                    <b class="font-size-13 text-gray">2.5</b>
                </div>
                <div class="col">
                    <small class="font-size-13">ZTE WTG</small> <br>
                    <b class="font-size-13 text-gray">2.5</b>
                </div>
            </div>
            <div class="row" style="background: #F5F5F5; padding: 30px; margin-top: 30px;">
                <div class="col">
                    <small class="font-size-13">CLIENT</small> <br>
                    <b class="font-size-13 text-primary">Altus</b>
                </div>
                <div class="col">
                    <small class="font-size-13">ACCOUNT</small> <br>
                    <b class="font-size-13 text-gray">27.2</b>
                </div>
                <div class="col">
                    <small class="font-size-13">NO. OF DOS</small> <br>
                    <b class="font-size-13 text-gray">12.5%</b>
                </div>
                <div class="col" style="flex: 70px;">
                    <small class="font-size-13">QC COMPLETED</small> <br>
                    <b class="font-size-13 text-gray">12.5</b>
                </div>

                <div class="col">
                    <small class="font-size-13">QC %</small> <br>
                    <b class="font-size-13 text-gray">2.5</b>
                </div>
                <div class="col" style="flex: 120px;">
                    <p class="font-size-13 text-center">ERROR STATUS</p>

                    <div class="col" style="flex: 100px;">
                                     <span class="badge bg-inactive d-inline-flex" style="width: 50px;">
                                       C (1)
                                     </span>
                        <span class="badge bg-yellow d-inline-flex" style="width: 50px;">
                                       M (12)
                                     </span>
                        <span class="badge bg-red d-inline-flex" style="width: 50px;">
                                       Z (3)
                                     </span>
                    </div>
                </div>
                <div class="col">
                    <small class="font-size-13">TOTAL ERRORS</small> <br>
                    <b class="font-size-13 text-gray">2.5</b>
                </div>
                <div class="col">
                    <small class="font-size-13">MINOR WTG</small> <br>
                    <b class="font-size-13 text-gray">2.5</b>
                </div>
                <div class="col">
                    <small class="font-size-13">CRITICAL WTG</small> <br>
                    <b class="font-size-13 text-gray">2.5</b>
                </div>
                <div class="col">
                    <small class="font-size-13">ZTE WTG</small> <br>
                    <b class="font-size-13 text-gray">2.5</b>
                </div>
            </div>
            <br><br>
            <div class="col-12">
                <b>Grand Total</b>
            </div>
            <div class="row" style="background: #F5F5F5; padding: 30px; margin-top: 30px;">
                <div class="col">
                    <b class="font-size-13 text-primary">All</b>
                </div>
                <div class="col">
                    <b class="font-size-13 ">All</b>
                </div>
                <div class="col">
                    <b class="font-size-13">1000</b>
                </div>
                <div class="col" style="flex: 70px;">
                    <b class="font-size-13">2000</b>
                </div>

                <div class="col">
                    <b class="font-size-13">62%</b>
                </div>
                <div class="col" style="flex: 120px;">
                    <div class="col" style="flex: 100px;">
                                     <span class="badge bg-inactive d-inline-flex" style="width: 50px;">
                                       C (1)
                                     </span>
                        <span class="badge bg-yellow d-inline-flex" style="width: 50px;">
                                       M (12)
                                     </span>
                        <span class="badge bg-red d-inline-flex" style="width: 50px;">
                                       Z (3)
                                     </span>
                    </div>
                </div>
                <div class="col">
                    <b class="font-size-13">2.5</b>
                </div>
                <div class="col">
                    <b class="font-size-13">2.5</b>
                </div>
                <div class="col">
                    <b class="font-size-13">2.5</b>
                </div>
                <div class="col">
                    <b class="font-size-13">2.5</b>
                </div>
            </div>
        </div>
    </div>


    {{--    assignQC Assignment --}}
    <div class="modal fade" id="addSchedule" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-box-wrap d-block pt-4 px-2">
                        <div class="login-main row m-0">
                            <h4 class="mb-4">Assign QC</h4>
                            <div class="col-md-12 mb-3">
                                <label for="">QC Assign Date <span class="text-danger">*</span></label>
                                <input name="name" type="date" placeholder="Assign Date" class="form-control"
                                       required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">QC Assign to <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Select name</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">DOS Assigned <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Select DOS</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="row justify-content-end mx-0 mt-4">
                                <button type="button" class="btn btn-default cbtn col-2" data-bs-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-action cbtn col-3">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--    assignQC Assignment--}}
@endsection

