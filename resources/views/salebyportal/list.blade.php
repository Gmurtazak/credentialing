@extends('layouts.app')

@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-7">
                    <h2>Sale By Portal <span class="text-gray font-size-16">Month of {{ date('M') }}  </span></h2>
                </div>
            </div>
            <div class="body-container">
                <div class="col-12">
                    <div class="row {{ (count($data->data)==0)?'d-none':'' }}">
                        @if($data)
                            @foreach($data->data as $account)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="card-title font-size-18 mb-0">{{ $account->n }}</h5>
                                        </div>

                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <p class="text-gray font-size-14">


                                                    Bids : <span class="text-dark" style="color: red !important"> {{ $account->b }} </span><br>
                                                    Connects : <span class="text-dark" style="color: red !important"> {{ $account->c }} </span>


                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            @endforeach

                        @endif

                    </div>
                    <div class="row {{ (count($data->data)==0)?'':'d-none' }}">
                        <div class="col-12">
                            <h1 class="text-gray text-center" style="padding: 10%;" >No Data Found</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <input id="detailApiUrl" type="hidden" value="api/v1/account/detail">
    {{--    MODAL--}}
    @include('modals/add_account')
    {{--    MODAL--}}
@endsection
