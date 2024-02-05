{{--    MODAL--}}
<div class="modal fade" id="myModal"  data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">New Insurance</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-box-wrap d-block">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form"  action="{{route('insurance-save')}}" enctype="multipart/form-data">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/portal/add">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <input name="isForm" type="hidden" value="1">

                            {{-- <h4 class="mb-4">New Insurance</h4> --}}
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Insurance logo<span class="text-danger">*</span></label>
                                <input class="form-control" type="file" name="file" id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="">Insurance Name <span class="text-danger">*</span></label>
                                <input name="name" type="text" placeholder="Enter Insurance Name" class="form-control" required="">
                            </div>

                            <div class="mb-3">
                                <label for="">Insurance Email <span class="text-danger">*</span></label>
                                <input name="email"  type="text" placeholder="Enter Insurance email" class="form-control"  required="">
                            </div>

                            <div class="mb-3">
                                <label for="">Insurance Website <span class="text-danger">*</span></label>
                                <input name="website" type="text" placeholder="Enter Insurance Website" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="">Plan/ Group <span class="text-danger">*</span></label>
                                <input name="plan_group" type="text" placeholder="Enter Plan/ Group" class="form-control" required="">
                            </div>

                            <div class="mb-3 phone-wrapper">
                                <div class="row g-3">
                                    <label for="">Phone 1 <span class="text-danger">*</span></label>
                                    <div class="col-9 mt-0">
                                        <label for="inputPassword2" class="visually-hidden">Phone Number</label>
                                        <input name="phone[]" type="number" class="form-control" id="inputPassword2" placeholder="Phone Number" >
                                    </div>
                                    <div class="col-auto mt-0">
                                        <label for="inputPassword2" class="visually-hidden"></label>
                                        <button type="button" class="btn btn-outline-success mb-3 add-more" style="font-size: 12px;">Add More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Insurance Active <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col">
                                            <span class="form-check form-switch float-end">
                                                <input name="is_active" value="1" class="form-check-input" checked type="checkbox" id="flexSwitchCheckDefault">
                                            </span>
                                    </div>
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
{{--    MODAL--}}

<div class="modal fade" id="myEditModal"  data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Update Insurance</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-box-wrap d-block ">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form"  action="{{route('insurance-update')}}" enctype="multipart/form-data">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/insurance/update">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <input name="id" id="id" type="hidden" value="">
                            <input name="isForm" type="hidden" value="1">

                            {{-- <h4 class="mb-4">Update Insurance</h4> --}}
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Insurance logo<span class="text-danger">*</span></label>
                                <input class="form-control" type="file" name="file" id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="">Insurance Name <span class="text-danger">*</span></label>
                                <input name="name" id="name" type="text" placeholder="Enter Insurance Name" class="form-control" required="">
                            </div>

                            <div class="mb-3">
                                <label for="">Insurance Email <span class="text-danger">*</span></label>
                                <input name="email"  id="email" type="text" placeholder="Enter Insurance email" class="form-control"  required="">
                            </div>

                            <div class="mb-3">
                                <label for="">Insurance Website <span class="text-danger">*</span></label>
                                <input name="website" id="website" type="text" placeholder="Enter Insurance Website" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="">Plan/ Group <span class="text-danger">*</span></label>
                                <input name="plan_group" id="plan_group" type="text" placeholder="Enter Plan/ Group" class="form-control" required="">
                            </div>

                            <div class="mb-3 phone-wrapper">
                                <div class="row g-3">
                                    <label for="">Phone Number <span class="text-danger">*</span></label>
                                    <div class="col-9 mt-0">
                                        <label for="inputPassword2" class="visually-hidden">Phone Number</label>
                                        <input name="phone[]" type="number" class="form-control" id="phone_0" placeholder="Phone Number" >
                                    </div>
                                    <div class="col-auto mt-0">
                                        <label for="inputPassword2" class="visually-hidden"></label>
                                        <button type="button" class="btn btn-outline-success mb-3 add-more" style="font-size: 12px;">Add More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Insurance Active <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col">
                                            <span class="form-check form-switch float-end">
                                                <input name="is_active" value="1" class="form-check-input" checked type="checkbox" id="is_active">
                                            </span>
                                    </div>
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

