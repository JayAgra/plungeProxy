<?php 
session_start(); 

include "loginconnect.php";

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $opass = validate($_POST['oldpwd']);

    $pass = validate($_POST['newpwd']);

    if (empty($opass)) {

        header("Location: edit.php?error=Old Password is required");

        exit();

    }else if(empty($pass)){

        header("Location: edit.php?error=New Password is required");

        exit();
    }else if($opass === $pass){    
        header("Location: edit.php?error=New Password is the same as Old Password");

        exit();
    }else{
        $cuserid = $_SESSION['id'];
        $cuserusn = $_SESSION['user_name'];
        $sqlout = $db->querySingle("SELECT * FROM logins WHERE user_name='$cuserusn' AND id='$cuserid'", true);
        if ($sqlout['user_name'] === $cuserusn && $sqlout['id'] === $cuserid) {
            $updatingpwd = $db->exec("UPDATE logins SET password='$pass' WHERE id='$cuserid'");
        header("Location: pwchanged.php?success=Password updated! New password is '$pass'");
        }
    }