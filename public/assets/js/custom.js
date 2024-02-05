(function($) {

    function displayAlert(type,message){
        var html = '<div class="alert mt-4 font-size-14 alert-'+((type=='error')?'danger':'success')+' alert-dismissible fade show" role="alert"><strong>'+(type.toUpperCase())+'!</strong> '+ message +'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        $('.alert-body .container-fluid .row').html(html);
        $(".alert").show();
        setTimeout(function() {
            $(".alert").hide();
        }, 5000);
    }
    /**
     *  Main AJAX Function
     * @param url
     * @param data
     * @returns {*}
     */
    function getAjax(url, data){
        return $.ajax({
            type: 'POST',
            url : url,
            data: data ,
            dataType: 'JSON',
            success: function(response) {
                //Data = response;
            },
            error:function(){
                alert('Something went wrong.');
            }
        });
    }



    $( "#file_field" ).autocomplete({
        source: baseUrl+'/client/autocomplete',
        select: function(event, ui) {
            event.preventDefault();
            $("#file_field").val(ui.item.label);
            $("#file_id").val(ui.item.value);
        },
        focus: function(event, ui) {
            event.preventDefault();
            $("#file_field").val(ui.item.label);
            $("#file_id").val(ui.item.value);
        }
    });

    $( document ).ready(function() {
        $("#file_fields").val('Default');
        $("#file_ids").val(7);
        $('#file_links').val('United States');
    });
    //$( "#file_id" ).click(function (){
    $(document).on('click', '.country', function(event) {

        var va = $(this).attr('data-country-code');
        //console.log(va);
        var html = '<div class="flag ' + va + '" style=""></div><div class="arrow" style="display: inline !important;"></div>';
        $('.selected-flag').html(html);
    })

    $(document).on('click', '.ui-menu-item', function(event) {
        var id = $("#file_id").val();
        //var url = baseUrl +"/"+$('#detailApiUrl').val();
        // ajax
        $.ajax({
            type:"post",
            url: baseUrl+'/api/v1/client/detail?id='+id,
            dataType: 'json',

            success: function(response){

                if(response.code==200){
                    var recData = JSON.parse(JSON.stringify(response));
                    //console.log(recData);
                    //console.log(recData.data.name);
                    $('#file_link').val(recData.data.country.name);
                    $('#country_selector').val(recData.data.country.name);

                    //$('#country_selector_code').val(recData.data.country.iso2);

                    let result = recData.data.country.iso2.toLowerCase();
                    //$("#country_selector_code").countrySelect("selectCountry", result);

                    var html = '<div class="flag ' + result + '" style=""></div><div class="arrow" style="display: inline !important;"></div>';
                    $('.selected-flag').html(html);
                    //$(".selected-flag")._selectFlag()Select("destroy");

                }

            },
            error: function(response) {
                error = 'Error';
                $("l#file_link").text(error);
            },
        });
    });

    $('#select-all').click(function (event) {
        var selected = this.checked;
        // Iterate each checkbox
        $(':checkbox').each(function () {    this.checked = selected; });

    });

    $(document).on('click', '#submitWorkAssignment', function(event) {
        event.preventDefault();
        var searchIDs = $("input.tempWorkassignment:checkbox:checked").map(function () {
            return $(this).val();
        }).get();
        if(searchIDs.length == 0){
            displayAlert('error','Please select at least one work assignment to proceed.')
        } else{
            $('#workassginment_ids').val(searchIDs);
            $('#workassignmentTempSubmit').submit();
        }
    });

    /**
     * Edit Department
     */
    $(document).on('click', '.editDepartment', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myEditModal').modal('show');
                $('#name').val(response.data.name);
                $('#id').val(response.data.id);
                $('#is_active').prop('checked',response.data.is_active);
                $('#owner_id').val(response.data.owner_id);
            }
        });
    })

    /**
     * Edit Team
     */
    $(document).on('click', '.editTeam', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var target = $("#targetamount").val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myEditModal').modal('show');
                $('#name').val(response.data.name);
                $('#id').val(response.data.id);
                $('#is_active').val(response.data.is_active);
                $('#principalowner').val(response.data.principalowner);
                $('#primaryaddress').val(response.data.primaryaddress);
                $('#phone').val(response.data.phone);
                $('#fax').val(response.data.fax);
                $('#email').val(response.data.email);
                $('#groupspecialty').val(response.data.groupspecialty);
                $('#facilitynpi').val(response.data.facilitynpi);
                $('#facilitytax').val(response.data.facilitytax);
                $('#facilitytaxclass').val(response.data.facilitytaxclass);
                $('#clianumber').val(response.data.clianumber);
                $('#cliaissue').val(response.data.cliaissue);
                $('#cliaexpiration').val(response.data.cliaexpiration);
                $('#businessestab').val(response.data.businessestab);
                $('#medicarenum').val(response.data.medicarenum);
                $('#medicareeff').val(response.data.medicareeff);
                $('#medicaidnum').val(response.data.medicaidnum);
                $('#medicaideff').val(response.data.medicaideff);
                $('#doingbusiness').val(response.data.doingbusiness);
                $('#nameofprovider').val(response.data.nameofprovider);
                $('#nameofoffice').val(response.data.nameofoffice);
                $('#practicelocation').val(response.data.practicelocation);
                $('#pphone').val(response.data.pphone);
                $('#ffax').val(response.data.ffax);
                $('#nameofemr').val(response.data.nameofemr);
                $('#nameofbilling').val(response.data.nameofbilling);

            }
        });
    })

    /**
     * View Team
     */
    $(document).on('click', '.viewTeam', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var target = $("#targetamount").val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#viewmyEditModal').modal('show');
                $('#vname').html("Legal Business Name : <span>" + response.data.name +"</span>");
                $('#vprincipalowner').html("Name of Principal Owner : <span>" + response.data.principalowner+"</span>");
                $('#vprimaryaddress').html("Primary Correspondence Address : <span>"  + response.data.primaryaddress+"</span>");
                $('#vphone').html("Phone : <span>"  + response.data.phone+"</span>");
                $('#vfax').html("Fax : <span>"  + response.data.fax+"</span>");
                $('#vemail').html("Email : <span>"  + response.data.email+"</span>");
                $('#vgroupspecialty').html("Group Specialty : <span>"  + response.data.groupspecialty+"</span>");
                $('#vfacilitynpi').html("Facility NPI : <span>"  + response.data.facilitynpi+"</span>");
                $('#vfacilitytax').html("Facility Tax ID :<span>"  + response.data.facilitynpi+"</span>");
                $('#vfacilitytaxclass').html("Federal Tax Classification : <span>"  + response.data.facilitytaxclass+"</span>");
                $('#vclianumber').html("CLIA Number : <span>"  + response.data.clianumber+"</span>");
                $('#vcliaissue').html("CLIA Issue Date : <span>"  + response.data.cliaissue+"</span>");
                $('#vcliaexpiration').html("CLIA Expiration Date : <span>"  + response.data.cliaexpiration+"</span>");
                $('#vbusinessestab').html("Business Establishment Date : <span>"  + response.data.businessestab+"</span>");
                $('#vmedicarenum').html("Medicare  Number : <span>"  + response.data.medicarenum+"</span>");
                $('#vmedicareeff').html("Medicare Effective Date : <span>"  + response.data.medicareeff+"</span>");
                $('#vmedicaidnum').html("Medicaid Number : <span>"  + response.data.medicaidnum+"</span>");
                $('#vmedicaideff').html("Medicaid Effective Date : <span>"  + response.data.medicaideff+"</span>");
                $('#vdoingbusiness').html("Doing Business As (if different from LBN) : <span>"  + response.data.doingbusiness+"</span>");
                $('#vnameofprovider').html("Name of Principal Provider : <span>"  + response.data.nameofprovider+"</span>");
                $('#vnameofoffice').html("Name of Office Manager : <span>"  + response.data.nameofoffice+"</span>");
                $('#vpracticelocation').html("Practice Location Address : <span>"  + response.data.practicelocation+"</span>");
                $('#vpphone').html("Phone : <span>"  + response.data.pphone+"</span>");
                $('#vffax').html("Fax : <span>"  + response.data.ffax+"</span>");
                $('#vnameofemr').html("Name of EMR Software/Portal : <span>"  + response.data.nameofemr+"</span>");
                $('#vnameofbilling').html("Name of Billing Software previously used : <span>"  + response.data.nameofbilling+"</span>");
                $('#id').val(response.data.id);
                $('#is_actives').html("Provider Status : <span>"  + response.data.is_active+"</span>");

            }
        });
    })


    /**
     * View Team
     */
    $(document).on('click', '.viewTeamd', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrld').val()+"/"+$(this).data('rel');
        var clinic = $("#targetamount").val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){

            for (var i = 0; i < response.data.data.length; i++) {
                var html = ' <table class="table">' +
                    '<thead>' +
                    ' <tr>' +
                    '  <th scope="col"> Provider Information </th>' +
                    '  <th scope="col">  Tracking Sheet </th>' +
                    ' </tr>' +
                    ' </thead>' +
                    '  <tbody>' +
                    '  <tr> ' +
                    '  <td>' + response.data.data[i].name+ '</td>' +
                    '  <td> <a href="'+baseUrl+'/portal/' + response.data.data[i].id+ '"><img src="/assets/images/zip.png" alt="phone"></a></td>' +
                    '  </tr> ' +
                    '  </tbody>' +
                    '</table>';


                $("#userview").append(html);
            }

               /* response.data.data.forEach((item)=>{



                });*/

        });
    })


    /**
     * Edit Client
     */
    $(document).on('click', '.viewProvider', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#viewprovidmyEditModal').modal('show');
                $('#vclinic_id').val(response.data.clinicid);
                $('#vname').text("Name: (First, Middle Initial, Last Name) "  + response.data.name);
                $('#vssn').text("SSN : " + response.data.ssn);
                $('#vmdnppa').text("You selected : " + response.data.mdnppa);
                $('#vps').text("Primary Specialty : " + response.data.ps);
                $('#vdob').text("DOB : " +response.data.dob);
                $('#vphone').text("Phone : " +response.data.phone);
                $('#vemail').text("Email Address : " +response.data.email);
                $('#vindnpi').text("Ind NPI : " +response.data.indnpi);
                $('#vstatel').text("State License : " +response.data.statel);
                $('#vlid').text("License Issue Date : " +response.data.lid);
                $('#vled').text("License Exp. Date : " +response.data.led);
                $('#vdriverl').text("Driver’s License : " +response.data.driverl);
                $('#vdlid').text("License Issue Date : " +response.data.dlid);
                $('#vdled').text("License Exp. Date : " +response.data.dled);
                $('#vdeal').text("DEA License : " +response.data.deal);
                $('#vdeaid').text("DEA Issue Date : " +response.data.deaid);
                $('#vdeaed').text("DEA Exp. Date : " +response.data.deaed);
                $('#vdpsl').text("DPS License : " +response.data.dpsl);
                $('#vdpsid').text("DPS Issue Date : " +response.data.dpsid);
                $('#vdpsed').text("DPS Exp. Date : " +response.data.dpsed);
                $('#vmedicarenum').text("Medicare Number : " +response.data.medicarenum);
                $('#vmedicareeff').text("Medicare Effective Date : " +response.data.medicareeff);
                $('#vmedicaidnum').text("Medicaid Number : " +response.data.medicaidnum);
                $('#vmedicaideff').text("Medicaid Effective Date : " +response.data.medicaideff);
                $('#vcaqhnum').text("CAQH Number : " +response.data.caqhnum);
                $('#vusername').text("Username : " +response.data.username);
                $('#vpassword').text("Password : ******");
                $('#vpob').text("Place of Birth : " +response.data.pob);
                $('#vsob').text("State of Birth : " +response.data.sob);
                $('#vcitizenship').text("Citizenship : " +response.data.citizenship);
                $('#vhospitalprivileges').text("Hospital Privileges : " +response.data.hospitalprivileges);
                $('#id').val(response.data.id);
                $('#is_active').prop('checked',response.data.is_active);

                if(response.data.logo != null){
                    var vhtmlf = ' <a href="../storage/provider/'+response.data.logo+'" target="_blank">"'+response.data.logo+'"</a>';
                }
                if(response.data.logoone != null){
                    var vhtmlone = ' <a href="../storage/provider/'+response.data.logoone+'" target="_blank">"'+response.data.logoone+'"</a>';
                }
                if(response.data.logotwo != null){
                    var vhtmltwo = '<a href="../storage/provider/'+response.data.logotwo+'" target="_blank">"'+response.data.logotwo+'"</a>';
                }
                if(response.data.logothree != null){
                    var vhtmlthree = '<a href="../storage/provider/'+response.data.logothree+'" target="_blank">"'+response.data.logothree+'"</a>';
                }
                if(response.data.logofour != null){
                    var vhtmlfour = '<a href="../storage/provider/'+response.data.logofour+'" target="_blank">"'+response.data.logofour+'"</a>';
                }
                if(response.data.logofive != null){
                    var vhtmlfive = '<a href="../storage/provider/'+response.data.logofive+'" target="_blank">"'+response.data.logofive+'"</a>';
                }
                if(response.data.logosix != null){
                    var vhtmlsix = '<a href="../storage/provider/'+response.data.logosix+'" target="_blank">"'+response.data.logosix+'"</a>';
                }
                if(response.data.logoseven != null){
                    var vhtmlseven = '<a href="../storage/provider/'+response.data.logoseven+'" target="_blank">"'+response.data.logoseven+'"</a>';
                }
                if(response.data.logoeight != null){
                    var vhtmleight = '<a href="../storage/provider/'+response.data.logoeight+'" target="_blank">"'+response.data.logoeight+'"</a>';
                }
                if(response.data.logonine != null){
                    var vhtmlnine = '<a href="../storage/provider/'+response.data.logonine+'" target="_blank">"'+response.data.logonine+'"</a>';
                }
                if(response.data.logoten != null){
                    var vhtmlten = '<a href="../storage/provider/'+response.data.logoten+'" target="_blank">"'+response.data.logoten+'"</a>';
                }
                if(response.data.logoevelen != null){
                    var vhtmleleven = '<a href="../storage/provider/'+response.data.logoevelen+'" target="_blank">"'+response.data.logoevelen+'"</a>';
                }
                if(response.data.logotwelve != null){
                    var vhtmltwelve = '<a href="../storage/provider/'+response.data.logotwelve+'" target="_blank">"'+response.data.logotwelve+'"</a>';
                }
                if(response.data.logothird != null){
                    var vhtmlthird = '<a href="../storage/provider/'+response.data.logothird+'" target="_blank">"'+response.data.logothird+'"</a>';
                }

                $("#vformFileo").append(vhtmlf);
                $("#vformFileone").append(vhtmlone);
                $("#vformFiletwo").append(vhtmltwo);
                $("#vformFilethree").append(vhtmlthree);
                $("#vformFilefour").append(vhtmlfour);
                $("#vformFilefive").append(vhtmlfive);
                $("#vformFilesix").append(vhtmlsix);
                $("#vformFileseven").append(vhtmlseven);
                $("#vformFileeight").append(vhtmleight);
                $("#vformFilenine").append(vhtmlnine);
                $("#vformFileten").append(vhtmlten);
                $("#vformFileeleven").append(vhtmleleven);
                $("#vformFiletwelve").append(vhtmltwelve);
                $("#vformFilethird").append(vhtmlthird);
                /*let result = response.data.country.iso2.toLowerCase();
                var html = '<div class="flag ' + result + '" style="display: inline !important;"></div><div class="arrow" style="display: inline !important;"></div>';
                $('.selected-flag').html(html);*/


                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })
    /**
     * View Provider
     */

    /**
     * Edit TeamTarget
     */
    $(document).on('click', '.editTeamTarget', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myEditModal').modal('show');
                $('#id').val(response.data.id);
                $('#month').val(response.data.month);
                $('#target').val(response.data.target);
                $('#team_id').val(response.data.team_id);
                $('#revised_target').val(response.data.revised_target);
                $('#revised_target_date').val(response.data.revised_target_date);
                $('#reason').val(response.data.reason);
            }
        });
    })

    /**
     * Edit TeamTarget
     */
    $(document).on('click', '.viewProviders', function(e) {
        e.preventDefault();
        console.alert('hi');
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#viewProviderModal').modal('show');
                console.alert('hi');

            }
        });
    })

    /**
     * Edit Team
     */
    $(document).on('click', '.editPortaltargets', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myEditModal').modal('show');
                $('#year').val(response.data.year);
                $('#id').val(response.data.id);
                $('#target').val(response.data.target);
                $('#revised_target').val(response.data.revised_target);
                $('#reason').val(response.data.reason);
                $('#revised_target_date').val(response.data.revised_target_date);
            }
        });
    })


    /**
     * Edit Role
     */
    $(document).on('click', '.editRole', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myEditModal').modal('show');
                $('#role').val(response.data.role);
                $('#target').val(response.data.target);
                $('#id').val(response.data.id);
                $('#is_active').prop('checked',response.data.is_active);
                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })

    /**
     * Edit Entity
     */
    $(document).on('click', '.editaccount', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myEditModal').modal('show');
                $('#name').val(response.data.name);
                $('#id').val(response.data.id);
                $('#is_active').prop('checked',response.data.is_active);
                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })


    /**
     * Edit file
     */
    $(document).on('click', '.editFile', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myEditModal').modal('show');
                $('#file_link').val(response.data.file_link);
                $('#received_on').val(response.data.received_on);
                $('#pages').val(response.data.pages);
                $('#dos_count').val(response.data.dos_count);
                $('#file_name').val(response.data.file_name);
                $('#id').val(response.data.id);
                $('#is_active').prop('checked',response.data.is_active);
                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })

    /**
     * Edit Portal
     */
    $(document).on('click', '.editPortal', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myEditModal').modal('show');
                $('#id').val(response.data.id);
                $('#name').val(response.data.name);
                $('#percentage').val(response.data.percentage);
                $('#fees').val(response.data.fee);
                $('#is_active').prop('checked',response.data.is_active);
                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })


    /**
     * Edit Business
     */
    $(document).on('click', '.editBusiness', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myEditModal').modal('show');
                $('#business_type_name').val(response.data.business_type_name);
                $('#id').val(response.data.id);
                $('#is_active').prop('checked',response.data.is_active);
                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })


    /**
     * Edit Client
     */
    $(document).on('click', '.editClient', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myEditModal').modal('show');
                $('#clinic_id').val(response.data.clinicid);
                $('#name').val(response.data.name);
                $('#ssn').val(response.data.ssn);
                $('#mdnppah').val(response.data.mdnppa);
                $('#mdnppa').text("You selected : " + response.data.mdnppa);
                $('#ps').val(response.data.ps);
                $('#dob').val(response.data.dob);
                $('#phone').val(response.data.phone);
                $('#email').val(response.data.email);
                $('#indnpi').val(response.data.indnpi);
                $('#statel').val(response.data.statel);
                $('#lid').val(response.data.lid);
                $('#led').val(response.data.led);
                $('#driverl').val(response.data.driverl);
                $('#dlid').val(response.data.dlid);
                $('#dled').val(response.data.dled);
                $('#deal').val(response.data.deal);
                $('#deaid').val(response.data.deaid);
                $('#deaed').val(response.data.deaed);
                $('#dpsl').val(response.data.dpsl);
                $('#dpsid').val(response.data.dpsid);
                $('#medicarenum').val(response.data.medicarenum);
                $('#medicareeff').val(response.data.medicareeff);
                $('#medicaidnum').val(response.data.medicaidnum);
                $('#medicaideff').val(response.data.medicaideff);
                $('#caqhnum').val(response.data.caqhnum);
                $('#username').val(response.data.username);
                $('#password').val(response.data.password);
                $('#pob').val(response.data.pob);
                $('#sob').val(response.data.sob);
                $('#citizenship').val(response.data.citizenship);
                $('#hospitalprivileges').val(response.data.hospitalprivileges);
                $('#is_actives').val(response.data.is_active);
                $('#id').val(response.data.id);
                if(response.data.logo != null){
                    var htmlf = ' <a href="../storage/provider/'+response.data.logo+'" target="_blank">"'+response.data.logo+'"</a>' +
                        '<input class="form-control" type="hidden" name="fileone" value="'+response.data.logoone+'">';
                }else{
                    var htmlf = '<input class="form-control" type="file" name="file">';
                }
                if(response.data.logoone != null){
                    var htmlone = ' <a href="../storage/provider/'+response.data.logoone+'" target="_blank">"'+response.data.logoone+'"</a>' +
                        '<input class="form-control" type="hidden" name="fileone" value="'+response.data.logoone+'">';
                }else{
                    var htmlone = ' <input class="form-control" type="file" name="fileone">';
                }
                if(response.data.logotwo != null){
                    var htmltwo = '<a href="../storage/provider/'+response.data.logotwo+'" target="_blank">"'+response.data.logotwo+'"</a>' +
                        '<input class="form-control" type="hidden" name="filetwo" value="'+response.data.logotwo+'">';
                }else{
                    var htmltwo = ' <input class="form-control" type="file" name="filetwo">';
                }
                if(response.data.logothree != null){
                    var htmlthree = '<a href="../storage/provider/'+response.data.logothree+'" target="_blank">"'+response.data.logothree+'"</a>' +
                        '<input class="form-control" type="hidden" name="filethree" value="'+response.data.logothree+'">';
                }else{
                    var htmlthree = '  <input class="form-control" type="file" name="filethree">';
                }
                if(response.data.logofour != null){
                    var htmlfour = '<a href="../storage/provider/'+response.data.logofour+'" target="_blank">"'+response.data.logofour+'"</a>' +
                        '<input class="form-control" type="hidden" name="filefour" value="'+response.data.logofour+'">';
                }else{
                    var htmlfour = '  <input class="form-control" type="file" name="filefour">';
                }
                if(response.data.logofive != null){
                    var htmlfive = '<a href="../storage/provider/'+response.data.logofive+'" target="_blank">"'+response.data.logofive+'"</a>' +
                        '<input class="form-control" type="hidden" name="filefive" value="'+response.data.logofive+'">';
                }else{
                    var htmlfive = '<input class="form-control" type="file" name="filefive">';
                }
                if(response.data.logosix != null){
                    var htmlsix = '<a href="../storage/provider/'+response.data.logosix+'" target="_blank">"'+response.data.logosix+'"</a>' +
                        '<input class="form-control" type="hidden" name="filesix" value="'+response.data.logosix+'">';
                }else{
                    var htmlsix = '<input class="form-control" type="file" name="filesix">';
                }
                if(response.data.logoseven != null){
                    var htmlseven = '<a href="../storage/provider/'+response.data.logoseven+'" target="_blank">"'+response.data.logoseven+'"</a>' +
                        '<input class="form-control" type="hidden" name="fileseven" value="'+response.data.logoseven+'">';
                }else{
                    var htmlseven = ' <input class="form-control" type="file" name="fileseven">';
                }
                if(response.data.logoeight != null){
                    var htmleight = '<a href="../storage/provider/'+response.data.logoeight+'" target="_blank">"'+response.data.logoeight+'"</a>' +
                        '<input class="form-control" type="hidden" name="fileeight" value="'+response.data.logoeight+'">';
                }else{
                    var htmleight = '<input class="form-control" type="file" name="fileeight">';
                }
                if(response.data.logonine != null){
                    var htmlnine = '<a href="../storage/provider/'+response.data.logonine+'" target="_blank">"'+response.data.logonine+'"</a>' +
                        '<input class="form-control" type="hidden" name="filenine" value="'+response.data.logonine+'">';
                }else{
                    var htmlnine = '<input class="form-control" type="file" name="filenine">';
                }
                if(response.data.logoten != null){
                    var htmlten = '<a href="../storage/provider/'+response.data.logoten+'" target="_blank">"'+response.data.logoten+'"</a>' +
                        '<input class="form-control" type="hidden" name="fileten" value="'+response.data.logoten+'">';
                }else{
                    var htmlten = ' <input class="form-control" type="file" name="fileten">';
                }
                if(response.data.logoevelen != null){
                    var htmleleven = '<a href="../storage/provider/'+response.data.logoevelen+'" target="_blank">"'+response.data.logoevelen+'"</a>' +
                        '<input class="form-control" type="hidden" name="fileeleven" value="'+response.data.logoevelen+'" readonly>';
                }else{
                    var htmleleven = '<input class="form-control" type="file" name="fileeleven">';
                }
                if(response.data.logotwelve != null){
                    var htmltwelve = '<a href="../storage/provider/'+response.data.logotwelve+'" target="_blank">"'+response.data.logotwelve+'"</a>' +
                        '<input class="form-control" type="hidden" name="filetwelve" value="'+response.data.logotwelve+'" readonly>';
                }else{
                    var htmltwelve = '<input class="form-control" type="file" name="filetwelve">';
                }
                if(response.data.logothird != null){
                    var htmlthird = '<a href="../storage/provider/'+response.data.logothird+'" target="_blank">"'+response.data.logothird+'"</a>' +
                        '<input class="form-control" type="hidden" name="filethird" value="'+response.data.logothird+'" readonly>';
                }else{
                    var htmlthird = '<input class="form-control" type="file" name="filethird">';
                }
                $("#formFileo").append(htmlf);
                $("#formFileone").append(htmlone);
                $("#formFiletwo").append(htmltwo);
                $("#formFilethree").append(htmlthree);
                $("#formFilefour").append(htmlfour);
                $("#formFilefive").append(htmlfive);
                $("#formFilesix").append(htmlsix);
                $("#formFileseven").append(htmlseven);
                $("#formFileeight").append(htmleight);
                $("#formFilenine").append(htmlnine);
                $("#formFileten").append(htmlten);
                $("#formFileeleven").append(htmleleven);
                $("#formFiletwelve").append(htmltwelve);
                $("#formFilethird").append(htmlthird);

                /*let result = response.data.country.iso2.toLowerCase();
                var html = '<div class="flag ' + result + '" style="display: inline !important;"></div><div class="arrow" style="display: inline !important;"></div>';
                $('.selected-flag').html(html);*/
                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })

    /**
     * Edit projecttype
     */
    $(document).on('click', '.editprojecttype', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myEditModal').modal('show');
                $('#type').val(response.data.type);
                $('#id').val(response.data.id);
                $('#is_active').prop('checked',response.data.is_active);
                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })

    /**
     * Edit Category
     */
    $(document).on('click', '.editcategories', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myEditModal').modal('show');
                $('#category').val(response.data.category);
                $('#id').val(response.data.id);
                $('#is_active').prop('checked',response.data.is_active);
                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })

    /**
     * work QC
     */
    $(document).on('click', '.editworkqc', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myEditModal').modal('show');
                $('#work_assignment_id').val(response.data.id);
                $('#assigned_date').val(response.data.assigned_date);
                $('#assigned_to').val(response.data.assigned_to);
                $('#assigned_dos').val(response.data.assigned_dos);
                //$('#is_active').prop('checked',response.data.is_active);
                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })


    /**
     * viewCredentialing
     */
    $(document).on('click', '.viewCredentialing', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        //alert(url);
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myViewModal').modal('show');
                $('#vcclinic_id').val(response.data.clinic);
                $('#vcprovider_id').val(response.data.provider);
                $('#vccredentialing').val(response.data.credentialing);
                $('#vcinsurance').val(response.data.insurance);
                $('#vcstatus').text("Status : " + response.data.status);
                $('#vceffectivedate').text("Effective Date : " + response.data.effectivedate);
                $('#vcremarks').html("Remarks : " + response.data.remarks);
                $('#vcremarksdate').text("Remarks Date : " + response.data.remarksdate);
                //$('#work_assignment_id').val(response.data.id);
                //$('#assigned_date').val(response.data.assigned_date);
                // $('#assigned_to').val(response.data.assigned_to);
                // $('#assigned_dos').val(response.data.assigned_dos);
                //$('#is_active').prop('checked',response.data.is_active);
                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })


    /**
     * viewCredentialing
     */
    $(document).on('click', '.viewCredentialings', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrls').val();
        var data = new Object();
        data.id = $(this).data('rel');
        //alert(url);
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myModalviewCredentialing').modal('show');
                $('#vcclinic_id').val(response.data.clinic);
                $('#vcprovider_id').val(response.data.provider);
                $('#vccredentialing').val(response.data.credentialing);
                $('#vcinsurance').val(response.data.insurance);
                $('#vcstatus').text("Status : " + response.data.status);
                $('#vceffectivedate').text("Effective Date : " + response.data.effectivedate);
                //$('#vcremarks').html("Remarks : " + response.data.remarks);
                const strings  = response.data.remarks;
                const results = strings.split('\n').join('<br><hr>');;
                $('#vcremarks').html(results);
                $('#vcremarksdate').text("Last Remarks Date : " + response.data.remarksdate);
                //$('#work_assignment_id').val(response.data.id);
                //$('#assigned_date').val(response.data.assigned_date);
                // $('#assigned_to').val(response.data.assigned_to);
                // $('#assigned_dos').val(response.data.assigned_dos);
                //$('#is_active').prop('checked',response.data.is_active);
                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })


    $(document).on("click", ".addclinic", function () {
        var clinicId = $(this).data('id');
        $("#selectclinicId").val(clinicId);
    });
    /**
     * editCredentialing
     */
    $(document).on('click', '.editCredentialing', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrls').val();
        var data = new Object();
        data.id = $(this).data('rel');
        //alert(url);
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#myEditModalCredentialing').modal('show');
                $('#ids').val(response.data.id);
                $('#veclinic_id').val(response.data.clinic);
                $('#veprovider_id').val(response.data.provider);
                $('#vecredentialing').val(response.data.credentialing);
                $('#veinsurance').val(response.data.insurance);
                $('#vecstatus').val(response.data.status);
                $('#vestatus').text("Status : " + response.data.status);
                $('#veeffectivedate').val(response.data.effectivedate);
                $('#veremarks').val(response.data.remarks);
                $('#veremarksdate').val(response.data.remarksdate);
                //$('#work_assignment_id').val(response.data.id);
                //$('#assigned_date').val(response.data.assigned_date);
                // $('#assigned_to').val(response.data.assigned_to);
                // $('#assigned_dos').val(response.data.assigned_dos);
                //$('#is_active').prop('checked',response.data.is_active);
                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })
    /**
     * Edit Insurance
     */
    $(document).on('click', '.editInsurance', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('.phone-row').remove();
                $('#myEditModal').modal('show');
                $('#name').val(response.data.name);
                var phone = (response.data.phone).split(" | ");
                $("#phone_0").val(phone[0]);
                if(phone.length > 0){
                    var theRemovedElement = phone.shift();
                    $(phone).each(function(i,e){
                        var html = '<div><div class="row phone-row">'+
                            '<label for="">Phone Number<span class="text-danger">*</span></label>'+
                            '<div class="col-9 mt-0">'+
                            '<label for="inputPassword'+i+'" class="visually-hidden">Password</label>'+
                            '<input type="number" name="phone[]" class="form-control"  placeholder="Phone Number" value="'+phone[i]+'">'+
                            '</div>'+
                            '<div class="col-12 col-md-4  mt-auto mb-1">'+
                            '<label class="visually-hidden"></label>'+
                            '<button type="button" class="btn btn-outline-danger w-100 delete-phone" style="font-size: 12px;width: 85px;">Delete</button>'+
                            '</div>'+
                            '</div> </div>';
                        $(".phone-wrapper").append(html);
                    });
                }
                $('#email').val(response.data.email);
                $('#website').val(response.data.website);
                $('#plan_group').val(response.data.plan_group);
                $('#id').val(response.data.id);
                $('#is_active').prop('checked',response.data.is_active);
                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })
    $("input[readonly], select[readonly]").css("pointer-events","none");
    /**
     * Get Account detail on change
     */
    $(document).on('change', '#wa_account_id', function(e) {
        e.preventDefault();
        var url = baseUrl +"/api/v1/account_benchmark/detail";
        var data = new Object();
        data.id = $(this).val();
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#wa_client_id').val(response.data.client_id);
                $('#wa_category_id').val(response.data.category_id);
                $('#wa_project_id').val(response.data.project_id);
                $('#wa_project_type_id').val(response.data.project_type);
                $('#operational_benchmark_id').val(response.data.operational_benchmark);
            }
        });
    });


    $(document).ready(function(){
        // code to get all records from table via select box
        $("#teamid").change(function() {
            var getv = $("#teamid").val();
            $('#getteamtarget').val(getv);
            return $.ajax({
                type: 'POST',
                url: baseUrl+'/api/v1/team/detail?id='+getv,
                dataType: 'JSON',
                success: function(response) {
                    // $('#showtarget').modal('show');
                    var target = (response.data.target);
                    $('#getteamtarget').val(target);

                }
            });
        });
    });
    $(document).ready(function(){
        // code to get all records from table via select box
        $("#wa_project_type_id").change(function() {
            //$('#wa_account_id').val('');
            //$('#wa_assigned_to').val('');
            $('#wa_account_id').empty();
            var newOption = $('<option value="">Select Account</option>');
            $('#wa_account_id').append(newOption);
            //
            $('#wa_assigned_to').empty();
            var newOption = $('<option value="">Select Assigned To</option>');
            $('#wa_assigned_to').append(newOption);
            var id = $(this).find(":selected").val();
            var dataString = 'project_type='+ id;

            $.ajax({
                url: baseUrl + '/api/v1/project_type/databyid?',
                dataType: "json",
                data: dataString,
                cache: false,
                success: function(response) {
                    var recData = JSON.parse(JSON.stringify(response));
                    //recData = JSON.parse(recData);
                    //console.log(recData.data.account);
                    Object.keys(recData.data.account).forEach(function(key) {
                        //console.log(key, recData.data.account[key]);
                        //$('#wa_account_id').val(key);
                        var opt = document.createElement('option');
                        opt.value = key;
                        opt.innerHTML = recData.data.account[key];
                        $('#wa_account_id').append(opt);
                    });
                    Object.keys(recData.data.user).forEach(function(key) {
                        //console.log(key, recData.data.user[key]);
                        var opt = document.createElement('option');
                        opt.value = key;
                        opt.innerHTML = recData.data.user[key];
                        //console.log(opt);
                        $('#wa_assigned_to').append(opt);

                    });
                    // if(response.code==200){
                    //     var data = JSON(response.data);
                    //     console.log(data);
                    //     //var id = (JSON.stringify(response.data.account));
                    //     //$('#wa_assigned_to').val(response.data);
                    //     //$('#wa_account_id').val(id[2]);
                    //
                    // }
                }
            });
        })
    });


    /**
     * work QC
     */
    $(document).on('click', '.editlistworkassigned', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#updateAlistworkassigned').modal('show');
                $('#work_assignment_id').val(response.data.id);
                $('#assigned_date').val(response.data.assigned_date);
                $('#assigned_to').val(response.data.assigned_to);
                $('#assigned_dos').val(response.data.assigned_dos);
                //$('#is_active').prop('checked',response.data.is_active);
                //$('#role_lead_id').val(response.data.role_lead_id);
            }
        });
    })

    /**
     * Edit Ad Hoc Assignment
     */
    $(document).on('click', '.editWorkassignmentteam', function(e) {
        e.preventDefault();
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#updateAdHoc').modal('show');
                $('#ad_hoc_assignment_id').val(response.data.id);
                $('#date_on').val(response.data.date);
                $('#ad_hoc_work_type').val(response.data.ad_hoc_work_type);
                $('#description').val(response.data.description);
                $('#minute_utilized').val(response.data.minute_utilized);
                $('#hour_utilized').val(response.data.hour_utilized);

                $('#minute_approved').val(response.data.minute_utilized);
                $('#hour_approved').val(response.data.hour_utilized);
            }
        });
    })

    /**
     * Edit Ad Hoc Assignment
     */
    $(document).on('click', '.editWorkAssignment', function(e) {
        e.preventDefault();
        document.getElementById('dos_complete').value = ''
        document.getElementById('dos_pending').value = ''
        document.getElementById('hours').value = ''
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#updateAssignment').modal('show');
                $('#assigned_date').val(response.data.assigned_date);
                $('#received_on').val(response.data.received_on);
                $('#assigned_to').val(response.data.assigned_to);
                $('#pages').val(response.data.pages);
                $('#dos_count').val(response.data.dos_count);
                $('#file_id').val(response.data.file.file_name);
                $('#amount').val(response.data.amount);
                $('#assigned_dos').val(response.data.assigned_dos);
                $('#operational_benchmark_id').val(response.data.account.operational_benchmark);
                $('#dos_complete').attr('max',response.data.assigned_dos);
                //var testname = response.data.assigned_dos;
                // var sumadd = response.data.account.operational_benchmark;
                //$('#hours').val(sumadd);

            }
        });
    });

    $(document).on('keyup', '#dos_complete', function(e) {
        var max = $(this).attr('max');
        if($(this).val() > max){
            $(this).val('');
            $('#dos_pending').val('');
            $('#hours').val('');
        }
    })

    $(document).on('click', '.editWorkAssignmenttwo', function(e) {
        e.preventDefault();
        document.getElementById('dos_complete').value = ''
        document.getElementById('dos_pending').value = ''
        document.getElementById('hours').value = ''
        var url = baseUrl +"/"+$('#detailApiUrl').val();
        var data = new Object();
        data.id = $(this).data('rel');
        getAjax(url, data).done(function(response){
            if(response.code==200){
                $('#updateAssignmenttwo').modal('show');
                $('#assigned_date_two').val(response.data.assigned_date);
                $('#received_on').val(response.data.received_on);
                $('#assigned_to').val(response.data.assigned_to);
                $('#pages').val(response.data.pages);
                $('#dos_count').val(response.data.dos_count);
                $('#file_id_two').val(response.data.file.file_name);
                $('#amount').val(response.data.amount);
                $('#assigned_dos').val(response.data.assigned_dos);
                $('#operational_benchmark_id').val(response.data.account.operational_benchmark);
                //var testname = response.data.assigned_dos;
                // var sumadd = response.data.account.operational_benchmark;
                //$('#hours').val(sumadd);

            }
        });
    })

    /**
     * Add Ad Hoc Assignment
     */
    $(document).on('blur', '#minute_utilized_add', function() {
        var time = timeConvert($(this).val());
        $('#hour_utilized_add').val(time.hour);
        $('#minute_utilized_add').val(time.minutes);
    })

    $(document).on('blur', '#minute_approved', function() {
        var time = timeConvert($(this).val());
        $('#hour_approved').val(time.hour);
        $('#minute_approved').val(time.minutes);
    })

})(jQuery);

