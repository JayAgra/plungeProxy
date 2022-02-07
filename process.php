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
?>
<?php
session_start(); 
include_once('creationconfig.php');
$allowedcre = $_USRCREATE;
if ($allowedcre = 0){
        header('Location: index.php', TRUE, 403);
} else {
include "loginconnect.php";
    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['nauname']);

    $pass = validate($_POST['napassword']);

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
}?>
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
?>
