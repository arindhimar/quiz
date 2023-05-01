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
        // alert("asdbkjahsk")

    })

    $("#stdetnav").trigger("click");



    $("#addstdnav").on("click", function () {
        $("#Defspace").hide();
        $("#formid1").show();
        $("#certidiv").hide();
        $("#examdiv").hide();
        $("#Resultdiv").hide();

    })

    $("#certinav").on("click", function () {
        $("#Defspace").hide();
        $("#formid1").hide();
        $("#certidiv").show();
        $("#examdiv").hide();
        $("#Resultdiv").hide();

    })

    $("#examnav").on("click", function () {
        $("#Defspace").hide();
        $("#formid1").hide();
        $("#certidiv").hide();
        $("#examdiv").show();
        $("#Resultdiv").hide();

    })



    $("#resultnav").on("click", function () {
        $("#Defspace").hide();
        $("#formid1").hide();
        $("#certidiv").hide();
        $("#examdiv").hide();
        $("#Resultdiv").show();
    });





});






function validateallform() {
    let txtname = $('#txtname').val();
    let txtemail = $('#txtemail').val();
    let txtpass = $('#txtpass').val();
    let cmbstate = $('#cmbstate').val();
    let cmbdist = $('#cmbdist').val();
    let cmbcity = $('#cmbcity').val();
    let txtzip = $('#txtzip').val();

    console.log(cmbstate);


    let ptname = /^[a-z]{2,}$/ig;

    if (ptname.test(txtname)) {
        document.getElementById('txtname').className = 'form-control is-valid';

    }
    else {
        document.getElementById('txtname').className = 'form-control is-invalid';

    }


    let ptemail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ig;

    if (ptemail.test(txtemail)) {
        document.getElementById('txtemail').className = 'form-control is-valid';

    }
    else {
        document.getElementById('txtemail').className = 'form-control is-invalid';

    }



    
    let ptppass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+])[0-9a-zA-Z!@#$%^&*()_+]{8,}$/ig;

    if (ptppass.test(txtpass)) {
        document.getElementById('txtpass').className = 'form-control is-valid';

    }
    else {
        document.getElementById('txtpass').className = 'form-control is-invalid';

    }

    if(cmbstate==null)
    {
        document.getElementById('cmbstate').className = 'form-control is-invalid';
    }
    else
    {
        document.getElementById('cmbstate').className = 'form-control is-valid';
    }


    if(cmbdist==null)
    {
        document.getElementById('cmbdist').className = 'form-control is-invalid';
    }
    else
    {
        document.getElementById('cmbdist').className = 'form-control is-valid';
    }
    

    
    if(cmbcity==null)
    {
        document.getElementById('cmbcity').className = 'form-control is-invalid';
    }
    else
    {
        document.getElementById('cmbcity').className = 'form-control is-valid';
    }
    



    let ptzip = /^[1-9]{1}[0-9]{5}$/ig;

    if (ptzip.test(txtzip)) {
        document.getElementById('txtzip').className = 'form-control is-valid';
    }
    else {
        document.getElementById('txtzip').className = 'form-control is-invalid';
    }

    if(document.getElementById('confirmckboc').checked)
    {
        document.getElementById('ckerror').innerHTML='Confirm To Add Details';
        
        document.getElementById('ckerror').style.color='Green';
    }
    else{
        document.getElementById('ckerror').innerHTML='Confirm To Add Details';
        document.getElementById('ckerror').style.color='Red';
    }


}


function adddistrict() {
    if($("#cmbstate").val()=='gujarat')
    {
        let opt = new Option("Surat","Surat");
        document.getElementById('cmbdist').add(opt);
    }
}

function addcity()
{
    if($("#cmbdist").val()=='Surat'){
        let opt = new Option("Surat","Surat");
        document.getElementById('cmbcity').add(opt);
    }
}