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

        header("Location: login.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: login.php?error=Password is required");

        exit();

    }else{

        //$sql = "SELECT * FROM logins WHERE user_name='$uname' AND password='$pass'";
        $_sqlout = $db->querySingle("SELECT * FROM logins WHERE user_name='$uname' AND password='$pass'", true);
        if (isset($_sqlout)) {
            $row = $_sqlout;

            if ($row['user_name'] === $uname && $row['password'] === $pass) {

                $_SESSION['user_name'] = $row['user_name'];

                $_SESSION['id'] = $row['id'];
                header("Location: index.php");

                exit();

            }else{

                header("Location: login.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: login.php?error=Incorect User name or password");

            exit();

        }

    }