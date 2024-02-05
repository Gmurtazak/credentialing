@extends('layouts.app')

@section('content')
    <section class="breadcrump">
        <div class="container">

            <h1 class="providerName">Insurance <span> ({{ count($data->data->data) }})</span></h1>

        </div>
    </section>

    <div class="container timeSheetMain">
        <section class="searchBar">
            <div class="container">
                <div class="row search d-flex">
                    <div class="col-8 col-md-5">
                        <form method="get" action="" id="search_form" name="search_form">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" name="query" id="query" class="form-control" placeholder="Search for Insurance ">
                            </div>
                        </form>

                    </div>
                    <div class="col-4 col-md-2">
                        <a href="#">
                            <button type="button" class="btn filter"><i class="fa fa-filter" aria-hidden="true"></i>
                                Filter</button>
                        </a>
                    </div>
                    <div class="col-12 col-md-3 addClinicDiv">
                        <a href="#">
                            <button type="button" class="btn addclinic" data-bs-toggle="modal" data-bs-target="#myModal">
                                + Add Insurance</button>
                        </a>
                    </div>
                </div>

            </div>
        </section>
        <section class="providerTableSec {{ (count($data->data->data)==0)?'d-none':'' }}">
            <table class="table providerTable">
                <thead>
                <tr>
                    <th>NAME </th>
                    <th>PLAN/ GROUP</th>
                    <th>WEBSITE</th>
                    <th>PHONE</th>
                    <th>STATUS</th>
                    <th>ACTION</th>

                </tr>
                </thead>
                <tbody>
                @if($data->data->data)
                    @foreach($data->data->data as $insurance)
                <tr>
                    <td>
                        {{ $insurance->name }}
                        <p class="font-size-13 mb-0">
                            {{$insurance->email}}
                        </p>
                    </td>
                    <td>
                        {{ $insurance->plan_group }}
                    </td>
                    <td>www.bcbs.com</td>
                    <td>{{ str_replace(',', ' | ', $insurance->phone)}}</td>
                    <td class="inProcess">

                    @if($insurance->is_active)
                            <span>Active</span>
                        @else
                            <span>In-Active</span>

                        @endif

                    </td>
                    <td>
                        <button id="1" class="btn delete_button font-size-13 editInsurance py-0" data-rel="{{ $insurance->id }}">
                            <img src="assets/images/edit.png" alt="edit">
                        </button>
                       {{-- <button id="1" class="btn delete_button font-size-13 editInsurance" data-rel="{{ $insurance->id }}">
                            <i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i>
                            <span  style="color: #8D8C9C;">Edit</span>
                        </button>--}}
                    </td>
                </tr>
                    @endforeach
                @endif
                </tbody>

            </table>

        </section>

        @include('partials/pagingInfo',['data'=>$data])
        <div class="row {{ (count($data->data->data)==0)?'':'d-none' }}">
            <div class="col-12">
                <h1 class="text-gray text-center" style="padding: 10%;" >No Data Found</h1>
            </div>
        </div>
    </div>


    {{-- <div class="page-body patient-book">
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
                                     <input type="text" name="query" id="query" class="form-control search-input" placeholder="Search Insurance..." value="{{ $request['query'] ?? '' }}">
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
                 <div class="col-12 {{ (count($data->data->data)==0)?'d-none':'' }}">
                     <table class="table">
                         <thead>
                         <tr>
                             <td></td>
                             <td>NAME</td>
                             <td>PLAN/ GROUP</td>
                             <td>WEBSITE</td>
                             <td>PHONE</td>
                             <td>STATUS</td>
                             <td>ACTION</td>
                         </tr>
                         </thead>
                         <tbody>
                         @if($data->data->data)
                             @foreach($data->data->data as $insurance)
                                 <tr>
                                     <td>
                                         <div class="form-check p-0">
                                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                             <label class="form-check-label" for="flexCheckDefault">
                                             </label>
                                         </div>
                                     </td>
                                     <td>
                                         <div class="d-flex">
                                             <div class="flex-shrink-0">
                                                 <img src="{{$insurance->logo}}" alt="Sample Image" width="40px" height="40px" style="border-radius: 100%;">
                                             </div>
                                             <div class="flex-grow-1 ms-3">
                                                 <h5 class="font-semibold font-size-15 text-dark mb-1">{{ $insurance->name }}</h5>
                                                 <p class="font-size-13">
                                                     {{$insurance->email}}
                                                 </p>
                                             </div>
                                         </div>
                                     </td>
                                     <td>{{ $insurance->plan_group }}</td>
                                     <td>www.bcbs.com</td>
                                     <td>{{ str_replace(',', ' | ', $insurance->phone)}}</td>
                                     <td>
                                         @if($insurance->is_active)
                                             <span class="badge bg-active">
                                              <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>Active
                                          </span>
                                         @else
                                             <span class="badge bg-inactive">
                                                     <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>Inactive
                                                 </span>
                                         @endif

                                     </td>
                                     <td>
                                         <button id="1" class="btn delete_button font-size-13 editInsurance" data-rel="{{ $insurance->id }}">
                                             <i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i>
                                             <span  style="color: #8D8C9C;">Edit</span>
                                         </button>
                                     </td>
                                 </tr>
                             @endforeach
                         @endif
                         </tbody>
                     </table>
                     @include('partials/pagingInfo',['data'=>$data])

                     <div class="row {{ (count($data->data->data)==0)?'':'d-none' }}">
                         <div class="col-12">
                             <h1 class="text-gray text-center" style="padding: 10%;" >No Data Found</h1>
                         </div>
                     </div>

                 </div>
             </div>
        </div>--}}

        <input id="detailApiUrl" type="hidden" value="api/v1/portal/detail">
        {{--    MODAL--}}
        @include('modals/add_portal_project')
        {{--    MODAL--}}

        <script>
            $(document).ready(function(){
                var flag = 1;
                $(".add-more").click(function(){
                    flag ++;
                    var html = '<div><div class="row phone-row">'+
                        '<label for="">Phone Number<span class="text-danger">*</span></label>'+
                        '<div class="col-9 mt-0">'+
                        '<label for="inputPassword'+flag+'" class="visually-hidden">Password</label>'+
                        '<input type="number" name="phone[]" class="form-control" id="inputPassword'+flag+'" placeholder="Phone Number">'+
                        '</div>'+
                        '<div class="col-auto mt-0">'+
                        '<label class="visually-hidden"></label>'+
                        '<button type="button" class="btn btn-outline-danger mb-3 delete-phone" style="font-size: 12px;width: 85px;">Delete</button>'+
                        '</div>'+
                        '</div> </div>';
                    $(".phone-wrapper").append(html);
                });


                $("body").on("click",".delete-phone", function(){
                    $(this).closest('.phone-row').remove();
                    flag --;
                });
            });
        </script>
@endsection