function send() {
    var testname = document.getElementById("operational_benchmark_id").value;
    var numquestions = document.getElementById("assigned_dos").value;

    var sumadd = testname * numquestions;
    $('#hours').val(sumadd);
}

function munvalue() {
    var dos_count = document.getElementById("dos_count").value;
    var dos_complete = document.getElementById("dos_complete").value;
    var benchmark = document.getElementById("operational_benchmark_id").value;

    var valmin = dos_count - dos_complete;
    $('#dos_pending').val(valmin);
    var valmark = benchmark * dos_complete;
    $('#hours').val(valmark);
}


function timeConvert(n) {
    var num = n;
    var hours = (num / 60);
    var rhours = Math.floor(hours);
    var minutes = (hours - rhours) * 60;
    var rminutes = Math.round(minutes);
    var time = new Object();
    time.hour = rhours;
    time.minutes = rminutes;
    return time;//num + " minutes = " + rhours + " hour(s) and " + rminutes + " minute(s).";
}

function zeroPad(num, places) {
    var zero = places - num.toString().length + 1;
    return Array(+(zero > 0 && zero)).join("0") + num;
}


function monthvalue() {
    var dt = new Date();
    var month = document.getElementById("bdaymonth").value;
    var monthName = $('#bdaymonth :selected').text();
    var year = new Date().getFullYear();
    daysInMonth = new Date(year, month, 0).getDate();
    //document.getElementById("working_days").innerHTML = daysInMonth;
    $('#working_days').val(daysInMonth);

    $('#name').val(monthName+' '+year);
    var diff = daysInMonth * 8;
    $('#total_working_days').val(diff);

    //console.log(daysInMonth);
    let text = daysInMonth;
    let Months = zeroPad(month,2);
    let years = year;
    var allexpiry_to = ""+text+"-"+Months+"-"+years+"";
    var allexpiry_from = "1-"+Months+"-"+years+"";
    $('#expiry_to').val(allexpiry_to);
    $('#expiry_from').val(allexpiry_from);

    for (let i = 1; i <= daysInMonth; i++) {

        var s = month;

        text += "<option selected value='" + years + '-'+Months +'-'+ i +"'>" + years + '-'+ Months +'-'+ i +"</option>";
    }
    document.getElementById("lstBox1").innerHTML = text;
}
var x_timer;
$('.search-input').keyup(function (e){
    clearTimeout(x_timer);
    var user_name = $(this).val();
    x_timer = setTimeout(function(){
        // callback_function();
        $('#search_form').submit()
    }, 500);
});
var x_timer;
$('.search-input').change(function (e){
    clearTimeout(x_timer);
    var user_name = $(this).val();
    x_timer = setTimeout(function(){
        // callback_function();
        $('#search_form').submit()
    }, 500);
});
$("select[name='months']").on('change', function()
{
    var months = document.getElementById("months").value;

    return $.ajax({
        type: "POST",
        url: baseUrl+'/api/v1/teamtargets/sortmonthyteamtarget?months='+months,
        dataType: 'JSON',
        success: function(response) {
            //$('#showtarget').modal('show');
            var teamtarges = (response.data.team_target);
            var Sales = (response.data.Sale);
            var ans = teamtarges  - Sales;

            var d = Sales * 100;
            var di = d / teamtarges;
            var fixedNum = di.toFixed(2);

            document.getElementById('mtg').innerHTML = "$ " + teamtarges;
            document.getElementById('atg').innerHTML = "$ " + Sales;
            document.getElementById('rtg').innerHTML = "$ " + ans;

            chartSpeedoMeter(fixedNum);
            sort(months);
            sortteam(months);
            $('#nowhide').hide();
        },
        error:function(){
            //alert('Something went wrong.');
        }

    });
});

