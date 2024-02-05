{{--MODAL--}}
@inject('user', 'App\Services\User\UserService');
@inject('team', 'App\Services\Team\TeamService')
<div class="modal fade" id="myModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 900px;">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-box-wrap d-block p-4">
                        <div class="login-main">
                            <form method="post" class="theme-form" role="form" action="{{route('teamtargets-save')}}">
                                @csrf
                                <input name="apiUrl" type="hidden" value="api/v1/teamtargets/add">
                                <input name="apiUrlMethod" type="hidden" value="POST">
                                <h4 class="mb-4">Set Team Monthly Target</h4>

                                <div class="mb-3">
                                    <label for="">Month <span class="text-danger">*</span></label>
                                    <input name="month" type="month"  class="form-control" id="exampleInputPassword1" required="">
                                </div>
                                <div class="row mt-4 align-items-center" style=" background: #f2f2f2;padding: 10px 10px 20px 10px;">
                                    <div class="col">
                                    <label for="">Team <span class="text-danger">*</span></label>
                                    <select name="team_id" id="teamid" class="form-control" required>
                                        <option value="">Select Team</option>
                                        @foreach($team->all() as $team)
                                            <option value="{{$team->id}}">{{ Str::title($team->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    <div class="col">
                                    <label for=""> Target <span class="text-danger">*</span></label>
                                    <input name="target" id="getteamtarget" type="text" placeholder="Enter Target" class="form-control" id="exampleInputPassword1" required="">
                                </div>
                                    <div class="col">
                                    <label for="">Revised Target </label>
                                    <input name="revised_target" type="text" placeholder="Enter Revised Target" class="form-control" id="exampleInputPassword1">
                                </div>
                                    <div class="col">
                                    <label for="">Revised Target Date </label>
                                    <input name="revised_target_date" type="date"  class="form-control" id="exampleInputPassword1">
                                </div>
                                    <div class="col">
                                    <label for="">Reason </label>
                                    <input name="reason" type="text" placeholder="Enter Reason" class="form-control">
                                </div>
                                </div>
                                <div class="row justify-content-end mx-0 mt-4">
                                    <button type="button" class="btn btn-default cbtn col-2" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-action cbtn col-2">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--    MODAL--}}


<div class="modal fade" id="myEditModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 900px;">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-box-wrap d-block p-4">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form" action="{{route('teamtargets-update')}}">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/teamtargets/update">
                            <input name="id" id="id" type="hidden" value="">
                            <input name="isForm" type="hidden" value="1">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <h4 class="mb-4">Set Team Monthly Target</h4>

                            <div class="mb-3">
                                <label for="">Month <span class="text-danger">*</span></label>
                                <input name="month" id="month" type="month"  class="form-control" id="exampleInputPassword1" required="" readonly>
                            </div>
                            <div class="row mt-4 align-items-center" style=" background: #f2f2f2;padding: 10px 10px 20px 10px;">
                                <div class="col">
                                    <label for="">Team <span class="text-danger">*</span></label>
                                    <select name="team_id" id="team_id" class="form-control" required readonly>
                                        <option value="">Select Team</option>
                                        @foreach($team->all() as $team)
                                            <option value="{{$team->id}}">{{ Str::title($team->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for=""> Target <span class="text-danger">*</span></label>
                                    <input name="target" id="target" type="text" placeholder="Enter Target" class="form-control" required="" readonly>
                                </div>
                                <div class="col">
                                    <label for="">Revised Target </label>
                                    <input name="revised_target" id="revised_target" type="text" placeholder="Enter Revised Target" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">Revised Target Date </label>
                                    <input name="revised_target_date" id="revised_target_date" type="date"  class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">Reason </label>
                                    <input name="reason" id="reason" type="text" placeholder="Enter Reason" class="form-control">
                                </div>
                            </div>
                            <div class="row justify-content-end mx-0 mt-4">
                                <button type="button" class="btn btn-default cbtn col-2" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-action cbtn col-2">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
