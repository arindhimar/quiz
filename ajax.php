<?php

include'connection.php';

$flag=$_POST['flag'];



if($flag==1)
{
    $id=$_POST['id'];
    $password=$_POST['password'];


    $sql1 = "SELECT * FROM admintb WHERE adminid='$id' and adminpass='$password'";
    

    $res=mysqli_query($con,$sql1);

    if(mysqli_num_rows( $res )>0)
    {
        echo"admin";
    }
    else{
        echo"Fail";
    }

}


?>