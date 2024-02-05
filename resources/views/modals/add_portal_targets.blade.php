{{--MODAL--}}
@inject('user', 'App\Services\User\UserService');
<div class="modal fade" id="myModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-box-wrap d-block p-4">
                        <div class="login-main">
                            <form method="post" class="theme-form" role="form" action="{{route('portaltargets-save')}}">
                                @csrf
                                <input name="apiUrl" type="hidden" value="api/v1/portaltargets/add">
                                <input name="apiUrlMethod" type="hidden" value="POST">
                                <h4 class="mb-4">New Portal Targets</h4>
                                <div class="mb-3">
                                    <label for="">Year <span class="text-danger">*</span></label>
                                    <select name="year" class="form-control" required>
                                        <option value="" selected disabled>Please Select Year</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                    </select>
                                    <!--<input name="year" type="year"  class="form-control" id="exampleInputPassword1" required="">-->
                                </div>
                                <div class="mb-3">
                                    <label for=""> Target <span class="text-danger">*</span></label>
                                    <input name="target" type="text" placeholder="Enter Target" class="form-control" id="exampleInputPassword1" required="">
                                </div>
                                <div class="mb-3">
                                    <label for="">Revised Target <span class="text-danger">*</span></label>
                                    <input name="revised_target" type="text" placeholder="Enter Revised Target" class="form-control" id="exampleInputPassword1" required="">
                                </div>
                                <div class="mb-3">
                                    <label for="">Revised Target Date <span class="text-danger">*</span></label>
                                <!--<input name="revised_target_date" type="date"  class="form-control" id="exampleInputPassword1" required="">-->
                                    <select name="revised_target_date" class="form-control" required>
                                        <option value="" selected disabled>Please Select Year</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Reason <span class="text-danger">*</span></label>
                                    <input name="reason" type="text" placeholder="Enter Reason" class="form-control" id="exampleInputPassword1" required="">
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-box-wrap d-block p-4">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form" action="{{route('portaltargets-save')}}">
                            @csrf
                            <input name="apiUrl" id="apiUrl" type="hidden" value="api/v1/portaltargets/update">
                            <input name="id" id="id" type="hidden" value="">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <h4 class="mb-4">Update Portal Targets</h4>
                            <div class="mb-3">
                                <label for="">Year <span class="text-danger">*</span></label>
                                <input name="year" id="year" type="text"  class="form-control" id="exampleInputPassword1" required="">
                            </div>
                            <div class="mb-3">
                                <label for=""> Target <span class="text-danger">*</span></label>
                                <input name="target" id="target" type="text" placeholder="Enter Target" class="form-control" id="exampleInputPassword1" required="">
                            </div>
                            <div class="mb-3">
                                <label for="">Revised Target <span class="text-danger">*</span></label>
                                <input name="revised_target" id="revised_target" type="text" placeholder="Enter Revised Target" class="form-control" id="exampleInputPassword1" required="">
                            </div>
                            <div class="mb-3">
                                <label for="">Revised Target Date <span class="text-danger">*</span></label>
                                <input name="revised_target_date" id="revised_target_date" type="text"  class="form-control" id="exampleInputPassword1" required="">
                            </div>
                            <div class="mb-3">
                                <label for="">Reason <span class="text-danger">*</span></label>
                                <input name="reason" id="reason" type="text" placeholder="Enter Reason" class="form-control" id="exampleInputPassword1" required="">
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
