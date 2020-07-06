<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "webassignment";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

    $name = $_POST['name'];  
    $email = $_POST['email'];
    $num = $_POST['number'];

      
        //to prevent from mysqli injection  
        $name = stripcslashes($name);  
        $email = stripcslashes($email); 
        $num = stripcslashes($num); 
        $name = mysqli_real_escape_string($con, $name);  
        $email = mysqli_real_escape_string($con, $email);  
        $num = mysqli_real_escape_string($con, $num);
      
        $sql = "SELECT  * from data where name = '$name' and email = '$email' and number = '$num'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
           header("Location:result.php");
        }  
        else{  
            echo "<h1> Login failed. Invalid Credintials!.</h1>";  
        }     
?>  