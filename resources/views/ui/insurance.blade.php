@extends('layouts.app')

@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-7">
                    <h2>Insurance <span class="text-gray font-size-16">({{ count($data->data->data) }})</span></h2>
                </div>
                <div class="col-sm-12 col-xl-5">
                    <div class="row">
                        <form method="get" class="col-md-8" action="" id="search_form" name="search_form">
                            <div class="row">
                                <div class="col-md-10 p-0 search-wrap">
                                    <i class="bi bi-search"></i>
                                    <input type="text" name="keyword" id="keyword" class="form-control search-input" placeholder="Search Insurance..." value="">
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
                            <a href="" class="btn btn-action cbtn col-12" data-bs-toggle="modal" data-bs-target="#myModal">+ Add New Insurance</a>
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
                                <div class="col" style="flex: 100px;">NAME</div>
                                <div class="col">PLAN/ GROUP</div>
                                <div class="col">WEBSITE</div>
                                <div class="col" style="flex: 100px;">PHONE</div>
                                <div class="col">STATUS</div>
                                <div class="col">ACTION</div>
                            </div>
                        </div>
                        <div class="pl-tbody scroll">
                            @if($data->data->data)
                                @foreach($data->data->data as $insurance)
                            <div class="row">
                                <div class="col" style="flex: 0;">
                                    <div class="form-check p-0">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                    </div>
                                </div>
                                <div class="col" style="flex: 100px;">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="https://media-exp1.licdn.com/dms/image/C4E03AQHvDmMPJkw_tw/profile-displayphoto-shrink_200_200/0/1516840692448?e=1654128000&v=beta&t=i411lAqVKTYg_os53s8v82Y4gt5-CBm68pRX9Fj8N4I" alt="Sample Image" width="40px" height="40px" style="border-radius: 100%;">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="font-semibold font-size-15 text-dark mb-1">BCBS</h5>
                                            <p class="font-size-13">
                                                contact@bcbs.com
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">plan/group goes here</div>
                                <div class="col">www.bcbs.com</div>
                                <div class="col">845-876-4563 | 845-737-8754</div>
                                <div class="col">
                                    <span class="badge bg-inactive">
                                       <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>
                                        Inactive
                                    </span>
                                </div>
                                <div class="col">
                                    <button id="1" class="btn delete_button font-size-13" data-bs-toggle="modal" data-bs-target="#myModal">
                                        <i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i>
                                        <span  style="color: #8D8C9C;">Edit</span>
                                    </button>
                                </div>
                            </div>
                                @endforeach
                            @endif
{{--                            <div class="row">--}}
{{--                                <div class="col" style="flex: 0;">--}}
{{--                                    <div class="form-check p-0">--}}
{{--                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">--}}
{{--                                        <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col" style="flex: 100px;">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <img src="https://media-exp1.licdn.com/dms/image/C4E03AQHvDmMPJkw_tw/profile-displayphoto-shrink_200_200/0/1516840692448?e=1654128000&v=beta&t=i411lAqVKTYg_os53s8v82Y4gt5-CBm68pRX9Fj8N4I" alt="Sample Image" width="40px" height="40px" style="border-radius: 100%;">--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-grow-1 ms-3">--}}
{{--                                            <h5 class="font-semibold font-size-15 text-dark mb-1">BCBS</h5>--}}
{{--                                            <p class="font-size-13">--}}
{{--                                                contact@bcbs.com--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">plan/group goes here</div>--}}
{{--                                <div class="col">www.bcbs.com</div>--}}
{{--                                <div class="col">845-876-4563 | 845-737-8754</div>--}}
{{--                                <div class="col">--}}
{{--                                    <span class="badge bg-active">--}}
{{--                                       <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>--}}
{{--                                        Active--}}
{{--                                    </span>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <button id="1" class="btn delete_button font-size-13" data-bs-toggle="modal" data-bs-target="#myModal">--}}
{{--                                        <i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i>--}}
{{--                                        <span  style="color: #8D8C9C;">Edit</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col" style="flex: 0;">--}}
{{--                                    <div class="form-check p-0">--}}
{{--                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">--}}
{{--                                        <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col" style="flex: 100px;">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <img src="https://media-exp1.licdn.com/dms/image/C4E03AQHvDmMPJkw_tw/profile-displayphoto-shrink_200_200/0/1516840692448?e=1654128000&v=beta&t=i411lAqVKTYg_os53s8v82Y4gt5-CBm68pRX9Fj8N4I" alt="Sample Image" width="40px" height="40px" style="border-radius: 100%;">--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-grow-1 ms-3">--}}
{{--                                            <h5 class="font-semibold font-size-15 text-dark mb-1">BCBS</h5>--}}
{{--                                            <p class="font-size-13">--}}
{{--                                                contact@bcbs.com--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">plan/group goes here</div>--}}
{{--                                <div class="col">www.bcbs.com</div>--}}
{{--                                <div class="col">845-876-4563 | 845-737-8754</div>--}}
{{--                                <div class="col">--}}
{{--                                    <span class="badge bg-inactive">--}}
{{--                                       <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>--}}
{{--                                        Inactive--}}
{{--                                    </span>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <button id="1" class="btn delete_button font-size-13" data-bs-toggle="modal" data-bs-target="#myModal">--}}
{{--                                        <i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i>--}}
{{--                                        <span  style="color: #8D8C9C;">Edit</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col" style="flex: 0;">--}}
{{--                                    <div class="form-check p-0">--}}
{{--                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">--}}
{{--                                        <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col" style="flex: 100px;">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <img src="https://media-exp1.licdn.com/dms/image/C4E03AQHvDmMPJkw_tw/profile-displayphoto-shrink_200_200/0/1516840692448?e=1654128000&v=beta&t=i411lAqVKTYg_os53s8v82Y4gt5-CBm68pRX9Fj8N4I" alt="Sample Image" width="40px" height="40px" style="border-radius: 100%;">--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-grow-1 ms-3">--}}
{{--                                            <h5 class="font-semibold font-size-15 text-dark mb-1">BCBS</h5>--}}
{{--                                            <p class="font-size-13">--}}
{{--                                                contact@bcbs.com--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">plan/group goes here</div>--}}
{{--                                <div class="col">www.bcbs.com</div>--}}
{{--                                <div class="col">845-876-4563 | 845-737-8754</div>--}}
{{--                                <div class="col">--}}
{{--                                    <span class="badge bg-inactive">--}}
{{--                                       <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>--}}
{{--                                        Inactive--}}
{{--                                    </span>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <button id="1" class="btn delete_button font-size-13" data-bs-toggle="modal" data-bs-target="#myModal">--}}
{{--                                        <i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i>--}}
{{--                                        <span  style="color: #8D8C9C;">Edit</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}

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
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Add New Insurance</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-box-wrap d-block ">
                        <div class="login-main">
                            <form method="post" class="theme-form" role="form">
                                {{-- <h4 class="mb-4">Add New Insurance</h4> --}}

                                <div class="mb-3">
                                    <label for="">Insurance ID</label>
                                    <input name="text" type="text" placeholder="1274" class="form-control" aria-describedby="emailHelp" required="" >
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Insurance logo<span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                                <div class="mb-3">
                                    <label for="">Insurance Name <span class="text-danger">*</span></label>
                                    <input name="text" type="text" placeholder="Enter Team Name" class="form-control" id="Team" required="">
                                </div>
                                <div class="mb-3">
                                    <label for="">Plan/ Group <span class="text-danger">*</span></label>
                                    <input name="text" type="text" placeholder="Enter Plan/ Group" class="form-control" id="Plan" required="">
                                </div>

                                <div class="mb-3" id="phone-wrapper">
                                    <div class="row g-3">
                                        <label for="">Phone 1 <span class="text-danger">*</span></label>
                                        <div class="col-9 mt-0">
                                            <label for="inputPassword2" class="visually-hidden">Password</label>
                                            <input type="password" class="form-control" id="inputPassword2" placeholder="Phone Number" >
                                        </div>
                                        <div class="col-auto mt-0">
                                            <label for="inputPassword2" class="visually-hidden"></label>
                                            <button type="button" class="btn btn-outline-success mb-3 add-more" style="font-size: 12px;">Add More</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="">Insurance Active <span class="text-danger">*</span></label>
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
                                    <button type="submit" class="btn btn-action cbtn col-2">Submit</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--    MODAL--}}


    <script>
        $(document).ready(function(){
            var flag = 1;
            $(".add-more").click(function(){
                flag ++;
                var html = '<div><div class="row phone-row">'+
                   '<label for="">Phone '+ flag +'<span class="text-danger">*</span></label>'+
                '<div class="col-9 mt-0">'+
                    '<label for="inputPassword'+flag+'" class="visually-hidden">Password</label>'+
                    '<input type="password" class="form-control" id="inputPassword'+flag+'" placeholder="Phone Number">'+
                '</div>'+
                '<div class="col-auto mt-0">'+
                    '<label class="visually-hidden"></label>'+
                    '<button type="button" class="btn btn-outline-danger mb-3 delete-phone" style="font-size: 12px;width: 85px;">Delete</button>'+
            '</div>'+
            '</div> </div>';
                $("#phone-wrapper").append(html);
            });


            $("body").on("click",".delete-phone", function(){
                $(this).closest('.phone-row').remove();
                   flag --;
            });
        });
    </script>
@endsection
