@extends('layouts.app')

@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-4">
                    <h2>Ad Hoc Assignments</h2>
                </div>
                <div class="col-sm-12 col-xl-8">
                    <div class="row">
                        <form method="get" class="col-md-6" action="" id="search_form" name="search_form">
                            <div class="row">
                                <div class="col-md-10 p-0 search-wrap">
                                    <i class="bi bi-search"></i>
                                    <input type="text" name="keyword" id="keyword" class="form-control search-input" placeholder="List of AD HOC Assignments..." value="">
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
                        <div class="col">
                            <a href="" class="btn btn-action cbtn col-12" data-bs-toggle="modal" data-bs-target="#addNewAssignment">+ Add New Assignment</a>
                        </div>
                        <div class="col p-0">
                            <a href="" class="btn btn-action cbtn col-12" data-bs-toggle="modal" data-bs-target="#editAdhoc">+ Add Ad Hoc Assignment</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="body-container">
                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Assigned Assignment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"  aria-current="page" href="#">Ad Hoc Assignment</a>
                    </li>

                </ul>
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
                            </div>
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
                            </div>
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
                            </div>
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


    {{--    Edit Assigned Assignment--}}
    <div class="modal fade" id="updateAssignment"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-box-wrap d-block pt-4 px-2">
                        <div class="login-main row m-0">
                            <h4 class="mb-4">Edit Assigned Assignment</h4>
                            <div class="col-md-4 mb-3">
                                <label for="">Assigned date <span class="text-danger">*</span></label>
                                <input name="name" type="date" placeholder="Choose Date" class="form-control" required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Assigned to <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Enter Name</option>
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
                                <input name="plan_group" type="text" placeholder="Enter File Name" class="form-control" required="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Insurance * <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose Insurance</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Pages <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose pages</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Project <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose Project</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Project Type <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose Project Type</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Entity <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose Entity</option>
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
                            <div class="col-md-4 mb-3">
                                <label for="">DOS Completed <span class="text-danger">*</span></label>
                                <input name="amount" type="text" placeholder="Enter Hours" class="form-control" required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Pending DOS <span class="text-danger">*</span></label>
                                <input name="amount" type="text" placeholder="Enter File Link" class="form-control" required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Hours <span class="text-danger">*</span></label>
                                <input name="amount" type="text" placeholder="Enter File Link" class="form-control" required="">
                            </div>
                            <div class="row justify-content-end mx-0 mt-4">
                                <button type="button" class="btn btn-default cbtn col-2" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-action cbtn col-3">Update Assignment</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--    Edit Assigned Assignment--}}


    {{--    Add New Assignment --}}
    <div class="modal fade" id="addNewAssignment"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-box-wrap d-block pt-4 px-2">
                        <div class="login-main row m-0">
                            <h4 class="mb-4">Add New Assignment</h4>
                            <div class="col-md-4 mb-3">
                                <label for="">Assigned date <span class="text-danger">*</span></label>
                                <input name="name" type="date" placeholder="Choose Date" class="form-control" required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Assigned to <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Enter Name</option>
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
                                <input name="plan_group" type="text" placeholder="Enter File Name" class="form-control" required="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Insurance * <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose Insurance</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Pages <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose pages</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Project <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose Project</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Project Type <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose Project Type</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Entity <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose Entity</option>
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
                            <div class="col-md-4 mb-3">
                                <label for="">DOS Completed <span class="text-danger">*</span></label>
                                <input name="amount" type="text" placeholder="Enter Hours" class="form-control" required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Pending DOS <span class="text-danger">*</span></label>
                                <input name="amount" type="text" placeholder="Enter File Link" class="form-control" required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Hours <span class="text-danger">*</span></label>
                                <input name="amount" type="text" placeholder="Enter File Link" class="form-control" required="">
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
    {{--    Add New Assignment--}}

    {{--    Add Ad Hoc Assignment --}}
    <div class="modal fade" id="addAdHoc"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-box-wrap d-block pt-4 px-2">
                        <div class="login-main row m-0">
                            <h4 class="mb-4">Add Ad Hoc Assignment</h4>
                            <div class="col-md-12 mb-3">
                                <label for="">Date <span class="text-danger">*</span></label>
                                <input name="name" type="date" placeholder="Choose Date" class="form-control" required="" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Client <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose Client</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Project <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose Project</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description <span class="text-danger">*</span></label>
                                <input name="text" type="text" placeholder="Enter Description" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Mins Utilized <span class="text-danger">*</span></label>
                                <input name="plan_group" type="text" placeholder="Enter Mins" class="form-control" required="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Hrs Utilized <span class="text-danger">*</span></label>
                                <input name="plan_group" type="text" placeholder="Enter Hrs" class="form-control" required="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
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
    {{--    Add Ad Hoc Assignment--}}


    {{--    Edit Ad Hoc Assignment--}}
    <div class="modal fade" id="editAdhoc"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-box-wrap d-block pt-4 px-2">
                        <div class="login-main row m-0">
                            <h4 class="mb-4">Edit Ad Hoc Assignment</h4>
                            <div class="col-md-4 mb-3">
                                <label for="">Assigned date <span class="text-danger">*</span></label>
                                <input name="name" type="date" placeholder="Choose Date" class="form-control" required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Assigned to <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Enter Name</option>
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
                                <input name="plan_group" type="text" placeholder="Enter File Name" class="form-control" required="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Insurance * <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose Insurance</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Pages <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose pages</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Project <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose Project</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Project Type <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose Project Type</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Entity <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Choose Entity</option>
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
                            <div class="col-md-4 mb-3">
                                <label for="">DOS Completed <span class="text-danger">*</span></label>
                                <input name="amount" type="text" placeholder="Enter Hours" class="form-control" required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Pending DOS <span class="text-danger">*</span></label>
                                <input name="amount" type="text" placeholder="Enter File Link" class="form-control" required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Hours <span class="text-danger">*</span></label>
                                <input name="amount" type="text" placeholder="Enter File Link" class="form-control" required="">
                            </div>
                            <div class="row justify-content-end mx-0 mt-4">
                                <button type="button" class="btn btn-default cbtn col-2" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-action cbtn col-3">Update AdHoc Assignment</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--    Edit Ad Hoc Assignment--}}
@endsection
