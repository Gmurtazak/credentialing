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
            <form method="post" class="theme-form" role="form"  action="{{route('schedule-save')}}">
                @csrf
                <input name="apiUrl" type="hidden" value="api/v1/schedule/add">
                <input name="apiUrlMethod" type="hidden" value="POST">
                <input name="isForm" type="hidden" value="1">
                <input name="name" type="hidden" id="name" value="">

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
                                        <label for="">Schedule Month Name <span class="text-danger">*</span></label>
                                       <!-- <input type="month" id="bdaymonth" name="bdaymonth" oninput="monthvalue()" class="form-control" required="">-->
                                        <select placeholder="Select Month" class="form-control" required id="bdaymonth" oninput="monthvalue()">
                                            <option value="" style="display:none;">Select Month</option>
                                            <option  value="1">January</option>
                                            <option  value="2">February</option>
                                            <option  value="3">March</option>
                                            <option  value="4">April</option>
                                            <option  value="5">May</option>
                                            <option value="6">June</option>
                                            <option  value="7">July</option>
                                            <option  value="8">August</option>
                                            <option  value="9">September</option>
                                            <option  value="10">October</option>
                                            <option  value="11">November</option>
                                            <option  value="12">December</option>
                                        </select>

                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">Schedule Expiry From <span class="text-danger">*</span></label>
                                                <input name="expiry_from" id="expiry_from" type="text" placeholder="dd-mm-yyyy" class="form-control" required readonly>


                                            </div>
                                            <div class="col-6">
                                                <label for="">Schedule Expiry To <span class="text-danger">*</span></label>
                                                <input name="expiry_to" id="expiry_to" type="text" placeholder="dd-mm-yyyy" class="form-control" required readonly>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Schedule Hrs/Day <span class="text-danger">*</span></label>
                                        <input name="schedule_hours_day" id="schedule_hours_day" type="text" placeholder="Enter Schedule Hrs/Day" class="form-control" value="8" required="">
                                    </div>
                                    <div class="mb-3">
                                        <p id="demo"></p>
                                        <label for="">Schedule Hrs/Month <span class="text-danger">*</span></label>
                                        <input name="" id="total_working_days" type="text" placeholder="Enter Schedule Hrs/Month" class="form-control" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Total Working Days <span class="text-danger">*</span></label>
                                        <input name="total_working_days" id="working_days" type="text" placeholder="Enter Total Working Days" class="form-control" required="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">IsActive <span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="flexCheckDefault" checked>
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
                                        <b>Working days <!--<input id="geton">--></b>

                                        <br/>

                                        <select multiple="multiple" id='lstBox1' name="working_days[]">

                                        </select>
                                    </div>
                                    <div class="transferBtns">
                                        <input type='button' id='btnRight' value ='  >  ' />
                                        <br/><input type='button' id='btnLeft' value ='  <  ' />

                                    </div>
                                    <div class="approvedItems">
                                        <b>Non Working days </b><br/>
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


            function getvalue(){
                var perDay = parseInt($('#schedule_hours_day').val());
                var count = $("#lstBox1 option").length;
                var workingdays = document.getElementById("working_days").value;

                //$('#geton').val(valmin);
                $('#working_days').val(count);
                $('#total_working_days').val(count*perDay);
                $('#lstBox1 option').prop('selected','selected')

            }


            $('#btnRight').click(function(e) {
                var selectedOpts = $('#lstBox1 option:selected');
                if (selectedOpts.length == 0) {
                    alert("Nothing to move.");
                    e.preventDefault();
                }

                $('#lstBox2').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                getvalue();
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
                getvalue();
                e.preventDefault();
            });
        });

    </script>

@endsection

