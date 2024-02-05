{{--    MODAL--}}
<div class="modal fade" id="myModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-box-wrap d-block p-4">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form"  action="{{route('file-save')}}">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/file/add">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <h4 class="mb-4">New File</h4>

                            <div class="mb-3">
                                <label for="">File Name <span class="text-danger">*</span></label>
                                <input name="file_name" type="text" placeholder="Enter File Name" class="form-control" id="exampleInputPassword1" required="">
                            </div>

                            <div class="mb-3">
                                <label for="">Dos Count <span class="text-danger">*</span></label>
                                <input name="dos_count" type="text" placeholder="Enter Dos Count" class="form-control" id="exampleInputPassword1" required="">
                            </div>

                            <div class="mb-3">
                                <label for="">Page <span class="text-danger">*</span></label>
                                <input name="pages" type="text" placeholder="Enter Page" class="form-control" id="exampleInputPassword1" required="">
                            </div>

                            <div class="mb-3">
                                <label for="">Received On <span class="text-danger">*</span></label>
                                <input name="received_on" type="date" placeholder="Enter Received On" class="form-control" id="exampleInputPassword1" required="">
                            </div>

                            <div class="mb-3">
                                <label for="">File Link <span class="text-danger">*</span></label>
                                <input name="file_link" type="text" placeholder="Enter File Link" class="form-control" id="exampleInputPassword1" required="">
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="">File Active  <span class="text-danger">*</span></label>
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
                        <form method="post" class="theme-form" role="form"  action="{{route('file-save')}}">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/file/update">
                            <input name="id" id="id" type="hidden" value="">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <h4 class="mb-4">Update file</h4>

                            <div class="mb-3">
                                <label for="">file Name <span class="text-danger">*</span></label>
                                <input name="file_name" id="file_name" type="text" placeholder="Enter file Name" class="form-control" id="exampleInputPassword1" required="">
                            </div>

                            <div class="mb-3">
                                <label for="">Dos Count <span class="text-danger">*</span></label>
                                <input name="dos_count" id="dos_count" type="text" placeholder="Enter Dos Count" class="form-control" id="exampleInputPassword1" required="">
                            </div>

                            <div class="mb-3">
                                <label for="">Page <span class="text-danger">*</span></label>
                                <input name="pages" id="pages" type="text" placeholder="Enter Page" class="form-control" id="exampleInputPassword1" required="">
                            </div>

                            <div class="mb-3">
                                <label for="">Received On <span class="text-danger">*</span></label>
                                <input name="received_on" id="received_on" type="date" placeholder="Enter Received On" class="form-control" id="exampleInputPassword1" required="">
                            </div>

                            <div class="mb-3">
                                <label for="">File Link <span class="text-danger">*</span></label>
                                <input name="file_link" id="file_link" type="text" placeholder="Enter File Link" class="form-control" id="exampleInputPassword1" required="">
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Active file <span class="text-danger">*</span></label>
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

