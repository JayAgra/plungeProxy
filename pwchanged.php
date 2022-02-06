<?php 
if (isset ($_GET['success'])) {
$successmsg = $_GET['success'];
$successlnk = "1";
} else {
$successlnk = "0";
}?>
<!DOCTYPE html>
<html>

<head>
    <title>Password Changed!</title>
    <link rel="stylesheet" type="text/css" href="files/css/index.css">
    <meta http-equiv="refresh" content="5;url=login.php" />
</head>
<body></body>
<div class="main">
		<div class="form-title-row">
			<h1>Updated!</h1>
		</div>
<p id="output" class="info"></p>
	        <script>
        window.onload = function(){
            if ("<?php echo $successlnk ?>" === "1") {
            var errormessage = "<?php echo $successmsg ?>";
            document.getElementById('output').innerHTML = "<?php echo $successmsg ?>";
            } else {
            document.getElementById("output").style.visibility = "hidden";
            }
            };
        </script>
        </div>
        <div class="main">
		<div class="form-title-row">
			<h1>Redirecting to login..</h1>
		</div>
		<img src="files/img/loader.gif" width="75"/>
        </div>
    </body>
    </html>
<?php
session_start();

session_unset();

session_destroy();
?>