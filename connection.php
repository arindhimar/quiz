<?php

$con=new mysqli("localhost","root","","certificate_project");

if($con)
{
    echo"Connection is Successfull";
}
else{
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

?>