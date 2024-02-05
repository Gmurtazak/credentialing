{{--    MODAL--}}
@inject('user', 'App\Services\User\UserService');
<div class="modal fade" id="myModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-box-wrap d-block ">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form" action="{{route('department-save')}}" enctype="multipart/form-data">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/department/add">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <input name="isForm" type="hidden" value="1">
                            <h4 class="mb-4"> New Department</h4>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload department logo<span class="text-danger">*</span></label>
                                <input class="form-control" type="file" name="file"  id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="">Department Name <span class="text-danger">*</span></label>
                                <input name="name" type="text" placeholder="Enter Department Name" class="form-control" id="exampleInputPassword1" required="">
                            </div>
                            <div class="mb-3">
                                <label for="">Department Owner<span class="text-danger">*</span></label>
                                <select name="owner_id" class="form-control" required>
                                    <option value="">Select Department Owner</option>
                                    @foreach($user->all() as $user)
                                        <option value="{{$user->id}}">{{ Str::title($user->name) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Department Active <span class="text-danger">*</span></label>
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
                                <button type="submit" class="button">Save</button>
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
                <div class="login-box-wrap d-block ">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form" action="{{route('department-update')}}" enctype="multipart/form-data">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/department/update">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <input name="id" id="id" type="hidden" value="">
                            <input name="isForm" type="hidden" value="1">
                            <h4 class="mb-4">Update Department</h4>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload department logo<span class="text-danger">*</span></label>
                                <input class="form-control" type="file" name="file"  id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="">Department Name <span class="text-danger">*</span></label>
                                <input name="name" id="name" type="text" placeholder="Enter Department Name" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="">Department Owner<span class="text-danger">*</span></label>
                                <select name="owner_id" id="owner_id" class="form-control" required>
                                    <option value="">Select Department Owner</option>
                                    @foreach($user->all() as $user)
                                        <option value="{{$user->id}}">{{ Str::title($user->name) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Department Active <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col">
                                            <span class="form-check form-switch float-end">
                                                <input class="form-check-input" name="is_active" id="is_active" value="1" type="checkbox">
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
