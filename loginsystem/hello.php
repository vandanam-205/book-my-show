<?php
echo"this is my first php file";

$servername = "localhost";
$username = "root";
$password = "";
$database = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$sql="INSERT INTO user_details(user_id,user_name,password,e_mail,phone_no) VALUES(2,'naz',123,'naz123@gmail.com',132345554)";


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



?>