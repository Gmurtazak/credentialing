@extends('layouts.app')

@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-7">
                    <h2>Departments <span class="text-gray font-size-16">(09)</span></h2>
                </div>
                <div class="col-sm-12 col-xl-5">
                    <div class="row">
                        <form method="get" class="col-md-8" action="" id="search_form" name="search_form">
                            <div class="row">
                                <div class="col-md-10 p-0 search-wrap">
                                    <i class="bi bi-search"></i>
                                    <input type="text" name="keyword" id="keyword" class="form-control search-input" placeholder="Search teams..." value="">
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
                        <div class="col p-0">
                            <a href="" class="btn btn-action cbtn col-12" data-bs-toggle="modal" data-bs-target="#myModal">+ Add New Team</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-container">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="card-title font-size-18 mb-0">
                                                <span class="sm-logo">
                                                    <img src="https://pbs.twimg.com/profile_images/1490604108142817282/x1dS1T0H_400x400.jpg" alt="">
                                                </span>
                                                Dept Name
                                            </h5>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-end p-0 align-items-center">
                                         <span class="badge bg-inactive">
                                             <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>Inactive
                                         </span>
                                            <span class="dropdown cursor-pointer">
                                             <i class="bi bi-three-dots-vertical" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>
                                             <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#myModal">Edit</button></li>
                                                 <li><button class="dropdown-item" type="button">Delete</button></li>
                                             </ul>
                                         </span>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <p class="text-gray font-size-14">
                                                Team ID
                                            </p>
                                            <p class="font-size-14">
                                                1425
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="text-gray font-size-14">
                                                Team Lead
                                            </p>
                                            <p class="font-size-14">
                                                Billy Herman
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="text-gray font-size-14">
                                                No. of members
                                            </p>
                                            <p class="font-size-14">
                                                2
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="card-title font-size-18 mb-0">
                                                <span class="sm-logo">
                                                    <img src="https://pbs.twimg.com/profile_images/1490604108142817282/x1dS1T0H_400x400.jpg" alt="">
                                                </span>
                                                Dept Name
                                            </h5>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-end p-0 align-items-center">
                                         <span class="badge bg-inactive">
                                             <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>Inactive
                                         </span>
                                            <span class="dropdown cursor-pointer">
                                             <i class="bi bi-three-dots-vertical" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>
                                             <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#myModal">Edit</button></li>
                                                 <li><button class="dropdown-item" type="button">Delete</button></li>
                                             </ul>
                                         </span>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <p class="text-gray font-size-14">
                                                Team ID
                                            </p>
                                            <p class="font-size-14">
                                                1425
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="text-gray font-size-14">
                                                Team Lead
                                            </p>
                                            <p class="font-size-14">
                                                Billy Herman
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="text-gray font-size-14">
                                                No. of members
                                            </p>
                                            <p class="font-size-14">
                                                2
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="card-title font-size-18 mb-0">
                                                <span class="sm-logo">
                                                    <img src="https://pbs.twimg.com/profile_images/1490604108142817282/x1dS1T0H_400x400.jpg" alt="">
                                                </span>
                                                Dept Name
                                            </h5>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-end p-0 align-items-center">
                                         <span class="badge bg-active">
                                             <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>Active
                                         </span>
                                            <span class="dropdown cursor-pointer">
                                             <i class="bi bi-three-dots-vertical" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>
                                             <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#myModal">Edit</button></li>
                                                 <li><button class="dropdown-item" type="button">Delete</button></li>
                                             </ul>
                                         </span>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <p class="text-gray font-size-14">
                                                Team ID
                                            </p>
                                            <p class="font-size-14">
                                                1425
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="text-gray font-size-14">
                                                Team Lead
                                            </p>
                                            <p class="font-size-14">
                                                Billy Herman
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="text-gray font-size-14">
                                                No. of members
                                            </p>
                                            <p class="font-size-14">
                                                2
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    {{--    MODAL--}}
    <div class="modal fade" id="myModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-box-wrap d-block p-4">
                        <div class="login-main">
                            <form method="post" class="theme-form" role="form">
                                <h4 class="mb-4">Add New Department</h4>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload department logo<span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                                <div class="mb-3">
                                    <label for="">Dept ID</label>
                                    <input name="email" type="email" placeholder="1274" class="form-control" aria-describedby="emailHelp" required="" >
                                </div>
                                <div class="mb-3">
                                    <label for="">Department Name <span class="text-danger">*</span></label>
                                    <input name="password" type="password" placeholder="Enter Department Name" class="form-control" id="exampleInputPassword1" required="">
                                </div>
                                <div class="mb-3">
                                    <label for="">Department Owner<span class="text-danger">*</span></label>
                                    <input name="password" type="password" placeholder="Choose Department Owner" class="form-control" id="exampleInputPassword1" required="">
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="">Team Active <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col">
                                            <span class="form-check form-switch float-end">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row justify-content-end mx-0 mt-4">
                                    <button type="button" class="btn btn-default cbtn col-2" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-action cbtn col-2">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--    MODAL--}}
@endsection
