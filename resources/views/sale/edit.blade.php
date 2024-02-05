@extends('layouts.app')

@section('content')
    @inject('projecttype', 'App\Services\ProjectType\ProjectTypeService')
    @inject('client', 'App\Services\Client\ClientService')
    @inject('country', 'App\Models\Country')
    @inject('account', 'App\Services\Account\AccountService')
    @inject('portal', 'App\Services\Portal\PortalService')
    @inject('user', 'App\Services\User\UserService')
    @inject('team', 'App\Services\Team\TeamService')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <form method="post" class="theme-form" role="form"  action="{{route('projectsale-update')}}" enctype="multipart/form-data">
                @csrf
                <input name="apiUrl" type="hidden" value="api/v1/project_sale/update">

                <input name="id" id="id" type="hidden" value="{{$sale->id}}">
                <input name="apiUrlMethod" type="hidden" value="POST">
                <input name="is_active" type="hidden" value="1">
                <input name="created_by" type="hidden" value="{{$sale->created_by}}">
                <input name="isForm" type="hidden" value="1">
                <div class="row top-bar">
                    <div class="col-sm-12 col-xl-7">
                        <h2>Update Project</h2>
                    </div>
                    <div class="col-sm-12 col-xl-5">
                        <div class="row">
                            <div class="row justify-content-end m-0">
                                <a type="button" class="btn btn-default cbtn col-2" href="{{route('sale')}}" >Close</a>
                                <button type="submit" class="btn btn-action cbtn col-2">Update Project</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="login-box-wrap d-block p-4" style="background-color: #F5F5F5;border-radius: 10px;">
                                <div class="login-main">
                                    <h4 class="mb-4">Project 1</h4>
                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                        <div class="mb-3">
                                            <label for="">Project Name <span class="text-danger">*</span></label>
                                            <input name="project_name" type="text" placeholder="Enter Project Name" class="form-control" required=""  value="{{$sale->project_name}}">
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <label for="">Project Name <span class="text-danger">*</span></label>
                                            <input name="project_name" type="text" placeholder="Enter Project Name" class="form-control" required=""  value="{{$sale->project_name}}" readonly>
                                        </div>
                                    @endif
                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                        <div class="mb-3">
                                            <label for="">Project Type<span class="text-danger">*</span></label>
                                            <select name="project_type_id" class="form-control" required>
                                                <option value="">Select Project Type</option>
                                                @foreach($projecttype->all() as $projecttype)
                                                    <option value="{{$projecttype->id}}" {{ $sale->project_type_id == $projecttype->id ? "selected" : "" }}>{{ Str::title($projecttype->type) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <label for="">Project Type<span class="text-danger">*</span></label>
                                            <select name="project_type_id" class="form-control" required readonly>
                                                <option value="">Select Project Type</option>
                                                @foreach($projecttype->all() as $projecttype)
                                                    <option value="{{$projecttype->id}}" {{ $sale->project_type_id == $projecttype->id ? "selected" : "" }}>{{ Str::title($projecttype->type) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                        <div class="mb-3">
                                            <label for="">Project Details <span class="text-danger">*</span></label>
                                            <textarea name="project_details" rows="4" cols="50" class="form-control" required="" >{{$sale->project_details}}</textarea>
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <label for="">Project Details <span class="text-danger">*</span></label>
                                            <textarea name="project_details" rows="4" cols="50" class="form-control" required="" readonly>{{$sale->project_details}}</textarea>
                                        </div>
                                    @endif
                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                        <div class="mb-3">
                                            <label for="">Client Name <span class="text-danger">*</span></label>
                                            <input id="file_id" name="client_id"  type="hidden" value="{{$sale->client->id}}" required="">
                                            <input id="file_field" name="name" type="text" placeholder="Enter Client Name" value="{{$sale->client->name}}"  class="form-control">
                                        </div>
                                       <!-- <div class="mb-3">
                                            <label for="">Client Name <span class="text-danger">*</span></label>
                                            <input  id="name" name="client_id" type="hidden" value="{{$sale->client->id}}" required="">
                                            <input  id="name" name="name" type="text" placeholder="Enter Client Name" value="{{$sale->client->name}}"  class="form-control" id="exampleInputPassword1">
                                        </div>-->
                                    @else

                                        <div class="mb-3">
                                            <label for="">Client Name <span class="text-danger">*</span></label>
                                            <input id="file_id" name="client_id"  type="hidden" value="{{$sale->client->id}}" required="">
                                            <input id="file_field" name="name" type="text" placeholder="Enter Client Name" value="{{$sale->client->name}}"  class="form-control">
                                        </div>
                                    @endif
                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Country <span class="text-danger">*</span></label><br>
                                                <input id="country_selector" name="country" type="text" style="border: none;" value="{{$sale->country}}">
                                                <div class="form-item" style="display:none;" >
                                                    <input type="text" id="country_selector_code" data-countrycodeinput="1" readonly="readonly" placeholder="Selected country code will appear here" />
                                                    <label for="country_selector_code">...and the selected country code will be updated here</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="">City <span class="text-danger">*</span></label><br>
                                                <input name="city" type="text" placeholder="Enter City" class="form-control" value="{{$sale->city}}" required="">
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Country <span class="text-danger">*</span></label><br>
                                                <input id="country_selector" name="country" type="text" style="border: none;" value="{{$sale->country}}" readonly>
                                                <div class="form-item" style="display:none;">
                                                    <input type="text" id="country_selector_code" data-countrycodeinput="1" readonly="readonly" placeholder="Selected country code will appear here" />
                                                    <label for="country_selector_code">...and the selected country code will be updated here</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="">City <span class="text-danger">*</span></label><br>
                                                <input name="city" type="text" placeholder="Enter City" class="form-control" value="{{$sale->city}}" required="" readonly>
                                            </div>
                                        </div>
                                    @endif
                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Project Pricing <span class="text-danger">*</span></label>
                                                <input name="project_price" type="text" placeholder="Enter Project Pricing" class="form-control" required="" value="{{$sale->project_price}}">
                                            </div>
                                            <div class="col">
                                                <label for=""> Rate method <span class="text-danger">*</span></label>
                                                <select name="rate_method" class="form-control" aria-label="">
                                                    <option value="{{$sale->rate_method}}">{{$sale->rate_method}}</option>
                                                    <option value="fixed">Fixed</option>
                                                    <option value="perhour">Per hour</option>
                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Project Pricing <span class="text-danger">*</span></label>
                                                <input name="project_price" type="text" placeholder="Enter Project Pricing" class="form-control" required="" value="{{$sale->project_price}}" readonly>
                                            </div>
                                            <div class="col">
                                                <label for=""> Rate method <span class="text-danger">*</span></label>
                                                <select name="rate_method" class="form-control" aria-label="" readonly="">
                                                    <option value="{{$sale->rate_method}}">{{$sale->rate_method}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                        <div class="mb-3">
                                            <label for="">Our Bid <span class="text-danger">*</span></label>
                                            <input name="our_bid" type="text" placeholder="Enter Our Bid" class="form-control" required="" value="{{$sale->our_bid}}">
                                        </div>

                                    @else
                                        <div class="mb-3">
                                            <label for="">Our Bid <span class="text-danger">*</span></label>
                                            <input name="our_bid" type="text" placeholder="Enter Our Bid" class="form-control" required="" value="{{$sale->our_bid}}" readonly>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="login-box-wrap d-block p-4" style="background-color: #F5F5F5;border-radius: 10px;">
                                <div class="login-main">
                                    <h4 class="mb-4">Project Details</h4>
                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                        <div class="mb-3">
                                            <label for="">Project link <span class="text-danger">*</span></label>
                                            <input name="project_link" type="text" placeholder="Project link" class="form-control" required="" value="{{$sale->project_link}}">
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <label for="">Project link <span class="text-danger">*</span></label>
                                            <input name="project_link" type="text" placeholder="Project link" class="form-control" required="" value="{{$sale->project_link}}" readonly>
                                        </div>
                                    @endif
                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                        <div class="mb-3">
                                            <label for="">Trello Link<span class="text-danger">*</span></label>
                                            <input name="trello_link" type="text" placeholder="Trello Link"
                                                   class="form-control" required=""  value="{{$sale->trello_link}}">
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <label for="">Trello Link<span class="text-danger">*</span></label>
                                            <input name="trello_link" type="text" placeholder="Trello Link"
                                                   class="form-control" required="" value="{{$sale->trello_link}}" readonly>
                                        </div>
                                    @endif
                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                        <div class="mb-3">
                                            <label for="">Contact Date <span class="text-danger">*</span></label>
                                            <input name="contact_date" type="date" placeholder="Date" class="form-control" required="" value="{{$sale->contact_date}}">
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <label for="">Contact Date <span class="text-danger">*</span></label>
                                            <input name="contact_date" type="date" placeholder="Date" class="form-control" required="" value="{{$sale->contact_date}}" readonly>
                                        </div>
                                    @endif
                                    <script>

                                        $(function() {
                                            $('input[name="is_convertion"]').on('click', function() {
                                                if ($(this).val() == 'yes') {
                                                    $('#hide').hide();
                                                }
                                                else {
                                                    $('#hide').show();
                                                }
                                            });
                                            $('input[name="is_meeting_requested"]').on('click', function() {
                                                if ($(this).val() == 'option1') {
                                                    $('#hides').show();
                                                }
                                                else {
                                                   $('#hides').hide();
                                                }
                                            });
                                        });
                                    </script>
                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                        <div class="mb-3">
                                            <label for="">Meeting Request <span class="text-danger">*</span></label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" {{ ($sale->is_meeting_requested==1)?'checked':'' }} type="radio"  name="is_meeting_requested" id="inlineRadio1" value="option1">
                                                <label class="form-check-label text-gray" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" {{ ($sale->is_meeting_requested==0)?'checked':'' }} type="radio"  name="is_meeting_requested" id="inlineRadio2" value="option2">
                                                <label class="form-check-label text-gray" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                        <div id="hides">
                                            <div class="mb-3">
                                                <label for="">Meeting Date <span class="text-danger">*</span></label>
                                                <input name="meeting_datetime" type="date" placeholder="Date" class="form-control" required="" value="{{$sale->meeting_datetime}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Meeting Status <span class="text-danger">*</span></label>
                                                <select name="meeting_status" class="form-control" aria-label="">

                                                    <option value="{{$sale->meeting_status}}" {{ $sale->meeting_status == 0 ? "selected" : "" }}>Pending</option>
                                                    <option value="{{$sale->meeting_status}}" {{ $sale->meeting_status == 1 ? "selected" : "" }}>Complete</option>

                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <label for="">Meeting Request <span class="text-danger">*</span></label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" {{ ($sale->is_meeting_requested==1)?'checked':'' }} type="radio"  name="is_meeting_requested" id="inlineRadios" value="option1" readonly>
                                                <label class="form-check-label text-gray" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" {{ ($sale->is_meeting_requested==0)?'checked':'' }} type="radio"  name="is_meeting_requested" id="inlineRadio2" value="option2" readonly>
                                                <label class="form-check-label text-gray" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                        <div id="hides">
                                            <div class="mb-3">
                                                <label for="">Meeting Date <span class="text-danger">*</span></label>
                                                <input name="meeting_datetime" type="date" placeholder="Date" class="form-control" required="" value="{{$sale->meeting_datetime}}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Meeting Status <span class="text-danger">*</span></label>
                                                <select name="meeting_status" class="form-control" aria-label="" readonly>

                                                    <option value="{{$sale->meeting_status}}" {{ $sale->meeting_status == 0 ? "selected" : "" }}>Pending</option>
                                                    <option value="{{$sale->meeting_status}}" {{ $sale->meeting_status == 1 ? "selected" : "" }}>Complete</option>

                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                        <div class="mb-3">
                                            <label for="">Comments<span class="text-danger">*</span></label>
                                            <input name="comments" type="text" placeholder="Comments..." class="form-control" required="" value="{{$sale->comments}}">
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <label for="">Comments<span class="text-danger">*</span></label>
                                            <input name="comments" type="text" placeholder="Comments..." class="form-control" required="" value="{{$sale->comments}}" readonly>
                                        </div>
                                    @endif

                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                        <div class="mb-3">
                                            <label for="">Conversion <span class="text-danger">*</span></label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" {{ ($sale->is_convertion==1)?'checked':'' }} type="radio"  name="is_convertion" id="inlineRadio1" value="yes">
                                                <label class="form-check-label text-gray" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" {{ ($sale->is_convertion==0)?'checked':'' }} type="radio"  name="is_convertion" id="inlineRadio2" value="no">
                                                <label class="form-check-label text-gray" for="inlineRadio2">No</label>
                                            </div>
                                        </div>

                                        @if($sale->is_convertion==0)
                                            <div id="hide">
                                            <div class="mb-3">
                                                <label for="">Reason (If No conversion)<span class="text-danger">*</span></label>
                                                <select name="reason" class="form-control" aria-label="">
                                                    <option value="{{$sale->reason}}">{{$sale->reason}}</option>
                                                    <option value="no_action">no action</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="">Reason Detail (If No conversion)<span class="text-danger">*</span></label>
                                                <input name="reason_details" type="text" placeholder="Reason Detail..." class="form-control" value="{{$sale->reason_details}}">
                                            </div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="mb-3">
                                            <label for="">Conversion <span class="text-danger">*</span></label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" {{ ($sale->is_convertion==1)?'checked':'' }} name="is_convertion" id="inlineRadio1" value="yes" readonly>
                                                <label class="form-check-label text-black-50" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" {{ ($sale->is_convertion==0)?'checked':'' }} name="is_convertion" id="inlineRadio2" value="no" readonly>
                                                <label class="form-check-label text-black-50" for="inlineRadio2">No</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" checked name="is_convertion" id="inlineRadio3" value="2" readonly>
                                                <label class="form-check-label text-black-50" for="inlineRadio3">Bidding Process</label>
                                            </div>
                                        </div>

                                        @if($sale->is_convertion==0)
                                            <div id="hide">
                                            <div class="mb-3">
                                                <label for="">Reason (If No conversion)<span class="text-danger">*</span></label>
                                                <select name="reason" class="form-control" aria-label="" readonly>
                                                    <option value="{{$sale->reason}}">{{$sale->reason}}</option>
                                                    <option value="no_action">no action</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="">Reason Detail (If No conversion)<span class="text-danger">*</span></label>
                                                <input name="reason_details" type="text" placeholder="Reason Detail..." class="form-control" value="{{$sale->reason_details}}" readonly>
                                            </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="">Team <span class="text-danger">*</span></label>
                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                        <select name="team_id" id="wa_assigned_to" class="form-control" required readonly="readonly">
                                            <option value="">Select Team</option>
                                            @foreach ($team->all() as $team)
                                                <option {{$sale->team_id == $team->id ? 'Selected' : '' }} value="{{ $team->id }}">{{ Str::title($team->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select name="team_id" id="wa_assigned_to" class="form-control" required readonly="readonly">
                                            <option value="">Select Team</option>
                                            @foreach ($team->all() as $team)
                                                <option {{$sale->team_id == $team->id ? 'Selected' : '' }} value="{{ $team->id }}">{{ Str::title($team->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                    <div class="mb-3">
                                        <label for="">Portal Name <span class="text-danger">*</span></label>
                                        <input  id="protal_value" type="hidden" value="{{$sale->portal_id}}">
                                        <select name="portal_id" id="portal_name_get"  class="form-control" required readonly="readonly">
                                            <option value="">Select Portal Name</option>
                                            @foreach ($portal->all() as $portal)
                                                <option  {{$sale->portal_id == $portal->id ? 'Selected' : '' }} value="{{ $portal->id }}">{{ Str::title($portal->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else

                                    <div class="mb-3">
                                        <label for="">Portal Name <span class="text-danger">*</span></label>
                                        <input  id="protal_value" type="hidden" value="{{$sale->portal_id}}">
                                        <select name="portal_id" id="portal_name_get"  class="form-control" required readonly="readonly">
                                            <option value="">Select Portal Name</option>
                                            @foreach ($portal->all() as $portal)
                                                <option  {{$sale->portal_id == $portal->id ? 'Selected' : '' }} value="{{ $portal->id }}">{{ Str::title($portal->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>



                    @if($sale->is_convertion==1)
                        <div class="body-container">
                            <div class="row">
                                @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                    <div class="col-md-6">
                                        <div class="login-box-wrap d-block p-4" style="background-color: #F5F5F5;border-radius: 10px;">
                                            <div class="login-main">
                                                <h4 class="mb-4">Sales Details</h4>

                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <label for="">Account Name <span class="text-danger">*</span></label>

                                                        @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                                            <select name="account_id"  class="form-control">
                                                                <option value="">Select Account Name</option>
                                                                @foreach($account->all() as $account)
                                                                    <option value="{{$account->id}}" {{ $account->id == $sale->project_sale_detail->account_id ? "selected" : "" }}>{{ Str::title($account->name) }}</option>
                                                                @endforeach
                                                            </select>
{{--                                                            <select name="account_id"  class="form-control" required>--}}
{{--                                                                <option value="">Select Account Name</option>--}}
{{--                                                                @foreach($sale->useraccount['0']->accounts as $account)--}}
{{--                                                                        <option value="{{$account->id}}"  >{{ Str::title($account->name) }}</option>--}}
{{--                                                                @endforeach--}}
{{--                                                            </select>--}}
                                                        @else
                                                            <select name="account_id"  class="form-control" required readonly="">
                                                                <option value="">Select Account Name</option>
                                                                @foreach($account->all() as $account)
                                                                    <option value="{{$account->id}}" {{ $account->id == $sale->project_sale_detail->account_id ? "selected" : "" }}>{{ Str::title($account->name) }}</option>
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                                    <div class="mb-3">
                                                        <label for="">Date <span class="text-danger">*</span></label>
                                                        @if(empty($sale->project_sale_detail->created_at))
                                                            <input name="date" type="date" placeholder="Date" value="" class="form-control" required="">
                                                        @else
                                                            <input name="date" type="date" placeholder="Date" value="{{date('Y-m-d', strtotime($sale->project_sale_detail->created_at)),"Y-m-d"}}" class="form-control" required="">

                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="mb-3">
                                                        <label for="">Date <span class="text-danger">*</span></label>
                                                        <input name="date" type="date" placeholder="Date" value="{{date('Y-m-d', strtotime($sale->project_sale_detail->created_at)),"Y-m-d"}}" class="form-control" required="" readonly>
                                                    </div>
                                                @endif
                                                @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                                    <div class="mb-3">
                                                        <label for="">Sale Amount <span class="text-danger">*</span></label>
                                                        @if(empty($sale->project_sale_detail->sale_amount))
                                                            <input name="sale_amount" id="sale_amount" type="text" value="" placeholder="Enter Sale Amount " class="form-control" required="">
                                                        @else
                                                            <input name="sale_amount" id="sale_amount" type="text" value="{{$sale->project_sale_detail->sale_amount}}" placeholder="Enter Sale Amount " class="form-control" required="">

                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="mb-3">
                                                        <label for="">Sale Amount <span class="text-danger">*</span></label>
                                                        <input name="sale_amount" id="sale_amount" type="text" value="{{$sale->project_sale_detail->sale_amount}}" placeholder="Enter Sale Amount " class="form-control" required="" readonly>
                                                    </div>
                                                @endif

                                                @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                                    <div class="mb-3">
                                                        <label for="">Portal fees % <span class="text-danger">* (Double click on textbox)</span></label>
                                                        @if(empty($sale->project_sale_detail->portal_fee_percentage))
                                                            <input name="portal_fee_percentage" id="portal_fees" type="text" placeholder="Enter Portal fees" value="" class="form-control" required="" onclick="getvalue()">
                                                        @else
                                                            <input name="portal_fee_percentage" id="portal_fees" type="text" placeholder="Enter Portal fees" value="{{$sale->project_sale_detail->portal_fee_percentage}}" class="form-control" required="" onclick="getvalue()">

                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="mb-3">
                                                        <label for="">Portal fees % <span class="text-danger">* (Double click on textbox)</span></label>
                                                        <input name="portal_fee_percentage" id="portal_fees" type="text" placeholder="Enter Portal fees" value="{{$sale->project_sale_detail->portal_fee_percentage}}" class="form-control" required="" readonly>
                                                    </div>
                                                @endif
                                                @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                                    <div class="mb-3">
                                                        <label for="">Amount Due<span class="text-danger">*</span></label>
                                                        @if(empty($sale->project_sale_detail->amount_due))
                                                            <input name="amount_due" id="amount_due" type="text" placeholder="Enter Amount Due" value=""  class="form-control" required="">
                                                        @else
                                                            <input name="amount_due" id="amount_due" type="text" placeholder="Enter Amount Due" value="{{$sale->project_sale_detail->amount_due}}"  class="form-control" required="">

                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="mb-3">
                                                        <label for="">Amount Due<span class="text-danger">*</span></label>

                                                        <input name="amount_due" id="amount_due" type="text" placeholder="Enter Amount Due" value="{{$sale->project_sale_detail->amount_due}}"  class="form-control" required="" readonly>

                                                    </div>
                                                @endif

                                                @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                                    <div class="mb-3">
                                                        <label for="">Amount Received<span class="text-danger">*</span></label>
                                                        @if(empty($sale->project_sale_detail->amount_received))
                                                            <input name="amount_received" id="amount_received" type="text" placeholder="Enter Amount Received" class="form-control" required="">
                                                        @else
                                                            <input name="amount_received" id="amount_received" type="text" placeholder="Enter Amount Received" value="{{$sale->project_sale_detail->amount_received}}" class="form-control" required="">
                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="mb-3">
                                                        <label for="">Amount Received<span class="text-danger">*</span></label>
                                                        <input name="amount_received" id="amount_received" type="text" placeholder="Enter Amount Received" class="form-control" required="" readonly>
                                                    </div>
                                                @endif
                                                @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                                    <div class="mb-3">
                                                        <label for="">Amount Refund<span class="text-danger">*</span></label>
                                                        @if(empty($sale->project_sale_detail->amount_refund))
                                                            <input name="amount_refund" id="amount_refund" type="text" placeholder="Enter Amount Refund" class="form-control" required="">
                                                        @else
                                                            <input name="amount_refund" id="amount_refund" type="text" placeholder="Enter Amount Refund" value="{{$sale->project_sale_detail->amount_refund}}" class="form-control" required="">
                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="mb-3">
                                                        <label for="">Amount Refund<span class="text-danger">*</span></label>
                                                        <input name="amount_refund" id="amount_refund" type="text" placeholder="Enter Amount Refund" class="form-control" required="" readonly>
                                                    </div>
                                                @endif
                                                @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                                    <div class="mb-3">
                                                        <label for="">Connect Uses<span class="text-danger">*</span></label>
                                                        @if(empty($sale->project_sale_detail->connect_uses))
                                                            <input name="connect_uses" id="connect_uses" type="text" placeholder="Enter Connect Uses" class="form-control" required="">
                                                        @else
                                                            <input name="connect_uses" id="connect_uses" type="text" placeholder="Enter Connect Uses" value="{{$sale->project_sale_detail->connect_uses}}" class="form-control" required="">
                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="mb-3">
                                                        <label for="">Connect Uses<span class="text-danger">*</span></label>
                                                        <input name="connect_uses" id="connect_uses" type="text" placeholder="Enter Connect Uses" class="form-control" required="" readonly>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @else
                                @endif
                                <div class="col-md-6">
                                    <div class="login-box-wrap d-block p-4" style="background-color: #F5F5F5;border-radius: 10px;">
                                        @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                            <div class="login-main">
                                                <h4 class="mb-4">Sales Agent Details</h4>
                                                <div class="mb-3">
                                                    <label for="">Bidder <span class="text-danger">*</span></label>
                                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                                        <select name="bidder_id" id="wa_assigned_to" class="form-control" required {{@$sale->created_by ? 'readonly': '' }}>
                                                            <option value="">Select Bidder</option>
                                                            @foreach($user->all() as $user)
                                                                @if(empty($sale->created_by))
                                                                    <option value="{{$user->id}}" >{{ Str::title($user->name) }}</option>
                                                                @else
                                                                    <option value="{{$user->id}}" {{ $sale->created_by == $user->id ? "selected" : "" }}>{{ Str::title($user->name) }}</option>

                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <select name="bidder_id" id="wa_assigned_to" class="form-control" required readonly="">
                                                            <option value="">Select Bidder</option>
                                                            @foreach($user->all() as $user)
                                                                <option value="{{$user->id}}" {{ $sale->created_by == $user->id ? "selected" : "" }}>{{ Str::title($user->name) }}</option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <input id="getbidid" type="hidden" value="{{$sale->created_by}}">
                                                    <label for="">Closer <span class="text-danger">*</span></label>
                                                    @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                                        <select name="closer_id" id="wa_assigned_to" class="form-control" required {{@$sale->project_sale_agent_detail['0']->closer_id ? 'readonly': '' }} onchange="showDiv(this)">
                                                            <option value="">Select closer</option>
                                                            @foreach($user->all() as $user)
                                                                @if(empty($sale->project_sale_agent_detail['0']->closer_id))
                                                                    <option value="{{$user->id}}" >{{ Str::title($user->name) }}</option>
                                                                @else
                                                                    <option value="{{$user->id}}" {{ $sale->project_sale_agent_detail['0']->closer_id == $user->id ? "selected" : "" }}>{{ Str::title($user->name) }}</option>

                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <select name="closer_id" id="wa_assigned_to" class="form-control" required readonly="" onchange="showDiv(this)">
                                                            <option value="">Select closer</option>
                                                            @foreach($user->all() as $user)
                                                                <option value="{{$user->id}}" {{ $sale->project_sale_agent_detail['0']->closer_id == $user->id ? "selected" : "" }}>{{ Str::title($user->name) }}</option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <input name="caller_id"  type="hidden" value="0">


                                                </div>
                                                    <div class="mb-3" id="hidden_div">
                                                        <label for="">Sales Shared To </label>
                                                        @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                                            <input id="showbid" name="sale_shared_to" id="wa_assigned_to" type="hidden">Bidder-50-closer
                                                            <input id="showcloser" name="sale_shared_to_more" id="wa_assigned_to_more" type="hidden">
                                                        @else
                                                            <select name="sale_shared_to" id="wa_assigned_to" class="form-control" readonly="">
                                                                <option value="">Select Sales Shared To</option>
                                                                @foreach($user->all() as $user)
                                                                    <option value="{{$user->id}}" {{ $sale->project_sale_agent_detail['0']->sale_shared_to == $user->id ? "selected" : "" }}>{{ Str::title($user->name) }}</option>
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                    </div>


                                                @if(userRole(\Auth::user()->id) == 'Administrator' || userHasRight('production',\Auth::user()->id) || userHasRight('digial-sales-all',\Auth::user()->id))
                                                    <div class="mb-3">
                                                        <label for="">Contract ID <span class="text-danger">*</span></label>
                                                        @if(empty($sale->project_sale_agent_detail['0']->contract_id))
                                                            <input name="contract_id" type="text" placeholder="Enter Contract" class="form-control" value="" required="">
                                                        @else
                                                            <input name="contract_id" type="text" placeholder="Enter Contract" class="form-control" value="{{$sale->project_sale_agent_detail['0']->contract_id}}" required="">

                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="mb-3">
                                                        <label for="">Contract ID <span class="text-danger">*</span></label>
                                                        <input name="contract_id" type="text" placeholder="Enter Contract" class="form-control" value="{{$sale->project_sale_agent_detail['0']->contract_id}}" required="" readonly>
                                                    </div>
                                                @endif
                                            </div>
                                        @else
                                        @endif
                                        @if(userHasRight('digial-sales-all',\Auth::user()->id))

                                        @else
                                            <h4 class="mb-4">Production Details</h4>
                                            <div class="mb-3">
                                                <label for="">Production Type <span class="text-danger">*</span></label>
                                                <select name="production_type" class="form-control" aria-label="">
                                                    <option selected>Select Production Type</option>
                                                    <option value="In-House" {{ $sale->project_sale_production_detail['0']->production_type == 'In-House' ? "selected" : "" }}>In-House</option>
                                                    <option value="Out-Source" {{ $sale->project_sale_production_detail['0']->production_type == 'Out-Source' ? "selected" : "" }}>Out-Source</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Assigned To <span class="text-danger">*</span></label>
                                                <select name="assigned_to" id="wa_assigned_to" class="form-control" required>
                                                    <option value="">Select Assigned To </option>
                                                    @foreach($user->all() as $user)
                                                        <option value="{{$user->id}}" {{ $sale->project_sale_production_detail['0']->assigned_to == $user->id ? "selected" : "" }}>{{ Str::title($user->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Project Status <span class="text-danger">*</span></label>
                                                <select name="project_status" class="form-control" aria-label="">
                                                    <option selected>Select Project Status</option>
                                                    <option value="In-Progress" {{ $sale->project_sale_production_detail['0']->project_status == 'In-Progress' ? "selected" : "" }}>In-Progress</option>
                                                    <option value="Completed" {{ $sale->project_sale_production_detail['0']->project_status == 'Completed' ? "selected" : "" }}>Completed</option>
                                                    <option value="Closed" {{ $sale->project_sale_production_detail['0']->project_status == 'Closed' ? "selected" : "" }}>Closed</option>
                                                </select>
                                            </div>

                                        @endif



                                        @if(userRole(\Auth::user()->id) == 'administrator')
                                            @if(empty($sale->project_sale_production_detail['0']->production_type))
                                                <h4 class="mb-4">Production Details</h4>
                                                <div class="mb-3">
                                                    <label for="">Production Type <span class="text-danger">*</span></label>
                                                    <select name="production_type" class="form-control" aria-label="">
                                                        <option selected>Select Production Type</option>
                                                        <option value="In-House" >In-House</option>
                                                        <option value="Out-Source" >Out-Source</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Assigned To <span class="text-danger">*</span></label>
                                                    <select name="assigned_to" id="wa_assigned_to" class="form-control" required>
                                                        <option value="">Select Assigned To </option>
                                                        @foreach($user->all() as $user)
                                                            <option value="{{$user->id}}" >{{ Str::title($user->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Project Status <span class="text-danger">*</span></label>
                                                    <select name="project_status" class="form-control" aria-label="">
                                                        <option selected>Select Project Status</option>
                                                        <option value="In-Progress">In-Progress</option>
                                                        <option value="Completed">Completed</option>
                                                        <option value="Closed">Closed</option>
                                                    </select>
                                                </div>
                                            @else



                                                <h4 class="mb-4">Production Details</h4>
                                                <div class="mb-3">
                                                    <label for="">Production Type <span class="text-danger">*</span></label>
                                                    <select name="production_type" class="form-control" aria-label="">
                                                        <option selected>Select Production Type</option>
                                                        <option value="In-House" {{ $sale->project_sale_production_detail['0']->production_type == 'In-House' ? "selected" : "" }}>In-House</option>
                                                        <option value="Out-Source" {{ $sale->project_sale_production_detail['0']->production_type == 'Out-Source' ? "selected" : "" }}>Out-Source</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Assigned To <span class="text-danger">*</span></label>
                                                    <select name="assigned_to" id="wa_assigned_to" class="form-control" required>
                                                        <option value="">Select Assigned To </option>
                                                        @foreach($user->all() as $user)
                                                            <option value="{{$user->id}}" {{ $sale->project_sale_production_detail['0']->assigned_to == $user->id ? "selected" : "" }}>{{ Str::title($user->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Project Status <span class="text-danger">*</span></label>
                                                    <select name="project_status" class="form-control" aria-label="">
                                                        <option selected>Select Project Status</option>
                                                        <option value="In-Progress" {{ $sale->project_sale_production_detail['0']->project_status == 'In-Progress' ? "selected" : "" }}>In-Progress</option>
                                                        <option value="Completed" {{ $sale->project_sale_production_detail['0']->project_status == 'Completed' ? "selected" : "" }}>Completed</option>
                                                        <option value="Closed" {{ $sale->project_sale_production_detail['0']->project_status == 'Closed' ? "selected" : "" }}>Closed</option>
                                                    </select>
                                                </div>
                                            @endif


                                        @endif
                                    </div>
                                </div>

                                @endif



                            </div>
                        </div>



                </div>
            </form>
        </div>
    </div>



@endsection