function sort(x){
    return $.ajax({
        type: "POST",
        url: baseUrl+'/api/v1/project_sale/sortgettopfive?months='+x,
        dataType: 'JSON',
        success: function(response) {
            if (response.code == 200) {
                document.getElementById("userdetails").innerHTML = "";
                document.getElementById("userdetail").innerHTML = "";
                //console.log(response.data.data[0].name);
                var myData = [];
                for (var i = 0; i < response.data.length; i++) {
                    var myDataArr = [];
                    myDataArr[0] = (response.data[i].target);
                    myDataArr[1] = (response.data[i].uname);
                    myDataArr[2] = (response.data[i].user);
                    myDataArr[3] = (response.data[i].usersale);
                    myDataArr[4] = (response.data[i].image);
                    myDataArr[5] = (response.data[i].saleIncreased);
                    if(myDataArr[5] == true){
                        icon = '<i class="bi bi-arrow-up text-success font-weight-bold fs-5"></i>';
                    }
                    else{
                        icon = '<i class="bi bi-arrow-down text-danger font-weight-bold fs-5"></i>';
                    }
                    var pl = myDataArr[3] * 100;
                    var p = pl / myDataArr[0];
                    var html = '<div class="d-flex">' +
                        '<div class="flex-shrink-0">' +
                        '<img src="assets/images/Digital_Sales/' + myDataArr[4] + '">' +
                        '</div>' +
                        '<div class="flex-grow-1 ms-3">' +
                        '<p>' + icon + + myDataArr[1] + '</h5>' +
                        '<div class="row">' +
                        '<div class="col-md-6">Sales</div>' +
                        '<div class="col-md-6"> $ ' + myDataArr[3] + '</div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-md-6">Target</div>' +
                        '<div class="col-md-6"> $ ' + myDataArr[0] + '</div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-md-6">Achieve</div>' +
                        '<div class="col-md-6"> ' +  p  + '%</div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-12">' +
                        '<div class="progress">' +
                        '<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" style="width: ' + p + '%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">' +  Math.round(p ) + '%</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    var htmls = '<div class="d-inline-flex" style="width:50%;">' +
                        '<div class="flex-shrink-0">' +
                        '<img src="assets/images/Digital_Sales/' + myDataArr[4] + '" style="width: 75px">' +
                        '</div>' +
                        '<div class="flex-grow-1 ms-3">' +
                        '<p> ' + myDataArr[1] + '</p>' +
                        '<div class="row">' +
                        '<div class="col-md-6">Sales</div>' +
                        '<div class="col-md-6">$ ' + myDataArr[3] + '</div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-md-6">Target</div>' +
                        '<div class="col-md-6">$ ' + myDataArr[0] + '</div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-12">' +
                        '<div class="progress">' +
                        '<div class="progress-bar" role="progressbar" style="width: ' + p + '%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">' +  Math.round(p ) + '%</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' ;

                    $("#userdetail").append(html);
                    $("#userdetails").append(htmls);
                    //myData.push(myDataArr)
                }
                //console.log(JSON.stringify(myData));
                //getvalueaccount(JSON.stringify(myData));
            }else{
                var html = '<div class="d-flex"> No Reocord Found' +
                    '</div>';
            }

        }
    });
}
$('input[name="dates"]').daterangepicker({
    ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    "autoUpdateInput": false,
    "showCustomRangeLabel": false,
    "alwaysShowCalendars": true,
    "locale": {
        "format": 'YYYY-MM-DD'
    }
}, function(start, end, label) {
    //console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    $('input[name="dates"]').val(start.format('YYYY-MM-DD')+' - '+end.format('YYYY-MM-DD'));
    $('#search_form').submit();
});

