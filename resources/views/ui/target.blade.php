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
                <div class="row top-bar">
                    <div class="col-sm-12 col-xl-7">
                        <h2>Set Monthly Target</h2>
                    </div>
                    <div class="col-sm-12 col-xl-5">
                        <div class="row">
                            <div class="col search-wrap">
                                <label for="">Month</label>
                                <select placeholder="Select Month" name="month" id="keyword" class="form-control">
                                    <option value="" style="display:none;">Select Month</option>
                                    <option value="01">
                                        January</option>
                                    <option value="02">
                                        February</option>
                                    <option value="03">
                                        March</option>
                                    <option value="04">
                                        April</option>
                                    <option value="05">
                                        May</option>
                                    <option value="06">
                                        June</option>
                                    <option value="07">
                                        July</option>
                                    <option value="08">
                                        August</option>
                                    <option value="09">
                                        September</option>
                                    <option value="10">
                                        October</option>
                                    <option value="11">
                                        November</option>
                                    <option value="12">
                                        December</option>
                                </select>
                            </div>
                            <div class="col search-wrap">
                                <label for="">Year</label>
                                <select placeholder="Select Year" name="year" id="keyword" class="form-control">
                                    <option value="" style="display:none;">Select Year</option>
                                    <option value="2017">
                                        2017</option>
                                    <option value="2018">
                                        2018</option>
                                    <option value="2019">
                                        2019</option>
                                    <option value="2020">
                                        2020</option>
                                    <option value="2021">
                                        2021</option>
                                    <option value="2022">
                                        2022</option>
                                    <option value="2023">
                                        2023</option>
                                    <option value="2024">
                                        2024</option>
                                    <option value="2025">
                                        2025</option>
                                    <option value="2026">
                                        2026</option>
                                    <option value="2027">
                                        2027</option>
                                    <option value="2028">
                                        2028</option>
                                    <option value="2029">
                                        2029</option>
                                    <option value="2030">
                                        2030</option>
                                    <option value="2031">
                                        2031</option>
                                    <option value="2032">
                                        2032</option>
                                </select>
                            </div>
                            <div class="col">
                                <div class="pt-4">
                                    <button type="submit" class="btn btn-action cbtn col-12">Search</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="body-container">
                    <form>
                        <div class="row mt-4 align-items-center" style=" background: #f2f2f2;padding: 10px 10px 20px 10px;">
                            <div class="col-2">
                                <label for=""> <h5 class="m-0">Team A</h5></label>
                            </div>
                            <div class="col">
                                <label for="">Target</label>
                                <input name="query[date_from]" id="date" type="text" class="form-control" value="">
                            </div>
                            <div class="col">
                                <label for="">Revised Target </label>
                                <input name="query[date_to]" id="To" type="text" class="form-control" value="">
                            </div>

                            <div class="col-3">
                                <label for="">Reason</label>
                                <input name="query[date_to]" id="To" type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row mt-4 align-items-center" style=" background: #f2f2f2;padding: 10px 10px 20px 10px;">
                            <div class="col-2">
                                <label for=""> <h5 class="m-0">Team B</h5></label>
                            </div>
                            <div class="col">
                                <label for="">Target</label>
                                <input name="query[date_from]" id="date" type="text" class="form-control" value="">
                            </div>
                            <div class="col">
                                <label for="">Revised Target </label>
                                <input name="query[date_to]" id="To" type="text" class="form-control" value="">
                            </div>

                            <div class="col-3">
                                <label for="">Reason</label>
                                <input name="query[date_to]" id="To" type="text" class="form-control" value="">
                            </div>
                        </div>

                        <div class="row justify-content-end p-0 m-0 mt-2">
                            <div class="col-3">
                                <button onclick="location.href = location.origin + location.pathname; return false;" type="submit" class="btn btn-light cbtn col-12">Clear</button>
                            </div>
                            <!-- /div>
                            <div class="row justify-content-end p-0 m-0 mt-2" -->
                            <div class="col-3">
                                <button type="submit" class="btn btn-action cbtn col-12">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>



@endsection
