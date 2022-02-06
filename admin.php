<?php
    session_start();
    $isadmin = $_SESSION['id'];
    $hosturl = $_SERVER['SERVER_NAME'];
    if ($isadmin != "0"){
        header('Location: index.php', TRUE, 404);
    } else {
    include('creationconfig.php');
    if ($_USRCREATE = 1) {
        $cboxpos = 'on';
        } else if ($_USRCREATE = 0) {
        $cboxpos = 'off';
        }
?>
<!DOCTYPE html>
<html>

<head>

    <title>Login To Proxy</title>

    <link rel="stylesheet" type="text/css" href="files/css/index.css">
    

</head>

<body>
		<div class="main">
		            <img src="files/img/logo.svg" width="100%"/>
		            <h2>Admin Panel</h2>
		            <h4><?php echo $hosturl ?></h4>
			</div>
        	<div class="main">
		            <p class="errornm">Please remember to change the default admin password!</p>
			</div>
			<!--bkg img-->
        	<div class="main">
        	    <h2>Upload Background Image</h2>
                <form action="bkgup.php" method="post" enctype="multipart/form-data">
              <input class="button-cancel" type="file" name="bkg" id="bkg">
            <input class="button-submit" type="submit" value="Upload Image" name="submit">
                </form><br>
            <br>
            <form action="deletebkg.php" method="post">
            <input class="button-danger" type="submit" value="Delete Image" name="submit">
                </form>
			</div>
			<div  class="main">
			    <h3>Allow users to create accounts</h3><br>
			    <form action="" method="post">
			    <label class="switch">
                    <input type="checkbox" name="usrcreate" value="<?php echo $cboxpos ?>">
                    <span class="slider"></span>
                </label>
                <div class="formactionrow">                <button class="button-submit" type="submit">Submit</button></div>
                </form>
                <?php 
                if (isset($_POST['usrcreate'])) {
                    $cfgfle = fopen("creationconfig.php", "w") or die("Unable to open file!");
                    $addvar = '<?php $_USRCREATE = 1;?>';
                    fwrite($cfgfle, $addvar);
                    fclose($cfgfle);
                } else {
                    $cfgfle = fopen("creationconfig.php", "w") or die("Unable to open file!");
                    $addvar = '<?php $_USRCREATE = 0;?>';
                    fwrite($cfgfle, $addvar);
                    fclose($cfgfle);
                }
                ?>
			</div>
</body>

</html>
<?php
}?>
