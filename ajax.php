<?php

include 'connection.php';

$flag = $_POST['flag'];



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

                <button type="button" class="btn btn-primary">Update</button>

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

    $count=0;

    echo '
    <div class="card">
        <div class="card-body">';


    while ($temp = mysqli_fetch_assoc($res)) {

        $count+=1;



        echo '
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <p>Reseved For Image!!</p>
                </div>
                <div class="col-md-8">
                    <div class="card-body" id="'.$temp["qid"].'">
                        <h4 name="examq" class="card-title">= Question '.$count.' =<br>' . $temp["txtquestion"] . '</h5>
                        
                        <input class="form-check-input" type="radio" name='.$temp["qid"].' id="opta" value='.$temp["optiona"].' checked>
                        <p class="card-text">' . $temp["optiona"] . '</p>
        
                        <input class="form-check-input" type="radio" name='.$temp["qid"].' id="optb" value='.$temp["optionb"].'>
                        <p class="card-text">' . $temp["optionb"] . '</p>
        
                        <input class="form-check-input" type="radio" name='.$temp["qid"].' id="optc" value='.$temp["optionc"].'>
                        <p class="card-text">' . $temp["optionc"] . '</p>
        
                        <input class="form-check-input" type="radio" name='.$temp["qid"].' id="optd" value='.$temp["optiond"].'>
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
        
        <button class="btn btn-primary" id="fbtn" type="button">Submit</button>
    </div>';
}
elseif($flag==9){

    $sname = $_POST['sname'];

    $sql='SELECT * FROM `questiontb` WHERE subid='.$sname.'';

    $res=mysqli_query($con,$sql);

    if(!$res){
        echo $res;
    }
    else{

        $arr=array();
        while($temp=mysqli_fetch_assoc($res)){

            echo $temp['qid'];
            echo ",";

        }
    }

}
elseif ($flag==10){
    $subid = $_POST['subid'];
    $uid = $_POST['sid'];
    $sql='SELECT `qid`,`correcect` FROM `questiontb` WHERE subid='.$subid.'';

    $res=mysqli_query($con,$sql);
    $marks=0;
    while($temp=mysqli_fetch_assoc($res)){
        //getting the user answer
        $uans=$_POST[$temp["qid"]];

        if($uans==$temp["correcect"]){
            $marks+=1;
            //echo $temp["qid"];
        }   
    }
    //echo $marks;


    $sql="select * from resulttb where uid=$uid and subid=$subid";

    $res=mysqli_query($con,$sql);

    if(mysqli_num_rows($res)>0){
        $temp=mysqli_fetch_assoc($res);
        $attemp=$temp['attempt'];
        $attemp+=1;
        $sql="UPDATE `resulttb` SET `marks`=$marks,`attempt`='$attemp' WHERE `uid`=$uid and `subid`=$subid";
    }
    else{
        $sql="INSERT INTO `resulttb`(`marks`, `uid`, `subid`,`attempt`) VALUES ($marks,$uid,$subid,1)";    
    }


    

    //echo $sql;
    $res=mysqli_query($con,$sql);

    if(!$res){
        echo $res;
    }
    else{
        echo"Done";
    }



}
elseif($flag==11){
    $uid=$_POST["usid"];

    $sql="select * from resulttb where uid=$uid";

    $res=mysqli_query($con,$sql);

    if(mysqli_num_rows($res)>0){
        echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
        
        while($temp=mysqli_fetch_assoc($res)){

            $sql1='select * from subjecttb where subid='.$temp["subid"].'';

            $res1=mysqli_query($con,$sql1);

            $sname=mysqli_fetch_assoc($res1);


            
            echo '<div class="col">
                    <div class="card">
                        <div class="card-header"><h3 align ="center">Subject : '.$sname["subname"].'</h3></div>
                        <div class="card-body">
                            <b><p class="card-text" align="center">Marks : '.$temp["marks"].'</p></b>
                        </div>
                        <div class="card-footer">
                        <div class="card-footer bg-transparent border-success" align="center"><h6 >Total Attempts : '.$temp["attempt"].'</h6></div>
                        </div>
                    </div>
                </div>';
        }
        echo '</div>';

    }


}
