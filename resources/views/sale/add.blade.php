@extends('layouts.app')
@inject('team', 'App\Services\Team\TeamService')
@inject('portal', 'App\Services\Portal\PortalService')
@inject('account', 'App\Services\Account\AccountService')
@section('content')
    @inject('projecttype', 'App\Services\ProjectType\ProjectTypeService')
    @inject('client', 'App\Services\Client\ClientService')
    @inject('country', 'App\Models\Country')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <form method="post" class="theme-form" role="form" action="{{ route('projectsale-save') }}">
                @csrf
                <input name="apiUrl" type="hidden" value="api/v1/project_sale/add">
                <input name="apiUrlMethod" type="hidden" value="POST">
                <input name="created_by" type="hidden" value="{{auth()->id()}}">
                <input name="is_active" type="hidden" value="0">
                <div class="row top-bar">
                    <div class="col-sm-12 col-xl-7">
                        <h2>Add New Project</h2>
                    </div>
                    <div class="col-sm-12 col-xl-5">
                        <div class="row">
                            <div class="row justify-content-end m-0">
                                <a type="button" class="btn btn-default cbtn col-2" href="{{ route('sale') }}?non_sale=1">Close</a>
                                <button type="submit" class="btn btn-action cbtn col-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="login-box-wrap d-block p-4" style="background-color: #F5F5F5;border-radius: 10px;">
                                <div class="login-main">
                                    <h4 class="mb-4">Project</h4>

                                    <div class="mb-3">
                                        <label for="">Project Name <span class="text-danger">*</span></label>
                                        <input name="project_name" type="text" placeholder="Enter Project Name"
                                            class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Project Type<span class="text-danger">*</span></label>
                                        <select name="project_type_id" class="form-control" required>
                                            <option value="">Select Project Type</option>
                                            @foreach ($projecttype->all() as $projecttype)
                                                <option value="{{ $projecttype->id }}">{{ Str::title($projecttype->type) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Project Details <span class="text-danger">*</span></label>
                                        <textarea name="project_details" rows="4" cols="50" class="form-control" required=""></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Client Name</label>

                                        <input id="file_fields" type="text" placeholder="Select Client"
                                            class="form-control" readonly="readonly">
                                        <input name="client_id" id="file_ids" type="hidden"
                                            placeholder="Select or Add new file" class="form-control" required="">
                                    </div>


                                    <input name="country" id="file_links" type="hidden" placeholder="Enter Country "
                                        class="form-control" value="{{ old('file_link') ? old('file_link') : '' }}">




                                    <div class="row">
                                        <div class="col">
                                            <label for="">Country <span class="text-danger">*</span></label><br>
                                            <input id="country_selector" type="text" style="border: none;">
                                            <div class="form-item" style="display:none;">
                                                <input type="text" id="country_selector_code" data-countrycodeinput="1"
                                                    readonly="readonly"
                                                    placeholder="Selected country code will appear here" />
                                                <label for="country_selector_code">...and the selected country code will be
                                                    updated here</label>
                                            </div>

                                        </div>
                                        <div class="col">
                                            <label for="">City <span class="text-danger">*</span></label><br>
                                            <input name="city" type="text" placeholder="Enter City"
                                                class="form-control" required="">
                                        </div>
                                    </div>
                                    <!--<div class="mb-3">
                                            <label for="">Client Name <span class="text-danger">*</span></label>
                                            <select name="client_id"  class="form-control" required>
                                                <option value="">Select Client</option>
                                                @foreach ($client->all() as $client)
    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ Str::title($client->name) }}</option>
    @endforeach
                                            </select>  </div>
                                        <div class="mb-3">
                                            <label for="">Country <span class="text-danger">*</span></label>
                                            <select name="country" class="form-control" required id="box1" onChange="myNewFunction(this);">
                                                <option value="">Select Country</option>
                                                @foreach ($country->all() as $country)
    <option data-related={{ $country->id }} value="{{ $country->name }}">{{ Str::title($country->name) }}</option>
    @endforeach
                                            </select>
                                        </div>-->
                                    <div class="row">
                                        <div class="col">
                                            <label for="">Project Pricing <span
                                                    class="text-danger">*</span></label>
                                            <input name="project_price" type="text"
                                                placeholder="Enter Project Pricing" class="form-control" required="">

                                        </div>
                                        <div class="col">
                                            <label for=""> Rate method <span class="text-danger">*</span></label>
                                            <select name="rate_method" class="form-control" aria-label="">
                                                <option selected>Open this select menu</option>
                                                <option value="fixed">Fixed</option>
                                                <option value="perhour">Per hourly</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Our Bid <span class="text-danger">*</span></label>
                                        <input name="our_bid" type="text" placeholder="Enter Our Bid"
                                            class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Connect Uses<span class="text-danger">*</span></label>
                                        <input name="connect_uses" id="connect_uses" type="text" placeholder="Enter Connect Uses" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="login-box-wrap d-block p-4"
                                style="background-color: #F5F5F5;border-radius: 10px;">
                                <div class="login-main">
                                    <h4 class="mb-4">Project Details</h4>
                                    <div class="mb-3">
                                        <label for="">Project link<span class="text-danger">*</span></label>
                                        <input name="project_link" type="text" placeholder="Project link"
                                            class="form-control" required="">
                                    </div>
                                     <input name="trello_link" type="hidden" value="-">
                                    <input name="date" type="hidden" value="<?php echo (new DateTime())->format('Y-m-d'); ?>">
                                    <div class="mb-3">
                                        <label for="">Contact Date <span class="text-danger">*</span></label>
                                        <input name="contact_date" type="date" placeholder="Date"
                                            class="form-control" required="" value="<?php echo (new DateTime())->format('Y-m-d'); ?>">
                                    </div>
                                    <script>
                                        $(function() {
                                            $('input[name="is_meeting_requested"]').on('click', function() {
                                                if ($(this).val() == 'option2') {
                                                    $('#hides').hide();
                                                } else {
                                                    $('#hides').show();

                                                }
                                            });
                                        });
                                    </script>
                                    <div class="mb-3">
                                        <label for="">Meeting Request <span class="text-danger">*</span></label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" checked
                                                name="is_meeting_requested" id="inlineRadio1" value="option1">
                                            <label class="form-check-label text-gray" for="inlineRadio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="is_meeting_requested"
                                                id="inlineRadio2" value="option2">
                                            <label class="form-check-label text-gray" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                    <div id="hides">
                                        <div class="mb-3">
                                            <label for="">Meeting Date <span class="text-danger">*</span></label>
                                            <input name="meeting_datetime" type="date" placeholder="Date"
                                                class="form-control" value="<?php echo (new DateTime())->format('Y-m-d'); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Meeting Status <span
                                                    class="text-danger">*</span></label>
                                            <select name="meeting_status" class="form-control" aria-label="">
                                                <option selected>Open this select menu</option>
                                                <option value="0">Pending</option>
                                                <option value="1">Complete</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Comments<span class="text-danger">*</span></label>
                                        <input name="comments" type="text" placeholder="Comments..."
                                            class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Team <span class="text-danger">*</span></label>
                                        <select name="team_id" class="form-control" readonly="readonly">
                                            <option value="">Select Team</option>
                                            @foreach ($team->all() as $team)
                                                <option {{$data->team_id == $team->id ? 'Selected' : '' }} value="{{ $team->id }}">{{ Str::title($team->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">

                                        <label for="">Portal Name <span class="text-danger">*</span></label>
                                        <select name="portal_id" id="portal_name_get" class="form-control" readonly="readonly">
                                            <option  value="">Select Portal Name</option>
                                            @foreach ($portal->all() as $portal)
                                                <option  {{$data->portal_id == $portal->id ? 'Selected' : '' }} value="{{ $portal->id }}">{{ Str::title($portal->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
    {{--  <div class="mb-3">

        <label for="">Account Name <span class="text-danger">*</span></label>
        <select name="account_id"  class="form-control" required readonly="readonly">
            <option value="">Select Account Name</option>
            @foreach($account->all() as $account)
                <option value="{{$account->id}}" {{ $account->id == $data->account_id ? "selected" : "" }}>{{ Str::title($account->name) }}</option>
            @endforeach
        </select>
    </div>--}}



    <div class="mb-3">
        <label for="">Conversion <span class="text-danger">*</span></label>
        <br>
        @if(isBidder(auth()->id()) != TRUE)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_convertion"
                value="yes">
            <label class="form-check-label text-black-50" for="inlineRadio1">Yes</label>
        </div>
        @endif
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_convertion"
                value="no">
            <label class="form-check-label text-black-50" for="inlineRadio2">No</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" checked name="is_convertion"
                id="inlineRadio3" value="0">
            <label class="form-check-label text-black-50" for="inlineRadio3">Bidding
                Process</label>
        </div>
    </div>
    <script>
        $(function() {
            $('input[name="is_convertion"]').on('click', function() {
                if ($(this).val() == 'no') {
                    $('#hide').show();
                } else {
                    $('#hide').hide();

                }
            });
        });
    </script>
    <div id="hide" style="display: none;">
        <div class="mb-3">
            <label for="">Reason (If No conversion)<span
                    class="text-danger">*</span></label>
            <select name="reason" class="form-control" aria-label="">
                <option selected>Open this select menu</option>
                <option value="no_action">no action</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="">Reason Detail (If No conversion)<span
                    class="text-danger">*</span></label>
            <input name="reason_details" type="text" placeholder="Reason Detail..."
                class="form-control">

        </div>
    </div>


</div>
</div>
</div>

</div>
</div>
</form>
</div>
</div>
@endsection
