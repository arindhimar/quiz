document.addEventListener("DOMContentLoaded", function (event) {

    let url = $(location).attr('href');

    let turl = url.split('=');

    $('#updtdata').on('click', function () {

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
                flag: 18,
                uid:turl[1],
                name: txtname,
                email: txtemail,
                password: txtpass,
                state: cmbstate,
                district: cmbdist,
                city: cmbcity,
                zip: txtzip
            };

            console.log(temp);
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: temp,
                //dataType: "dataType",
                success: function (response) {
                    if (response == 'Done') {
                        window.close();
                    }
                    else{
                        console.log(response);
                    }

                }
            });



        }

    })
    
    $('#canbtn').on('click',function(){
        window.close();
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