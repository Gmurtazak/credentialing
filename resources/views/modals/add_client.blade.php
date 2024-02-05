{{--    MODAL --}}
@inject('country', 'App\Models\Country')
@inject('team', 'App\Services\Team\TeamService')
@inject('client', 'App\Services\Client\ClientService');
@inject('portal', 'App\Services\Portal\PortalService')
<div class="modal fade addProviderModal" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-header">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('client') }}">Provider</a></li>
                            <li class="breadcrumb-item active"><a href="#">Add Provider</a></li>
                        </ol>
                    </nav>
                    <h1>Add Provider</h1>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <section class="providerDetailsForms">
                    <div class="">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="card genInfo info">
                                    <div class="card-body">
                                        <div class="infoHead">
                                            <h3>
                                                Profile Information
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="container py-3">
                                        <form method="post" class="row infoForm" role="form"
                                            enctype="multipart/form-data" action="{{ route('client-save') }}">
                                            @csrf
                                            <input name="apiUrl" type="hidden" value="api/v1/client/add">
                                            <input name="apiUrlMethod" type="hidden" value="POST">
                                            <input name="isForm" type="hidden" value="1">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Clinic: </label>
                                                    <select name="clinicid" id="selectclinicId" class="form-control" readonly="">
                                                        <option value="">Select Clinic</option>
                                                        @foreach ($team->all() as $team)
                                                            <option value="{{ $team->id }}">
                                                                {{ Str::title($team->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Name: (First, Middle Initial, Last Name) <span
                                                            class="text-danger">*</span></label>
                                                    <input name="name" type="text" class="form-control"
                                                        id="exampleInputPassword1" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Primary Specialty : <span
                                                            class="text-danger">*</span></label>
                                                    <input name="ps" type="text" class="form-control"
                                                        id="exampleInputPassword1">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">DOB :</label>
                                                    <input name="dob" type="date" class="form-control"
                                                        id="exampleInputPassword1">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Phone :</label>
                                                    <input name="phone" type="text" class="form-control"
                                                        id="exampleInputPassword1">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Email Address :</label>
                                                    <input name="email" type="text" class="form-control"
                                                        id="exampleInputPassword1">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">SSN:</label>
                                                    <input name="ssn" type="text" class="form-control"
                                                        id="exampleInputPassword1">
                                                </div>
                                            </div>
                                            <div class="col-md-8" style="overflow-x:auto;margin-top:auto;">
                                                <label for=""></label>
                                                <div class="radio m-0">
                                                    <label for="">MD</label>
                                                    <input class="" type="radio"name="mdnppa"
                                                        id="exampleRadios1"value="md" checked>
                                                    <label for="">NP</label>
                                                    <input class="" type="radio"name="mdnppa"
                                                        id="exampleRadios1"value="np">
                                                    <label for="">PA</label>
                                                    <input class="" type="radio"name="mdnppa"
                                                        id="exampleRadios1"value="pa">
                                                    <label for="">LPC</label>
                                                    <input class="" type="radio"name="mdnppa"
                                                        id="exampleRadios1"value="lpc">
                                                    <label for="">SLP</label>
                                                    <input class="" type="radio"name="mdnppa"
                                                        id="exampleRadios1"value="slp">
                                                    <label for="">DO</label>
                                                    <input class="" type="radio"name="mdnppa"
                                                        id="exampleRadios1"value="do">
                                                    <label for="">DPM</label>
                                                    <input class="" type="radio"name="dpm"
                                                        id="exampleRadios1" value="dpm">
                                                    <label for="">Therapist</label>
                                                    <input class="" type="radio"name="mdnppa"
                                                        id="exampleRadios1"value="therapist">
                                                    <label for="">Dme</label>
                                                    <input class="" type="radio"name="mdnppa"
                                                           id="exampleRadios1"value="dme">
                                                </div>

                                            </div>
                                            <div class="card-body">
                                                <div class="infoHead">
                                                    <h3>
                                                        General Information
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="container py-3 row infoForm">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Ind NPI </label>
                                                        <input name="indnpi" type="text" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">State License :</label>
                                                        <input name="statel" type="text" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">License Issue Date :</label>
                                                        <input name="lid" type="date" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">License Exp. Date :</label>
                                                        <input name="led" type="date" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Driver’s License :</label>
                                                        <input name="driverl" type="text" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">License Issue Date :</label>
                                                        <input name="dlid" type="date" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">License Exp. Date :</label>
                                                        <input name="dled" type="date" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">DEA License :</label>
                                                        <input name="deal" type="text" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">DEA Issue Date :</label>
                                                        <input name="deaid" type="date" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">DEA Exp. Date :</label>
                                                        <input name="deaed" type="date" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">DPS License :</label>
                                                        <input name="dpsl" type="text" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">DPS Issue Date :</label>
                                                        <input name="dpsid" type="date" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="infoHead">
                                                    <h3>
                                                        Additional Information
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="container py-3 row infoForm">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">DPS Exp. Date :</label>
                                                        <input name="dpsed" type="date" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Medicare Number :</label>
                                                        <input name="medicarenum" type="text" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Medicare Effective Date :</label>
                                                        <input name="medicareeff" type="date" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Medicaid Number :</label>
                                                        <input name="medicaidnum" type="text" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Medicaid Effective Date :</label>
                                                        <input name="medicaideff" type="date" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="infoHead">
                                                    <h3>
                                                        Account Information
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="container py-3 row infoForm">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">CAQH Number :</label>
                                                        <input name="caqhnum" type="text" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">CAQH Username :</label>
                                                        <input name="username" type="text" class="form-control"
                                                               id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">CAQH Password :</label>
                                                        <input name="password" type="text" class="form-control"
                                                               id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Place of Birth :</label>
                                                        <input name="pob" type="text" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">State of Birth :</label>
                                                        <input name="sob" type="text" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Citizenship :</label>
                                                        <input name="citizenship" type="text" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Hospital Privileges : </label>
                                                        <input name="hospitalprivileges" type="text"
                                                            class="form-control" id="exampleInputPassword1">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="supervisingPhysician">{{--Will this provider only be
                                                            acting as a Supervising Physician?--}} Provider Status</label>

                                                            <select name="is_active" class="modalDropdown">
                                                                <option value="">Select Status</option>
                                                                <option value="Active">Active</option>
                                                                <option value="In-active">In Active</option>
                                                                <option value="Successfull">Successfull</option>
                                                                <option value="No-longer">No Longer</option>
                                                            </select>
                                                            {{--<input type="checkbox" name="is_active"
                                                                value="1" id="checkboxID">
                                                            <label for="checkboxID"></label>--}}

                                                    </div>



                                                </div>

                                            </div>

                                            <div class="card-body">
                                                <div class="infoHead">
                                                    <h3>
                                                        Documents Information
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="container py-3 row infoForm">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label">Completed and Signed
                                                            W-9 form</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="file"
                                                            id="formFile">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label">Voided Check</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="fileone"
                                                            id="formFile">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label">Clinical Lab
                                                            Improvement Amendment – CLIA Certificate</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="filetwo"
                                                            id="formFile">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label">Certificate of Filing
                                                            (Office of the Secretary of State)</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="filethree"
                                                            id="formFile">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label">CP-575 (Department of
                                                            the Treasury, Internal Revenue Service)</label>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="filefour"
                                                            id="formFile">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label">Copy of State Medical
                                                            Licenses</label>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="filefive"
                                                            id="formFile">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label">Copy of Driver’s
                                                            License</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="filesix"
                                                            id="formFile">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label">Copy of DEA</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="fileseven"
                                                            id="formFile">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label">Copy of DPS</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="fileeight"
                                                            id="formFile">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label">Updated
                                                            Resume</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="filenine"
                                                            id="formFile">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label">Copy of Professional
                                                            Liability Insurance</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="fileten"
                                                            id="formFile">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label">Copy of RN & APRN
                                                            Licenses (if provider is a Nurse Practitioner)</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="fileeleven"
                                                            id="formFile">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label">Credentialing
                                                            questionnaire</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="filetwelve"
                                                            id="formFile">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label">Other</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="filethird"
                                                            id="formFile">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default cbtn  modalCancel"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit"
                                                    class="btn btn-action cbtn modalSave">Submit</button>
                                            </div>
                                            {{-- <div class="row justify-content-end mx-0 mt-4">
                                                <button type="button" class="btn btn-default cbtn col-2" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-action cbtn col-2">Save</button>
                                            </div> --}}
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
</div>



<div class="modal fade" id="viewprovidmyEditModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white d-flex justify-content-center">
                <h4 style="text-align: center;">Individual Provider Information</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    onclick="location.reload();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="login-box-wrap d-block ">
                    <div class="login-main">

                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <select id="vclinic_id" class="form-control" disabled>
                                    <option value="">Select Clinic</option>
                                    @foreach ($team->all() as $team)
                                        <option value="{{ $team->id }}">{{ Str::title($team->name) }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col">
                                <p id="vname"></p>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vssn"></p>
                            </div>
                            <div class="col">
                                <p id="vmdnppa"></p>
                            </div>
                        </div>

                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vps"></p>
                            </div>
                            <div class="col">
                                <p id="vdob"></p>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vphone"></p>
                            </div>
                            <div class="col">
                                <p id="vemail"></p>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vindnpi"></p>
                            </div>
                            <div class="col">
                                <p id="vstatel"></p>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vlid"></p>
                            </div>
                            <div class="col">
                                <p id="vled"></p>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vdriverl"></p>
                            </div>
                            <div class="col">
                                <p id="vdlid"></p>
                            </div>

                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vdled"></p>
                            </div>
                            <div class="col">
                                <p id="vdeal"></p>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vdeaid"></p>
                            </div>
                            <div class="col">
                                <p id="vdeaed"></p>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vdpsl"></p>
                            </div>
                            <div class="col">
                                <p id="vdpsid"></p>
                            </div>

                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vdpsed"></p>
                            </div>
                            <div class="col">
                                <p id="vmedicarenum"></p>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vmedicareeff"></p>
                            </div>
                            <div class="col">
                                <p id="vmedicaidnum"></p>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vmedicaideff"></p>
                            </div>

                            <div class="col">
                                <p id="vcaqhnum"></p>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vusername"></p>
                            </div>
                            <div class="col">
                                <p id="vpassword"></p>
                            </div>
                        </div>

                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vpob"></p>
                            </div>
                            <div class="col">
                                <p id="vsob"></p>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <p id="vcitizenship"></p>
                            </div>
                            <div class="col">
                                <p id="vhospitalprivileges"></p>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <label for="">Will this provider only be acting as a Supervising Physician?
                            </label>
                            <div class="col">
                                <span class="form-check form-switch">
                                    <input class="form-check-input" name="is_active" value="1" checked
                                        type="checkbox" id="flexSwitchCheckDefault">
                                </span>
                            </div>
                        </div>

                        <div class="row" style="padding: 10px !important;">

                            <div class="col">
                                <label for="formFile" class="form-label">Completed and Signed W-9 form</label>
                            </div>
                            <div class="col" id="vformFileo">

                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <label for="formFile" class="form-label">Voided Check</label>
                            </div>
                            <div class="col" id="vformFileone">

                            </div>
                        </div>
                        <div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <label for="formFile" class="form-label">Clinical Lab Improvement Amendment – CLIA
                                    Certificate</label>
                            </div>
                            <div class="col" id="vformFiletwo">

                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col">
                            <label for="formFile" class="form-label">Certificate of Filing (Office of the Secretary of
                                State)</label>
                        </div>
                        <div class="col" id="vformFilethree">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col">
                            <label for="formFile" class="form-label">CP-575 (Department of the Treasury, Internal
                                Revenue Service)</label>

                        </div>
                        <div class="col" id="vformFilefour">

                        </div>
                    </div>

                    <div class="row" style="padding: 10px !important;">
                        <div class="col">
                            <label for="formFile" class="form-label">Copy of State Medical Licenses</label>

                        </div>
                        <div class="col" id="vformFilefive">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col">
                            <label for="formFile" class="form-label">Copy of Driver’s License</label>

                        </div>
                        <div class="col" id="vformFilesix">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col">
                            <label for="formFile" class="form-label">Copy of DEA</label>

                        </div>
                        <div class="col" id="vformFileseven">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col">
                            <label for="formFile" class="form-label">Copy of DPS</label>

                        </div>
                        <div class="col" id="vformFileeight">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col">
                            <label for="formFile" class="form-label">Updated Resume</label>

                        </div>
                        <div class="col" id="vformFilenine">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col">
                            <label for="formFile" class="form-label">Copy of Professional Liability Insurance</label>

                        </div>
                        <div class="col" id="vformFileten">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col">
                            <label for="formFile" class="form-label">Copy of RN & APRN Licenses (if provider is a
                                Nurse Practitioner)</label>

                        </div>
                        <div class="col" id="vformFileeleven">

                        </div>

                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col">
                            <label for="formFile" class="form-label">Credentialing questionnaire</label>

                        </div>
                        <div class="col" id="vformFiletwelve">

                        </div>

                    </div>

                    <div class="row" style="padding: 10px !important;">
                        <div class="col">
                            <label for="formFile" class="form-label">Other</label>

                        </div>
                        <div class="col" id="vformFilethird">

                        </div>

                    </div>



                </div>
            </div>
        </div>

    </div>
</div>
</div>




{{--    MODAL --}}


<div class="modal fade addProviderModal" id="myEditModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-header">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('client') }}">Provider</a></li>
                            <li class="breadcrumb-item active"><a href="#">Update Provider</a></li>
                        </ol>
                    </nav>
                    <h1>Edit Provider</h1>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="location.reload();"></button>
            </div>
            <div class="modal-body">
                <div class="login-box-wrap d-block ">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form" enctype="multipart/form-data" action="{{ route('client-update') }}">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/client/update">
                            <input name="id" id="id" type="hidden" value="">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <input name="isForm" type="hidden" value="1">
                            <div class="row" >
                                <div class="col-md-6">
                                    <label for="">Clinic: </label>
                                    <select name="clinicid" id="clinic_id" class="form-control" readonly="">
                                        <option value="">Select Clinic</option>
                                        @foreach ($team->all() as $team)
                                            <option value="{{ $team->id }}">{{ Str::title($team->name) }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="">Name: (First, Middle Initial, Last Name) <span
                                            class="text-danger">*</span></label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        required="">
                                </div>

                                    <div class="col-12 col-md-4"> <label for="">SSN:</label>
                                        <input name="ssn" type="text" class="form-control" id="ssn">
                                        <input name="mdnppa" id="mdnppah" type="hidden" value="">

                                    </div>
                                    <div class="col-12 col-md-8 radio mt-auto mb-0" style="overflow-x: auto">
                                        <p id="mdnppa" style="margin: auto;color: red; padding-right: 10px;white-space: nowrap;"></p>
                                        <label class="" for="exampleRadios1">
                                            MD
                                        </label>
                                        <input class="" type="radio" name="mdnppa" value="md">
                                        <label class="" for="exampleRadios1">
                                            NP
                                        </label>
                                        <input class="" type="radio" name="mdnppa" value="np">

                                        <label class="" for="exampleRadios1">
                                            PA
                                        </label>
                                        <input class="" type="radio" name="mdnppa" value="pa">
                                        <label class="" for="exampleRadios1">
                                            LPC
                                        </label>
                                        <input class="" type="radio" name="mdnppa" value="lpc">
                                        <label class="" for="exampleRadios1">
                                            SLP
                                        </label>
                                        <input class="" type="radio" name="mdnppa" value="slp">
                                        <label class="" for="exampleRadios1">
                                            DO
                                        </label>
                                        <input class="" type="radio" name="mdnppa" value="do">
                                        <label class="" for="exampleRadios1">
                                            DPM
                                        </label>
                                        <input class="" type="radio" name="mdnppa" value="dpm">
                                        <label class="" for="exampleRadios1">
                                            Therapist
                                        </label>
                                        <input class="" type="radio" name="mdnppa" value="therapist">
                                        <label class="" for="exampleRadios1">
                                            Dme
                                        </label>
                                        <input class="" type="radio" name="mdnppa" value="dme">

                                    </div>


                                <div class="col-12 col-md-3">
                                    <label for="">Primary Specialty : <span
                                            class="text-danger">*</span></label>
                                    <input name="ps" type="text" class="form-control" id="ps">
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="">DOB :</label>
                                    <input name="dob" type="date" class="form-control" id="dob">
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="">Phone :</label>
                                    <input name="phone" type="text" class="form-control" id="phone">
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="">Email Address :</label>
                                    <input name="email" type="text" class="form-control" id="email">
                                </div>

                                <div class="col-12 col-md-3">
                                    <label for="">Ind NPI </label>
                                    <input name="indnpi" type="text" class="form-control" id="indnpi">
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="">State License :</label>
                                    <input name="statel" type="text" class="form-control" id="statel">
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="">License Issue Date :</label>
                                    <input name="lid" type="date" class="form-control" id="lid">
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="">License Exp. Date :</label>
                                    <input name="led" type="date" class="form-control" id="led">
                                </div>

                                <div class="col-12 col-md-4">
                                    <label for="">Driver’s License :</label>
                                    <input name="driverl" type="text" class="form-control" id="driverl">
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="">License Issue Date :</label>
                                    <input name="dlid" type="date" class="form-control" id="dlid">
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="">License Exp. Date :</label>
                                    <input name="dled" type="date" class="form-control" id="dled">
                                </div>

                                <div class="col-12 col-md-4">
                                    <label for="">DEA License :</label>
                                    <input name="deal" type="text" class="form-control" id="deal">
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="">DEA Issue Date :</label>
                                    <input name="deaid" type="date" class="form-control" id="deaid">
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="">DEA Exp. Date :</label>
                                    <input name="deaed" type="date" class="form-control" id="deaed">
                                </div>

                                <div class="col-12 col-md-4">
                                    <label for="">DPS License :</label>
                                    <input name="dpsl" type="text" class="form-control" id="dpsl">
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="">DPS Issue Date :</label>
                                    <input name="dpsid" type="date" class="form-control" id="dpsid">
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="">DPS Exp. Date :</label>
                                    <input name="dpsed" type="date" class="form-control" id="dpsed">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="">Medicare Number :</label>
                                    <input name="medicarenum" type="text" class="form-control" id="medicarenum">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="">Medicare Effective Date :</label>
                                    <input name="medicareeff" type="date" class="form-control" id="medicareeff">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="">Medicaid Number :</label>
                                    <input name="medicaidnum" type="text" class="form-control" id="medicaidnum">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="">Medicaid Effective Date :</label>
                                    <input name="medicaideff" type="date" class="form-control" id="medicaideff">
                                </div>

                                <div class="col-12 col-md-4">
                                    <label for="">CAQH Number :</label>
                                    <input name="caqhnum" type="text" class="form-control" id="caqhnum">
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="">CAQH Username :</label>
                                    <input name="username" type="text" class="form-control" id="username">
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="">CAQH Password :</label>
                                    <input name="password" type="text" class="form-control" id="password">
                                </div>


                                <div class="col-12 col-md-4">
                                    <label for="">{{--Will this provider only be acting as a Supervising
                                        Physician?--}}Provider Status
                                    </label>
                                    <span class="form-check form-switch">
                                       {{-- <input class="form-check-input" name="is_active" value="1" checked
                                            type="checkbox" id="flexSwitchCheckDefault">--}}
                                        <select name="is_active" id="is_actives" class="modalDropdown">
                                       <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="In-active">In Active</option>
                                            <option value="Successfull">Successfull</option>
                                            <option value="No-longer">No Longer</option>
                                    </select>
                                    </span>
                                </div>

                                <div class="col-12 col-md-4">
                                    <label for="">Place of Birth :</label>
                                    <input name="pob" type="text" class="form-control" id="pob">
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="">State of Birth :</label>
                                    <input name="sob" type="text" class="form-control" id="sob">
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="">Citizenship :</label>
                                    <input name="citizenship" type="text" class="form-control"
                                        id="citizenship">
                                </div>
                            </div>

                    <div class="mb-3">
                        <label for="">Hospital Privileges : </label>
                        <input name="hospitalprivileges" type="text" class="form-control"
                            id="hospitalprivileges">
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col-12 col-md-6">
                            <label for="formFile" class="form-label">Completed and Signed W-9 form</label>
                        </div>
                        <div class="col-12 col-md-6" id="formFileo">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col-12 col-md-6">
                            <label for="formFile" class="form-label">Voided Check</label>
                        </div>
                        <div class="col-12 col-md-6" id="formFileone">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col-12 col-md-6">
                            <label for="formFile" class="form-label">Clinical Lab Improvement Amendment –
                                CLIA Certificate</label>
                        </div>
                        <div class="col-12 col-md-6" id="formFiletwo">

                        </div>
                    </div>

                    <div class="row" style="padding: 10px !important;">
                        <div class="col-12 col-md-6">
                            <label for="formFile" class="form-label">Certificate of Filing (Office of the
                                Secretary of State)</label>
                        </div>
                        <div class="col-12 col-md-6" id="formFilethree">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col-12 col-md-6">
                            <label for="formFile" class="form-label">CP-575 (Department of the Treasury,
                                Internal Revenue Service)</label>

                        </div>
                        <div class="col-12 col-md-6" id="formFilefour">

                        </div>
                    </div>

                    <div class="row" style="padding: 10px !important;">
                        <div class="col-12 col-md-6">
                            <label for="formFile" class="form-label">Copy of State Medical Licenses</label>

                        </div>
                        <div class="col-12 col-md-6" id="formFilefive">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col-12 col-md-6">
                            <label for="formFile" class="form-label">Copy of Driver’s License</label>

                        </div>
                        <div class="col-12 col-md-6" id="formFilesix">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col-12 col-md-6">
                            <label for="formFile" class="form-label">Copy of DEA</label>

                        </div>
                        <div class="col-12 col-md-6" id="formFileseven">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col-12 col-md-6">
                            <label for="formFile" class="form-label">Copy of DPS</label>

                        </div>
                        <div class="col-12 col-md-6" id="formFileeight">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col-12 col-md-6">
                            <label for="formFile" class="form-label">Updated Resume</label>

                        </div>
                        <div class="col-12 col-md-6" id="formFilenine">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col-12 col-md-6">
                            <label for="formFile" class="form-label">Copy of Professional Liability
                                Insurance</label>

                        </div>
                        <div class="col-12 col-md-6" id="formFileten">

                        </div>
                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col-12 col-md-6">
                            <label for="formFile" class="form-label">Copy of RN & APRN Licenses (if provider
                                is a Nurse Practitioner)</label>

                        </div>
                        <div class="col-12 col-md-6" id="formFileeleven">

                        </div>

                    </div>
                    <div class="row" style="padding: 10px !important;">
                        <div class="col-12 col-md-6">
                            <label for="formFile" class="form-label">Credentialing questionnaire</label>

                        </div>
                        <div class="col-12 col-md-6" id="formFiletwelve">

                        </div>

                    </div>

                    <div class="row" style="padding: 10px !important;">
                        <div class="col-12 col-md-6">
                            <label for="formFile" class="form-label">Other</label>

                        </div>
                        <div class="col-12 col-md-6" id="formFilethird">

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default cbtn modalCancel" data-bs-dismiss="modal"
                            onclick="location.reload();">Close</button>
                        <button type="submit" class="btn btn-action cbtn modalSave">Update</button>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>

<div class="modal fade" id="myEditModalCredentialing"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
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
                <div class="login-box-wrap d-block">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form"  action="{{route('credentialing-update')}}" enctype="multipart/form-data">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/insurance/update">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <input name="id" id="ids" type="hidden" value="">
                            <input name="isForm" type="hidden" value="1">
                            <div class="row" >
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
                            <div class="row" >
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
                            <div class="row" >
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
                                    <textarea id="veremarks" class="form-control editRemark" name="remarks[]" rows="6" cols="30">
                                        </textarea>
                                </div>

                                <div class="col-12 col-md-4">
                                    <br>
                                    <label for="inputPassword2" class="visually-hidden"></label>
                                    <button type="button" class="btn btn-outline-success w-100 add-more" style="font-size: 12px;">Add More</button>
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


{{--    MODAL --}}
<div class="modal fade" id="myModaladdCredentialing"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Credentialing</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="login-box-wrap d-block ">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form"  action="{{route('credentialing-save')}}" enctype="multipart/form-data">
                            @csrf
                            <input name="apiUrl" type="hidden" value="api/v1/insurance/add">
                            <input name="apiUrlMethod" type="hidden" value="POST">
                            <input name="isForm" type="hidden" value="1">
                            <div class="row">
                                <div class="col">
                                    <label for="">Clinic </label>
                                    <select name="clinic" id="selectclinicId" class="modalDropdown" required readonly="">
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
                            <div class="row">
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
                            <div class="row">
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

                                <div class="col-12 col-md-4 mt-auto mb-1">
                                    <br>
                                    <label for="inputPassword2" class="visually-hidden"></label>
                                    <button type="button" class="btn btn-outline-success  add-more w-100" style="font-size: 12px;">Add More</button>
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




<div class="modal fade addProviderModal" id="myModalviewCredentialing"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white d-flex justify-content-center">
                <h4 style="text-align: center;">Tracking Sheet Details</h4>
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
                        {{--<div class="row" style="padding: 10px !important;">
                            <div class="col">
                                <label for="">Credentialing </label>
                                <select id="vccredentialing" class="form-control" disabled>
                                    <option value="">Select Credentialing</option>
                                    <option value="Individual">Individual</option>
                                    <option value="Group">Group</option>
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
                        </div>--}}
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
