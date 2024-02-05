@extends('layouts.app')

@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-7">
                    <h2>Roles <span class="text-gray font-size-16">({{ count($data->data->data) }})</span></h2>
                </div>
                <div class="col-sm-12 col-xl-5">
                    <div class="row">
                        <form method="get" class="col-md-8" action="" id="search_form" name="search_form">
                            <div class="row">
                                <div class="col-md-10 p-0 search-wrap">
                                    <i class="bi bi-search"></i>
                                    <input type="text" name="query" id="query" class="form-control search-input" placeholder="Search Role..." value="{{ $request['query'] ?? '' }}">
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
                            <a href="" class="btn btn-action cbtn col-12" data-bs-toggle="modal" data-bs-target="#myModal">+ Add New Role</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-container">
                <div class="col-12">
                    <div class="row {{ (count($data->data->data)==0)?'d-none':'' }}">
                        @if($data)
                            @foreach($data->data->data as $role)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="card-title font-size-18 mb-0">{{ $role->role }}</h5>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-end p-0">
                                            @if($role->is_active)
                                                <span class="badge bg-active">
                                             <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>Active
                                         </span>
                                            @else
                                                <span class="badge bg-inactive">
                                                    <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>Inactive
                                                </span>
                                            @endif
                                            <span class="dropdown cursor-pointer">
                                             <i class="bi bi-three-dots-vertical" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>
                                             <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                  <li><button class="dropdown-item editRole" data-rel="{{ $role->id }}" type="button">Edit</button></li>
                                                 <li><button class="dropdown-item" type="button">Delete</button></li>
                                             </ul>
                                         </span>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <p class="text-gray font-size-14">
                                                Role ID :
                                            </p>
                                            <p class="text-gray font-size-14">
                                                <span class="text-dark">{{ $role->id }}</span>
                                            </p>
                                        </div>
                                       {{-- <div class="col">
                                            <p class="text-gray font-size-14">
                                                Target :
                                            </p>
                                            <p class="font-size-14">
                                               <span class="text-dark">${{ $role->target }}</span>
                                            </p>
                                        </div>--}}
                                        <div class="col">
                                            <p class="text-gray font-size-14">

                                            </p>
                                            <p class="font-size-14">
                                                <span class="text-dark"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                            @endforeach

                        @endif
                            @include('partials/pagingInfo',['data'=>$data])
                    </div>
                    <div class="row {{ (count($data->data->data)==0)?'':'d-none' }}">
                        <div class="col-12">
                            <h1 class="text-gray text-center" style="padding: 10%;" >No Data Found</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <input id="detailApiUrl" type="hidden" value="api/v1/role/detail">
    {{--    MODAL--}}
    @include('modals/add_role')
    {{--    MODAL--}}
@endsection
