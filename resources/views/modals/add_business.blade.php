{{--    MODAL--}}
<div class="modal fade" id="myModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-box-wrap d-block ">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form"  action="{{route('business-save')}}">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/business_type/add">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <h4 class="mb-4">New Business Types</h4>

                            <div class="mb-3">
                                <label for="">Business types Name <span class="text-danger">*</span></label>
                                <input name="business_type_name" type="text" placeholder="Enter Business Name" class="form-control" id="exampleInputPassword1" required="">
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Business types Active  <span class="text-danger">*</span></label>
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
                <div class="login-box-wrap d-block">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form"   action="{{route('business-save')}}">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/business_type/update">
                            <input name="id" id="id" type="hidden" value="">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <h4 class="mb-4">Update Role</h4>

                            <div class="mb-3">
                                <label for="">Role Name <span class="text-danger">*</span></label>
                                <input name="business_type_name" id="business_type_name" type="text" placeholder="Enter Role Name" class="form-control" id="exampleInputPassword1" required="">
                            </div>

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

