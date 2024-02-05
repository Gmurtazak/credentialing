@extends('layouts.app')

@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-6">
                    <h2>Monthly Report ({{ count($data->data->data) }})</h2>
                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="row">
                        <form method="get" class="col-8" action="" id="search_form" name="search_form">
                            <div class="row">
                                <div class="col-md-10 p-0 search-wrap">
                                    <i class="bi bi-search"></i>
                                    <input type="text" name="keyword" id="keyword" class="form-control search-input" placeholder="Search Here..." value="">
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

                    </div>
                </div>
            </div>
            <div class="body-container">
                <div class="col-12">
                    <div class="">
                        <div class="pl-thead tall"  {{ (count($data->data->data)==0)?'d-none':'' }}>
                            <div class="row">
                                <div class="col">Month</div>
                                <div class="col" >Team</div>
                                <div class="col">Target</div>
                                <div class="col">Sale</div>
                                <div class="col">Target remaining</div>
                                <div class="col">Detail</div>
                            </div>
                        </div>
                        <div class="pl-tbody">
                            @if($data->data->data)
                                @foreach($data->data->data as $teamtargets)
                            <div class="row">

                                <div class="col"> {{! $m = DateTime::createFromFormat("Y-m-d",$teamtargets->month."-01")->format("Y-M")}}
                                    {{$m}}</div>
                                <div class="col">  {{ $teamtargets->team->name }}</div>

                                <div class="col">  {{$a= $teamtargets->target }}</div>
                                <div class="col">{{ $b=$teamtargets->totalTarget }}</div>
                                <div class="col">{{ $c = $a-$b }} </div>
                                <div class="col">
                                        <span class="badge bg-active" style="width: 95px;">
                                             <i class="bi bi-eye font-size-18" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>Active
                                         </span>
                                </div>

                            </div>
                                    <br>
                                @endforeach
                            @endif
                        </div>
                        @if (count($data->data->data)!=0)
                            @include('partials/pagingInfo',['data'=>$data])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

