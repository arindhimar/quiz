document.addEventListener("DOMContentLoaded", function (event) {
    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                // show navbar
                nav.classList.toggle('show')
                // change icon
                toggle.classList.toggle('bx-x')
                // add padding to body
                bodypd.classList.toggle('body-pd')
                // add padding to header
                headerpd.classList.toggle('body-pd')
            })
        }
    }

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

    var ct = 0;

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
        }
    }
    linkColor.forEach(l => l.addEventListener('click', colorLink))


    /*Code For Main Working Space*/

    /* Toggling */


    //Default
    //$("#Defspace").show();
    // $("#formid1").hide();
    // $("#certidiv").hide();
    // $("#examdiv").hide();
    // $("#Resultdiv").hide();

    // function ontoggle()
    // {
    //     $("#Defspace").toggle();
    //     $("#formid1").toggle();
    //     $("#certidiv").toggle();
    //     $("#examdiv").toggle();
    //     $("#Resultdiv").toggle();
    // }

    var uid;

    $("#stdetnav").on("click", function () {
        $("#Defspace").show();
        $("#formid1").hide();
        $("#certidiv").hide();
        $("#examdiv").hide();
        $("#Resultdiv").hide();
        $('#mainexambody').hide();
        // alert("asdbkjahsk")


        let url = $(location).attr('href');

        let turl = url.split('=');

        let temp = { flag: 6, id: turl[1] };
        uid = turl[1];
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: temp,
            //dataType: "dataType",
            success: function (response) {
                $('#trydisp').html(response);
            }
        });


    })

    $("#stdetnav").trigger("click");



    $("#addstdnav").on("click", function () {
        $("#Defspace").hide();
        $("#formid1").show();
        $("#certidiv").hide();
        $("#examdiv").hide();
        $("#Resultdiv").hide();
        $('#mainexambody').hide();

    })

    $("#certinav").on("click", function () {
        $("#Defspace").hide();
        $("#formid1").hide();
        $("#certidiv").show();
        $("#examdiv").hide();
        $("#Resultdiv").hide();
        $('#mainexambody').hide();

    })

    $("#examnav").on("click", function () {
        $("#Defspace").hide();
        $("#formid1").hide();
        $("#certidiv").hide();
        $("#examdiv").show();
        $("#Resultdiv").hide();


        $('#mainexambody').hide();


        let temp = { flag: 4 };

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: temp,
            success: function (response) {
                //alert(response);
                //alert(response);
                $('#examsub').html(response);
            }
        });


        $('#examver').on('click', function () {
            if ($('#examsub').val() == null) {
                alert("Select A Subject!!");
            }
            else {
                if (navigator && navigator.userAgent && navigator.userAgent.indexOf('Mozilla') !== -1 && navigator.userAgent.indexOf('AppleWebKit') !== -1) {
                    // JavaScript is supported



                    $("#examdiv").hide();
                    $('#header').hide();
                    $('#nav-bar').hide();
                    var qno = [];



                    let temp = { flag: 8, sname: $('#examsub').val() };

                    $.ajax({
                        type: "POST",
                        url: "ajax.php",
                        data: temp,
                        //dataType: "dataType",
                        success: function (response) {
                            $('#mainexambody').html(response);
                            var elem = document.documentElement;

                            // Check if fullscreen mode is supported
                            if (elem.requestFullscreen) {
                                // If supported, make the element fullscreen
                                elem.requestFullscreen();
                            } else if (elem.webkitRequestFullscreen) { // Safari
                                elem.webkitRequestFullscreen();
                            } else if (elem.msRequestFullscreen) { // IE/Edge
                                elem.msRequestFullscreen();
                            }
                            ct = 0;

                            // Enable the button

                            $("#fbtn").prop("disabled", false);
                            $("#submst").hide();

                        }


                    });


                    $('#mainexambody').show(function () {
                        ct = 0;
                        $("#blurOverlay").hide();

                        // if (document.visibilityState && $('#mainexambody').is(':visible') == true) {
                        //     // Tab change detection
                        //     $(window).blur(function () {
                        //         // Tab has changed, do something
                        //         $(window).off("blur");
                        //         $("#fbtn").trigger("click");
                        //         // Disable the button
                        //         $("#fbtn").prop("disabled", true);
                        //     });

                        //     // Screen size change detection
                        //     $(window).resize(function () {
                        //         // Screen size has changed, do something
                        //         $(window).off("resize");
                        //         $("#fbtn").trigger("click");
                        //         // Disable the button
                        //         $("#fbtn").prop("disabled", true);
                        //     });
                        // }

                        //finish button click
                        $('#fbtn').on('click', function () {
                           
                            $("#submst").hide();

                            // Disable the button
                            $("#fbtn").prop("disabled", true);
                            let temp = { flag: 9, sname: $('#examsub').val() };
                            let trq;

                            //console.log(typeof(uid));

                            let soln = { flag: 10, sid: uid.replace("#", ""), subid: $('#examsub').val() };
                            $.ajax({
                                type: "POST",
                                url: "ajax.php",
                                data: temp,
                                //dataType: "dataType",
                                success: function (response) {
                                    //  console.log(response);
                                    trq = response.split(',');
                                    trq.pop();
                                    //console.log(document.getElementsByName(response[0]));
                                    //console.log(trq);


                                    do {
                                        let qn = trq.shift();

                                        //console.log(document.getElementsByName(qn));

                                        let radioButtons = document.getElementsByName(qn);

                                        // Iterate through the radio buttons
                                        for (var i = 0; i < radioButtons.length; i++) {
                                            if (radioButtons[i].checked) {
                                                // The current radio button is checked
                                                let checkedValue = radioButtons[i].value;
                                                //console.log('Checked value:', checkedValue);

                                                //appending qno and ans to the object
                                                soln[qn] = checkedValue;

                                                // You can also access other attributes of the checked radio button
                                                // For example: radioButtons[i].id, radioButtons[i].getAttribute('data-something'), etc.
                                                break; // Exit the loop since we found the checked radio button
                                            }
                                        }
                                    } while (trq.length != 0);

                                    //console.log(soln);

                                    $.ajax({
                                        type: "POST",
                                        url: "ajax.php",
                                        data: soln,
                                        //dataType: "dataType",
                                        success: function (response) {
                                            //console.log(response);  
                                            // Standard method  to exit full screen
                                            if (document.exitFullscreen) {
                                                document.exitFullscreen();
                                            } else if (document.webkitExitFullscreen) { // Older web browsers
                                                document.webkitExitFullscreen();
                                            }
                                            $('#header').show();
                                            $('#nav-bar').show();
                                            $("#examdiv").hide();
                                            $("#resultnav").trigger("click");
                                            ct = 0;

                                        }
                                    });


                                }
                            });

                        })

                    });


                } else {
                    alert("JavaScript isn't working.. Cannot give the exam..");
                }

            }
        })




    })



    $("#resultnav").on("click", function () {
        $("#Defspace").hide();
        $("#formid1").hide();
        $("#certidiv").hide();
        $("#examdiv").hide();
        $("#Resultdiv").show();
        $('#mainexambody').hide();

        let temp = { flag: 11, usid: uid };

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: temp,
            //dataType: "dataType",
            success: function (response) {
                $('#Resultdiv').html(response);
            }
        });


    });


    $('#stdetnav').on('click', function () {

    })


    $('#examsub').on('click', function () {
        if ($('#examsub').val() == null) {
            $("#addq").hide();
        }
        else {
            $("#addq").show();
            //console.log($('#examsub').val());
        }
    })

    $('#addqbtn').on('click', function () {
        if ($('#txtque').val() == null || $('#opta').val() == null || $('#optb').val() == null || $('#optc').val() == null || $('#optd').val() == null) {
            alert('Please fill all the details!!!');
        }
        else {
            let cttemp = document.getElementsByName('crtans');

            for (let i = 0; i < cttemp.length; i++) {
                if (cttemp[i].checked == true) {
                    var crtans = cttemp[i].value;
                    break;
                }
            }

            let temp = { question: $('#txtque').val(), opta: $('#opta').val(), optb: $('#optb').val(), optc: $('#optc').val(), optd: $('#optd').val(), correct: crtans, subid: $('#examsub').val(), flag: 5 };
            //console.log(temp);

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: temp,
                //dataType: "dataType",
                success: function (response) {
                    //console.log(response);

                }
            });
        }

    })






    $('#adddata').on('click', function () {

        let txtname = $('#txtname').val();
        let txtemail = $('#txtemail').val();
        let txtpass = $('#txtpass').val();
        let cmbstate = $('#cmbstate').val();
        let cmbdist = $('#cmbdist').val();
        let cmbcity = $('#cmbcity').val();
        let txtzip = $('#txtzip').val();


        let ptname = /^[a-z]{2,}$/ig;
        let ptemail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ig;
        let ptppass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+])[0-9a-zA-Z!@#$%^&*()_+]{8,}$/ig;
        let ptzip = /^[1-9]{1}[0-9]{5}$/ig;

        if (ptname.test(txtname) == false) {
            document.getElementById('txtname').className = 'form-control is-invalid';
            return false;
        }
        else if (ptemail.test(txtemail) == false) {
            document.getElementById('txtemail').className = 'form-control is-invalid';
            return false;
        }
        else if (ptppass.test(txtpass) == false) {
            document.getElementById('txtpass').className = 'form-control is-invalid';
            return false;
        }
        else if (cmbstate == null) {
            document.getElementById('cmbstate').className = 'form-control is-invalid';
            return false;
        }
        else if (cmbdist == null) {
            document.getElementById('cmbdist').className = 'form-control is-invalid';
            return false;
        }
        else if (cmbcity == null) {
            document.getElementById('cmbcity').className = 'form-control is-invalid';
            return false;
        }
        else if (ptzip.test(txtzip) == false) {
            document.getElementById('txtzip').className = 'form-control is-invalid';
            return false;
        }
        else if (document.getElementById('confirmckboc').checked) {

            document.getElementById('ckerror').innerHTML = 'Confirm To Add Details';
            let temp = {
                flag: 2,
                name: txtname,
                email: txtemail,
                password: txtpass,
                state: cmbstate,
                district: cmbdist,
                city: cmbcity,
                zip: txtzip
            };

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: temp,
                //dataType: "dataType",
                success: function (response) {
                    if (response == 'Done') {
                        $("#stdetnav").trigger("click");
                    }
                }
            });



        }

    })


});

function updtacc(x){
    //console.log(x);
    //window.location.href="";
    window.open("update.php?uid="+x+"", "_blank");
}





function setval(x) {
    //console.log(typeof(x));
    //x=x.replace("opt","");
    if (x == 'opta') {
        $('#inlineRadio1').val($('#' + x).val());

    }
    else if (x == 'optb') {
        $('#inlineRadio2').val($('#' + x).val());


    }
    else if (x == 'optc') {
        $('#inlineRadio3').val($('#' + x).val());


    }
    else if (x == 'optd') {
        $('#inlineRadio4').val($('#' + x).val());


    }
}


