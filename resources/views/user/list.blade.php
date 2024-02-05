@extends('layouts.app')

@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-7">

                </div>
                <div class="col-sm-12 col-xl-10">
                    <div class="row">
                        <form method="get" class="col-md-9" action="" id="search_form" name="search_form">
                            <div class="row">
                                <div class="col-md-3 search-wrap">
                                    <h2>Users <span class="text-gray font-size-16">({{ count($data->data->data) }})</span></h2>
                                </div>
                                <div class="col-md-4 search-wrap">
                                    <i class="bi bi-search"></i>
                                    <input type="text" name="query" id="query" class="form-control search-input" placeholder="Search Users..." value="{{ $request['query'] ?? '' }}">
                                </div>
                                <div class="col-md-4 search-wrap">
                                    @php
                                        $teams = App\Models\Team::all();
                                    @endphp
                                    <select name="team" class="form-control search-input" required=""
                                            @if (userRole(Auth::id()) != 'administrator') disabled @endif>
{{--                                        <option value="">Select Team</option>--}}
                                        <option value="0">All Team</option>
                                        @foreach ($teams as $team)
                                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm" style="border: 1px solid #ECEFEF;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                            <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"></path>
                                        </svg>
                                    </button>
                                </div>

                            </div>
                        </form>
                        <div class="col p-0">
                            <a href="{{route('user.add')}}" class="btn btn-action cbtn col-12">+ Add New Users</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-container">
                    <table class="table {{ (count($data->data->data)==0)?'d-none':'' }}">
                        <thead>
                            <tr>

                                <td>USER ID</td>
                                <td>FULL NAME</td>
                                <td>ROLE</td>
                                <td>TEAM</td>
                                <td>DEPARTMENT</td>

                                <td>REPORT TO</td>
                                <td>STATUS</td>
                                <td>ACTION</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data->data->data)
                                @foreach($data->data->data as $user)
                            <tr>

                                <td> {{$user->id}}</td>
                                <td>
                                    <div class="d-flex">
                                       <div class="flex-shrink-0">
                                            <img src="assets/images/Digital_Sales/{{$user->image}}" alt="Sample Image" width="40px" height="40px" style="border-radius: 100%;">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="font-semibold font-size-15 text-dark mb-1">{{$user->name}}</h5>
                                            <p class="font-size-13">
                                                {{$user->email}}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->roles[0]->role ?? 'N/A' }}</td>

                                <td>
                                    <span class="badge bg-blue">
                                    {{ $user->team->name ?? 'N/A' }}
                                     </span>
                                </td>
                                <td>

                                    {{ $user->department->name ?? 'N/A' }}

                                </td>
                                <td>{{ $user->report->name ?? 'N/A' }}</td>
                                <td>
                                    @if($user->is_active)
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
                                    <a href="{{ route('user.edit', ['id'=>$user->id]) }}"  class="btn delete_button font-size-13"><i title="Edit" style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i>
                                        <span  style="color: #8D8C9C;">Edit</span></a>
                                </td>
                            </tr>
                                @endforeach
                            @endif

                        </tbody>



                    </table>
                    @if (count($data->data->data)!=0)
                    @include('partials/pagingInfo',['data'=>$data])
                    @endif
                    <div class="row {{ (count($data->data->data)==0)?'':'d-none' }}">
                        <div class="col-12">
                            <h1 class="text-gray text-center" style="padding: 10%;" >No Data Found</h1>
                        </div>
                    </div>
            </div>
        </div>
    </div>



@endsection
