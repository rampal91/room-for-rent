<?php
include('db_connection.php');
$select="Select * from user_data";
$fetched_data=$conn->query($select);
//var_dump($fetched_data);
if ($fetched_data->num_rows > 0){
    // output data of each row
    while($row = $fetched_data->fetch_assoc()) {
      //echo $row["id"]. " " . $row["name"]. " " . $row["mob"]. " " . $row["email"]. " " . $row["title"] . $row["f_address"]. " " . $row["city"]. " " . $row["room_type"]. " " . $row["For_which"]. " " . $row["rent"]. " " . $row["photo"]. " " . $row["description"]."<br>";
    }
  } else {
    echo "0 results";
  }
?>