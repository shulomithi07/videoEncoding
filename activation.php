<?php

session_start();

include 'connection.php';

if(isset($_GET['token'])){

    $token = $_GET['token'];

    $updatequery = "UPDATE signup set status= 'active' WHERE token = '$token'";


    $dbquery = mysqli_query($con,$updatequery);

    if($dbquery){

        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] = "Your account is activated Please login!";
            header('location:login.php');
        }
        else{
            $_SESSION['msg'] = "You're logged out!";
            header('location:login.php');
        }
    }
    else{
        $_SESSION['msg'] = "Something happened please try again!";
        header('location:index.php');
    }
}

// echo "bla bla bla";

?>