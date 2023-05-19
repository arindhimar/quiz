<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Student Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <link rel="stylesheet" href="stud.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <script src="studjs.js"></script>
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

                        <a href="#" id="stdetnav" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Profile</span> </a>


                        <a href="#" id="examnav" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Give Exam</span> </a>


                        <a href="#" id="resultnav" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i><span class="nav_name">Results</span> </a>
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




            <div id="certidiv">

                <h1>Certificates Div</h1>

            </div>


            <div id="blurOverlay">

                <div id="examdiv">
                    <div class="addsdet animate-down">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <div id='dm1'>
                                    <h5 class="card-title" style="text-align: center;">Subject Name</h5>
                                    <div class="dropdown">
                                        <select class="btn btn-secondary dropdown-toggle" id="examsub" style="width: 100%;">
                                        </select>
                                    </div>
                                    <button type="button" style="width: 100%;" class="btn btn-primary" id='examver'>Start</button>
                                </div>

                                <br>

                            </div>

                        </div>

                    </div>


                </div>
            </div>



            <div id='mainexambody'>
                <h1>Exam body</h1>
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