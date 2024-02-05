@extends('layouts.app')

@section('content')
<div class="page-body patient-book">
    <div class="container-fluid">
        <div class="row top-bar">
            <div class="col-sm-12 col-xl-8">
                <h2>Work Assignments QC</h2>
            </div>
            <div class="col-sm-12 col-xl-4">
                <div class="row">
                    <form method="get" class="col" action="" id="search_form" name="search_form">
                        <div class="row">
                            <div class="col-md-10 p-0 search-wrap">
                                <i class="bi bi-search"></i>
                                <input type="text" name="keyword" id="keyword" class="form-control search-input" placeholder="Search Assignment..." value="">
                            </div>
                            <div class="col-md-2">
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
                            <div class="col" >ASSIGNED TO</div>
                            <div class="col">FILE NAME</div>
                            <div class="col">RECEIVED ON</div>
                            <div class="col">INSURANCE</div>
                            <div class="col">ACCOUNT</div>
                            <div class="col">CLIENT</div>
                            <div class="col">CARTEGORY</div>
                            <div class="col">ACTION</div>
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
                            <div class="col">10100</div>
                            <div class="col">
                                Billy Herman
                            </div>
                            <div class="col">Project Manager</div>
                            <div class="col">18/3/2022</div>
                            <div class="col">Write team name</div>
                            <div class="col">Noel Williams</div>
                            <div class="col">
                                    <span class="badge bg-blue">
                                        Dept Name
                                    </span>
                            </div>
                            <div class="col">  Payment posting  </div>
                            <div class="col"><a href="void(0)" data-bs-toggle="modal" data-bs-target="#assignQC">Assign</a>  </div>
                        </div>


                        <div class="col-12 mt-4 d-flex justify-content-between">
                            <ul class="pagination">
                                <li class="page-item "><a class="page-link nav" href="">« Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="http://alms.local/users?page=1">1</a></li>
                                <li class="page-item"><a class="page-link" href="http://alms.local/users?page=1">2</a></li>
                                <li class="page-item "><a class="page-link nav" href="">Next »</a></li>
                            </ul>
                            <p class="font-size-13 text-gray">
                                Showing 1 to 7 of 7 entries
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


{{--    assignQC Assignment --}}
<div class="modal fade" id="assignQC"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-box-wrap d-block pt-4 px-2">
                    <div class="login-main row m-0">
                        <h4 class="mb-4">Assign QC</h4>
                        <div class="col-md-12 mb-3">
                            <label for="">QC Assign Date <span class="text-danger">*</span></label>
                            <input name="name" type="date" placeholder="Assign Date" class="form-control" required="">
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
                            <button type="button" class="btn btn-default cbtn col-2" data-bs-dismiss="modal">Close</button>
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

