<?php

session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "webassignment";

$conn = mysqli_connect("localhost", "root", "", "webassignment");

if(isset($_POST['submitbtn'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $message = $_POST['message'];   
    
    if (!empty($name) && (!empty($number)) && (!empty($email)) && (!empty($message))) {    
        
        $sql = "SELECT message FROM data WHERE message=?";
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt,$sql)){
            $_SESSION['status'] = "Failed";
            echo 'Failed';
            header("Location: Enquiries.html");
        }else{
            mysqli_stmt_bind_param($stmt, "s", $message);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if($resultCheck > 0){
                $_SESSION['status']= 'Sorry the Registration number is taken';
                echo 'you cannot send the same enquiry';
            }else{
                $sql ="INSERT INTO data(name, number, email, message) VALUES ('$name','$number','$email','$message')";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    $_SESSION['status']="Sorry failed to add";
                    header("Location: Enquiries.html");
            }else{
            mysqli_stmt_bind_param($stmt, "ssss", $name, $number, $email, $message);
            mysqli_stmt_execute($stmt);
            $_SESSION['success']="Submitted";
                echo 'enquiry submitted';
            header("Location: Enquiries.html");
            exit();
            }
        }
    }
    
    // if (isset($_POST['name']) && isset($_POST['number']) && isset($_POST['email']) && isset($_POST['message'])){
    //     $query="INSERT INTO data(name, number, email, message) VALUES ('$name','$number','$email','$message')";
    //     $query_run = mysqli_query($conn,$query);
    //     if($query_run == TRUE){
    //         exit();
    //     }
    // }
}
}
?>