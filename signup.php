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

    <title>Create plungeProxy account</title>

    <link rel="stylesheet" type="text/css" href="files/css/index.css">
    <style>
        		p.invalid {
			padding: 5px 6.6px;
			line-height: 1.5;
			background-color: #ff7272;
			font-size: 13px;
			text-align: center;
			margin-top: 10px;
			color: #ffffff;
			border-radius: 1px;
			border-bottom: 0.6px solid #fd3333;
			border-right: 0.6px solid #c1294c;
			text-align: left;
		}
        		p.opt {
			padding: 5px 6.6px;
			line-height: 1.5;
			background-color: #ffc072;
			font-size: 13px;
			text-align: center;
			margin-top: 10px;
			color: #ffffff;
			border-radius: 1px;
			border-bottom: 0.6px solid #ffa673;
			border-right: 0.6px solid #cc855c;
			text-align: left;
		}
        		p.optone {
			padding: 5px 6.6px;
			line-height: 1.5;
			background-color: #ffc072;
			font-size: 13px;
			text-align: center;
			margin-top: 10px;
			margin-bottom: 10px;
			color: #ffffff;
			border-radius: 1px;
			border-bottom: 0.6px solid #ffa673;
			border-right: 0.6px solid #cc855c;
			text-align: left;
		}
		p.valid {
			padding: 5px 6.6px;
			line-height: 1.5;
			background-color: #56dcb1;
			font-size: 13px;
			text-align: center;
			margin-top: 10px;
			color: #ffffff;
			border-radius: 1px;
			border-bottom: 0.6px solid #76dc75;
			border-right: 0.6px solid #30cc2e;
			text-align: left;
		}
    </style>
</head>

<body>
     <form action="supprocess.php" method="post">
		<div class="main">
		            <img src="files/img/logo.svg" width="100%"/>
		            <h2>Create plungeProxy account</h2>
		            <h4>For <?php echo $hosturl ?> only</h4>
		            <br>
			<div class="form-title-row">
			</div>
			<div class="form-row">

        <label><br></label>
        
        <input type="text" name="uname" placeholder="Username"id="usn" pattern="[A-Za-z0-9]+"><br>
            <p id="length111" class="invalid">Minimum <b>4 characters</b></p>
            <p id="length1111" class="optone">Maximum <b>16 characters</b></p>
        <input type="password" name="password" id="psw" placeholder="Password "autocomplete="new-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" maxlength="30"><br> 
			</div>
				<div id="message">
            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
            <p id="number" class="invalid">A <b>number</b></p>
            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            <p id="length1" class="opt">Recommended <b>16 characters</b></p>
            <p id="length11" class="opt">Maximum <b>32 characters</b></p>
        </div>
			<div class="form-row">
				<button class="button-submit" type="submit">Create</button>
			<a class="button-cancel" href="login.php">Back</a>
			</div>
        <script>
var myInput = document.getElementById("psw");
var usn = document.getElementById("usn");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

myInput.onkeyup = function() {
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }


  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
  if(myInput.value.length >= 16) {
    length1.classList.remove("opt");
    length1.classList.add("valid");
  } else {
    length1.classList.remove("valid");
    length1.classList.add("opt");
  }
  if(myInput.value.length <= 32) {
    length11.classList.remove("opt");
    length11.classList.add("valid");
  } else {
    length11.classList.remove("valid");
    length11.classList.add("opt");
  }
  if(usn.value.length >= 4) {
    length11.classList.remove("invalid");
    length11.classList.add("valid");
  } else {
    length11.classList.remove("valid");
    length11.classList.add("invalid");
  }
  if(usn.value.length <= 16) {
    length11.classList.remove("optone");
    length11.classList.add("valid");
  } else {
    length11.classList.remove("valid");
    length11.classList.add("optone");
  }
}
</script>

</body>

</html>