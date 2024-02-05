{{--    MODAL--}}
@inject('client', 'App\Services\Client\ClientService');
@inject('team', 'App\Services\Team\TeamService')
@inject('portal', 'App\Services\Portal\PortalService')
<div class="modal fade" id="myModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Credentialing</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="login-box-wrap d-block p-4">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form"  action="{{route('credentialing-save')}}" enctype="multipart/form-data">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/insurance/add">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <input name="isForm" type="hidden" value="1">
                            <div class="row" style="padding: 10px !important;">
                                <div class="col">
                                    <label for="">Clinic </label>
                                    <select name="clinic" class="modalDropdown" required>
                                        <option value="">Select Clinic</option>
                                        @foreach($team->all() as $team)
                                            <option value="{{$team->id}}">{{ Str::title($team->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Provider </label>
                                    <select name="provider" class="modalDropdown" required>
                                        <option value="">Select Provider</option>
                                        @foreach($client->all() as $client)
                                            <option value="{{$client->id}}">{{ Str::title($client->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding: 10px !important;">
                                <div class="col">
                                    <label for="">Credentialing </label>
                                    <select name="credentialing" class="modalDropdown" required>
                                        <option value="">Select Credentialing</option>
                                        <option value="Individual">Individual</option>
                                        <option value="Group">Group</option>

                                    </select>
                                          </div>
                                <div class="col">
                                    <label for="">Insurance </label>
                                    <select name="insurance" class="modalDropdown">
                                        <option value="">Select Insurance</option>
                                        @foreach($portal->all() as $portal)
                                            <option value="{{$portal->id}}">{{ Str::title($portal->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding: 10px !important;">
                                <div class="col">
                                    <label for="">Status </label>
                                    <select name="status" class="modalDropdown">
                                        <option value="">Select Status</option>
                                        <option value="In-Network">In Network</option>
                                        <option value="approved">Approved</option>
                                        <option value="certified">Certified</option>
                                        <option value="In-process">In process</option>
                                        <option value="other">Other</option>
                                        <option value="panel-closed">Panel Closed</option>
                                        <option value="denied">Denied</option>
                                        <option value="Out-of-Coverage">Out of Coverage</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Effective Date </label>
                                    <input name="effectivedate" type="date"  class="form-control" id="exampleInputPassword1">
                                </div>
                            </div>

                            <div class="row phone-wrapper">
                                <div class="col-12 col-md-4">
                                    <label for="">Remarks Date </label>

                                        <input name="remarksdate[]" type="date" class="form-control" id="inputPassword2">

                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="">Remarks </label>
                                        <input name="remarks[]" type="text" class="form-control" id="inputPassword2" placeholder="Remarks">
                                </div>

                                    <div class="col-12 col-md-4">
                                        <br>
                                        <label for="inputPassword2" class="visually-hidden"></label>
                                        <button type="button" class="btn btn-outline-success add-more w-100 mb-3 add-more" style="font-size: 12px;">Add More</button>
                                    </div>
                                </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary modalCancel"
                                        data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary modalSave">Save Changes</button>
                            </div>
                            {{--<div class="row justify-content-end mx-0 mt-4">
                                <button type="button" class="btn btn-default cbtn col-2" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-action cbtn col-2">Save</button>
                            </div>--}}
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
{{--    MODAL--}}

<div class="modal fade" id="myViewModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white d-flex justify-content-center">
                <h4 style="text-align: center;">Credentialing</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-box-wrap d-block p-4">
                    <div class="login-main">
                            <div class="row" style="padding: 10px !important;">
                                <div class="col">
                                    <label for="">Clinic </label>
                                    <select id="vcclinic_id" class="form-control" disabled>
                                        <option value="">Select Clinic</option>
                                        @foreach($team->all() as $team)
                                            <option value="{{$team->id}}">{{ Str::title($team->name) }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Provider </label>
                                    <select id="vcprovider_id" class="form-control" disabled>
                                        <option value="">Select Provider</option>
                                        @foreach($client->all() as $client)
                                            <option value="{{$client->id}}">{{ Str::title($client->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding: 10px !important;">
                                <div class="col">
                                    <label for="">Credentialing </label>
                                    <select id="vccredentialing" class="form-control" disabled>
                                        <option value="">Select Credentialing</option>
                                        <option value="Individual">Individual</option>
                                        <option value="Group">Group</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Insurance </label>
                                    <select id="vcinsurance" class="form-control" disabled>
                                        <option value="">Select Insurance</option>
                                        @foreach($portal->all() as $portal)
                                            <option value="{{$portal->id}}">{{ Str::title($portal->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding: 10px !important;">
                                <div class="col">
                                    <p id="vcstatus"></p>
                                </div>
                                <div class="col">
                                    <p id="vceffectivedate"></p>
                                </div>
                            </div>
                        <div class="row" style="padding: 10px !important;">
                                <div class="col">
                                    <p id="vcremarks"></p>
                                </div>
                                <div class="col">
                                    <p id="vcremarksdate"></p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



{{--    MODAL--}}

<div class="modal fade" id="myEditModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Credentialing</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-box-wrap d-block p-4">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form"  action="{{route('credentialing-update')}}" enctype="multipart/form-data">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/insurance/update">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <input name="id" id="id" type="hidden" value="">
                            <input name="isForm" type="hidden" value="1">
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <label for="">Clinic </label>
                                <select name="clinic" id="veclinic_id" class="modalDropdown">
                                    <option value="">Select Clinic</option>
                                    @foreach($team->all() as $team)
                                        <option value="{{$team->id}}">{{ Str::title($team->name) }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col">
                                <label for="">Provider </label>
                                <select name="provider" id="veprovider_id" class="modalDropdown">
                                    <option value="">Select Provider</option>
                                    @foreach($client->all() as $client)
                                        <option value="{{$client->id}}">{{ Str::title($client->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <label for="">Credentialing </label>
                                <select name="credentialing" id="vecredentialing" class="modalDropdown">
                                    <option value="">Select Credentialing</option>
                                    <option value="Individual">Individual</option>
                                    <option value="Group">Group</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Insurance </label>
                                <select name="insurance" id="veinsurance" class="modalDropdown" required>
                                    <option value="">Select Insurance</option>
                                    @foreach($portal->all() as $portal)
                                        <option value="{{$portal->id}}">{{ Str::title($portal->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class="row" style="padding: 10px !important;">
                                <div class="col">
                                    <label for="">Status </label>
                                    <select name="status"  id="vecstatus" class="modalDropdown">
                                        <option value="" id="vestatus">Select Status</option>
                                        <option value="In-Network">In Network</option>
                                        <option value="approved">Approved</option>
                                        <option value="certified">Certified</option>
                                        <option value="In-process">In process</option>
                                        <option value="other">Other</option>
                                        <option value="panel-closed">Panel Closed</option>
                                        <option value="denied">Denied</option>
                                        <option value="Out-of-Coverage">Out of Coverage</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Effective Date </label>
                                    <input name="effectivedate" type="date"  class="form-control" id="veeffectivedate">
                                </div>
                            </div>

                            <div class="row phone-wrapper">
                                <div class="col-12 col-md-4">
                                    <label for="">Remarks Date </label>

                                    <input name="remarksdate[]" type="date" class="form-control" id="veremarksdate">

                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="">Remarks </label>
                                    <textarea id="veremarks" class="form-control" name="remarks[]" rows="6" cols="30">
                                        </textarea>
                                      </div>

                                <div class="col-12 col-md-4">
                                    <br>
                                    <label for="inputPassword2" class="visually-hidden"></label>
                                    <button type="button" class="btn btn-outline-success mb-3 w-100 add-more" style="font-size: 12px;">Add More</button>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default cbtn modalCancel" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-action cbtn modalSave">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
