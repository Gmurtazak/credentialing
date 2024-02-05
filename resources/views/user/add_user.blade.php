@extends('layouts.app')

@section('content')
    @inject('department', 'App\Services\Department\DepartmentService')
    @inject('team', 'App\Services\Team\TeamService')
    @inject('role', 'App\Services\Role\RoleService')
    @inject('user', 'App\Services\User\UserService')
    @inject('country', 'App\Models\Country')
    @inject('state', 'App\Models\State')
    @inject('portal', 'App\Services\Portal\PortalService')
    @inject('account', 'App\Services\Account\AccountService')


    <div class="page-body patient-book">
        <div class="container-fluid">
            <form method="post" class="theme-form" role="form"  action="{{route('user-save')}}" enctype="multipart/form-data">
                @csrf
                <input name="apiUrl" type="hidden" value="api/v1/user/register">
                <input name="apiUrlMethod" type="hidden" value="POST">
                <input name="isForm" type="hidden" value="1">
                <div class="row top-bar">
                    <div class="col-sm-12 col-xl-7">
                        <h2>Add New User</h2>
                    </div>
                    <div class="col-sm-12 col-xl-5">
                        <div class="row">
                            <div class="row justify-content-end m-0">
                                <a type="button" class="btn btn-default cbtn col-2" href="{{route('user')}}" >Close</a>
                                <button type="submit" class="btn btn-action cbtn col-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="login-box-wrap d-block p-4" style="background-color: #F5F5F5;border-radius: 10px;">
                                <div class="login-main">
                                    <h4 class="mb-4">Personal Information</h4>
                                    <div class="mb-3">
                                        <label for="">Full Name <span class="text-danger">*</span></label>
                                        <input name="name" type="text" placeholder="Enter Full Name" class="form-control" required="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Pesudo Name <span class="text-danger">*</span></label>
                                        <input name="pesudo_name" type="text" placeholder="Enter Pesudo Name" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload User Profile Image<span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="file" id="formFile">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Email <span class="text-danger">*</span></label>
                                        <input name="email" type="email" placeholder="Enter Email" class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Phone </label>
                                        <input name="phone" type="text" placeholder="Enter Phone Number" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Address <span class="text-danger">*</span></label>
                                        <input name="address" type="text" placeholder="Enter Address" class="form-control" required="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Gender <span class="text-danger">*</span></label>
                                        <br>
                                        <div class="form-check form-check-inline required">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="m" required>
                                            <label class="form-check-label text-gray" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="f">
                                            <label class="form-check-label text-gray" for="inlineRadio2">Female</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Status <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col">
                                            <span class="form-check form-switch float-end">
                                                <input class="form-check-input" name="is_active" value="1" checked type="checkbox" id="flexSwitchCheckDefault">
                                            </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="login-box-wrap d-block p-4" style="background-color: #F5F5F5;border-radius: 10px;">
                                <div class="login-main">
                                    <h4 class="mb-4">Official Information</h4>
                                    <div class="mb-3">
                                        <label for="">Country <span class="text-danger">*</span></label>
                                        <select name="country" class="form-control" required>
                                            <option value="United States">United States</option>
                                            @foreach($country->all() as $country)
                                                <option value="{{$country->name}}">{{ Str::title($country->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">State <span class="text-danger">*</span></label>
                                        <select name="state" class="form-control" required>
                                            <option value="">Select State</option>
                                            @foreach($state->all() as $state)
                                                <option value="{{$state->name}}">{{ Str::title($state->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">City <span class="text-danger">*</span></label>
                                        <input name="city" type="text" placeholder="Enter City" class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Date of Birth <span class="text-danger">*</span></label>
                                        <input name="dob" id="date" type="date" placeholder="Enter Date of Birth" class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Employee ID <span class="text-danger">*</span></label>
                                        <input name="employee_id" type="text" placeholder="Enter Employee ID" class="form-control" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>


                                    <div class="mb-3">
                                        <input name="department_id" type="hidden" value="1">
                                        <input name="team_id" type="hidden" value="23">
                                        <input name="portal_id" type="hidden" value="3">
                                        <input name="accounts_id[]" type="hidden" value="18">
                                        <input name="job_description_id" type="hidden" value="1">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Role <span class="text-danger">*</span></label>
                                        <select name="role_id" class="form-control" required>
                                            <option value="">Select Role</option>
                                            @foreach($role->all() as $role)
                                                <option value="{{$role->id}}">{{ Str::title($role->role) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Reports to <span class="text-danger">*</span></label>
                                        <select name="report_to" class="form-control" required>
                                            <option value="">Select Report to</option>
                                            @foreach($user->all() as $user)
                                                <option value="{{$user->id}}">{{ Str::title($user->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>










                                    <!--
                                                                        <div class="mb-3">
                                                                           <div class="row">
                                                                               <div class="col">
                                                                                   <label for="">Account Active <span class="text-danger">*</span></label>
                                                                               </div>
                                                                              <div class="col">
                                                                               <span class="form-check form-switch float-end">
                                                                                   <input class="form-check-input" name="is_active" value="1" type="checkbox" id="flexSwitchCheckDefault">
                                                                               </span>
                                                                               </div>
                                                                           </div>

                                                                       </div>-->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection
