<?php
if (isset($_POST['action']) && $_POST['action'] == "submit") {
    $userAgent = $_POST['userAgent'];
    $cusr = $_SESSION['user_name'];
    header('Location: index.php');
    if ($userAgent != null) {
        setcookie("userAgent", $userAgent, time() + (86400 * 365));
        $_COOKIE["userAgent"] = $userAgent;
    }
}
?>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>More Settings</title>
	<link rel="stylesheet" href="./files/css/index.css"/>
	<style>
	    a {
color: white;
text-decoration: none;
}
	</style>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	<div class="main">
		<div class="form-title-row">
			<h1>Edit User Agent</h1>
		</div>
		<div class="form-row">
			<label>
				<span>Select a User Agent:</span>
				<input type="text" list="user-agents" id="userAgent" name="userAgent" placeholder="Select One..." autocomplete="off"/>
 				<datalist id="user-agents">
                    <option value="Select One.." selected disabled hidden></option>
					<option label="Use browser" id="userAgentBlank"></option>
					<option label="Default" id="userAgentBlank"></option>
					<option value="Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/601.3.9 (KHTML, like Gecko) Version/9.0.2 Safari/601.3.9" label="macOS based computer running Safari"/>
					<option value="Mozilla/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0 Mobile/15E148 Safari/604.1" label="iPhone XR running Safari"/>
					<option value="Mozilla/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/69.0.3497.105 Mobile/15E148 Safari/605.1" label="iPhone XS running Chrome"/>
					<option value="-" label="None"/>
				</datalist>
			</label>
		</div>
		<div class="form-row">
		    <script>
		        var agent = navigator.userAgent;
		        document.getElementById("userAgentBlank").innerHTML = agent;
		    </script>
			<button class="button-submit" type="submit" name="action" value="submit">Submit</button>
			<button class="button-danger" type="reset" name="action" value="reset">Reset</button>
			<a class="button-cancel" href="/">Back</a>
		</div>
	</div>
</form>
<form action="process.php" method="post">
		<div class="main">
		<div class="form-title-row">
			<h1>Change Account Password</h1>
		</div>
			<div class="form-row">

        <label><br></label>
        <input type="text" value="<?= $cusr ?>" readonly><br>
        <input type="password" name="oldpwd" placeholder="Old Password"><br>
        <input type="password" name="newpwd" placeholder="New Password"><br>
			</div>
			<div class="form-row">
			<button class="button-submit" type="submit">Change</button>
			<button class="button-cancel" type="reset" name="action" value="reset">Reset</button>
			</div>
</form>
</body>
</html>
