@extends('layouts.app')
@inject('teams', 'App\Services\Team\TeamService')
@section('content')
<style>
    .highcharts-figure{
        min-width:100%;
        max-width:100%;
    }
    .home .chart-description{
            text-align: center;
            background: #f3f3f3;
            margin: 0;
            font-size: 12px;
            font-weight: 500;
            padding: 4px;
            position:absolute;
            bottom:0;
            width: 100%;
    }
    .home .card .heading{
        font-size:14px;
        font-weight:500;
        padding:10px;
        text-align:center;
        margin-bottom:10px;
        background: #f3f3f3;
    }
    .home .executive-list{
        font-size:13px;
    }

    .home .executive-list img{
        object-fit:contain;
        width: 60px;
        height:60px;
    }
    .home .executive-list .d-flex{
        padding: 10px 10px;
        margin: 10px 0;
        border-bottom: 1px solid #f3f3f3;
    }
    .home .executive-list .d-flex:last-child{
        border-bottom: 0;
    }
    .home div.scroll {
        display: block;
        padding: 4px;
        width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
    }
</style>
    <div class="page-body home">
        <div class="container-fluid">

            <div class="row top-bar">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="col-sm-12 col-xl-7">
                    <h2>{{ __('CREDENTIALING DASHBOARD') }}</h2>
                </div>

            </div>

            <div class="body-container">
            <div class="col-12">

                <div class="row">
                    @if(userRole(\Auth::user()->id) == 'administrator')

                        <div class="mb-4 col-md-4 col-sm-6">
                            <div class="h-100 card">
                                <div class="text-center card-body" style="border: 1px solid #d6d6d6!important;">
                                    <div class="icon icon-xl mx-auto mb-4 bg-danger-light">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                                            <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                                            <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                                        </svg>
                                    </div>
                                    <h4 class="mt-3"><span class="text-danger"></span>
                                        <a href="{{route('teams')}}" style="text-decoration: none; color: black;">  <span class="fw-normal"> CLINIC</span></a>
                                    </h4>
                                    <p class="mb-4"></p>
                                          </div>


                            </div>
                        </div>
                        <div class="mb-4 col-md-4 col-sm-6">
                            <div class="h-100 card">
                                <div class="text-center card-body" style="border: 1px solid #d6d6d6!important;">
                                    <div class="icon icon-xl mx-auto mb-4 bg-danger-light">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-clipboard2-plus" viewBox="0 0 16 16">
                                            <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                                            <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                                            <path d="M8.5 6.5a.5.5 0 0 0-1 0V8H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V9H10a.5.5 0 0 0 0-1H8.5V6.5Z"/>
                                        </svg>
                                    </div>
                                    <h4 class="mt-3"><span class="text-danger"></span>
                                        <a href="{{route('client')}}" style="text-decoration: none; color: black;"> <span class="fw-normal"> PROVIDER</span></a>
                                    </h4>
                                    <p class="mb-4"></p>
                                </div>


                            </div>
                        </div>
                        <div class="mb-4 col-md-4 col-sm-6">
                            <div class="h-100 card">
                                <div class="text-center card-body" style="border: 1px solid #d6d6d6!important;">
                                    <div class="icon icon-xl mx-auto mb-4 bg-danger-light">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-file-medical" viewBox="0 0 16 16">
                                            <path d="M8.5 4.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L7 6l-.549.317a.5.5 0 1 0 .5.866l.549-.317V7.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L9 6l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V4.5zM5.5 9a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                                        </svg>
                                    </div>
                                    <h4 class="mt-3"><span class="text-danger"></span>
                                        <a href="{{route('portal')}}" style="text-decoration: none; color: black;"> <span class="fw-normal"> INSURANCE</span></a>
                                    </h4>
                                    <p class="mb-4"></p>
                                </div>


                            </div>
                        </div>
                        <div class="mb-4 col-md-4 col-sm-6">
                            <div class="h-100 card">
                                <div class="text-center card-body" style="border: 1px solid #d6d6d6!important;">
                                    <div class="icon icon-xl mx-auto mb-4 bg-danger-light">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-ui-checks-grid" viewBox="0 0 16 16">
                                            <path d="M2 10h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm9-9h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm0 9a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-3zm0-10a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-3zM2 9a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H2zm7 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-3zM0 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.354.854a.5.5 0 1 0-.708-.708L3 3.793l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0l2-2z"/>
                                        </svg>
                                    </div>
                                    <h4 class="mt-3"><span class="text-danger"></span>
                                        <a href="{{route('role')}}" style="text-decoration: none; color: black;"> <span class="fw-normal"> ROLES</span> </a>
                                    </h4>
                                    <p class="mb-4"></p>
                                </div>


                            </div>
                        </div>
                        <div class="mb-4 col-md-4 col-sm-6">
                            <div class="h-100 card">
                                <div class="text-center card-body" style="border: 1px solid #d6d6d6!important;">
                                    <div class="icon icon-xl mx-auto mb-4 bg-danger-light">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                        </svg>
                                    </div>
                                    <h4 class="mt-3"><span class="text-danger"></span>
                                        <a href="{{route('user')}}" style="text-decoration: none; color: black;"><span class="fw-normal"> USERS</span> </a>
                                    </h4>
                                    <p class="mb-4"></p>
                                </div>


                            </div>
                        </div>
                        <div class="mb-4 col-md-4 col-sm-6">
                            <div class="h-100 card">
                                <div class="text-center card-body" style="border: 1px solid #d6d6d6!important;">
                                    <div class="icon icon-xl mx-auto mb-4 bg-danger-light">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pie-chart" viewBox="0 0 16 16">
                                            <path d="M7.5 1.018a7 7 0 0 0-4.79 11.566L7.5 7.793V1.018zm1 0V7.5h6.482A7.001 7.001 0 0 0 8.5 1.018zM14.982 8.5H8.207l-4.79 4.79A7 7 0 0 0 14.982 8.5zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                        </svg>
                                    </div>
                                    <h4 class="mt-3"><span class="text-danger"></span>
                                        <a href="{{route('insurance')}}" style="text-decoration: none; color: black;"> <span class="fw-normal"> CREDENTIALING</span> </a>
                                    </h4>
                                    <p class="mb-4"></p>
                                </div>


                            </div>
                        </div>





                    @endif
                </div>


            </div>
        </div>
        </div>
    </div>


@endsection
