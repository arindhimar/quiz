<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Update Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" /> -->
    <!-- <link rel="stylesheet" href="stud.css" /> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <script src="update.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script>
        function retid() {
            <?php

            $uid = $_GET['uid'];

            $sql = 'select * from usertb where utype="user" and uid = ' . $uid . '';

            $res = mysqli_query($con, $sql);

            $data = mysqli_fetch_assoc($res);


            ?>
        }
    </script>
</head>



<body id="body-pd">

    <!--Container Main end-->
    <!-- Scripts -->

    <div id="formid1" onload="retid()">



        <!-- <h4 class="addsdet">Add Student Details</h4> -->

        <form class="row g-3 m-5">


            <div class="form-group row">

                <div class="col-md-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="txtname" placeholder="Enter Name" value=<?= $data['uname']; ?> required>

                </div>
            </div>

            <div class="form-group row">

                <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="txtemail" placeholder="Enter Email" value=<?= $data['uemail']; ?> required>

                </div>
            </div>


            
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="password" class="form-label">New Password</label>
                    <div class="input-group has-validation">
                        <input type="password" class="form-control" id="txtpass" placeholder="Enter Password" required>
                    </div>
                </div>
            </div>





            <div class="form-group row">
                <div class="col-md-3">
                    <label for="state" class="form-label">State</label>
                    <select class="form-control" onchange="adddistrict()" id="cmbstate" aria-describedby="validationServer04Feedback" value=<?= $data['ustate']; ?> required>
                        <option selected disabled value="">Choose...</option>
                        <option value="gujarat">Gujarat</option>
                    </select>

                </div>



                <div class="col-md-3">
                    <label for="district" class="form-label">District</label>
                    <select class="form-control" onchange="addcity()" id="cmbdist" aria-describedby="validationServer04Feedback" value=<?= $data['udistrict']; ?> required>
                        <option selected disabled value="">Choose...</option>

                    </select>

                </div>



                <div class="col-md-3">
                    <label for="city" class="form-label">City</label>
                    <select class="form-control" id="cmbcity" aria-describedby="validationServer04Feedback" value=<?= $data['ucity']; ?> required>
                        <option selected disabled value="">Choose...</option>
                    </select>

                </div>



                <div class="col-md-3">
                    <label for="validationServer05" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="txtzip" aria-describedby="validationServer05Feedback" value=<?= $data['uzip']; ?> placeholder="Zip Code" required>

                </div>
            </div>


            <div class="col-12">
                <div class="form-check">

                    <input class="form-check-input" type="checkbox" value="" name="flexRadioDefault" id="confirmckboc">

                    <div id="ckerror" style="display: flex; align-items: center;">
                        <h5>Verify Data</h5>
                    </div>
                </div>

            </div>

            <div class="col-12">
                <!-- <button type="submit">Submit form</button> -->

                <input type="button" id='updtdata' class="btn btn-primary mr-3" value="Update">
                <input type="button" id='canbtn' class="btn btn-danger" value="Cancel">

            </div>

        </form>


    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>