$('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
    $('#search_form').submit();
});



function getvalue() {

    var sale_amount = document.getElementById("sale_amount").value;
    var protal_value = document.getElementById("protal_value").value;
    ids = protal_value;
    return $.ajax({
        type: 'POST',
        url: baseUrl+'/api/v1/portal/detail?id='+protal_value,
        dataType: 'JSON',
        success: function(response) {
            // $('#showtarget').modal('show');
            var name = (response.data.percentage);
            //document.getElementById('portal_fees').innerHTML = name;
            var less = sale_amount * name;
            var divde = less / 100;
            var ans = sale_amount  - divde;
            $('#portal_fees').val(name);
            $('#amount_due').val(ans);
        },
        error:function(){
            //alert('Something went wrong.');
        }
    });



}

$("#portal_name_get").change(onSelectChange);

function onSelectChange(){
    var output = "",
        $this = $(this);

    if($this.val() != 0){
        output = $this.find('option:selected').attr('rel');
    }

    var sale_amount = document.getElementById("sale_amount").value;
    var less = sale_amount * output;
    var divde = less / 100;
    var ans = sale_amount  - divde;



    $('#portal_fees').val(output);
    $('#amount_due').val(ans);
}
$("#country_selector").countrySelect({
    defaultCountry: "us",
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    // responsiveDropdown: true,
    //preferredCountries: ['ca', 'gb', 'us']
});

