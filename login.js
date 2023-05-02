$(document).ready(function () {
    $("#loginbtn").on("click", function (event) {
        event.preventDefault();
        //alert("ashdha");
        let strid = $("#id").val();
        console.log(strid)
        let strpass = $("#password").val();
        let ptid = /^cpa\d{3}$/

        if (ptid.test(strid)==false) {
            document.getElementById('id').className = 'form-control is-invalid';
            //console.log("asdgkak")
        }
        else if(strpass==null||strpass==""){
            document.getElementById('password').className = 'form-control is-invalid';
        }
        else{
            let temp={flag: 1,id:strid,password:strpass};
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: temp,
                //dataType: "dataType",
                success: function (response) {
                    if(response=='success'){
                        window.location.href='adminsuc.html';
                    }
                    else {
                        alert(response);
                    }
                }
            });
        }
    })
});



