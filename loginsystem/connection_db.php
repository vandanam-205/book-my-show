<?php
$conn = mysqli_connect('localhost','root',' ','movie');

if($conn){
    //echo "connection successfull" . "</br>";
}
else{

    echo"sorry....something wrong";
}

if(mysqli_connect_error())
{

    echo ("failed to connect to mysql database".mysqli_connect_error());
}
?>