$("#country_selector_edit").countrySelect({
    defaultCountry: "us",
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    // responsiveDropdown: true,
    //preferredCountries: ['ca', 'gb', 'us']
});


function rolerightchecked($that) {
    var a = 'form-check-input-'+$($that).val();
    if($that.checked) {
        // Iterate each checkbox
        $('.'+a).each(function() {
            this.checked = true;
        });
    } else {
        $('.'+a).each(function() {
            this.checked = false;

        });
    }
};



window.onload = function(){
    var getreceived = $("#getreceived").val();
    var getamountdue = $("#getamountdue").val();
    document.getElementById('ytga').innerHTML =  "$ " + getreceived;
    document.getElementById('rytga').innerHTML =  "$ " + getamountdue;
    getvaluereceived(getreceived,getamountdue);
    one();
    two();
    three();
    four();
    five();
    six();
    seven();
    eight();
    nine();
    return $.ajax({
        type: "GET",
        url: baseUrl+'/api/v1/teamtargets/all',
        dataType: 'JSON',
        success: function(response) {
            //console.log(response.data.data);
            var tar = [];
            var ttar = [];
            var teams = [];
            const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
            const d = new Date();
            let monthname = month[d.getMonth()];
            for (var i=0; i<response.data.data.length; i++) {
                var target = (response.data.data[i].target);
                var totalTarget = (response.data.data[i].totalTarget);
                var team = (response.data.data[i].team.name);
                tar.push(parseInt(target));
                ttar.push(parseInt(totalTarget));
                teams.push(team);
                getvaluemonth(tar,ttar,teams,monthname);
            }


        }
    });


}
function sortteam(x){
    //console.log(x);
    return $.ajax({
        type: "POST",
        url: baseUrl+'/api/v1/teamtargets/sortmonthyteam?months='+x,
        dataType: 'JSON',
        success: function(response) {

            var tar = [];
            var ttar = [];
            var teams = [];
            for (var i=0; i<response.data.team_target.length; i++) {
                //console.log(response.data.team_target[i].name);
                var team = (response.data.team_target[i].name);
                var target = (response.data.team_target[i].target);
                var totalTarget = (response.data.Sale[i].sale);
                tar.push(parseInt(target));
                ttar.push(parseInt(totalTarget));
                teams.push(team);
                //console.log(totalTarget);
                getvaluemonth(tar,ttar,teams);
            }

        }
    });
}
function one(){
    var send_role_value = $("#send_role_value").val();
    var getusersale = $("#getusersale").val();
    ids = send_role_value;
    return $.ajax({
        type: 'POST',
        url: baseUrl+'/api/v1/role/detail?id='+send_role_value,
        dataType: 'JSON',
        success: function(response) {
            //$('#showtarget').modal('show');
            var name = (response.data.target);
            var target = document.getElementById('targets').innerHTML = name;
            getvalue(target);
            var remaintarget = target - getusersale;
            document.getElementById('remaintarget').innerHTML = remaintarget;
        },
        error:function(){
            //alert('Something went wrong.');
        }
    });
}

