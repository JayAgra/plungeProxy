<?php
session_start(); 
include "loginconnect.php";
    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: signup.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: signup.php?error=Password is required");

        exit();

    }else{

    $db->exec("INSERT INTO logins (id, user_name, password) VALUES (null, '$uname', '$pass')");
    
    header("Location: login.php");

    exit();
    }
