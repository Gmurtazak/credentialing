@extends('layouts.app')

@section('content')

    <div class="container providersMain">
        <section class="breadcrump providerBreadcrump">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('teams')}}">Clinics</a></li>
                        <li class="breadcrumb-item active"><a href="#">Providers</a></li>
                    </ol>
                </nav>

                <span class="d-flex">
                    {{-- <img class="cusIcon" src="{{asset('assets/images/icons/providers.png')}}" alt="">     --}}
                    <h1 class="my-auto">Providers ({{ count($data) }})</h1>
                </span>
                <h4>Manage all your existing providers or add a new provider.</h4>
            </div>
        </section>
        <section class="searchBar">
            <div class="container">
                <div class="row search d-flex">
                    <div class="col-8 col-md-5">
                        <form method="get" action="" id="search_form" name="search_form">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" name="query" id="query" class="form-control" placeholder="Search for provider">
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
                        {{--<button type="button" class="btn addclinic" data-bs-toggle="modal" data-bs-target="#myModaladdCredentialing" data-id="{{$provider['provider'][0]->clinicid}}">
                            + Add Credentialing</button>--}}

                        <button type="button" class="btn addclinic" data-bs-toggle="modal" data-bs-target="#myModal" data-id="{{$data["data"][0]->clinicid}}">
                            + Add Provider
                        </button>
                    </div>
                    <!-- Modal -->

                </div>

            </div>
        </section>
        <div class="container clinicData providerData">
            <div class="row g-2 {{ (count($data)==0)?'d-none':'' }}">
                @if($data)
                    @foreach($data as $client)
                        @foreach($client as $client)
                <div class="col-12 col-md-4 col-lg-3 clinicDiv ">
                    <div class="card">
                        <div class="d-flex">
                            @if($client->is_active == 'Active')
                                <div class="active">
                                    <span>Active</span>
                                </div>
                            @elseif($client->is_active == 'In-active')
                                <div class="active inactive">
                                    <span>In-Active</span>
                                </div>
                            @elseif($client->is_active == 'Successfull')
<<<<<<< Updated upstream
                                <div class="active successfull">
                                    <span>Successfull</span>
                                </div>
                            @else
=======
>>>>>>> Stashed changes
                                <div class="active successfull">
                                    <span>Successfull</span>
                                </div>
                            @else
                                <div class="active inactive">
                                    <span>No longer</span>
                                </div>
                            @endif
                            <div class="dropdown marginleftauto">
                               {{-- <img src="assets/images/dots.png" alt="dots">--}}
                                {{--<div class="dropdown marginleftauto">
                                    <button id="1" class="btn delete_button font-size-13 editClient p-0" data-bs-toggle="modal" data-bs-target="#myEditModal" data-rel="{{ $client->id }}">
                                        --}}{{-- <i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i> --}}{{--
                                        <img src="/assets/images/edit.png" alt="">

                                    </button>
                                </div>--}}
                            </div>
                        </div>
                       {{-- <a href="{{route('client')}}" class="nodeco">--}}
                        <a href="{{route('portal.view', ['id'=>$client->id])}}" class="nodeco"><h3>{{ $client->name }}</h3></a>
                       {{-- </a>--}}
                        <div class="providerDetails">
                            <h5>Provider Specialty: <span>{{ $client->ps }}</span></h5>
                            <h5>Primary Specialty: <span>{{ $client->ps }} </span></h5>
                        </div>

                        <div class="details">
                            <div>
                                <img src="../assets/images/location.png" alt="phone">
                                <a href="{{route('portal.view', ['id'=>$client->id])}}">{{ ! $allclinic = DB::table('clinic')->where('id',$client->clinicid)->first() }}
                                     <span class="text-dark">{{ $allclinic->primaryaddress }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                     @endforeach
                    @endforeach
                @endif
                {{--@include('partials/pagingInfo',['data'=>$data])--}}
            </div>
            <div class="row">
                <div class="col-12">
                    <h1 class="text-gray text-center" style="padding: 1%;" ></h1>
                </div>
            </div>
        </div>
    </div>



  {{--  <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-7">
                    <h2>Provider <span class="text-gray font-size-16">({{ count($data->data->data) }})</span></h2>
                </div>
                <div class="col-sm-12 col-xl-5">
                    <div class="row">
                        <form method="get" class="col-md-8" action="" id="search_form" name="search_form">
                            <div class="row">
                                <div class="col-md-10 p-0 search-wrap">
                                    <i class="bi bi-search"></i>
                                    <input type="text" name="query" id="query" class="form-control search-input" placeholder="Search Provider..." value="{{ $request['query'] ?? '' }}">
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
                            <a href="" class="btn btn-action cbtn col-12" data-bs-toggle="modal" data-bs-target="#myModal">+ Add New Provider</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-container">
                <div class="col-12">
                    <div class="row {{ (count($data->data->data)==0)?'d-none':'' }}">
                        @if($data)
                            @foreach($data->data->data as $client)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5 class="card-title font-size-18 mb-0">{{ $client->name }}</h5>
                                                </div>
                                                <div class="col-md-6 d-flex justify-content-end p-0">
                                                    @if($client->is_active)
                                                        <span class="badge bg-active">
                                             <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>Active
                                         </span>
                                                    @else
                                                        <span class="badge bg-inactive">
                                                    <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>Inactive
                                                </span>
                                                    @endif
                                                    <span class="dropdown cursor-pointer">

                                                         <button id="1" class="btn delete_button font-size-13 viewProvider" data-rel="{{ $client->id }}">
                                                    <i title="View" style="color: #8D8C9C;" class="bi bi-eye mx-1"></i>
                                                </button>
                                                        <button id="1" class="btn delete_button font-size-13 editClient" data-rel="{{ $client->id }}">
                                                    <i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i>
                                                </button>

                                         </span>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col">
                                                    <p class="text-gray font-size-14">
                                                        Primary Specialty : <span class="text-dark">{{ $client->ps }}</span>
                                                    </p>
                                                </div>
                                            <div class="col">
                                                    <p class="text-gray font-size-14">
                                                        {{ ! $allclinic = DB::table('clinic')->where('id',$client->clinicid)->first() }}
                                                        State : <span class="text-dark">{{ $allclinic->primaryaddress }}</span>
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="text-gray font-size-14">
                                                        Provider Speciality : <span class="text-dark">{{ $client->ps }}</span>
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
    </div>--}}


    <input id="detailApiUrl" type="hidden" value="api/v1/client/detail">
    {{--    MODAL--}}
    @include('modals/add_client')
    {{--    MODAL--}}
@endsection