function two(){
    return $.ajax({
        type: "GET",
        url: baseUrl+'/api/v1/portal/all',
        dataType: 'JSON',
        success: function(response) {
            //console.log(response.data.data[0].name);
            var myData = [];
            for (var i=0; i<response.data.data.length; i++) {
                var myDataArr = [];
                myDataArr[0] =(response.data.data[i].name);
                myDataArr[1] =  (response.data.data[i].totalportal);
                myData.push(myDataArr)
            }
            getvalueportal(JSON.stringify(myData));
        }
    });
}

function three(){
    return $.ajax({
        type: "GET",
        url: baseUrl+'/api/v1/account/all',
        dataType: 'JSON',
        success: function(response) {
            //console.log(response.data.data[0].name);
            var myData = [];
            for (var i=0; i<response.data.data.length; i++) {
                var myDataArr = [];
                myDataArr[0] =(response.data.data[i].name);
                myDataArr[1] =  (response.data.data[i].totalAccount);
                myData.push(myDataArr)
            }
            getvalueaccount(JSON.stringify(myData));
        }
    });
}
function daysInThisMonth() {
    var now = new Date();

    return new Date(now.getFullYear(), now.getMonth()+1, 0).getDate();
}

function five(){
    return $.ajax({
        type: "GET",
        url: baseUrl+'/api/v1/teamtargets/allmonthyteamtarge',
        dataType: 'JSON',
        success: function(response) {
            //$('#showtarget').modal('show');
            var teamtarges = (response.data.team_target);
            var Sales = (Math.round(response.data.Sale));
            var ans = Math.round(teamtarges  - Sales);
            let currentDate = new Date();
            let cDay = currentDate.getDate()
            var d = Sales * 100;
            var di = d / teamtarges;
            var fixedNum = di.toFixed(2);
            var re = daysInThisMonth()  - cDay;
            var req = Math.round(ans / re);

            document.getElementById('mtg').innerHTML = "$ " + teamtarges;
            document.getElementById('atg').innerHTML = "$ " + Sales;
            document.getElementById('rtg').innerHTML = "$ " + ans;
            document.getElementById('ptg').innerHTML = "" + req;
            chartSpeedoMeter(fixedNum);


        },
        error:function(){
            //alert('Something went wrong.');
        }
    });
}

