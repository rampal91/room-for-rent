<?php
$conn = new mysqli("localhost","root","","Room_for_rent");

// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  //exit();
}else{
    //echo "conn sus";
}
?>