@extends('layouts.app')

@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-5">
                    <h2>View Accounts & Benchmarks <span class="text-gray font-size-16">(12)</span></h2>
                </div>
                <div class="col-sm-12 col-xl-7">
                    <div class="row">
                        <form method="get" class="col-md-7" action="" id="search_form" name="search_form">
                            <div class="row">
                                <div class="col-md-10 p-0 search-wrap">
                                    <i class="bi bi-search"></i>
                                    <input type="text" name="keyword" id="keyword" class="form-control search-input" placeholder="Search Accounts & Benchmarks..." value="">
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
                        <div class="col p-0">
                            <a href="" class="btn btn-action cbtn col-12" data-bs-toggle="modal" data-bs-target="#myModal">+ Add New Account & Benchmarks</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-container">
                <div class="col-12">
                    <div class="pl-table">
                        <div class="pl-thead tall">
                            <div class="row">
                                <div class="col" style="flex: 0;"></div>
                                <div class="col" style="flex: 1;">ACCOUNT ID</div>
                                <div class="col" style="flex: 50px;">ACCOUNT</div>
                                <div class="col" style="flex: 70px">CATEGORY</div>
                                <div class="col" style="flex: 50px;">CLIENT</div>
                                <div class="col" style="flex: 40px;">PROJECT</div>
                                <div class="col" style="flex: 60px;">PROJECT TYPE</div>
                                <div class="col" style="flex: 70px;">OPERATIONAL <br>BENCHMARK/ HR</div>
                                <div class="col" style="flex: 70px;">QUALITY <br> BENCHMARK/ HR</div>
                                <div class="col">STATUS</div>
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
                                <div class="col" style="flex: 50px;">PP-HOPD-NEC</div>
                                <div class="col" style="flex: 70px;">Payment Posting</div>
                                <div class="col" style="flex: 50px;">
                                    <span class="badge bg-blue">
                                        Client Name
                                    </span>
                                </div>
                                <div class="col" style="flex: 50px;">HOPD</div>
                                <div class="col" style="flex: 50px;">Altus</div>
                                <div class="col"  style="flex: 70px">0.5</div>
                                <div class="col"  style="flex: 70px">0.5</div>
                                <div class="col">
                                    <span class="badge bg-active">
                                       <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>
                                        Active
                                    </span>
                                </div>
                                <div class="col">
                                    <button id="1" class="btn delete_button font-size-13" data-bs-toggle="modal" data-bs-target="#myModal">
                                        <i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i>
                                        <span  style="color: #8D8C9C;">Edit</span>
                                    </button>
                                </div>
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



@endsection
