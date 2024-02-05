@extends('layouts.app')

@section('content')
    <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-8">
                    <h2>View Error</h2>
                </div>
            </div>
            <div class="body-container">
                <div class="col-12">
                    <div class="pl-table">
                        <div class="pl-thead tall">
                            <div class="row">
                                <div class="col">COUNT OF ERROR</div>
                                <div class="col">ERROR CATEGORY</div>
                                <div class="col">MISTAKE</div>
                                <div class="col">PATIENT ACCOUNT</div>
                                <div class="col">DOS</div>
                                <div class="col">QC BY</div>
                                <div class="col" style="flex: 100px;">DESCRIPTION</div>

                            </div>
                        </div>
                        <div class="pl-tbody">
                            <div class="row">
                                <div class="col">1212</div>
                                <div class="col">
                                    <span class="badge bg-red" style="width: 120px;">
                                        Zero Tolerence
                                    </span>
                                </div>
                                <div class="col">Incorrect Status</div>
                                <div class="col">28921</div>
                                <div class="col">22</div>
                                <div class="col">Mark</div>
                                <div class="col" style="flex: 100px;">
                                    Lorem ipsum is a dummy text...
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">1212</div>
                                <div class="col">
                                    <span class="badge bg-yellow" style="width: 120px;">
                                        Minor
                                    </span>
                                </div>
                                <div class="col">Incorrect Status</div>
                                <div class="col">28921</div>
                                <div class="col">22</div>
                                <div class="col">Mark</div>
                                <div class="col" style="flex: 100px;">
                                    Lorem ipsum is a dummy text...
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">1212</div>
                                <div class="col">
                                    <span class="badge bg-red" style="width: 120px;">
                                        Zero Tolerence
                                    </span>
                                </div>
                                <div class="col">Incorrect Status</div>
                                <div class="col">28921</div>
                                <div class="col">22</div>
                                <div class="col">Mark</div>
                                <div class="col" style="flex: 100px;">
                                    Lorem ipsum is a dummy text...
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">1212</div>
                                <div class="col">
                                    <span class="badge bg-red" style="width: 120px;">
                                        Zero Tolerence
                                    </span>
                                </div>
                                <div class="col">Incorrect Status</div>
                                <div class="col">28921</div>
                                <div class="col">22</div>
                                <div class="col">Mark</div>
                                <div class="col" style="flex: 100px;">
                                    Lorem ipsum is a dummy text...
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">1212</div>
                                <div class="col">
                                    <span class="badge bg-red" style="width: 120px;">
                                        Zero Tolerence
                                    </span>
                                </div>
                                <div class="col">Incorrect Status</div>
                                <div class="col">28921</div>
                                <div class="col">22</div>
                                <div class="col">Mark</div>
                                <div class="col" style="flex: 100px;">
                                    Lorem ipsum is a dummy text...
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">1212</div>
                                <div class="col">
                                    <span class="badge bg-red" style="width: 120px;">
                                        Zero Tolerence
                                    </span>
                                </div>
                                <div class="col">Incorrect Status</div>
                                <div class="col">28921</div>
                                <div class="col">22</div>
                                <div class="col">Mark</div>
                                <div class="col" style="flex: 100px;">
                                    Lorem ipsum is a dummy text...
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">1212</div>
                                <div class="col">
                                    <span class="badge bg-red" style="width: 120px;">
                                        Zero Tolerence
                                    </span>
                                </div>
                                <div class="col">Incorrect Status</div>
                                <div class="col">28921</div>
                                <div class="col">22</div>
                                <div class="col">Mark</div>
                                <div class="col" style="flex: 100px;">
                                    Lorem ipsum is a dummy text...
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--    assignQC Assignment --}}
    <div class="modal fade" id="assignQC"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-box-wrap d-block pt-4 px-2">
                        <div class="login-main row m-0">
                            <h4 class="mb-4">Assign QC</h4>
                            <div class="col-md-12 mb-3">
                                <label for="">QC Assign Date <span class="text-danger">*</span></label>
                                <input name="name" type="date" placeholder="Assign Date" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">QC Assign to <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Select name</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">DOS Assigned <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected="">Select DOS</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="row justify-content-end mx-0 mt-4">
                                <button type="button" class="btn btn-default cbtn col-2" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-action cbtn col-3">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--    assignQC Assignment--}}
@endsection

