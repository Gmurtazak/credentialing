{{--MODAL--}}
@inject('user', 'App\Services\User\UserService');
<div class="modal fade addClinicModal" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('teams')}}">Clinics</a></li>
                                <li class="breadcrumb-item active"><a href="#">Add Clinic</a></li>
                            </ol>
                        </nav>
                        <h1>Add Clinic</h1>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>

                    <div class="modal-body">
                        <div class="login-box-wrap">
                            <div class="login-main">
                                <form method="post" class="theme-form" role="form" action="{{route('team-save')}}">
                                @csrf
                                <input name="apiUrl" type="hidden" value="api/v1/team/add">
                                <input name="apiUrlMethod" type="hidden" value="POST">

                                {{--<div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Team logo<span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" name="file"  id="formFile">
                                </div>--}}
                                <div class="row">
                                    <div class="col-md-4">
                                    <label for="">Legal Business Name : <span class="text-danger">*</span></label>
                                    <input name="name" type="text" class="form-control" id="exampleInputPassword1" required="">
                                    </div>
                                    <div class="col-md-4">
                                    <label for="">Name of Principal Owner :</label>
                                    <input name="principalowner" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-4">
                                    <label for="">Primary Correspondence Address :</label>
                                    <input name="primaryaddress" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Phone : <span class="text-danger">*</span></label>
                                        <input name="phone" type="text" class="form-control" id="exampleInputPassword1" required="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Fax :</label>
                                        <input name="fax" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Email Address :</label>
                                        <input name="email" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Group Specialty :</label>
                                        <input name="groupspecialty" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Facility NPI :</label>
                                        <input name="facilitynpi" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Facility Tax ID :</label>
                                        <input name="facilitytax" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Federal Tax Classification :</label>
                                        <input name="facilitytaxclass" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">CLIA Number :</label>
                                        <input name="clianumber" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">CLIA Issue Date :</label>
                                        <input name="cliaissue" type="date" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">CLIA Expiration Date :</label>
                                        <input name="cliaexpiration" type="date" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Business Establishment Date :</label>
                                        <input name="businessestab" type="date" class="form-control" id="exampleInputPassword1">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Medicare  Number :</label>
                                        <input name="medicarenum" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Medicare Effective Date :</label>
                                        <input name="medicareeff" type="date" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Medicaid Number :</label>
                                        <input name="medicaidnum" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Medicaid Effective Date :</label>
                                        <input name="medicaideff" type="date" class="form-control" id="exampleInputPassword1">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Doing Business As
                                            (if different from LBN) :
                                        </label>
                                        <input name="doingbusiness" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Name of Principal Provider :</label>
                                        <input name="nameofprovider" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Name of Office Manager :</label>
                                        <input name="nameofoffice" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Practice Location Address :</label>
                                        <input name="practicelocation" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Phone :</label>
                                        <input name="pphone" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Fax :</label>
                                        <input name="ffax" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>

                                        <div class="col-12">
                                            <label for="">Does the Practice Location use an Electronic Medical Records?
                                                (software/portal) for storage of Patient Records?
                                                </label>
                                           {{--<span class="form-check form-switch">
                                                <input class="form-check-input" name="is_active" value="1" checked type="checkbox" id="flexSwitchCheckDefault">
                                            </span>--}}
                                        </div>
                                    <div class="col-md-4">
                                        <label for="">Status </label>
                                        <select name="is_active" class="modalDropdown">
                                            <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="In-active">In Active</option>
                                            <option value="Successfull">Successfull</option>
                                            <option value="No-longer">No Longer</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Name of EMR Software/Portal :</label>
                                        <input name="nameofemr" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Name of Billing Software previously used :</label>
                                        <input name="nameofbilling" type="text" class="form-control" id="exampleInputPassword1">
                                    </div>

                                </div>

                                {{--<div class="mb-3">
                                    <label for="">Team Lead <span class="text-danger">*</span></label>
                                    <select name="team_lead_id" class="form-control" required>
                                        <option value="">Select Team Lead</option>
                                        @foreach($user->all() as $user)
                                            <option value="{{$user->id}}">{{ Str::title($user->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>--}}

                               {{-- <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="">Team Active <span class="text-danger">*</span></label>
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
                                </div>--}}
                                <!-- Modal Footer -->
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-default cbtn  modalCancel"
                                            data-bs-dismiss="modal">Cancel</button>
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


<div class="modal fade addClinicModal" id="myEditModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('teams')}}">Clinics</a></li>
                            <li class="breadcrumb-item active"><a href="#">Update Clinic</a></li>
                        </ol>
                    </nav>
                    <h1>Edit Clinic</h1>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="login-box-wrap d-block">
                    <div class="login-main">
                        <form method="post" class="theme-form" role="form" action="{{route('team-save')}}">
                            @csrf
                            <input name="apiUrl" id="apiUrl" type="hidden" value="api/v1/team/update">
                            <input name="id" id="id" type="hidden" value="">
                            <input name="apiUrlMethod" type="hidden" value="POST">

                            <div class="row" >
                                <div class="col-md-4">
                                    <label for="">Legal Business Name : <span class="text-danger">*</span></label>
                                    <input name="name" type="text" class="form-control" id="name" required="">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Name of Principal Owner :</label>
                                    <input name="principalowner" type="text" class="form-control" id="principalowner">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Primary Correspondence Address :</label>
                                    <input name="primaryaddress" type="text" class="form-control" id="primaryaddress">
                                </div>

                                <div class="col-md-4">
                                    <label for="">Phone : <span class="text-danger">*</span></label>
                                    <input name="phone" type="text" class="form-control" id="phone" required="">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Fax :</label>
                                    <input name="fax" type="text" class="form-control" id="fax">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Email Address :</label>
                                    <input name="email" type="text" class="form-control" id="email">
                                </div>

                                <div class="col-md-3">
                                    <label for="">Group Specialty :</label>
                                    <input name="groupspecialty" type="text" class="form-control" id="groupspecialty">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Facility NPI :</label>
                                    <input name="facilitynpi" type="text" class="form-control" id="facilitynpi">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Facility Tax ID :</label>
                                    <input name="facilitytax" type="text" class="form-control" id="facilitytax">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Federal Tax Classification :</label>
                                    <input name="facilitytaxclass" type="text" class="form-control" id="facilitytaxclass">
                                </div>

                                <div class="col-md-3">
                                    <label for="">CLIA Number :</label>
                                    <input name="clianumber" type="text" class="form-control" id="clianumber">
                                </div>
                                <div class="col-md-3">
                                    <label for="">CLIA Issue Date :</label>
                                    <input name="cliaissue" type="date" class="form-control" id="cliaissue">
                                </div>
                                <div class="col-md-3">
                                    <label for="">CLIA Expiration Date :</label>
                                    <input name="cliaexpiration" type="date" class="form-control" id="cliaexpiration">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Business Establishment Date :</label>
                                    <input name="businessestab" type="date" class="form-control" id="businessestab">
                                </div>

                                <div class="col-md-3">
                                    <label for="">Medicare  Number :</label>
                                    <input name="medicarenum" type="text" class="form-control" id="medicarenum">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Medicare Effective Date :</label>
                                    <input name="medicareeff" type="date" class="form-control" id="medicareeff">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Medicaid Number :</label>
                                    <input name="medicaidnum" type="text" class="form-control" id="medicaidnum">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Medicaid Effective Date :</label>
                                    <input name="medicaideff" type="date" class="form-control" id="medicaideff">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Doing Business As
                                        (if different from LBN) :
                                    </label>
                                    <input name="doingbusiness" type="text" class="form-control" id="doingbusiness">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Name of Principal Provider :</label>
                                    <input name="nameofprovider" type="text" class="form-control" id="nameofprovider">
                                </div>

                                <div class="col-md-3">
                                    <label for="">Name of Office Manager :</label>
                                    <input name="nameofoffice" type="text" class="form-control" id="nameofoffice">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Practice Location Address :</label>
                                    <input name="practicelocation" type="text" class="form-control" id="practicelocation">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Phone :</label>
                                    <input name="pphone" type="text" class="form-control" id="pphone">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Fax :</label>
                                    <input name="ffax" type="text" class="form-control" id="ffax">
                                </div>

                                <div class="col-12">

                                    <label for="">Does the Practice Location use an Electronic Medical Records?
                                        (software/portal) for storage of Patient Records
                                    </label>
                                           {{--<span class="form-check form-switch">
                                                <input class="form-check-input" name="is_active" value="1" checked type="checkbox" id="is_active">
                                            </span>--}}
                                </div>
                                <div class="col-md-4">
                                    <label for="">Status </label>
                                    <select name="is_active" id="is_active" class="modalDropdown">
                                        <option value="">Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="In-active">In Active</option>
                                        <option value="Successfull">Successfull</option>
                                        <option value="No-longer">No Longer</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="">Name of EMR Software/Portal :</label>
                                    <input name="nameofemr" type="text" class="form-control" id="nameofemr">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Name of Billing Software previously used :</label>
                                    <input name="nameofbilling" type="text" class="form-control" id="nameofbilling">
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default cbtn modalCancel" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-action cbtn modalSave">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




{{--    MODAL--}}


<div class="modal fade addProviderModal viewBusinessModal" id="viewmyEditModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <div>

                    <h1>View Business Information</h1>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="login-box-wrap d-block">
                    <div class="login-main">

                            <div class="row" >
                                <div class="col-12 col-md-3">
                                    <label   id="vname"></label>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label   id="vprincipalowner"></label>
                                </div>

                                <div class="col-12 col-md-3">
                                    <label   id="vprimaryaddress"></label>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label   id="vphone"></label>
                                </div>

                                <div class="col-12 col-md-3">
                                    <label   id="vfax"></label>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label   id="vemail"></label>
                                </div>

                                <div class="col-12 col-md-3">
                                    <label   id="vgroupspecialty"></label>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label   id="vfacilitynpi"></label>
                                </div>

                                <div class="col-12 col-md-3">
                                    <label   id="vfacilitytax"></label>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label   id="vfacilitytaxclass"></label>
                                </div>

                                <div class="col-12 col-md-3">
                                    <label   id="vclianumber"></label>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label   id="vcliaissue"></label>
                                </div>

                                <div class="col-12 col-md-3">
                                    <label   id="vcliaexpiration"></label>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label   id="vbusinessestab"></label>
                                </div>

                                <div class="col-12 col-md-3">
                                    <label   id="vmedicarenum"></label>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label   id="vmedicareeff"></label>
                                </div>

                                <div class="col-12 col-md-3">
                                    <label   id="vmedicaidnum"></label>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label   id="vmedicaideff"></label>
                                </div>

                                <div class="col-12 col-md-3">
                                    <label   id="vdoingbusiness"></label>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label   id="vnameofprovider"></label>
                                </div>

                                <div class="col-12 col-md-3">
                                    <label   id="vnameofoffice"></label>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label   id="vpracticelocation"></label>
                                </div>

                                <div class="col-12 col-md-3">
                                    <label   id="vpphone"></label>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label   id="vffax"></label>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                {{-- <center> --}}
                                    <label for="" class="text-gray font-size-6" >Does the Practice Location use an Electronic Medical Records?
                                        (software/portal) for storage of Patient Records?
                                    </label>
                                {{-- </center> --}}
                                <div class="col">
                                    <div class="col-12 col-md-3">
                                                <label id="is_actives"></label>
                                              {{--  <input class="form-check-input" name="is_active" value="1" checked type="checkbox" id="is_active">--}}
                                    </div>
                                </div>
                            </div>

                            <div class="row" >
                                <div class="col">
                                    <label id="vnameofemr"></label>
                                </div>
                                <div class="col">
                                    <label id="vnameofbilling"></label>
                                </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<div class="modal fade viewBusinessModal" id="viewmyEditdModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <div>

                    <h1>Provider Details </h1>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close" onclick="location.reload();"></button>
            </div>
            <div class="modal-body">
                <div class="login-box-wrap d-block">
                    <div class="login-main">

                        <div class="row" >
                            <div class="col-12">
                                <div id="userview"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