function six(){
    return $.ajax({
        type: "GET",
        url: baseUrl+'/api/v1/teamtargets/allyeartarge',
        dataType: 'JSON',
        success: function(response) {
            //$('#showtarget').modal('show');
            var yeartarget = (response.data.year_target);
            var yearSales = (Math.round(response.data.yearSale));
            var ans = Math.round(yeartarget  - yearSales);



            const month = ["1","2","3","4","5","6","7","8","9","10","11","12"];

            const a = new Date();
            let cmonth = month[a.getMonth()];
            var d = yearSales * 100;
            var di = d / yeartarget;
            var fixedNum = di.toFixed(2);
            var re = 12  - cmonth;
            var req = Math.round(ans / re);

            document.getElementById('ytg').innerHTML =  "$ " + yeartarget;
            document.getElementById('aytg').innerHTML =  "$ " + yearSales;
            document.getElementById('rytg').innerHTML = "$ " + ans;
            document.getElementById('pytg').innerHTML = "$ " + req;


            chartSpeedoMetertwo(fixedNum);

        },
        error:function(){
            //alert('Something went wrong.');
        }
    });
}
function getMonthName(monthNumber) {
    const date = new Date();
    date.setMonth(monthNumber - 1);

    return date.toLocaleString('en-US', { month: 'short' });
}
function seven(){
    return $.ajax({
        type: "GET",
        url: baseUrl+'/api/v1/project_sale/currentsale',
        dataType: 'JSON',
        success: function(response) {
            var tar = [];
            var ttar = [];
            var ltar = [];
            for (var i=0; i<response.data.current_year.length; i++) {
                //console.log(response.data.data[0].name);
                var target = (response.data.current_year[i].usersale);
                var totalTarget = (response.data.current_year[i].month);
                var lastsale = (response.data.last_year[i].usersale);
                tar.push(parseInt(target));
                ttar.push(getMonthName(totalTarget));
                ltar.push(parseInt(lastsale));
            }

            currentSalesone(tar,ttar,ltar);
        },
        error:function(){
            //alert('Something went wrong.');
        }
    });
}

function eight(){
    return $.ajax({
        type: "GET",
        url: baseUrl+'/api/v1/project_sale/lastsale',
        dataType: 'JSON',
        success: function(response) {
            var sales = (response.data);

            currentSaleslast(sales);
        },
        error:function(){
            //alert('Something went wrong.');
        }
    });
}



function nine(){
    return $.ajax({
        type: "GET",
        url: baseUrl+'/api/v1/department/getcurrentbids',
        dataType: 'JSON',
        success: function(response) {
            var tar = [];
            var ttar = [];
            var ltar = [];
            for (var i=0; i<response.data.current_bids.length; i++) {
                //console.log(response.data.data[0].name);
                var name = (response.data.current_bids[i].name);
                var bits = (response.data.current_bids[i].y);
                var coneect = (response.data.current_coneect[i].c);
                tar.push(name);
                ttar.push(parseInt(bits));
                ltar.push(parseInt(coneect));
            }

            currentbidsone(tar,ttar,ltar);
        },
        error:function(){
            //alert('Something went wrong.');
        }
    });
}
function four(){
    return $.ajax({
        type: "GET",
        url: baseUrl+'/api/v1/project_sale/topfive',
        dataType: 'JSON',
        success: function(response) {
            if (response.code == 200) {
                //console.log(response.data.data[0].name);
                var myData = [];
                for (var i = 0; i < response.data.length; i++) {

                    var myDataArr = [];
                    myDataArr[0] = (response.data[i].target);
                    myDataArr[1] = (response.data[i].uname);
                    myDataArr[2] = (response.data[i].user);
                    myDataArr[3] = (response.data[i].usersale);
                    myDataArr[4] = (response.data[i].image);
                    myDataArr[5] = (response.data[i].saleIncreased);
                    if(myDataArr[5] == true){
                        icon = '<i class="bi bi-arrow-up text-success font-weight-bold fs-5"></i>';
                    }
                    else{
                        icon = '<i class="bi bi-arrow-down text-danger font-weight-bold fs-5"></i>';
                    }
                    if(myDataArr[3] > 1) {
                        var pl = myDataArr[3] * 100;
                        var p = pl / myDataArr[0];
                        var html = '<div class="d-flex">' +
                            '<div class="flex-shrink-0">' +
                            '<img src="assets/images/Digital_Sales/' + myDataArr[4] + '">' +
                            '</div>' +
                            '<div class="flex-grow-1 ms-3">' +
                            '<p>' + myDataArr[1]+ '</h5>' +
                            '<div class="row">' +
                            '<div class="col-md-6">Sales</div>' +
                            '<div class="col-md-6"> $ ' + myDataArr[3] + icon + '</div>' +
                            '</div>' +
                            '<div class="row">' +
                            '<div class="col-md-6">Target</div>' +
                            '<div class="col-md-6"> $ ' + myDataArr[0] + '</div>' +
                            '</div>' +
                            '<div class="row">' +
                            '<div class="col-md-6">Achieve</div>' +
                            '<div class="col-md-6"> ' + Math.round(p) + '%</div>' +
                            '</div>' +
                            '<div class="row">' +
                            '<div class="col-12">' +
                            '<div class="progress">' +
                            '<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" style="width: ' + Math.round(p) + '%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">' + Math.round(p) + '%</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';


                        $("#userdetail").append(html);
                        //myData.push(myDataArr)
                    }
                }
                //console.log(JSON.stringify(myData));
                //getvalueaccount(JSON.stringify(myData));
            }else{
                var html = '<div class="d-flex"> No Reocord Found' +
                    '</div>';
            }
        }
    });
}

function showDiv(select){
    var getbidid = $("#getbidid").val();
    if(select.value==getbidid){
        document.getElementById('hidden_div').style.display = "none";
    } else{
        $('#showbid').val(getbidid);
        $('#showcloser').val(select.value);
        document.getElementById('hidden_div').style.display = "block";
    }
}

//high charts
var gaugeOptions = {
    chart: {
        type: 'solidgauge'
    },

    title: null,

    pane: {
        center: ['50%', '85%'],
        size: '100%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'arc'
        }
    },

    exporting: {
        enabled: false
    },

    tooltip: {
        enabled: false
    },

    // the value axis
    yAxis: {
        stops: [
            [0.1, '#55BF3B'], // green
            [0.5, '#DDDF0D'], // yellow
            [0.9, '#DF5353'] // red
        ],
        lineWidth: 0,
        tickWidth: 0,
        minorTickInterval: null,
        tickAmount: 2,
        title: {
            y: -70
        },
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
                useHTML: true
            }
        }
    }
};

// The speed gauge
function getvalue(x){
    var getusersale = document.getElementById("getusersale").value;

    var chartSpeed = Highcharts.chart('container-speed', Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: Number(x),
            title: {
                text: 'User Target'
            }
        },
        credits: {
            enabled: false
        },

//Value

        series: [{
            name: 'Speed',
            data: [Number(getusersale)],
            dataLabels: {
                format:
                    '<div style="text-align:center">' +
                    '<span style="font-size:25px">{y}</span><br/>' +
                    '<span style="font-size:12px;opacity:0.4">User Sales</span>' +
                    '</div>'
            },
            tooltip: {
                valueSuffix: 'Achieved Target'
            }
        }]

    }))};

// The speed gauge
function getvaluemonth(x,y,z){
//console.log(x);
    Highcharts.chart('container', {
        chart: {
            type: 'bar',
            height:'400px'
        },
        title: {
            text: '',
            align: 'center'
        },
        subtitle: {
            text: '',
            align: 'left'
        },
        xAxis: {
            categories: z,
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' thousand'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },

        series: [{
            name: 'Target',
            data: x,
        }, {
            name: 'Sale',
            data: y,
        }]

    })};

// The speed gauge
function getvaluereceived(x,y){

    var chartSpeed = Highcharts.chart('container-speed-received', Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: Number(y),
            title: {
                text: 'Amount Due <br> $ ' +y,
            }
        },
        credits: {
            enabled: false
        },

        chart:{
            height:'150px',

        },

        series: [{
            name: 'Speed',
            data: [Number(x)],
            dataLabels: {
                format:
                    '<div style="text-align:center">' +
                    '<span style="font-size:25px">{y}</span><br/>' +
                    '<span style="font-size:12px;opacity:0.4">Amount Received</span>' +
                    '</div>'
            },

            tooltip: {
                valueSuffix: 'Achieved Target'
            }
        }]

    }))};




//
function getvalueportal(myData){
    Highcharts.chart('container-portal', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            },
            height:"200px",
        },
        title: {
            text: '',
            align: 'center'
        },
        subtitle: {
            text: '',
            align: 'left'
        },
        plotOptions: {
            pie: {
                innerSize: 30,
                depth: 5
            }
        },
        series: [{
            name: 'Medals',
            data: JSON.parse(myData)
        }]
    });
}


