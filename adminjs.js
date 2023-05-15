

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

    $("#stdetnav").on("click", function () {
        $("#Defspace").show();
        $("#formid1").hide();
        $("#certidiv").hide();
        $("#examdiv").hide();
        $("#Resultdiv").hide();
        $("#addsub").hide();
        
        // alert("asdbkjahsk")
        let temp = { flag: 3 };

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
        $("#addsub").hide();

    })

    $("#certinav").on("click", function () {
        $("#Defspace").hide();
        $("#formid1").hide();
        $("#certidiv").show();
        $("#examdiv").hide();
        $("#Resultdiv").hide();
        $("#addsub").hide();

    })

    $("#examnav").on("click", function () {
        $("#Defspace").hide();
        $("#formid1").hide();
        $("#certidiv").hide();
        $("#examdiv").show();
        $("#Resultdiv").hide();
        $("#addsub").hide();

        $("#addq").hide();

        let temp = { flag: 4 };

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: temp,
            success: function (response) {
                //alert(response);
                $('#examsub').html(response);
            }
        });



    })



    $("#resultnav").on("click", function () {
        $("#Defspace").hide();
        $("#formid1").hide();
        $("#certidiv").hide();
        $("#examdiv").hide();
        $("#Resultdiv").show();
        $("#addsub").hide();
    });




    
    $("#addnav").on("click", function () {
        $("#Defspace").hide();
        $("#formid1").hide();
        $("#certidiv").hide();
        $("#examdiv").hide();
        $("#Resultdiv").hide();
        $("#addsub").show();

        //alert('wo');

        $("#addsubbtn").on("click",function(){
            let sname=document.getElementById('txtsubadd').value;
            let ptsname=/^[a-z0-9]{1,}$/ig;
            if(ptsname.test(sname)==false){
                alert('inavlid!!')
            }
            else{
                let temp={flag:7,sname:sname};

                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: temp,
                    //dataType: "dataType",
                    success: function (response) {
                        sname.value="";
                        alert(response);
                    }
                });
            }
            
        })

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



function adddistrict() {
    if ($("#cmbstate").val() == 'gujarat') {
        let opt = new Option("Surat", "Surat");
        document.getElementById('cmbdist').add(opt);
    }
}

function addcity() {
    if ($("#cmbdist").val() == 'Surat') {
        let opt = new Option("Surat", "Surat");
        document.getElementById('cmbcity').add(opt);
    }
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

