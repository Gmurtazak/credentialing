@extends('layouts.app')

@section('content')

    <section class="clinicSec">
        <div class="container clinicCon">
            <div class="row">
                <span class="d-flex">
                    {{-- <img class="cusIcon" src="{{asset('assets/images/icons/clinics.png')}}" alt="">     --}}
                    <h1 class="my-auto">Clinic <span class="clinicCount">({{ count($data->data->data) }})</span></h1>
                </span>
                <h4 >Manage all your existing clinics or add a new clinic.</h4>
            </div>
            <div class="row search d-flex">

                <div class="col-8 col-md-5">
                    <form method="get" action="" id="search_form" name="search_form">
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" name="query" id="query" class="form-control search-input" placeholder="Search Clinic..." value="{{ $request['query'] ?? '' }}">

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
                    <button type="button" class="btn addclinic" data-bs-toggle="modal" data-bs-target="#myModal">
                        + Add Clinic
                    </button>
                </div>
                <!-- Modal -->

            </div>
            <section class="breadcrump">
                <div class="container">

                    <div class="breadcrumbNes providerDetailsTab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link breadcrumbNesitem active nodeco" id="home-tab" data-bs-toggle="tab"
                                   data-bs-target="#active" type="button" role="tab" aria-controls="active"
                                   aria-selected="true">
                                  {{--  <img class="cusIconSm" src="{{asset('assets/images/icons/providerinfo.png')}}" alt="">--}}Active</a>

                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link breadcrumbNesitem nodeco" id="profile-tab" data-bs-toggle="tab"
                                   data-bs-target="#inactive" type="button" role="tab" aria-controls="inactive"
                                   aria-selected="false">
                                    {{--  <img class="cusIconSm" src="{{asset('assets/images/icons/providerinfo.png')}}" alt="">--}} In- Active</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link breadcrumbNesitem nodeco" id="profile-tab" data-bs-toggle="tab"
                                   data-bs-target="#successfull" type="button" role="tab" aria-controls="successfull"
                                   aria-selected="false">
                                    {{--  <img class="cusIconSm" src="{{asset('assets/images/icons/providerinfo.png')}}" alt="">--}} Successfull</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link breadcrumbNesitem nodeco" id="profile-tab" data-bs-toggle="tab"
                                   data-bs-target="#Longer" type="button" role="tab" aria-controls="Longer"
                                   aria-selected="false">
                                    {{--  <img class="cusIconSm" src="{{asset('assets/images/icons/providerinfo.png')}}" alt="">--}}No Longer</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="active" role="tabpanel" aria-labelledby="home-tab">
            <div class="container clinicData">

                <div class="row g-2 {{ (count($data->data->data)==0)?'d-none':'' }}">

                    @if($data)
                        @foreach($data->data->data as $team)
                            @if($team->is_active == 'Active')
                    <div class="col-12 col-md-4 col-lg-3 clinicDiv ">
                        <div class="card">
                            <div class="d-flex">
                                {{--@if($team->is_active == 'Active')
                                <div class="active">
                                    <span>Active</span>
                                </div>
                                @elseif($team->is_active == 'In-active')
                                    <div class="active inactive">
                                        <span>In-Active</span>
                                    </div>
                                @else
                                    <div class="active successfull">
                                        <span>Successfull</span>
                                    </div>
                                @endif--}}
                                <div class="dropdown marginleftauto">
                                    <button id="1" class="btn delete_button font-size-13 viewTeamd p-0" data-bs-toggle="modal" data-bs-target="#viewmyEditdModal" data-rel="{{ $team->id }}">
                                        {{-- <i title="View" style="color: #8D8C9C;" class="bi bi-eye mx-1"></i> --}}

                                        <img src="/assets/images/dot.png" alt="View Clinic">
                                    </button>
                                    <button id="1" class="btn delete_button font-size-13 viewTeam p-0" data-bs-toggle="modal" data-bs-target="#viewmyEditModal" data-rel="{{ $team->id }}">
                                        {{-- <i title="View" style="color: #8D8C9C;" class="bi bi-eye mx-1"></i> --}}
                                        <img src="/assets/images/eyepng.png" alt="View Clinic">
                                    </button>
                                    <button id="1" class="btn delete_button font-size-13 editTeam p-0" data-bs-toggle="modal" data-bs-target="#myEditModal" data-rel="{{ $team->id }}">
                                        {{-- <i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i> --}}
                                        <img src="/assets/images/edit.png" alt="Edit Clinic">
                                    </button>
                                </div>
                            </div>
                            <h3>  {{ $team->name }} </h3>
                            <div class="active provider">
                                <a href="{{ route('client.view', ['id'=>$team->id]) }}" class="nodeco"><span>View Providers</span></a></div>
                            <div class="details">
                                <div>
                                    <img src="/assets/images/phone.png" alt="phone">
                                    <a href="#">  {{ $team->phone }}</a>
                                </div>
                                <div>
                                    <img src="/assets/images/userr_line_icon.png" alt="phone">
                                    <a href="#">   {{ $team->principalowner }}</a>
                                </div>
                                <div>
                                    <img src="/assets/images/location.png" alt="phone">
                                    <a href="#">  {{ $team->primaryaddress }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                            @endif
                        @endforeach
                    @endif

                      {{-- @include('partials/pagingInfo',['data'=>$data])--}}
                </div>

                <div class="row {{ (count($data->data->data)==0)?'':'d-none' }}">
                    <div class="col-12">
                        <h1 class="text-gray text-center" style="padding: 10%;" >No Data Found</h1>
                    </div>
                </div>


            </div>

                </div>
                <div class="tab-pane fade" id="inactive" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="container clinicData">

                        <div class="row g-2 {{ (count($data->data->data)==0)?'d-none':'' }}">

                            @if($data)
                                @foreach($data->data->data as $team)
                                    @if($team->is_active == 'In-active')
                                        <div class="col-12 col-md-4 col-lg-3 clinicDiv ">
                                            <div class="card">
                                                <div class="d-flex">
                                                    {{--@if($team->is_active == 'Active')
                                                    <div class="active">
                                                        <span>Active</span>
                                                    </div>
                                                    @elseif($team->is_active == 'In-active')
                                                        <div class="active inactive">
                                                            <span>In-Active</span>
                                                        </div>
                                                    @else
                                                        <div class="active successfull">
                                                            <span>Successfull</span>
                                                        </div>
                                                    @endif--}}
                                                    <div class="dropdown marginleftauto">
                                                        <button id="1" class="btn delete_button font-size-13 viewTeamd p-0" data-bs-toggle="modal" data-bs-target="#viewmyEditdModal" data-rel="{{ $team->id }}">
                                                            {{-- <i title="View" style="color: #8D8C9C;" class="bi bi-eye mx-1"></i> --}}

                                                            <img src="/assets/images/dot.png" alt="View Clinic">
                                                        </button>
                                                        <button id="1" class="btn delete_button font-size-13 viewTeam p-0" data-bs-toggle="modal" data-bs-target="#viewmyEditModal" data-rel="{{ $team->id }}">
                                                            {{-- <i title="View" style="color: #8D8C9C;" class="bi bi-eye mx-1"></i> --}}
                                                            <img src="/assets/images/eyepng.png" alt="View Clinic">
                                                        </button>
                                                        <button id="1" class="btn delete_button font-size-13 editTeam p-0" data-bs-toggle="modal" data-bs-target="#myEditModal" data-rel="{{ $team->id }}">
                                                            {{-- <i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i> --}}
                                                            <img src="/assets/images/edit.png" alt="Edit Clinic">
                                                        </button>
                                                    </div>
                                                </div>
                                                <h3>  {{ $team->name }} </h3>
                                                <div class="active provider">
                                                    <a href="{{ route('client.view', ['id'=>$team->id]) }}" class="nodeco"><span>View Providers</span></a></div>
                                                <div class="details">
                                                    <div>
                                                        <img src="/assets/images/phone.png" alt="phone">
                                                        <a href="#">  {{ $team->phone }}</a>
                                                    </div>
                                                    <div>
                                                        <img src="/assets/images/userr_line_icon.png" alt="phone">
                                                        <a href="#">   {{ $team->principalowner }}</a>
                                                    </div>
                                                    <div>
                                                        <img src="/assets/images/location.png" alt="phone">
                                                        <a href="#">  {{ $team->primaryaddress }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            {{-- @include('partials/pagingInfo',['data'=>$data])--}}
                        </div>

                        <div class="row {{ (count($data->data->data)==0)?'':'d-none' }}">
                            <div class="col-12">
                                <h1 class="text-gray text-center" style="padding: 10%;" >No Data Found</h1>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="tab-pane fade" id="successfull" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="container clinicData">

                        <div class="row g-2 {{ (count($data->data->data)==0)?'d-none':'' }}">

                            @if($data)
                                @foreach($data->data->data as $team)
                                    @if($team->is_active == 'Successfull')
                                        <div class="col-12 col-md-4 col-lg-3 clinicDiv ">
                                            <div class="card">
                                                <div class="d-flex">
                                                    {{--@if($team->is_active == 'Active')
                                                    <div class="active">
                                                        <span>Active</span>
                                                    </div>
                                                    @elseif($team->is_active == 'In-active')
                                                        <div class="active inactive">
                                                            <span>In-Active</span>
                                                        </div>
                                                    @else
                                                        <div class="active successfull">
                                                            <span>Successfull</span>
                                                        </div>
                                                    @endif--}}
                                                    <div class="dropdown marginleftauto">
                                                        <button id="1" class="btn delete_button font-size-13 viewTeamd p-0" data-bs-toggle="modal" data-bs-target="#viewmyEditdModal" data-rel="{{ $team->id }}">
                                                            {{-- <i title="View" style="color: #8D8C9C;" class="bi bi-eye mx-1"></i> --}}

                                                            <img src="/assets/images/dot.png" alt="View Clinic">
                                                        </button>
                                                        <button id="1" class="btn delete_button font-size-13 viewTeam p-0" data-bs-toggle="modal" data-bs-target="#viewmyEditModal" data-rel="{{ $team->id }}">
                                                            {{-- <i title="View" style="color: #8D8C9C;" class="bi bi-eye mx-1"></i> --}}
                                                            <img src="/assets/images/eyepng.png" alt="View Clinic">
                                                        </button>
                                                        <button id="1" class="btn delete_button font-size-13 editTeam p-0" data-bs-toggle="modal" data-bs-target="#myEditModal" data-rel="{{ $team->id }}">
                                                            {{-- <i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i> --}}
                                                            <img src="/assets/images/edit.png" alt="Edit Clinic">
                                                        </button>
                                                    </div>
                                                </div>
                                                <h3>  {{ $team->name }} </h3>
                                                <div class="active provider">
                                                    <a href="{{ route('client.view', ['id'=>$team->id]) }}" class="nodeco"><span>View Providers</span></a></div>
                                                <div class="details">
                                                    <div>
                                                        <img src="/assets/images/phone.png" alt="phone">
                                                        <a href="#">  {{ $team->phone }}</a>
                                                    </div>
                                                    <div>
                                                        <img src="/assets/images/userr_line_icon.png" alt="phone">
                                                        <a href="#">   {{ $team->principalowner }}</a>
                                                    </div>
                                                    <div>
                                                        <img src="/assets/images/location.png" alt="phone">
                                                        <a href="#">  {{ $team->primaryaddress }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            {{-- @include('partials/pagingInfo',['data'=>$data])--}}
                        </div>

                        <div class="row {{ (count($data->data->data)==0)?'':'d-none' }}">
                            <div class="col-12">
                                <h1 class="text-gray text-center" style="padding: 10%;" >No Data Found</h1>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="tab-pane fade" id="Longer" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="container clinicData">

                        <div class="row g-2 {{ (count($data->data->data)==0)?'d-none':'' }}">

                            @if($data)
                                @foreach($data->data->data as $team)
                                    @if($team->is_active == 'No-longer')
                                        <div class="col-12 col-md-4 col-lg-3 clinicDiv ">
                                            <div class="card">
                                                <div class="d-flex">
                                                    {{--@if($team->is_active == 'Active')
                                                    <div class="active">
                                                        <span>Active</span>
                                                    </div>
                                                    @elseif($team->is_active == 'In-active')
                                                        <div class="active inactive">
                                                            <span>In-Active</span>
                                                        </div>
                                                    @else
                                                        <div class="active successfull">
                                                            <span>Successfull</span>
                                                        </div>
                                                    @endif--}}
                                                    <div class="dropdown marginleftauto">
                                                        <button id="1" class="btn delete_button font-size-13 viewTeamd p-0" data-bs-toggle="modal" data-bs-target="#viewmyEditdModal" data-rel="{{ $team->id }}">
                                                            {{-- <i title="View" style="color: #8D8C9C;" class="bi bi-eye mx-1"></i> --}}

                                                            <img src="/assets/images/dot.png" alt="View Clinic">
                                                        </button>
                                                        <button id="1" class="btn delete_button font-size-13 viewTeam p-0" data-bs-toggle="modal" data-bs-target="#viewmyEditModal" data-rel="{{ $team->id }}">
                                                            {{-- <i title="View" style="color: #8D8C9C;" class="bi bi-eye mx-1"></i> --}}
                                                            <img src="/assets/images/eyepng.png" alt="View Clinic">
                                                        </button>
                                                        <button id="1" class="btn delete_button font-size-13 editTeam p-0" data-bs-toggle="modal" data-bs-target="#myEditModal" data-rel="{{ $team->id }}">
                                                            {{-- <i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i> --}}
                                                            <img src="/assets/images/edit.png" alt="Edit Clinic">
                                                        </button>
                                                    </div>
                                                </div>
                                                <h3>  {{ $team->name }} </h3>
                                                <div class="active provider">
                                                    <a href="{{ route('client.view', ['id'=>$team->id]) }}" class="nodeco"><span>View Providers</span></a></div>
                                                <div class="details">
                                                    <div>
                                                        <img src="/assets/images/phone.png" alt="phone">
                                                        <a href="#">  {{ $team->phone }}</a>
                                                    </div>
                                                    <div>
                                                        <img src="/assets/images/userr_line_icon.png" alt="phone">
                                                        <a href="#">   {{ $team->principalowner }}</a>
                                                    </div>
                                                    <div>
                                                        <img src="/assets/images/location.png" alt="phone">
                                                        <a href="#">  {{ $team->primaryaddress }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            {{-- @include('partials/pagingInfo',['data'=>$data])--}}
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

    </section>


    <input id="detailApiUrld" type="hidden" value="api/provider">
    <input id="detailApiUrl" type="hidden" value="api/v1/team/detail">

    {{--    MODAL--}}
    @include('modals/add_team')
    {{--    MODAL--}}
@endsection
