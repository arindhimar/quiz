$(document).ready(function () {
    $('#contactForm').hide();
    $('#spinemail').hide();

    $("#loginbtn").on("click", function (event) {
        event.preventDefault();
        //alert("ashdha");
        let strid = $("#id").val();
        console.log(strid)
        let strpass = $("#password").val();
        let ptid = /^\d{5,}$/;


        //Validation for credentials
        if (ptid.test(strid) == false) {
            document.getElementById('id').className = 'form-control is-invalid';
            //console.log("asdgkak")
        }
        else if (strpass == null || strpass == "") {
            document.getElementById('password').className = 'form-control is-invalid';
        }
        else {
            let temp = { flag: 1, id: strid, password: strpass };
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: temp,
                //dataType: "dataType",
                success: function (response) {
                    //alert(response);
                    if (response == 'Invalid Credentails!!') {
                        alert(response);
                    }
                    else {
                        window.location.href = response;
                    }
                }
            });
        }
    })
    $(function () {

        // contact form animations
        $('#reset').click(function () {
            if ($("#contactForm").is(":hidden")) {
                $('#contactForm').fadeToggle();
                $('#spinemail').hide();
                $('#resetmsg').hide();
            }
        })
        $('#cancelbtn').click(function () {
            if ($("#contactForm").is(":visible")) {
                $('#contactForm').fadeToggle();
                $('#resetmsg').hide();
                $('#txtresemail').val("");
            }
        })

        //Reset The Password
        $('#resetbtn').click(function () {
            if ($("#contactForm").is(":visible")) {
                let txtemail = $('#txtresemail').val();

                let ptemail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ig;

                if (ptemail.test(txtemail)) {
                    //spin animation 
                    $('#spinemail').show();

                    let temp = { flag: 15, email: txtemail };
                    $.ajax({
                        type: "POST",
                        url: "ajax.php",
                        data: temp,
                        //dataType: "dataType",
                        success: function (response) {
                            //console.log(response);
                            if (response == 1) {
                                $("#resetmsg")[0].className = "alert alert-success";
                                $("#resetmsg").html("A reset link has been sent to the email!");

                                $("#cancelbtn").delay(2000).queue(function() {
                                    // Your event code here
                                    // This code will be executed after 2 seconds
                                    $(this).trigger( "click" );
                                    $(this).dequeue();
                                  });
                            }
                            else if (response == 2) {
                                $("#resetmsg")[0].className = "alert alert-warning";
                                $("#resetmsg").html("Something went wrong . Please try again later <br> If the problem continues contact the website owner");
                                $("#cancelbtn").delay(2000).queue(function() {
                                    // Your event code here
                                    // This code will be executed after 2 seconds
                                    $(this).trigger( "click" );
                                    $(this).dequeue();
                                  });
                            }
                            else if (response == 0) {
                                $("#resetmsg")[0].className = "alert alert-light";
                                $("#resetmsg").html("Please enter a registered Email Id");
                            }
                            else{
                                alert(response);
                            }
                            $('#resetmsg').show();
                            $('#spinemail').hide();
                            $('#txtresemail').val("");
                        }
                    });
                }
                else {
                    // Change the class of the element 
                    $("#resetmsg")[0].className = "alert alert-light";
                    $("#resetmsg").html("Enter a valid email id");
                    $('#resetmsg').show();
                }
            }
        })


    });
});



