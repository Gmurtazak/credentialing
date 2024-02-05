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
            <form method="post" class="theme-form" role="form"  action="{{route('user-update')}}" enctype="multipart/form-data">
                @csrf

                <input name="apiUrl" type="hidden" value="api/v1/user/update">
                <input name="id" id="id" type="hidden" value="{{$users->id}}">
                <input name="apiUrlMethod" type="hidden" value="POST">
                <input name="isForm" type="hidden" value="1">
                <input name="accounts_id" type="hidden" value="{{$users->accounts_id}}">

                <div class="row top-bar">
                    <div class="col-sm-12 col-xl-7">
                        <h2>Edit User</h2>
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
                                        <input name="name" type="text" placeholder="Enter Full Name" class="form-control" value="{{$users->name}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Pesudo Name <span class="text-danger">*</span></label>
                                        <input name="pesudo_name" type="text" placeholder="Enter Pesudo Name" class="form-control" value="{{$users->pesudo_name}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload User Profile Image<span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="file" id="formFile">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Email <span class="text-danger">*</span></label>
                                        <input name="email" type="email" placeholder="Enter Email" class="form-control" value="{{$users->email}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Phone <span class="text-danger">*</span></label>
                                        <input name="phone" type="text" placeholder="Enter Phone Number" class="form-control" required="" value="{{$users->phone}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Address <span class="text-danger">*</span></label>
                                        <input name="address" type="text" placeholder="Enter Address" class="form-control" required="" value="{{$users->address}}">
                                    </div>
                                    <script>
                                        function myNewFunction(sel) {
                                            var selected = sel.options[sel.selectedIndex];
                                            var value = selected.getAttribute('data-related');
                                            const target = $('#target');
                                            target.find('option[selected]').removeAttr('selected');
                                            if(value =='-1'){
                                                target.find('option').show().first().attr('selected', 'selected');
                                            }else{
                                                $('#target option').hide().addBack().find(`[data-search=${value}]`).show().attr('selected', 'selected');
                                            }

                                        }
                                    </script>
                                    <div class="mb-3">
                                        <label for="">Country <span class="text-danger">*</span></label>
                                        <select name="country" class="form-control" required id="box1" onChange="myNewFunction(this);">
                                            <option value="">Select Country</option>
                                            @foreach($country->all() as $country)
                                                <option data-related={{ $country->id }} {{ ($users->country==$country->name)?'selected':'' }} value="{{$country->name}}">{{ Str::title($country->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">

                                        <label for="">State <span class="text-danger">*</span></label>
                                        <select name="state" id="state" class="form-control" required>
                                            <option value="">Select State</option>
                                            @foreach($state->all() as $state)
                                                <option data-search={{ $state->id }} {{ ($users->state==$state->name)?'selected':'' }} value="{{$state->name}}">{{ Str::title($state->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">City <span class="text-danger">*</span></label>
                                        <input name="city" type="text" placeholder="Enter City" class="form-control" required="" value="{{$users->city}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Gender <span class="text-danger">*</span></label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" {{ ($users->gender=='m')?'checked':'' }} type="radio" name="gender" id="inlineRadio1" value="m">
                                            <label class="form-check-label text-gray" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" {{ ($users->gender=='f')?'checked':'' }} type="radio" name="gender" id="inlineRadio2" value="f">
                                            <label class="form-check-label text-gray" for="inlineRadio2">Female</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                                <label for="">User Active <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col">
                                           <span class="form-check form-switch float-end">
                                                <input class="form-check-input" name="is_active" value="1" {{ ($users->is_active==1)?'checked':'' }} type="checkbox" id="flexSwitchCheckDefault">
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
                                        <label for="">Date of Birth <span class="text-danger">*</span></label>
                                        <input name="dob" id="date" type="date" placeholder="Enter Date of Birth" class="form-control" required="" value="{{\Carbon\Carbon::parse($users->dob)->format('Y-m-d')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Employee ID <span class="text-danger">*</span></label>
                                        <input name="employee_id" type="text" placeholder="Enter Employee ID" class="form-control" required="" value="{{$users->employee_id}}">
                                    </div>
                                    <!--<div class="mb-3">
                                        <label for="">Phone <span class="text-danger">*</span></label>
                                        <input name="plan_group" type="text" placeholder="Enter Phone Number" class="form-control" required="">
                                    </div>-->

                                    <div class="mb-3">
                                        <label for="">Department <span class="text-danger">*</span></label>
                                        <select name="department_id" class="form-control" required>
                                            <option value="">Select Department</option>
                                            @foreach($department->all() as $department)
                                                <option value="{{$department->id}}"  {{ ($users->department_id==$department->id)?'selected':'' }}>{{ Str::title($department->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Team <span class="text-danger">*</span></label>
                                        <select name="team_id" class="form-control" required>
                                            <option value="">Select Team</option>
                                            @foreach($team->all() as $team)
                                                <option value="{{$team->id}}" {{ ($users->team_id==$team->id)?'selected':'' }}>{{ Str::title($team->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--                                    <div class="mb-3">--}}
                                    {{--                                        <label for="">Role <span class="text-danger">*</span></label>--}}
                                    {{--                                        <select name="role_id" class="form-control" required>--}}
                                    {{--                                            <option value="">Select Role</option>--}}
                                    {{--                                            @foreach($role->all() as $role)--}}
                                    {{--                                                <option value="{{$role->id}}">{{ Str::title($role->role) }}</option>--}}
                                    {{--                                            @endforeach--}}
                                    {{--                                        </select>--}}
                                    {{--                                    </div>--}}
                                    <div class="mb-3">
                                        <label for="">Role<span class="text-danger">*</span></label>
                                        <select name="role_id" class="form-control" required>
                                            <option value="">Select Role</option>
                                            @foreach($role->all() as $role)
                                                <option value="{{$role->id}}" {{ ($users->roles[0]->id==$role->id)?'selected':'' }}>{{ Str::title($role->role) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Reports to <span class="text-danger">*</span></label>
                                        <select name="report_to" class="form-control" required>
                                            <option value="">Select Report to</option>
                                            @foreach($user->all() as $user)
                                                <option value="{{$user->id}}" {{ ($users->report_to==$user->id)?'selected':'' }}>{{ Str::title($user->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Portal Name <span class="text-danger">*</span></label>
                                        <select name="portal_id" id="portal_name_get"  class="form-control" required>
                                            <option value="">Select Portal Name</option>
                                            @foreach($portal->all() as $portal)
                                                <option value="{{$portal->id}}" {{ ($users->portal_id==$portal->id)?'selected':'' }}>{{ Str::title($portal->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="">Select Multiple Account


                                            <span class="text-danger">*</span></label><br>
                                        <select name="accounts_id[]" id="portal_name_get" style="background-image: none;" class="select col-12" multiple data-mdb-placeholder="Example placeholder" multiple>

                                             @foreach($account->all() as $account)
                                                 <option value="{{$account->id}}"
                                                 @foreach ($useraccout as $p)
                                                     {{  ($p->accounts_id==$account->id)?'selected':'' }}
                                                     @endforeach
                                                 >{{ Str::title($account->name) }}</option>

                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Job Description <span class="text-danger">*</span></label>
                                        <select name="job_description_id" id="portal_name_get" class="form-control" required>
                                            <option value="">Select Portal Name</option>
                                            {{$job_descriptions = App\Models\JobDescription::all()}}
                                            @foreach($job_descriptions as $job_description)
                                                <option value="{{$job_description->id}}" {{ ($users->job_description_id==$job_description->id)?'selected':'' }}>{{ Str::title($job_description->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Reports to <span class="text-danger">*</span></label>
                                        <select name="report_to" class="form-control" required>
                                            <option value="">Select Report to</option>
                                            @foreach($user->all() as $user)
                                                <option value="{{$user->id}}" {{ ($users->report_to==$user->id)?'selected':'' }}>{{ Str::title($user->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>




                                                {{--                                    <div class="mb-3 hide">--}}
                                                {{--                                        <label for="">Project <span class="text-danger">*</span></label>--}}
                                                {{--                                        <select name="project_id" class="form-control" required>--}}
                                                {{--                                            <option value="">Select Project</option>--}}
                                                {{--                                            @foreach($project->all() as $project)--}}
                                                {{--                                                <option value="{{$project->id}}" {{ ($users->project_id==$project->id)?'selected':'' }}>{{ Str::title($project->name) }}</option>--}}
                                                {{--                                            @endforeach--}}
                                                {{--                                        </select>--}}
                                                {{--                                    </div>--}}

                                                {{--                                    <div class="mb-3 hide">--}}
                                                {{--                                        <div class="row">--}}
                                                {{--                                            <div class="col">--}}
                                                {{--                                                <label for="">Account Active <span class="text-danger">*</span></label>--}}
                                                {{--                                            </div>--}}
                                                {{--                                            <div class="col">--}}
                                                {{--                                            <span class="form-check form-switch float-end">--}}
                                                {{--                                                <input class="form-check-input" name="is_active" value="1" type="checkbox" id="flexSwitchCheckDefault">--}}
                                                {{--                                            </span>--}}
                                                {{--                                            </div>--}}
                                                {{--                                        </div>--}}
                                                {{--                                    </div>--}}
                                            </div>
                                </div>
                            </div>

                        </div>
                    </div>
            </form>
        </div>
    </div>



@endsection
