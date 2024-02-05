@extends('layouts.app')

@section('content')
    <style>
        #lstBox1, #lstBox2{
            height:300px;
            width:200px;
        }

        .approveTermsContainer{
            display:flex;
            justify-content:center;
        }

        .transferBtns {
            margin-right: 30px;
            margin-left: 30px;
        }

        .transferBtns{
            float:left;
            align-self:center;
        }
    </style>
    <div class="page-body patient-book">
        <div class="container-fluid">
            <form method="get" class="col-md-12 " action="" id="" name="">

                <div class="row top-bar">
                    <div class="col-sm-12 col-xl-7">
                        <h2>Add New Schedule</h2>
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
                            <div class="login-box-wrap d-block">
                                <div class="login-main">
                                    <div class="mb-3">
                                        <label for="">Schedule ID <span class="text-danger">*</span></label>
                                        <input name="name" type="text" placeholder="Enter Schedule ID" class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Schedule Month Name <span class="text-danger">*</span></label>
                                        <input name="name" type="text" placeholder="Enter Schedule Month Name" class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">Schedule Expiry From <span class="text-danger">*</span></label>
                                                <input name="date" id="date" type="date" placeholder="Enter Date of Birth" class="form-control" required="">
                                            </div>
                                            <div class="col-6">
                                                <label for="">Schedule Expiry To <span class="text-danger">*</span></label>
                                                <input name="date" id="date" type="date" placeholder="Enter Date of Birth" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Schedule Hrs/Day <span class="text-danger">*</span></label>
                                        <input name="email" type="email" placeholder="Enter Schedule Hrs/Day" class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Choose Dates <span class="text-danger">*</span></label>
                                        <input name="date" id="date" type="date" placeholder="Enter Date" class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Total Working Days <span class="text-danger">*</span></label>
                                        <input name="Address" type="text" placeholder="Enter Total Working Days" class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Schedule Hrs/Month <span class="text-danger">*</span></label>
                                        <input name="Address" type="text" placeholder="Enter Schedule Hrs/Month" class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">IsActive <span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                IsActive
                                            </label>
                                        </div>
                                    </div>

                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="login-box-wrap d-block">
                                <div class="approveTermsContainer">
                                    <div class="newItems">
                                        <b>Date</b><br/>
                                        <select multiple="multiple" id='lstBox1'>
                                            <option value="ajax">Ajax</option>
                                            <option value="jquery">jQuery</option>
                                            <option value="javascript">JavaScript</option>
                                            <option value="mootool">MooTools</option>
                                            <option value="prototype">Prototype</option>
                                            <option value="dojo">Dojo</option>
                                        </select>
                                    </div>
                                    <div class="transferBtns">
                                        <input type='button' id='btnRight' value ='  >  '/>
                                        <br/><input type='button' id='btnLeft' value ='  <  '/>
                                        <div class="submitContainer">
                                            <input type="submit" />
                                        </div>
                                    </div>
                                    <div class="approvedItems">
                                        <b>Date </b><br/>
                                        <select multiple="multiple" id='lstBox2'>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </form>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#btnRight').click(function(e) {
                var selectedOpts = $('#lstBox1 option:selected');
                if (selectedOpts.length == 0) {
                    alert("Nothing to move.");
                    e.preventDefault();
                }

                $('#lstBox2').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                e.preventDefault();
            });

            $('#btnLeft').click(function(e) {
                var selectedOpts = $('#lstBox2 option:selected');
                if (selectedOpts.length == 0) {
                    alert("Nothing to move.");
                    e.preventDefault();
                }

                $('#lstBox1').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                e.preventDefault();
            });
        });

    </script>

@endsection

