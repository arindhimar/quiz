<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <link rel="stylesheet" href="admincss.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <script src="adminjs.js"></script>
    <script src="jq.js"></script>
    <script>

    </script>
</head>

<body>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>

        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="#" class="hnav_logo">
                        <div class="header_img"> <img class='bx bx-layer nav_logo-icon' src="loginback.jpg" alt="">
                        </div> <span class="nav_logo-name">VNSGU</span>
                    </a>
                    <div class="nav_list">

                        <a href="#" id="stdetnav" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Student Details</span> </a>

                        <a href="#" id="addstdnav" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Add Student</span> </a>


                        <a href="#" id="certinav" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i>
                            <span class="nav_name">Certificates</span> </a>


                        <a href="#" id="addnav" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Add Subject</span> </a>


                        <a href="#" id="examnav" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Exam Questions</span> </a>


                        <a href="#" id="resultnav" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                            <span class="nav_name">Results</span> </a>
                    </div>
                </div> <a href="login.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">



            <div id="Defspace">

                <h1>Student Details</h1>



                <div class="addsdet animate-up">
                    <div id='trydisp' style="display: flex; justify-content: center;  justify-content: space-between; gap: 0px;">

                    </div>
                </div>
            </div>





            <div id="formid1">



                <h4 class="addsdet">Add Student Details</h4>

                <form class="row g-3">




                    <div class="col-md-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="txtname" placeholder="Enter Name" required>

                    </div>




                    <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="txtemail" placeholder="Enter Email" required>

                    </div>




                    <div class="col-md-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group has-validation">
                            <input type="password" class="form-control" id="txtpass" placeholder="Enter Password" required>

                        </div>
                    </div>




                    <div class="col-md-3">
                        <label for="state" class="form-label">State</label>
                        <select class="form-control" onchange="adddistrict()" id="cmbstate" aria-describedby="validationServer04Feedback" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="gujarat">Gujarat</option>
                        </select>

                    </div>



                    <div class="col-md-3">
                        <label for="district" class="form-label">District</label>
                        <select class="form-control" onchange="addcity()" id="cmbdist" aria-describedby="validationServer04Feedback" required>
                            <option selected disabled value="">Choose...</option>

                        </select>

                    </div>



                    <div class="col-md-3">
                        <label for="city" class="form-label">City</label>
                        <select class="form-control" id="cmbcity" aria-describedby="validationServer04Feedback" required>
                            <option selected disabled value="">Choose...</option>
                        </select>

                    </div>



                    <div class="col-md-3">
                        <label for="validationServer05" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="txtzip" aria-describedby="validationServer05Feedback" placeholder="Zip Code" required>

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

                        <input type="button" id='adddata' class="btn btn-primary" value="Add">

                    </div>

                </form>


            </div>






            <div id="certidiv">

                <h1>Certificates Div</h1>

            </div>


            <div id="addsub" style="display: none;">

                
                <form class="row g-3">



                    <div class="col-md-4">
                        <label for="Subject Name" class="form-label">Subject Name</label>
                        <!-- <input type="text" class="form-control" > -->
                        <input class="form-control" type="text" name="sname" id="txtsubadd" style="width: 100%;" placeholder="Enter Subject Name" required>

                    </div>


                    <div class="col-12">
                        <!-- <button type="submit">Submit form</button> -->

                        <input type="button" id='addsubbtn' class="btn btn-primary" value="Add">

                    </div>

                </form>


            </div>



            <div id="examdiv">

                <div class="card" style="width: 100%;">
                    <div class="card-body">

                        <div id='dm1'>
                            <h5 class="card-title" style="text-align: center;">Subject Name</h5>
                            <div class="dropdown">
                                <br>
                                <select class="btn btn-secondary dropdown-toggle" id="examsub" style="width: 100%;">
                                </select>
                            </div>
                        </div>

                        <!-- <div id='dm2'>
                            <h5 class="card-title" style="text-align: center;">Exam Name</h5>
                            <div class="dropdown">
                                <br>
                                <select class="btn btn-secondary dropdown-toggle" id="examdet" style="width: 100%;">
                                </select>
                            </div>
                        </div> -->

                        <br>

                    </div>

                </div>





                <div class="card" style="width: 100%; margin-top:2%" id='addq'>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><b>Question</b></label>
                            <textarea class="form-control" id="txtque" rows="3"></textarea>
                        </div>


                        <div class="mb-3">
                            <label class="form-label"><b>Option A</b></label>
                            <textarea class="form-control" id="opta" rows="1" oninput="setval(id)"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><b>Option B</b></label>
                            <textarea class="form-control" id="optb" rows="1" oninput="setval(id)"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><b>Option C</b></label>
                            <textarea class="form-control" id="optc" rows="1" oninput="setval(id)"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><b>Option D</b></label>
                            <textarea class="form-control" id="optd" rows="1" oninput="setval(id)"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><b>Correct Option</b></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="crtans" id="inlineRadio1" checked>
                                <label class="form-check-label" for="inlineRadio1">A</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="crtans" id="inlineRadio2">
                                <label class="form-check-label" for="inlineRadio2">B</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="crtans" id="inlineRadio3">
                                <label class="form-check-label" for="inlineRadio3">C</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="crtans" id="inlineRadio4">
                                <label class="form-check-label" for="inlineRadio4">D</label>
                            </div>
                        </div>

                        <innput type="button" class="btn btn-secondary" style="width: 100%;" id='addqbtn' value='submit'>Add Question


                    </div>



                </div>
            </div>



            <div id="Resultdiv">

                <h1>Result Div</h1>

            </div>




        </div>
        <!--Container Main end-->
        <!-- Scripts -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </body>

</html>