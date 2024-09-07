<?php
session_start();
$con=mysqli_connect("localhost","root","","movie");
if(mysqli_connect_errno()){
    echo"error";
}
else{
    echo"";
}


?>