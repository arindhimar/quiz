<?php

include 'connection.php';
require('fpdf.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$flag = $_POST['flag'];

function sendcerti($marks, $attemp,$qcount,$name,$email)
{
    $image = imagecreatefromjpeg("final.jpg"); //Image Pointer  
    $color = imagecolorallocate($image, 19, 21, 22);

    $subject = "For a php Quiz Test";

    $sign = "Arin Dhimar";

    $marks = "Has scored ".$marks."/".$qcount." in ".$attemp." attempts";
    $tdate = date('d-m-Y');

    imagettftext($image, 23, 0, 390, 320, $color, "def.ttf", $subject);
    imagettftext($image, 40, 0, 460, 500, $color, "namefont.ttf", $name);
    imagettftext($image, 23, 0, 325, 537, $color, "def.ttf", $marks);
    imagettftext($image, 23, 0, 680, 680, $color, "def.ttf", $tdate);
    imagettftext($image, 23, 13, 200, 693, $color, "namefont.ttf", $sign); //used to give text in image para(imagepomter , font size , font angle,x axis , y axis,colr,font,text)
    imagejpeg($image, "temp.jpg"); //show directly or save




    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->Image("temp.jpg", 0, 25, 210, 150);
    $pdf->Output("test.pdf", "F"); //F- Force Save




    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $email = new PHPMailer();
    $email->SetFrom('youremail@example.com', 'Your Name'); //Name is optional
    $email->Subject   = 'Certificate!!';
    $email->Body      = 'Here is the certificate for the recent exam given : ';
    $email->AddAddress($email);

    $file_to_attach = 'test.pdf';

    $email->AddAttachment( $file_to_attach , "".random_int(1111111, 9999999).".pdf" );
    $email->Send();
    $mail->send();
}



if ($flag == 1) {
    $id = $_POST['id'];
    $password = $_POST['password'];


    $sql1 = "SELECT * FROM usertb WHERE uid='$id' and upass='$password'";


    $res = mysqli_query($con, $sql1);

    if (mysqli_num_rows($res) > 0) {
        $temp = mysqli_fetch_assoc($res);
        if ($temp["utype"] == 'admin') {
            echo "adminsuc.php";
        } else {
            echo "studsuc.php?id=" . $temp["uid"];
        }
    } else {
        echo "Invalid Credentails!!";
    }
} else if ($flag == 2) {
    $sname = $_POST['name'];
    $semail = $_POST['email'];
    $spassword = $_POST['password'];
    $sstate = $_POST['state'];
    $sdistrict = $_POST['district'];
    $scity = $_POST['city'];
    $szip = $_POST['zip'];



    $sql = "INSERT INTO `usertb`(`uname`, `uemail`, `upass`, `ustate`, `udistrict`, `ucity`, `uzip`,`utype`) VALUES ('$sname','$semail','$spassword','$sstate','$sdistrict','$scity',$szip,'user')";

    $res = mysqli_query($con, $sql);

    if (!$res) {
        echo $res;
    } else {
        echo "Done";
    }
} else if ($flag == 3) {
    $sql = 'select * from usertb where utype="user"';

    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {

            $disp = '<div class="card" style="width: 18rem;">
                         <img src="defcard.jpg" class="card-img-top" alt="Image Not Found!!">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Name : ' . $row["uname"] . '  </li>
                                <li class="list-group-item">Email : ' . $row["uemail"] . '</li>
                                <li class="list-group-item">Password : ' . $row["upass"] . '</li>
                                <li class="list-group-item">State : ' . $row["ustate"] . '</li>
                                <li class="list-group-item">District : ' . $row["udistrict"] . '</li>
                                <li class="list-group-item">City : ' . $row["ucity"] . '</li>
                                <li class="list-group-item">Zip Code : ' . $row["uzip"] . '</li>
                            </ul>
                        </div>
                    </div>';
            echo $disp;
        }
    }
} else if ($flag == 4) {
    $sql = 'select * from subjecttb';

    $res = mysqli_query($con, $sql);

    echo '<option selected disabled value="">Choose...</option>';

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {

            $disp = '<option value=' . $row["subid"] . '>' . $row["subname"] . '</option>';
            echo $disp;
        }
    }
} else if ($flag == 5) {

    $txtquestion = $_POST['question'];
    $optiona = $_POST['opta'];
    $optionb = $_POST['optb'];
    $optionc = $_POST['optc'];
    $optiond = $_POST['optd'];
    $correcect = $_POST['correct'];
    $subid = $_POST['subid'];


    $sql = "INSERT INTO `questiontb` (`txtquestion`, `optiona`, `optionb`, `optionc`, `optiond`, `correcect`, `subid`) VALUES ('$txtquestion','$optiona','$optionb','$optionc','$optiond','$correcect',$subid)";

    echo $sql;

    $res = mysqli_query($con, $sql);

    if (!$res) {
        echo $res;
    } else {
        echo "Done";
    }
} else if ($flag == 6) {

    $id = $_POST["id"];
    $sql = "SELECT `uid`, `uname`, `uemail`, `upass`, `ustate`, `udistrict`, `ucity`, `uzip`, `utype` FROM `usertb` WHERE uid=$id";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $disp = '
            <div class="card" >
                <img src="defcard.jpg" width="200px" height="400px" class="card-img-top" alt="Image Not Found!!">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name : ' . $row["uname"] . '  </li>
                        <li class="list-group-item">Email : ' . $row["uemail"] . '</li>
                        <li class="list-group-item">Password : ' . $row["upass"] . '</li>
                        <li class="list-group-item">State : ' . $row["ustate"] . '</li>
                        <li class="list-group-item">District : ' . $row["udistrict"] . '</li>
                        <li class="list-group-item">City : ' . $row["ucity"] . '</li>
                        <li class="list-group-item">Zip Code : ' . $row["uzip"] . '</li>
                    </ul>
                </div>

                <button type="button" class="btn btn-primary" onclick="updtacc('.$id.')"">Update</button>

            </div>';

            echo $disp;
        }
    }
} else if ($flag == 7) {
    $sname = $_POST['sname'];
    $sql = 'INSERT INTO `subjecttb`(`subname`) VALUES ("' . $sname . '")';

    //echo $sql;

    $res = mysqli_query($con, $sql);

    if (!$res) {
        echo $res;
    } else {
        echo "Subject Added!!";
    }
} else if ($flag == 8) {
    $sname = $_POST['sname'];

    $sql = "SELECT `qid`,`txtquestion`, `optiona`, `optionb`, `optionc`, `optiond` FROM `questiontb` WHERE subid=$sname";

    //echo $sql;

    $res = mysqli_query($con, $sql);

    $count = 0;

    echo '
    <div class="card">
        <div class="card-body">';


    while ($temp = mysqli_fetch_assoc($res)) {

        $count += 1;



        echo '
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <p>Reseved For Image!!</p>
                </div>
                <div class="col-md-8">
                    <div class="card-body" id="' . $temp["qid"] . '">
                        <h4 name="examq" class="card-title">= Question ' . $count . ' =<br>' . $temp["txtquestion"] . '</h5>
                        
                        <input class="form-check-input" type="radio" name=' . $temp["qid"] . ' id="opta" value=' . $temp["optiona"] . ' checked>
                        <p class="card-text">' . $temp["optiona"] . '</p>
        
                        <input class="form-check-input" type="radio" name=' . $temp["qid"] . ' id="optb" value=' . $temp["optionb"] . '>
                        <p class="card-text">' . $temp["optionb"] . '</p>
        
                        <input class="form-check-input" type="radio" name=' . $temp["qid"] . ' id="optc" value=' . $temp["optionc"] . '>
                        <p class="card-text">' . $temp["optionc"] . '</p>
        
                        <input class="form-check-input" type="radio" name=' . $temp["qid"] . ' id="optd" value=' . $temp["optiond"] . '>
                        <p class="card-text">' . $temp["optiond"] . '</p> 
                    </div>
                </div>
            </div>
        </div>';
    }


    echo '</div>
    </div><br>';


    echo '
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <div class="spinner-border" role="status" id="submst">
        </div>
        <button class="btn btn-primary" id="fbtn" type="button">Submit</button>
    </div>';
} elseif ($flag == 9) {

    $sname = $_POST['sname'];

    $sql = 'SELECT * FROM `questiontb` WHERE subid=' . $sname . '';

    $res = mysqli_query($con, $sql);

    if (!$res) {
        echo $res;
    } else {

        $arr = array();
        while ($temp = mysqli_fetch_assoc($res)) {

            echo $temp['qid'];
            echo ",";
        }
    }
} elseif ($flag == 10) {
    $subid = $_POST['subid'];
    $uid = $_POST['sid'];
    $sql = 'SELECT `qid`,`correcect` FROM `questiontb` WHERE subid=' . $subid . '';

    $res = mysqli_query($con, $sql);
    $marks = 0;
    $attemp = 0;
    $qcount=1;
    while ($temp = mysqli_fetch_assoc($res)) {
        //getting the user answer
        $uans = $_POST[$temp["qid"]];
        $qcount+=1;
        if ($uans == $temp["correcect"]) {
            $marks += 1;
            //echo $temp["qid"];
        }
    }
    //echo $marks;


    $sql = "select * from resulttb where uid=$uid and subid=$subid";

    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        $temp = mysqli_fetch_assoc($res);
        $attemp = $temp['attempt'];
        $attemp += 1;
        $sql = "UPDATE `resulttb` SET `marks`=$marks,`attempt`='$attemp' WHERE `uid`=$uid and `subid`=$subid";
    } else {
        $sql = "INSERT INTO `resulttb`(`marks`, `uid`, `subid`,`attempt`) VALUES ($marks,$uid,$subid,1)";
    }

    $res = mysqli_query($con, $sql);

    $sql="select uname,uemail from usertb where uid=".$uid."";

    $res=mysqli_query($con,$sql);

    $temp=mysqli_fetch_assoc($res);
    


    if (!$res) {
        echo $res;
    } else {

        sendcerti($marks, $attemp,$qcount,$temp["uname"],$temp["uemail"]);

        echo "Done";
    }




    //echo $sql;

} elseif ($flag == 11) {
    $uid = $_POST["usid"];

    $sql = "select * from resulttb where uid=$uid";

    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        echo '<div class="row row-cols-1 row-cols-md-3 g-4">';

        while ($temp = mysqli_fetch_assoc($res)) {

            $sql1 = 'select * from subjecttb where subid=' . $temp["subid"] . '';

            $res1 = mysqli_query($con, $sql1);

            $sname = mysqli_fetch_assoc($res1);



            echo '<div class="col">
                    <div class="card">
                        <div class="card-header"><h3 align ="center">Subject : ' . $sname["subname"] . '</h3></div>
                        <div class="card-body">
                            <b><p class="card-text" align="center">Marks : ' . $temp["marks"] . '</p></b>
                        </div>
                        <div class="card-footer">
                        <div class="card-footer bg-transparent border-success" align="center"><h6 >Total Attempts : ' . $temp["attempt"] . '</h6></div>
                        </div>
                    </div>
                </div>';
        }
        echo '</div>';
    }
} elseif ($flag == 12) {
    $subid = $_POST['subid'];
    $order = $_POST['order'];
    $sql = 'select * from resulttb where subid=' . $subid . ' order by marks ' . $order . '';


    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        echo '<div class="row row-cols-1 row-cols-md-3 g-4">';

        while ($temp = mysqli_fetch_assoc($res)) {

            $sql1 = 'select * from subjecttb where subid=' . $temp["subid"] . '';

            $res1 = mysqli_query($con, $sql1);

            $sname = mysqli_fetch_assoc($res1);



            echo '<div class="col">
                    <div class="card">
                        <div class="card-header"><h4 align ="center">User ID : ' . $temp["uid"] . '</h4></div>
                        <div class="card-body">
                            <b><p class="card-text" align="center">Result Id : ' . $temp["rsid"] . '</p></b>
                            <b><p class="card-text" align="center">Marks : ' . $temp["marks"] . '</p></b>
                        </div>
                        <div class="card-footer">
                        <div class="card-footer bg-transparent border-success" align="center"><h6 >Total Attempts : ' . $temp["attempt"] . '</h6></div>
                        </div>
                    </div>
                </div>';
        }
        echo '</div>';
    } else {
        echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
        echo '<div class="col">
                    <div class="card">
                        <div class="card-body">
                            <b><h3 class="card-text" align="center">No Results Found</h3></b>
                        </div>
                    </div>
                </div>';

        echo '</div>';
    }
} else if ($flag == 13) {
    $sql = 'select * from usertb where utype="user" and uid = ' . $_POST['uid'] . '';

    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {

            $disp = '<div class="card" style="width: 18rem;">
                         <img src="defcard.jpg" class="card-img-top" alt="Image Not Found!!">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Name : ' . $row["uname"] . '  </li>
                                <li class="list-group-item">Email : ' . $row["uemail"] . '</li>
                                <li class="list-group-item">Password : ' . $row["upass"] . '</li>
                                <li class="list-group-item">State : ' . $row["ustate"] . '</li>
                                <li class="list-group-item">District : ' . $row["udistrict"] . '</li>
                                <li class="list-group-item">City : ' . $row["ucity"] . '</li>
                                <li class="list-group-item">Zip Code : ' . $row["uzip"] . '</li>
                            </ul>
                        </div>
                    </div>';
            echo $disp;
        }
    }
} elseif ($flag == 14) {
    $subid = $_POST['subid'];
    $order = $_POST['order'];

    $sql = 'select * from resulttb where subid=' . $subid . ' and uid=' . $_POST['uid'] . ' order by marks ' . $order . ' ';


    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        echo '<div class="row row-cols-1 row-cols-md-3 g-4">';

        while ($temp = mysqli_fetch_assoc($res)) {

            $sql1 = 'select * from subjecttb where subid=' . $temp["subid"] . '';

            $res1 = mysqli_query($con, $sql1);

            $sname = mysqli_fetch_assoc($res1);



            echo '<div class="col">
                    <div class="card">
                        <div class="card-header"><h4 align ="center">User ID : ' . $temp["uid"] . '</h4></div>
                        <div class="card-body">
                            <b><p class="card-text" align="center">Result Id : ' . $temp["rsid"] . '</p></b>
                            <b><p class="card-text" align="center">Marks : ' . $temp["marks"] . '</p></b>
                        </div>
                        <div class="card-footer">
                        <div class="card-footer bg-transparent border-success" align="center"><h6 >Total Attempts : ' . $temp["attempt"] . '</h6></div>
                        </div>
                    </div>
                </div>';
        }
        echo '</div>';
    } else {
        echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
        echo '<div class="col">
                    <div class="card">
                        <div class="card-body">
                            <b><h3 class="card-text" align="center">No Results Found</h3></b>
                        </div>
                    </div>
                </div>';

        echo '</div>';
    }
} elseif ($flag == 15) {
    $email = $_POST['email'];

    $sql = 'select uemail,uid from usertb where uemail="' . $email . '"';



    //echo $sql;


    $res = mysqli_query($con, $sql);

    $temp = mysqli_fetch_assoc($res);



    if (mysqli_num_rows($res) > 0) {
        // $new_psw=substr(str_shuffle("1234567890"), 0,8);
        $subject = "Account Update Requested";

        $mail_content = 'Account Update Link : http://localhost/certificate%20generator/update.php?uid=' . $temp["uid"] . '';                                                                  //Message
        // $subject = "Update Account Details";                                //Subject
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers = "From: youramil@example.com" . "\r\n";                    // mail From								
        $to_email = $email;
        mail($to_email, $subject, $mail_content, $headers);                    // mailfxn
        if (mail($to_email, $subject, $mail_content, $headers)) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
} else if ($flag == 16 || $flag == 17) {

    if ($flag == 16) {
        $sql = 'select uid,uname,uemail  from usertb where utype="user"';
    } else {
        $sql = 'select uid,uname,uemail  from usertb where utype="user" and uname like "' . $_POST['uname'] . '%"';
    }
    //echo $sql;
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {

            $disp = '<div class="card-body text-secondary" >
                        <div class="d-flex flex-row">
                        <div class=" p-2 flex-fill">' . $row["uid"] . '</div>
                        <div class="p-2 flex-fill">' . $row["uname"] . '</div>
                        <div class="p-2 flex-fill">' . $row["uemail"] . '</div>
                        <div class="p-2 flex-fill"><button type="button" class="btn btn-primary" id=updt' . $row["uid"] . ' onclick="updtacc(' . $row["uid"] . ')">Update</button></div>
                        <div class="p-2 flex-fill"><button type="button" class="btn btn-danger" id=del' . $row["uid"] . ' onclick="delacc(' . $row["uid"] . ')">Delete</button></div>
                    </div>
                    <hr>
                    </div>';
            echo $disp;
        }
    } else {
        echo "No Information";
    }
} else if ($flag == 18) {
    $uid = $_POST['uid'];
    $uname = $_POST['name'];
    $uemail = $_POST['email'];
    // $spassword = $_POST['password'];
    $ustate = $_POST['state'];
    $udistrict = $_POST['district'];
    $ucity = $_POST['city'];
    $uzip = $_POST['zip'];



    $sql = "UPDATE `usertb` SET `uname`='$uname',`uemail`='$uemail',`ustate`='$ustate',`udistrict`='$udistrict',`ucity`='$ucity',`uzip`='$uzip' WHERE uid=$uid";
    echo $sql;
    $res = mysqli_query($con, $sql);

    if (!$res) {
        echo $res;
    } else {
        echo "Done";
    }
}
elseif($flag==19){
    $uid=$_POST['uid'];

    $sql='delete from usertb where uid='.$uid.'';

    $res=mysqli_query($con,$sql);

    if(!$res){
        echo $res;
    }
    else{
        echo "done";
    }

}
