{{--    MODAL--}}
<div class="modal fade" id="myModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-box-wrap d-block p-4">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form"  action="{{route('role-save')}}">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/role/add">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <h4 class="mb-4"> New Role</h4>

                            <div class="mb-3">
                                <label for="">Role Name <span class="text-danger">*</span></label>
                                <input name="role" type="text" placeholder="Enter Role Name" class="form-control" id="exampleInputPassword1" required="">
                            </div>
                            <input name="target" type="hidden" value="0" class="form-control" id="exampleInputPassword2" required="">
                            {{--<div class="mb-3">
                                <label for="">Target <span class="text-danger">*</span></label>

                            </div>--}}

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Role Active  <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col">
                                           <span class="form-check form-switch float-end">
                                                <input class="form-check-input" name="is_active" value="1" checked type="checkbox" id="flexSwitchCheckDefault">
                                            </span>
                                    </div>
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-box-wrap d-block p-4">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form"  action="{{route('role-save')}}">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/role/update">
                            <input name="id" id="id" type="hidden" value="">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <h4 class="mb-4">Update Role</h4>

                            <div class="mb-3">
                                <label for="">Role Name <span class="text-danger">*</span></label>
                                <input name="role" id="role" type="text" placeholder="Enter Role Name" class="form-control" id="exampleInputPassword1" required="">
                            </div>
                            <input name="target" id="target" value="0" type="hidden" placeholder="Target" class="form-control" id="exampleInputPassword2" required="">
                            {{--<div class="mb-3">
                                <label for="">Target <span class="text-danger">*</span></label>
                                </div>--}}

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Active Role <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col">
                                            <span class="form-check form-switch float-end">
                                                <input class="form-check-input" name="is_active" id="is_active" value="1" type="checkbox" id="flexSwitchCheckDefault">
                                            </span>
                                    </div>
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