function getvalueaccount(myData){
    Highcharts.chart('container-account', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            },
            height:"200px",
        },
        title: {
            text: '',
            align: 'center'
        },
        subtitle: {
            text: '',
            align: 'left'
        },
        plotOptions: {
            pie: {
                innerSize: 40,
                innerHeight: 50,
                depth: 5
            }
        },
        series: [{
            name: 'Medals',
            data: JSON.parse(myData)
        }]
    });
}

//
function getvalueaccount(myData){
    Highcharts.chart('container-account', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            },
            height:"200px",
        },
        title: {
            text: '',
            align: 'center'
        },
        subtitle: {
            text: '',
            align: 'left'
        },
        plotOptions: {
            pie: {
                innerSize: 40,
                innerHeight: 50,
                depth: 5
            }
        },
        series: [{
            name: 'Bits',
            data: JSON.parse(myData)
        }]
    });
}


function chartSpeedoMeter(di){
//console.log(di);
    Highcharts.chart('monthly-target', {
        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height: '180px'
        },

        title: {
            text: '',
        },

        pane: {
            startAngle: -90,
            endAngle: 89.9,
            background: null,
            center: ['50%', '75%'],
            size: '90%'
        },

        // the value axis
        yAxis: {
            min: 0,
            max: 100,
            tickPixelInterval: 72,
            tickPosition: 'inside',
            tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
            tickLength: 20,
            tickWidth: 2,
            minorTickInterval: null,
            labels: {
                distance: 20,
                style: {
                    fontSize: '14px'
                }
            },
            plotBands: [{
                from: 0,
                to: 60,
                color: '#55BF3B', // green
                thickness: 20
            }, {
                from: 60,
                to: 80,
                color: '#DDDF0D', // yellow
                thickness: 20
            }, {
                from: 80,
                to: 100,
                color: '#DF5353', // red
                thickness: 20
            }]
        },

        series: [{
            name: 'Sale',
            data: [Number(di)],
            tooltip: {
                valueSuffix: '%'
            },
            dataLabels: {
                format: '{y} %',
                borderWidth: 0,
                color: (
                    Highcharts.defaultOptions.title &&
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || '#333333',
                style: {
                    fontSize: '16px'
                }
            },
            dial: {
                radius: '80%',
                backgroundColor: 'gray',
                baseWidth: 12,
                baseLength: '0%',
                rearLength: '0%'
            },
            pivot: {
                backgroundColor: 'gray',
                radius: 6
            }

        }]

    });

    // Add some life
    setInterval(() => {
        const chart = Highcharts.charts[0];
        if (chart && !chart.renderer.forExport) {
            const point = chart.series[0].points[0],
                inc = Math.round((Math.random() - 0.5) * 20);

            let newVal = point.y + inc;
            if (newVal < 0 || newVal > 200) {
                newVal = point.y - inc;
            }

            point.update(newVal);
        }

    }, 3000);
}
function chartSpeedoMetertwo(di){

    Highcharts.chart('year-target', {
        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height: '180px'
        },

        title: {
            text: '',
        },

        pane: {
            startAngle: -90,
            endAngle: 89.9,
            background: null,
            center: ['50%', '75%'],
            size: '90%'
        },

        // the value axis
        yAxis: {
            min: 0,
            max: 100,
            tickPixelInterval: 72,
            tickPosition: 'inside',
            tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
            tickLength: 20,
            tickWidth: 2,
            minorTickInterval: null,
            labels: {
                distance: 20,
                style: {
                    fontSize: '14px'
                }
            },
            plotBands: [{
                from: 0,
                to: 60,
                color: '#55BF3B', // green
                thickness: 20
            }, {
                from: 60,
                to: 80,
                color: '#DDDF0D', // yellow
                thickness: 20
            }, {
                from: 80,
                to: 100,
                color: '#DF5353', // red
                thickness: 20
            }]
        },

        series: [{
            name: 'Sale',
            data: [Number(di)],
            tooltip: {
                valueSuffix: '%'
            },
            dataLabels: {
                format: '{y} %',
                borderWidth: 0,
                color: (
                    Highcharts.defaultOptions.title &&
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || '#333333',
                style: {
                    fontSize: '16px'
                }
            },
            dial: {
                radius: '80%',
                backgroundColor: 'gray',
                baseWidth: 12,
                baseLength: '0%',
                rearLength: '0%'
            },
            pivot: {
                backgroundColor: 'gray',
                radius: 6
            }

        }]

    });

    // Add some life
    setInterval(() => {
        const chart = Highcharts.charts[0];
        if (chart && !chart.renderer.forExport) {
            const point = chart.series[0].points[0],
                inc = Math.round((Math.random() - 0.5) * 20);

            let newVal = point.y + inc;
            if (newVal < 0 || newVal > 200) {
                newVal = point.y - inc;
            }

            point.update(newVal);
        }

    }, 3000);
}

// Data retrieved from https://www.ssb.no/energi-og-industri/olje-og-gass/statistikk/sal-av-petroleumsprodukt/artikler/auka-sal-av-petroleumsprodukt-til-vegtrafikk
function currentSalesone(x,y,z) {

    Highcharts.chart('currentSales', {
        title: {
            text: 'Current Vs SPLY Sales',
            align: 'center'
        },
        xAxis: {
            categories: y
        },
        yAxis: {
            title: {
                text: 'Sales'
            }
        },
        tooltip: {
            valueSuffix: ' dollar'
        },
        series: [ {
            type: 'column',
            name: '2023',
            data: x
        },{
            type: 'column',
            name: '2022',
            data: z
        },
            //{
            //  type: 'spline',
            //  name: 'Average',
            //  data: [0, 83.33, 70.66],
            // marker: {
            //     lineWidth: 2,
            //      lineColor: Highcharts.getOptions().colors[3],
            //     fillColor: 'white'
            // }
            //  }
        ]
    });
}
function currentSaleslast(x) {
    Highcharts.chart('variationfromlastmonth', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Variation From Last Month'
        },
        xAxis: {
            categories: ['Jan','Feb','Mar','Apr','May']
        },
        credits: {
            enabled: false
        },
        series: x
    });
}

// Bids Data sorted Departments Wise of Current month
function currentbidsone(x,y,z) {
    Highcharts.chart('container-departments-two', {
        title: {
            text: 'Bids vs Connect',
            align: 'center'
        },
        xAxis: {
            categories: x
        },
        yAxis: {
            title: {
                text: 'Bids vs Connect'
            }
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y} {series.name}'
                }
            }
        },
        series: [ {
            type: 'column',
            name: 'bids',
            data: y
        },{
            type: 'column',
            name: 'connects',
            data: z
        },
            //{
            //  type: 'spline',
            //  name: 'Average',
            //  data: [0, 83.33, 70.66],
            // marker: {
            //     lineWidth: 2,
            //      lineColor: Highcharts.getOptions().colors[3],
            //     fillColor: 'white'
            // }
            //  }
        ]
    });
}


$(document).ready(function() {
  // $('#exampleModalCenter').on('shown.bs.modal', function () {
  //   $('#myInput').trigger('focus')
  // });
//   var myModal = document.getElementById('myModal')
// var myInput = document.getElementById('myInput')

// myModal.addEventListener('shown.bs.modal', function () {
//   myInput.focus()
// })
});


// Shar script

// JavaScript to toggle the password visibility
function togglePasswordVisibility() {
  const passwordInput = document.getElementById('password');
  const showPasswordIcon = document.getElementById('showPasswordIcon');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    showPasswordIcon.classList.remove('fa-eye');
    showPasswordIcon.classList.add('fa-eye-slash');
  } else {
    passwordInput.type = 'password';
    showPasswordIcon.classList.remove('fa-eye-slash');
    showPasswordIcon.classList.add('fa-eye');
  }
}


// tracking sheet seemore seeless funtion

$(document).ready(function() {
    // Define the number of characters to initially display
    var charactersToShow = 160;

    // Loop through each element with class "providerComments"
    $(".providerComments").each(function() {
      var $this = $(this);
      var $paragraph = $this.find('p');
      var fullText = $paragraph.text();

      // Check if the full text exceeds the character limit
      if (fullText.length > charactersToShow) {
        var initialText = fullText.slice(0, charactersToShow);
        var seeMoreLink = '<a href="#" class="see-more nodeco">more</a>';
        var seeLessLink = '<a href="#" class="see-less nodeco">less</a>';

        // Add the initial text and "See More" link
        $paragraph.html(initialText + '... ' + seeMoreLink);

        // Handle "See More" click event
        $this.on('click', '.see-more', function(e) {
          e.preventDefault();
          $paragraph.html(fullText + ' ' + seeLessLink);
        });

        // Handle "See Less" click event
        $this.on('click', '.see-less', function(e) {
          e.preventDefault();
          $paragraph.html(initialText + '... ' + seeMoreLink);
        });
      }
    });
  });

