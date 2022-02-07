<?php
if (isset ($_GET['error'])) {
$errormsg = $_GET['error'];
$errorlink = "1";
} else {
$errorlink = "0";
}
$hosturl = $_SERVER['SERVER_NAME'];
?>
<!DOCTYPE html>

<html>

<head>

    <title>Login To Proxy</title>

    <link rel="stylesheet" type="text/css" href="files/css/index.css">

</head>

<body>
     <form action="process.php" method="post">
		<div class="main">
		            <img src="files/img/logo.svg" width="100%"/>
		            <h2>Login</h2>
		            <h4>For <?php echo $hosturl ?></h4>
		            <br>
			<div class="form-title-row">
			</div>
			<div class="form-row">

        <label><br></label>
        
        <input type="text" name="uname" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br> 
			</div>
			<div class="form-row">
				<button class="button-submit" type="submit">Log In</button>
			<a class="button-cancel" href="#">Cancel</a>
			</div>
			 <p id="output" class="error"></p>
	        <script>
        window.onload = function(){
            if ("<?php echo $errorlink ?>" === "1") {
            var errormessage = "<?php echo $errormsg ?>";
            document.getElementById('output').innerHTML = "<?php echo $errormsg ?>";
            } else {
            document.getElementById("output").style.visibility = "hidden";
            }
            };
        </script>

</body>

</html>
