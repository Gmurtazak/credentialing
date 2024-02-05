@extends('layouts.app')
@inject('users', 'App\Services\User\UserService')
@inject('teams', 'App\Services\Team\TeamService')
@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">

                @if(isBidder(auth()->id()) != TRUE)
                        @if(!empty($data->stats[0]))
                    @php
                        $allProjectSales = DB::table('project_sales')->sum('project_price');
                    @endphp
                    <div class="col">
                        <div style="background: #f2f2f2;padding:12px;border-radius:10px;">
                            No.Project<p class="text-gray font-size-13"></p>
                            <h1 class="text-dark mb-0">{{ $data->stats[0]->totalProject }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div style="background: #c21919;padding:12px;border-radius:10px;">
                            P.Price<p class="text-gray font-size-13"></p>
                            <h1 class="text-dark mb-0">${{ $data->stats[0]->totalAmountProject }} </h1>
                        </div>
                    </div>
                    <div class="col">
                        <div style="background: #f2f2f2;padding:12px;border-radius:10px;">
                            S.Amount<p class="text-gray font-size-13"></p>
                            <h1 class="text-dark mb-0"> ${{ $data->stats[0]->totalSaleAmount }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div style="background: #f2f2f2;padding:12px;border-radius:10px;">
                            A.Refund<p class="text-gray font-size-13"></p>
                            <h1 class="text-dark mb-0"> ${{ $data->stats[0]->totalAmountRefund }} </h1>
                        </div>
                    </div>
                    <div class="col">
                        <div style="background: #f2f2f2;padding:12px;border-radius:10px;">
                            A.Received<p class="text-gray font-size-13"></p>
                            <h1 class="text-dark mb-0"> ${{ $data->stats[0]->totalAmountReceived }} </h1>
                        </div>
                    </div>
                    <div class="col">
                        <div style="background: #f2f2f2;padding:12px;border-radius:10px;">
                            A. Due<p class="text-gray font-size-13"></p>
                            <h1 class="text-dark mb-0"> ${{ $data->stats[0]->totalAmountDue }}</h1>
                        </div>
                    </div>
                        @endif
                @else

                @endif

                <div class="col-sm-12 col-xl-12 mt-4">
                    <div class="row">
                        <form method="get" class="col" action="" id="search_form" name="search_form">
                            <div class="row">
                                @if (isset($request['non_sale']) && $request['non_sale']=='1')
                                    <input type="hidden" name="non_sale" value="1">
                                @else
                                @endif
                                <div class="col-md-3 px-0 search-wrap">
                                    <i class="bi bi-search"></i>
                                    <input type="text" name="query" id="query" class="form-control search-input"
                                           placeholder="Search Project Sale..." value="{{ $request['query'] ?? '' }}">
                                </div>
                                <div class="col-md-3 search-wrap">

                                    <select name="team" class="form-control search-input" required=""
                                            @if (userRole(Auth::id()) != 'administrator') disabled @endif>
                                        <option value="">Select Team</option>
                                        <option value="">All Team</option>
                                        @foreach ($teams->all() as $team)
                                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 search-wrap">
                                    <input type="text" name="dates" autocomplete="off"
                                           class="form-control search-input" placeholder="Select Date range"
                                           value="{{ $request['dates'] ?? '' }}">
                                </div>
                                    @if (isset($request['non_sale']) && $request['non_sale']=='1')
                                    <div class="col-md-3 search-wrap">
                                        <select name="bidder" class="form-control search-input" required=""
                                                @if (userRole(Auth::id()) != 'administrator') disabled @endif>
                                            <option value="">Select Bidder</option>
                                            <option value="">All User</option>
                                            @foreach ($users->all() as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                  <div class="col-md-3 search-wrap">

                                        <select name="closer" class="form-control search-input" required=""
                                                @if (userRole(Auth::id()) != 'administrator') disabled @endif>
                                            <option value="">Select Closer</option>
                                            <option value="">All User</option>
                                            @foreach ($users->all() as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                            </div>

                        </form>

                    </div>
                </div>

                    <div class="col-sm-12 col-xl-12 mt-4">
                        <div class="row">
                            <div class="col-2">

                                <a href="{{ route('sale.add') }}" class="btn btn-action cbtn col-12">+ Add New Project Sales</a>
                            </div>
                            <div class="col-2">

                                @if(isBidder(auth()->id()) != TRUE)
                                    @if (isset($request['non_sale']) && $request['non_sale']=='1')
                                        <a href="{{url('api/v1/sale/export-non-sale')}}" class="btn btn-action cbtn col-12" > Download CSV </a>
                                    @else
                                        <a href="{{url('api/v1/sale/export')}}" class="btn btn-action cbtn col-12" > Download CSV </a>
                                    @endif

                                @endif
                            </div>

                        </div>
                    </div>

            </div>

            <div class="body-container">
                <ul class="nav nav-tabs mb-4">

                    @if(isBidder(auth()->id()) != TRUE)

                        <li class="nav-item">
                            <a class="nav-link  @if (isset($request['non_sale']) && $request['non_sale']=='1') active
                            @else
                            @endif
                                "
                               aria-current="page" href="{{ route('sale') }}?non_sale=1">Non Sale</a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link
                        @if (isset($request['non_sale']) && $request['non_sale']=='1')
                                @else
                                    active @endif
                                    "href="{{ route('sale') }}">Sale</a>

                        </li>
                    @endif
                </ul>
                <div>
                    <div class="row" style="overflow: auto;">

                        <table class="table sm-table">
                            <thead>
                            <tr>
                                {{-- <td></td> --}}
                                <td>Project Name </td>
                                <td>Project Type </td>
                                <td>Client</td>
                                <td>P. Price</td>
                                <td>Our Bid</td>

                                <td>Contact Date</td>



                                @if(isBidder(auth()->id()) != TRUE)

                                    @if (isset($request['non_sale']) && $request['non_sale']=='1')

                                    @else
                                        <td>Portal Name</td>
                                        <td>S. Amount</td>
                                        <td>A. Received</td>
                                        <td>A. Refund</td>
                                        <td>A. Due</td>
                                    @endif

                                    <td>Bidder </td>
                                    @if (isset($request['non_sale']) && $request['non_sale']=='1')

                                    @else
                                    <td>Closer </td>
                                    @endif
                                    <td>Team </td>
                                @endif



                                <td>CONVERSION</td>
                                {{--  <td>STATUS</td>--}}
                                @if(isBidder(auth()->id()) != TRUE)
                                    <td>ACTION</td>
                                    <td>Bidding Log</td>
                                @endif
                            </tr>
                            </thead>
                            <tbody>


                                @if ($data)

                                    @foreach ($data->data->data as $sale)
                                        <tr>
                                            {{-- <td>
                                                <div class="form-check p-0">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                    </label>
                                                </div>
                                            </td> --}}
                                            <td>{{ $sale->project_name }}</td>
                                            <td>{{ $sale->project_type->type }}</td>
                                            <td>{{ $sale->client->name }}</td>
                                            <td>{{ $sale->project_price }}</td>
                                            <td>{{ $sale->our_bid }}</td>

                                            <td>{{ $sale->contact_date }}</td>
                                            @if(isBidder(auth()->id()) != TRUE)


                                                @if (isset($request['non_sale']) && $request['non_sale']=='1')

                                                @else
                                                    <td>


                                                        @if (!empty($sale->project_sale_detail->portal->id))
                                                            {{ $sale->project_sale_detail->portal->name }}
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!empty($sale->project_sale_detail->sale_amount))
                                                            {{ $sale->project_sale_detail->sale_amount }}
                                                        @else
                                                        @endif
                                                    </td>


                                                    <td>
                                                        @if (!empty($sale->project_sale_detail->amount_received))
                                                            {{ $sale->project_sale_detail->amount_received }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>


                                                    <td>
                                                        @if (!empty($sale->project_sale_detail->amount_refund))
                                                            {{ $sale->project_sale_detail->amount_refund }}
                                                        @else
                                                        @endif
                                                    </td>



                                                    <td>
                                                        @if (!empty($sale->project_sale_detail->amount_due))
                                                            {{ $sale->project_sale_detail->amount_due }}
                                                        @else
                                                        @endif
                                                    </td>
                                                @endif

                                                <td>{{ $sale->created_by->name }}</td>
                                                @if (isset($request['non_sale']) && $request['non_sale']=='1')

                                                @else
                                                    <td>
                                                        @if (!empty($sale->project_sale_agent_detail[0]->closer_id))
                                                            {{ $sale->project_sale_agent_detail[0]->closer->name }}
                                                        @else
                                                        @endif
                                                    </td>
                                                @endif


                                                <td>
                                                    @if (!empty($sale->project_sale_agent_detail[0]->team_id))
                                                        {{ $sale->project_sale_agent_detail[0]->team->name }}
                                                    @else
                                                        {{ $sale->team->name }}
                                                    @endif
                                                </td>
                                            @endif

                                            <td>
                                                @if ($sale->is_convertion)
                                                    <span class="badge bg-active">
                                                           Yes
                                                        </span>
                                                @else
                                                    <span class="badge bg-inactive">
                                                            in-progress
                                                        </span>
                                                @endif
                                            </td>

                                            {{-- <td>
                                               @if ($sale->is_active)
                                                   <span class="badge bg-active">
                                                          complete
                                                       </span>
                                               @else
                                                   <span class="badge bg-inactive">
                                                           in-progress
                                                       </span>
                                               @endif
                                           </td>--}}
                                            @if(isBidder(auth()->id()) != TRUE)

                                                <td>
                                                    <a href="{{ route('sale.edit', ['id' => $sale->id]) }}"
                                                       class="btn delete_button font-size-13"><i title="Edit"
                                                                                                 style="color: #8D8C9C;" class="bi bi-pencil mx-1"></i>
                                                        <span style="color: #8D8C9C;">Edit</span></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('sale.log', ['id' => $sale->id]) }}"
                                                       class="btn delete_button font-size-13">
                                                        <span style="color: #8D8C9C;">Bidding Log</span></a>
                                                </td>

                                            @endif

                                        </tr>
                                    @endforeach
                                @endif

                            </div>
                            </tbody>
                        </table>
                    </div>

                    @include('partials/pagingInfo', ['data' => $data])


                </div>
            </div>
        </div>
    </div>
    </div>



@endsection
