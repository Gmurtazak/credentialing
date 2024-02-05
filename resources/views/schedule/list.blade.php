@extends('layouts.app')

@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-6">
                    <h2>View Schedule</h2>
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
                        <div class="col p-0">
                            <a href="{{route('schedule.add')}}" class="btn btn-action cbtn col-12">+ Add New Schedule</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-container">
                <div class="col-12" {{ (count($data->data->data)==0)?'d-none':'' }}>
                    <div class="pl-table">
                        <div class="pl-thead tall">
                            <div class="row">
{{--                                <div class="col" style="flex: 0;"></div>--}}
                                <div class="col" style="flex: 1;">SCHEDULE NAME</div>
                                <div class="col" >SCHEDULE HRS/ DAY</div>
                                <div class="col">FROM</div>
                                <div class="col">TO</div>
                                <div class="col">TOTAL WORKING DAYS</div>
                                <div class="col">SCHEDULE HRS/ MONTHS</div>
                                <div class="col">STATUS</div>
                                <div class="col">ACTION</div>
                            </div>
                        </div>
                        <div class="pl-tbody">
                            @if(isset($data) && $data->data)
                                @foreach($data->data->data as $schedule)
                                    <div class="row">
{{--                                        <div class="col" style="flex: 0;">--}}
{{--                                            <div class="form-check p-0">--}}
{{--                                                <input class="form-check-input" type="checkbox"  id="flexCheckDefault" value="{{$schedule->id}}">--}}
{{--                                                <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="col">{{ $schedule->name }}</div>
                                        <div class="col">
                                            {{ $schedule->schedule_hours_day }}
                                        </div>
                                        <div class="col">{{ $schedule->expiry_from }}</div>
                                        <div class="col">{{ $schedule->expiry_to }}</div>
                                        <div class="col">{{ $schedule->total_working_days }}</div>
                                        <div class="col">{{ $schedule->total_working_days*$schedule->schedule_hours_day }}</div>
                                        <div class="col">
                                            @if($schedule->is_active)
                                                <span class="badge bg-active">
                                                     <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>Active
                                                 </span>
                                            @else
                                                <span class="badge bg-inactive">
                                                            <i class="bi bi-dot" aria-expanded="false" data-bs-toggle="dropdown" id="dropdownMenu2"></i>Inactive
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <a href="#" class="mx-3" >
                                                <i class="bi bi-pencil font-size-18"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            @include('partials/pagingInfo',['data'=>$data])
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--    assignQC Assignment --}}
    <div class="modal fade" id="addSchedule"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-box-wrap d-block pt-4 px-2">
                        <div class="login-main row m-0">
                            <h4 class="mb-4">Assign QC</h4>
                            <div class="col-md-12 mb-3">
                                <label for="">QC Assign Date <span class="text-danger">*</span></label>
                                <input name="name" type="date" placeholder="Assign Date" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">QC Assign to <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Select name</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">DOS Assigned <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Select DOS</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="row justify-content-end mx-0 mt-4">
                                <button type="button" class="btn btn-default cbtn col-2" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-action cbtn col-3">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--    assignQC Assignment--}}
@endsection

