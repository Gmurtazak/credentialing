@extends('layouts.app')

@section('content')
    @inject('team', 'App\Services\Team\TeamService')
    <section class="breadcrump">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('teams') }}">Clinics</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('client.view', ['id'=>$provider['provider'][0]->clinicid]) }}">Providers</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Provider Details</a></li>
                </ol>
            </nav>

            <span class="d-flex">
                {{-- <img class="cusIcon" src="{{asset('assets/images/icons/providers.png')}}" alt="">     --}}
                <h1 class="providerName my-auto">Provider Details {{-- <span>Danielle Crawford, M.A. LPC</span> --}}</h1>
            </span>
            <div class="breadcrumbNes providerDetailsTab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link breadcrumbNesitem nodeco" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#services" type="button" role="tab" aria-controls="services"
                            aria-selected="true"><img class="cusIconSm" src="{{asset('assets/images/icons/providerinfo.png')}}" alt=""> Provider Information</a>

                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link breadcrumbNesitem active nodeco" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#medical" type="button" role="tab" aria-controls="medical"
                            aria-selected="false"><img class="cusIconSm" src="{{asset('assets/images/icons/trackingsheet.png')}}" alt=""> Tracking Sheet</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    {{-- <div class="container timeSheetMain">
        <section class="searchBar">
            <div class="container">
                <div class="row search d-flex">
                    <div class="col-8 col-md-5">
                        <form method="get" action="" id="search_form" name="search_form">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" name="query" id="query" class="form-control" placeholder="Search for credentials">
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
                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                            <button type="button" class="btn addclinic">
                                + Add Credentialing</button>
                        </a>
                    </div>
                </div>

            </div>
        </section>
        <div class="breadcrumbNes providerDetailsTab">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link breadcrumbNesitem active nodeco" id="home-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="true">Provider Information</a>

            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link breadcrumbNesitem nodeco" id="profile-tab" data-bs-toggle="tab" data-bs-target="#medical" type="button" role="tab" aria-controls="medical" aria-selected="false"> Tracking Sheet</a>
            </li>
        </ul>
    </div> --}}


    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="home-tab">
            <section class="editProfile">
                <div class="container ">
                    <div class="row">
                        <div class="col-7">
                            <h3 class="profileName">
                                {{$provider['provider'][0]->name}} <span class="nameShort">{{$provider['provider'][0]->mdnppa}}</span>
                            </h3>
                            <div class="addressIcon">
                                <img src="../assets/images/location.png" class="locationIcon pe-2" alt="Location">
                            </div>
                            <div class="addressText">
                                <p class="location">
                                    {{ ! $allclinic = DB::table('clinic')->where('id',$provider['provider'][0]->clinicid)->first() }}
                                    {{$allclinic->primaryaddress}}
                                </p>
                            </div>
                        </div>
                        <div class="col Editbutton">
                            <!-- Button to trigger the modal -->
                            <button type="button" class="btn edit editClient" data-bs-toggle="modal" data-bs-target="#myEditModal" data-rel="{{ $provider['provider'][0]->id }}" >
                                <img src="../assets/images/EditTrans.png" alt="edit profile">
                                <span>Edit Profile</span>
                            </button>
                            </a>

                        </div>



                    </div>
                </div>

            </section>
            <section class="providerDetailsForms">
                <div class="container">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="card genInfo info">
                                <div class="card-body">
                                    <div class="infoHead">
                                        <h3>
                                            Profile Information
                                        </h3>
                                    </div>
                                </div>
                                <div class="container py-3">
                                    <form class="row infoForm" role="form">
                                        <input type="hidden" name="_token"
                                            value="61DDUcmIa2LCql33Jc30Zg03KDVIQ9YaGr0aAmOI"> <input name="apiUrl"
                                            type="hidden" value="">
                                        <input name="apiUrlMethod" type="hidden" value="POST">
                                        <input name="isForm" type="hidden" value="1">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Clinic: </label>
                                                <select class="form-control" disabled>
                                                    <option value="">Select Clinic</option>
                                                    @foreach ($team->all() as $team)
                                                        <option value="{{ $team->id }}" {{ ($team->id==$provider['provider'][0]->clinicid)?'selected':'' }}>{{ Str::title($team->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Name: (First, Middle Initial, Last Name) <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value=" {{$provider['provider'][0]->name}}" disabled>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Primary Specialty : <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value=" {{$provider['provider'][0]->ps}}" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">DOB :</label>
                                                <input  type="date" value="{{\Carbon\Carbon::parse($provider['provider'][0]->dob)->format('Y-m-d')}}"  class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Phone :</label>
                                                <input  type="text" value="{{$provider['provider'][0]->phone}}" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Email Address :</label>
                                                <input  value="{{$provider['provider'][0]->email}}" type="text" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">SSN:</label>
                                                <input  type="text" class="form-control" value="{{$provider['provider'][0]->ssn}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-8 my-auto">
                                            <label for="">You selected : </label>
                                            <input  type="text" class="form-control" value="{{$provider['provider'][0]->mdnppa}}" disabled>
                                            {{-- <div class="radio ">
                                                 <label for="">MD</label>
                                                 <input class="" type="radio" name="mdnppa" id="exampleRadios1"
                                                     value="md" checked="">
                                                 <label for="">NP</label>
                                                 <input class="" type="radio" name="mdnppa" id="exampleRadios1"
                                                     value="np">
                                                 <label for="">PA</label>
                                                 <input class="" type="radio" name="mdnppa" id="exampleRadios1"
                                                     value="pa">
                                                 <label for="">LPC</label>
                                                 <input class="" type="radio" name="mdnppa" id="exampleRadios1"
                                                     value="lpc">
                                                 <label for="">SLP</label>
                                                 <input class="" type="radio" name="mdnppa" id="exampleRadios1"
                                                     value="slp">
                                                 <label for="">DO</label>
                                                 <input class="" type="radio" name="mdnppa" id="exampleRadios1"
                                                     value="do">
                                                 <label for="">DPM</label>
                                                 <input class="" type="radio" name="dpm" id="exampleRadios1"
                                                     value="dpm">
                                                 <label for="">Therapist</label>
                                                 <input class="" type="radio" name="mdnppa" id="exampleRadios1"
                                                     value="therapist">
                                             </div>--}}

                                        </div>
                                        <div class="card-body">
                                            <div class="infoHead">
                                                <h3>
                                                    General Information
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="container py-3 row infoForm">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Ind NPI </label>
                                                    <input  type="text" class="form-control" value="{{$provider['provider'][0]->indnpi}}" disabled>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">State License :</label>
                                                    <input  type="text" class="form-control" value="{{$provider['provider'][0]->statel}}" disabled>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">License Issue Date :</label>
                                                    <input  type="date" class="form-control" value="{{\Carbon\Carbon::parse($provider['provider'][0]->lid)->format('Y-m-d')}}" disabled>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">License Exp. Date :</label>
                                                    <input  type="date" class="form-control" value="{{\Carbon\Carbon::parse($provider['provider'][0]->led)->format('Y-m-d')}}" disabled>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Driver’s License :</label>
                                                    <input  type="text" class="form-control" value="{{$provider['provider'][0]->driverl}}" disabled>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">License Issue Date :</label>
                                                    <input  type="date" class="form-control" value="{{\Carbon\Carbon::parse($provider['provider'][0]->dlid)->format('Y-m-d')}}" disabled>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">License Exp. Date :</label>
                                                    <input  type="date" class="form-control" value="{{\Carbon\Carbon::parse($provider['provider'][0]->dled)->format('Y-m-d')}}"  disabled>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">DEA License :</label>
                                                    <input  type="text" class="form-control" value="{{$provider['provider'][0]->deal}}" disabled>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">DEA Issue Date :</label>
                                                    <input  type="date" class="form-control" value="{{\Carbon\Carbon::parse($provider['provider'][0]->deaid)->format('Y-m-d')}}"  disabled>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">DEA Exp. Date :</label>
                                                    <input  type="date" class="form-control" value="{{\Carbon\Carbon::parse($provider['provider'][0]->deaed)->format('Y-m-d')}}"  disabled>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">DPS License :</label>
                                                    <input  type="text" class="form-control" value="{{$provider['provider'][0]->dpsl}}" disabled>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">DPS Issue Date :</label>
                                                    <input  type="date" class="form-control" value="{{\Carbon\Carbon::parse($provider['provider'][0]->dpsid)->format('Y-m-d')}}"  disabled>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="infoHead">
                                                <h3>
                                                    Additional Information
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="container py-3 row infoForm">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">DPS Exp. Date :</label>
                                                    <input name="dpsed" type="date" class="form-control" value="{{\Carbon\Carbon::parse($provider['provider'][0]->dpsed)->format('Y-m-d')}}" disabled>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Medicare Number :</label>
                                                    <input name="medicarenum" type="text" class="form-control" value="{{$provider['provider'][0]->medicarenum}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Medicare Effective Date :</label>
                                                    <input name="medicareeff" type="date" class="form-control" value="{{Carbon\Carbon::parse($provider['provider'][0]->medicareeff)->format('Y-m-d')}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Medicaid Number :</label>
                                                    <input name="medicaidnum" type="text" class="form-control" value="{{$provider['provider'][0]->medicaidnum}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Medicaid Effective Date :</label>
                                                    <input name="medicaideff" type="date" class="form-control"value="{{\Carbon\Carbon::parse($provider['provider'][0]->medicaideff)->format('Y-m-d')}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="infoHead">
                                                <h3>
                                                    Account Information
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="container py-3 row infoForm">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">CAQH Number :</label>
                                                    <input name="caqhnum" type="text" class="form-control" value="{{$provider['provider'][0]->caqhnum}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">CAQH Username :</label>
                                                    <input name="username" type="text" class="form-control"value="{{$provider['provider'][0]->username}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">CAQH Password :</label>
                                                    <input name="password" type="text" class="form-control"value="{{$provider['provider'][0]->password}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Place of Birth :</label>
                                                    <input name="pob" type="text" class="form-control" value="{{$provider['provider'][0]->pob}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">State of Birth :</label>
                                                    <input name="sob" type="text" class="form-control"value="{{$provider['provider'][0]->sob}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Citizenship :</label>
                                                    <input name="citizenship" type="text" class="form-control"value="{{$provider['provider'][0]->citizenship}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Hospital Privileges : </label>
                                                    <input name="hospitalprivileges" type="text" class="form-control"value="{{$provider['provider'][0]->hospitalprivileges}}" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="d-block" for="supervisingPhysician">{{--Will this provider
                                                        only be
                                                        acting as a Supervising Physician?--}}Provider Status</label>
                                                    <p class="onoff pf">

                                                       {{-- <input type="checkbox" name="is_active" {{ ($provider['provider'][0]->is_active==1)?'checked':'' }} disabled>--}}
                                                    @if($provider['provider'][0]->is_active == 'Active')
                                                        <div class="active" style="color:#43c387;font-weight: bolder;">
                                                            <span>Active</span>
                                                        </div>
                                                    @elseif($provider['provider'][0]->is_active == 'In-active')
                                                        <div class="active inactive" style="color:#fd7e14;font-weight: bolder;">
                                                            <span>In-Active</span>
                                                        </div>
                                                    @elseif($provider['provider'][0]->is_active == 'Successfull')
                                                        <div class="active successfull" style="color:#fd7e14;font-weight: bolder;">
                                                            <span>Successfull</span>
                                                        </div>
                                                    @else
                                                        <div class="active" style="color:#f24c46; font-weight: bolder;">
                                                            <span>No longer</span>
                                                        </div>
                                                    @endif
                                                        <label for="checkboxID"></label>
                                                    </p>
                                                </div>



                                            </div>

                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card docInfo info">
                                <div class="card-body">
                                    <div class="infoHead">
                                        <h3>
                                            Documents Information
                                        </h3>
                                        {{-- <button type="button" id="enableFieldsBtn4" class="btn edit">
                                                <img src="./assets/images/providerDetails/Edit.png" alt="edit profile">
                                            </button> --}}
                                    </div>
                                </div>
                                <div class="container py-3">
                                    <form id="userForm" class="row docForm">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-6 docLabel"><label>Completed and Signed W-9
                                                        form</label></div>
                                                <div class="col-12 col-md-6 docInput">
                                                    @if ($provider['provider'][0]->logo)
                                                    <a href="../storage/provider/{{$provider['provider'][0]->logo}}" target="_blank"> <img src="{{asset('assets/images/viewFile.png')}}" alt="logo"></a>
                                                        <a href="{{ route('download.view',$provider['provider'][0]->logo) }}"><img src="{{asset('assets/images/dropdowns.png')}}" alt="logo"></a>
                                                    @else

                                                    @endif
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-6 docLabel"><label>Voided Check</label></div>
                                                <div class="col-12 col-md-6 docInput">
                                                    @if ($provider['provider'][0]->logoone)
                                                    <a href="../storage/provider/{{$provider['provider'][0]->logoone}}" target="_blank"><img src="{{asset('assets/images/viewFile.png')}}" alt="logo"></a>
                                                        <a href="{{ route('download.view',$provider['provider'][0]->logoone) }}"><img src="{{asset('assets/images/dropdowns.png')}}" alt="logo"></a>
                                                    @else

                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-6 docLabel"><label>Clinical Lab Improvement
                                                        Amendment
                                                        – CLIA Certificate</label></div>
                                                <div class="col-12 col-md-6 docInput">
                                                    @if ($provider['provider'][0]->logotwo)
                                                    <a href="../storage/provider/{{$provider['provider'][0]->logotwo}}" target="_blank"><img src="{{asset('assets/images/viewFile.png')}}" alt="logo"></a>
                                                        <a href="{{ route('download.view',$provider['provider'][0]->logotwo) }}"><img src="{{asset('assets/images/dropdowns.png')}}" alt="logo"></a>

                                                    @else

                                                    @endif

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-6 docLabel"><label>Certificate of Filing (Office
                                                        of
                                                        the Secretary of State)</label></div>
                                                <div class="col-12 col-md-6 docInput">
                                                    @if ($provider['provider'][0]->logothree)
                                                    <a href="../storage/provider/{{$provider['provider'][0]->logothree}}" target="_blank"><img src="{{asset('assets/images/viewFile.png')}}" alt="logo"></a>
                                                        <a href="{{ route('download.view',$provider['provider'][0]->logothree) }}"><img src="{{asset('assets/images/dropdowns.png')}}" alt="logo"></a>

                                                    @else

                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-6 docLabel"><label>CP-575 (Department of the
                                                        Treasury,
                                                        Internal Revenue Service)</label></div>
                                                <div class="col-12 col-md-6 docInput">
                                                    @if ($provider['provider'][0]->logofour)
                                                    <a href="../storage/provider/{{$provider['provider'][0]->logofour}}" target="_blank"><img src="{{asset('assets/images/viewFile.png')}}" alt="logo"></a>
                                                        <a href="{{ route('download.view',$provider['provider'][0]->logofour) }}"><img src="{{asset('assets/images/dropdowns.png')}}" alt="logo"></a>

                                                    @else

                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-6 docLabel"><label>Copy of State Medical
                                                        Licenses</label></div>
                                                <div class="col-12 col-md-6 docInput">
                                                    @if ($provider['provider'][0]->logofive)
                                                    <a href="../storage/provider/{{$provider['provider'][0]->logofive}}" target="_blank"><img src="{{asset('assets/images/viewFile.png')}}" alt="logo"></a>
                                                        <a href="{{ route('download.view',$provider['provider'][0]->logofive) }}"><img src="{{asset('assets/images/dropdowns.png')}}" alt="logo"></a>
                                                    @else

                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-6 docLabel"><label>Copy of Driver’s
                                                        License</label>
                                                </div>
                                                <div class="col-12 col-md-6 docInput">
                                                    @if ($provider['provider'][0]->logosix)
                                                    <a href="../storage/provider/{{$provider['provider'][0]->logosix}}" target="_blank"><img src="{{asset('assets/images/viewFile.png')}}" alt="logo"></a>
                                                        <a href="{{ route('download.view',$provider['provider'][0]->logosix) }}"><img src="{{asset('assets/images/dropdowns.png')}}" alt="logo"></a>
                                                    @else

                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-6 docLabel"><label>Copy of DEA</label></div>
                                                <div class="col-12 col-md-6 docInput">
                                                    @if ($provider['provider'][0]->logoseven)
                                                    <a href="../storage/provider/{{$provider['provider'][0]->logoseven}}" target="_blank"><img src="{{asset('assets/images/viewFile.png')}}" alt="logo"></a>
                                                        <a href="{{ route('download.view',$provider['provider'][0]->logoseven) }}"><img src="{{asset('assets/images/dropdowns.png')}}" alt="logo"></a>

                                                    @else

                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-6 docLabel"><label>Copy of DPS</label></div>
                                                <div class="col-12 col-md-6 docInput">
                                                    @if ($provider['provider'][0]->logoeight)
                                                    <a href="../storage/provider/{{$provider['provider'][0]->logoeight}}" target="_blank"><img src="{{asset('assets/images/viewFile.png')}}" alt="logo"></a>
                                                        <a href="{{ route('download.view',$provider['provider'][0]->logoeight) }}"><img src="{{asset('assets/images/dropdowns.png')}}" alt="logo"></a>
                                                    @else

                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-6 docLabel"><label>Updated Resume</label></div>
                                                <div class="col-12 col-md-6 docInput">
                                                    @if ($provider['provider'][0]->logonine)
                                                    <a href="../storage/provider/{{$provider['provider'][0]->logonine}}" target="_blank"><img src="{{asset('assets/images/viewFile.png')}}" alt="logo"></a>
                                                        <a href="{{ route('download.view',$provider['provider'][0]->logonine) }}"><img src="{{asset('assets/images/dropdowns.png')}}" alt="logo"></a>

                                                    @else

                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-6 docLabel"><label>Copy of Professional Liability
                                                        Insurance</label></div>
                                                <div class="col-12 col-md-6 docInput">
                                                    @if ($provider['provider'][0]->logoten)
                                                    <a href="../storage/provider/{{$provider['provider'][0]->logoten}}" target="_blank"><img src="{{asset('assets/images/viewFile.png')}}" alt="logo"></a>
                                                        <a href="{{ route('download.view',$provider['provider'][0]->logoten) }}"><img src="{{asset('assets/images/dropdowns.png')}}" alt="logo"></a>

                                                    @else

                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-6 docLabel"><label>Copy of RN & APRN Licenses (if
                                                        provider is a Nurse Practitioner)</label></div>
                                                <div class="col-12 col-md-6 docInput">
                                                    @if ($provider['provider'][0]->logoevelen)
                                                    <a href="../storage/provider/{{$provider['provider'][0]->logoevelen}}" target="_blank"><img src="{{asset('assets/images/viewFile.png')}}" alt="logo"></a>
                                                        <a href="{{ route('download.view',$provider['provider'][0]->logoevelen) }}"><img src="{{asset('assets/images/dropdowns.png')}}" alt="logo"></a>

                                                    @else

                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12 col-md-6 docLabel"><label>Credentialing
                                                        questionnaire</label>
                                                </div>
                                                <div class="col-12 col-md-6 docInput">
                                                    @if ($provider['provider'][0]->logotwelve)
                                                    <a href="../storage/provider/{{$provider['provider'][0]->logotwelve}}" target="_blank"><img src="{{asset('assets/images/viewFile.png')}}" alt="logo"></a>
                                                        <a href="{{ route('download.view',$provider['provider'][0]->logotwelve) }}"><img src="{{asset('assets/images/dropdowns.png')}}" alt="logo"></a>

                                                    @else

                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group otherForms row">
                                                <div class="col-12 col-md-6 docLabel"><label>Other</label></div>
                                                <div class="col-12 col-md-6 docInput">
                                                    @if ($provider['provider'][0]->logothird)
                                                    <a href="../storage/provider/{{$provider['provider'][0]->logothird}}" target="_blank"><img src="{{asset('assets/images/viewFile.png')}}" alt="logo"></a>
                                                        <a href="{{ route('download.view',$provider['provider'][0]->logothird) }}"><img src="{{asset('assets/images/dropdowns.png')}}" alt="logo"></a>

                                                    @else

                                                    @endif
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12 saveButton savDoc">
                                            <div class="button-container">
                                                <button type="button" id="saveBtn4" class="btn btn-save"
                                                    style="display:none;">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input id="detailApiUrl" type="hidden" value="api/v1/client/detail">

            </section>
        </div>
        <div class="tab-pane fade show active" id="medical" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container timeSheetMain">
                <section class="searchBar">
                    <div class="container">
                        <div class="row search d-flex">
                            <div class="col-8 col-md-5">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control" placeholder="Search for credentials">
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <a href="#">
                                    <button type="button" class="btn filter"><i class="fa fa-filter"
                                            aria-hidden="true"></i>
                                        Filter</button>
                                </a>
                            </div>
                            <div class="col-12 col-md-3 addClinicDiv">
                                <a href="#">

                                    <button type="button" class="btn addclinic" data-bs-toggle="modal" data-bs-target="#myModaladdCredentialing" data-id="{{$provider['provider'][0]->clinicid}}">
                                        + Add Credentialing</button>
                                </a>
                            </div>
                        </div>

                    </div>
                </section>
                <section class="providerTableSec">
                    <table class="table providerTable trackingSheet">
                        <thead>
                            <tr>
                                <th>Clinic </th>
                                <th>Credentialing</th>
                                <th>Insurance</th>
                                <th>Status</th>
                                <th>Effective date</th>
                                <th>Remarks</th>
                                <th>Remarks date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data)
                                @foreach ($data as $insurances)
                                    @foreach ($insurances as $insurance)
                                        <tr>
                                            <td>
                                                {{-- <a target="_blank" href="{{route('teams')}}" data-rel="{{ $insurance->clinic }}"> --}}
                                                {{ $clinic = DB::table('clinic')->where('id', $insurance->clinic)->value('name') }}
                                                {{-- </a> --}}
                                            </td>
                                            <td> {{ $insurance->credentialing }}</td>
                                            <td>
                                                {{-- <a target="_blank" href="{{route('portal')}}" data-rel="{{ $insurance->insurance }}"> --}}
                                                {{ $insu = DB::table('insurances')->where('id', $insurance->insurance)->value('name') }}
                                                {{-- </a> --}}
                                            </td>
                                            <td class="inProcess">
                                                @if ($insurance->status == 'In-Network')
                                                    <span style="background-color: green;color: white;">In Network</span>
                                                @elseif($insurance->status == 'approved')
                                                    <span>Approved</span>
                                                @elseif($insurance->status == 'certified')
                                                    <span>Certified</span>
                                                @elseif($insurance->status == 'In-process')
                                                    <span style="background-color: blue;color: white;"> In process</span>
                                                @elseif($insurance->status == 'denied')
                                                    <span style="background-color: red;color: white;">Denied</span>
                                                @elseif($insurance->status == 'panel-closed')
                                                    <span>Panel Closed</span>
                                                @else
                                                    <span>Other</span>
                                                @endif
                                            </td>
                                            <td>{{ $insurance->effectivedate }} </td>
                                            <td class="providerComments">
                                                <p>{{  str_replace("$","<br><hr>",$insurance->remarks)  }};</p>
                                            </td>
                                            <td>{{ $insurance->remarksdate }}</td>
                                            <td>
                                                <div class="actionImg">
                                                      <button id="1"
                                                              class="btn delete_button font-size-13 viewCredentialings"
                                                              data-rel="{{ $insurance->id }}">
                                                          <img src="../assets/images/eyepng.png" alt="edit">
                                                      </button>
                                                    <button id="1"
                                                        class="btn delete_button font-size-13 editCredentialing"
                                                        data-rel="{{ $insurance->id }}">
                                                        <img src="../assets/images/edit.png" alt="edit">
                                                    </button>
                                                    {{-- <a href="#" class="viewCredentialing" data-rel="{{ $insurance->id }}">
                                                        <img src="assets/images/edit.png" alt="edit">
                                                    </a>
                                                    <a href="#" class="editCredentialing" data-rel="{{ $insurance->id }}">
                                                        <img src="assets/images/delete.png" alt="delete">
                                                    </a> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @forelse ($insurances as $insurance)
                                    @empty
                                        <tr>
                                            <td colspan="8">
                                                <h1 class="text-gray text-center" style="padding: 1%;">No Data Found To
                                                    This Provider</h1>
                                            </td>
                                        </tr>
                                    @endforelse
                                @endforeach
                            @endif
                        </tbody>
                    </table>



                    <input id="detailApiUrls" type="hidden" value="api/v1/insurance/detail">
                </section>
            </div>





        </div>
    </div>

    {{-- @include('partials/pagingInfo',['data'=>$data]) --}}
    <div class="row">
        <div class="col-12">
            <h1 class="text-gray text-center" style="padding: 1%;"></h1>
        </div>
    </div>
    </div>

    {{-- <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-7">
                    <h2>Credentialing <span class="text-gray font-size-16">({{ count($data->data->data) }})</span></h2>
                </div>
                <div class="col-sm-12 col-xl-5">
                    <div class="row">
                        <form method="get" class="col-md-8" action="" id="search_form" name="search_form">
                            <div class="row">
                                <div class="col-md-10 p-0 search-wrap">
                                    <i class="bi bi-search"></i>
                                    <input type="text" name="query" id="query" class="form-control search-input" placeholder="Search Credentialing..." value="{{ $request['query'] ?? '' }}">
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
                            <a href="" class="btn btn-action cbtn col-12" data-bs-toggle="modal" data-bs-target="#myModal">+ Add New Credentialing</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-container">
                <div class="col-12 {{ (count($data->data->data)==0)?'d-none':'' }}">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Clinic </td>
                                <td>Provider</td>
                                <td>Credentialing</td>
                                <td>Insurance</td>
                                <td>Status</td>
                                <td>Effective date</td>
                                <td>Remarks</td>
                                <td>Remarks date</td>
                                <td>ACTION</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->data->data)
                                @foreach ($data->data->data as $insurance)
                                    <tr>
                                        <td>
                                            <a target="_blank" href="{{route('teams')}}" data-rel="{{ $insurance->clinic }}">
                                            {{  $clinic = DB::table('clinic')->where('id',$insurance->clinic)->value('name') }}
                                            </a>
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{route('client')}}" data-rel="{{ $insurance->provider }}">
                                            {{  $provider = DB::table('provider')->where('id',$insurance->provider)->value('name') }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $insurance->credentialing }}
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{route('portal')}}" data-rel="{{ $insurance->insurance }}">
                                            {{  $insu = DB::table('insurances')->where('id',$insurance->insurance)->value('name') }}
                                            </a>
                                         </td>

                                        <td>

                                            @if ($insurance->status == 'In-Network')
                                             <span style="color: #39BE5D">In Network</span>
                                            @elseif($insurance->status == 'approved')
                                                <span style="color: #39BE5D">Approved</span>
                                            @elseif($insurance->status == 'certified')
                                                <span style="color: #39BE5D">Certified</span>
                                            @elseif($insurance->status == 'In-process')
                                                <span style="color: #ffc107">In process</span>
                                            @elseif($insurance->status == 'denied')
                                                <span style="color: #c21919">Denied</span>
                                            @elseif($insurance->status == 'panel-closed')
                                                <span style="color: #c21919">Panel Closed</span>
                                            @else
                                                <span style="color: #ffc107">Other</span>
                                            @endif
                                        </td>
                                        <td>{{ $insurance->effectivedate }}</td>
                                        <td>{!!   $insurance->remarks !!}</td>
                                        <td>{{ $insurance->remarksdate }}</td>
                                        <td>
                                            <button id="1" class="btn delete_button font-size-13 viewCredentialing" data-rel="{{ $insurance->id }}">
                                                <i title="View" style="color: #8D8C9C;" class="bi bi-eye mx-1"></i>
                                            </button> |
                                            <button id="1" class="btn delete_button font-size-13 editCredentialing" data-rel="{{ $insurance->id }}">
                                                <i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i>
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
    </div> --}}

    {{--    MODAL--}}
    @include('modals/add_client')

   {{--
    --}}{{--    MODAL --}}{{--
    @include('modals/add_insurance')--}}
    {{--    MODAL --}}

    <script>
        $(document).ready(function() {
            var flag = 1;
            $(".add-more").click(function() {
                flag++;
                var html = '<div><div class="row phone-row">' +
                    '<div class="col-12 col-md-4">' +
                    '<label for="inputPassword' + flag + '">Remarks Date</label>' +
                    '<input type="date" name="remarksdate[]" class="form-control" id="inputPassword' +
                    flag + '">' +
                    '</div>' +
                    '<div class="col-12 col-md-4">' +
                    '<label for="inputPassword' + flag + '">Remarks </label>' +
                    '<input name="remarks[]" type="text" class="form-control" id="inputPassword2' + flag +
                    '" placeholder="Remarks" >' +
                    '</div>' +
                    '<div class="col-12 col-md-4 mt-auto mb-1"><br>' +
                    '<label class="visually-hidden"></label>' +
                    '<button type="button" class="btn btn-outline-danger w-100 delete-phone" style="font-size: 12px;width: 85px;">Delete</button>' +
                    '</div>' +
                    '</div> </div>';
                $(".phone-wrapper").append(html);
            });


            $("body").on("click", ".delete-phone", function() {
                $(this).closest('.phone-row').remove();
                flag--;
            });
        });
    </script>
@endsection
