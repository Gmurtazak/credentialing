@extends('layouts.app')

@section('content')
<div class="page-body patient-book">
    <div class="container-fluid">
        <form method="get" class="col-md-12 " action="" id="" name="">

        <div class="row top-bar">
            <div class="col-sm-12 col-xl-7">
                <h2>Add New User</h2>
            </div>
            <div class="col-sm-12 col-xl-5">
                <div class="row">
                            <div class="row justify-content-end m-0">
                                <button type="button" class="btn btn-default cbtn col-2" data-bs-dismiss="modal">Close</button>
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
                                 <label for="">Date of Birth <span class="text-danger">*</span></label>
                                 <input name="date" id="date" type="date" placeholder="Enter Date of Birth" class="form-control" required="">
                             </div>
                             <div class="mb-3">
                                 <label for="">Email <span class="text-danger">*</span></label>
                                 <input name="email" type="email" placeholder="Enter Email" class="form-control" required="">
                             </div>
                             <div class="mb-3">
                                 <label for="">Phone <span class="text-danger">*</span></label>
                                 <input name="plan_group" type="text" placeholder="Enter Phone Number" class="form-control" required="">
                             </div>
                             <div class="mb-3">
                                 <label for="">Address <span class="text-danger">*</span></label>
                                 <input name="Address" type="text" placeholder="Enter Address" class="form-control" required="">
                             </div>
                             <div class="mb-3">
                                 <label for="">Country <span class="text-danger">*</span></label>
                                 <select class="form-control" aria-label="">
                                     <option selected>Open this select menu</option>
                                     <option value="1">One</option>
                                     <option value="2">Two</option>
                                     <option value="3">Three</option>
                                 </select>
                             </div>
                             <div class="mb-3">
                                 <label for="">State <span class="text-danger">*</span></label>
                                 <select class="form-control" aria-label="">
                                     <option selected>Open this select menu</option>
                                     <option value="1">One</option>
                                     <option value="2">Two</option>
                                     <option value="3">Three</option>
                                 </select>
                             </div>
                             <div class="mb-3">
                                 <label for="">City <span class="text-danger">*</span></label>
                                 <select class="form-control" aria-label="">
                                     <option selected>Open this select menu</option>
                                     <option value="1">One</option>
                                     <option value="2">Two</option>
                                     <option value="3">Three</option>
                                 </select>
                             </div>
                             <div class="mb-3">
                                 <label for="">Gender <span class="text-danger">*</span></label>
                                 <br>
                                 <div class="form-check form-check-inline">
                                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                     <label class="form-check-label text-gray" for="inlineRadio1">Male</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                     <label class="form-check-label text-gray" for="inlineRadio2">Female</label>
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
                                <label for="">User ID <span class="text-danger">*</span></label>
                                <input name="name" type="text" placeholder="Enter User ID" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="">Employee ID <span class="text-danger">*</span></label>
                                <input name="date" id="date" type="date" placeholder="Enter Employee ID" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="">Phone <span class="text-danger">*</span></label>
                                <input name="plan_group" type="text" placeholder="Enter Phone Number" class="form-control" required="">
                            </div>

                            <div class="mb-3">
                                <label for="">Department <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected>Choose an option</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Team <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Role <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Reports to <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Project <span class="text-danger">*</span></label>
                                <select class="form-control" aria-label="">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Status <span class="text-danger">*</span></label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label text-gray" for="inlineRadio1">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label text-gray" for="inlineRadio2">Inactive</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </form>
    </div>
</div>



@endsection
