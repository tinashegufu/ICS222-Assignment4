<?php

// php code to Update data from mysql database Table

if(isset($_POST['submitbtn']))
{
    
   $hostname = "localhost";
   $username = "root";
   $password = "";
   $databaseName = "webassignment";
   
   $conn = mysqli_connect($hostname, $username, $password, $databaseName);
   
   // get values form input text and number
   
   $id = $_POST['id'];
   $response = $_POST['response'];

           
   // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "Errror";
  }
  // mysql query to Update data
  $query = "UPDATE `data` SET `response`='".$response."' WHERE `id` = $id";
   
  $result = mysqli_query($conn, $query);
  
  if($result)
  {
      echo 'Data Updated';
  }else{
      echo 'Data Not Updated';
  }
  mysqli_close($conn);
  
}

?>