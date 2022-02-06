<?php
   $newfilename = "background";

   if(isset($_FILES['bkg'])){
      $errors= array();
      $file_name = $_FILES['bkg']['name'];
      $file_size =$_FILES['bkg']['size'];
      $file_tmp =$_FILES['bkg']['tmp_name'];
      $file_type=$_FILES['bkg']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['bkg']['name'])));

      $expensions= array("jpeg","jpg","png");
      if(file_exists($file_name)) {
    header("Location: admin.php?m=FILE ALREADY EXISTS");
        }
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 20971520){
         $errors[]='File size must be no more than 20 MB';
      }

if(empty($errors)==true){
        move_uploaded_file($file_tmp,"files/img/bkg/".$newfilename.".".$file_ext);
        echo "Success";
        echo "<script>window.close();</script>";

      }

      else{
         print_r($errors);
      }
   }
 ?>