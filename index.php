<?php
	require("connect.php");

	if (isset($_POST["username"])) {
		$username = $_POST["username"];
	}
	
	if (isset($_POST["password"])) {
		$password = $_POST["password"];
	}

	if (isset($_POST["confirm_password"])) {
		$confirm_password = $_POST["confirm_password"];
	}

	if (isset($_POST["email"])) {
		$email = $_POST["email"];
	}

	if (isset($_POST["confirm_email"])) {
		$confirm_email = $_POST["confirm_email"];
	}

	$userErr = "";
	$passErr = "";
	$confirmPassErr = "";
	$emailErr = "";
	$confirmEmailErr = "";

	$valid = true;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($username)) {
			// echo "USERNAME IS REQUIRED";
			$userErr = "Username is required";
			$valid = false;
			// echo $userErr;
		}
		else {
			if (preg_match('/\W/', $username)) {
				$userErr = "Only digits, letters, or _";
				$valid = false;
			}
		}

		if (empty($password)) {
			$passErr = "Password is required";
			$valid = false;
			// echo $passErr;
		}

		if (empty($confirm_password)) {
			$confirmPassErr = "Must confirm password";
			$valid = false;
			// echo $confirmPassErr;
		}

		if (strcmp($password, $confirm_password) != 0) {
			$passErr = "Passwords must match";
			$confirmPassErr = "Passwords must match";
			$valid = false;
		}

		if (empty($email)) {
			$emailErr = "Email is required";
			$valid = false;
			// echo $emailErr;
		}

		if (empty($confirm_email)) {
			$confirmEmailErr = "Must confirm email";
			$valid = false;
			// echo $confirmEmailErr;
		}

		if (strcmp($email, $confirm_email) != 0) {
			$emailErr = "Emails must match";
			$confirmEmailErr = "Emails must match";
			$valid = false;
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$valid = false;
		}

		if ($valid) {
			// Check if username exists
			$check = mysql_query("SELECT * FROM users WHERE username = '$username'", $conn);
			
			if (mysql_num_rows($check)) {
				echo "<script language='javascript'>window.location = 'fail-register.php';</script>"; 
			}
			else {
				// Insert into database if username does not already exist
				$result = mysql_query("INSERT INTO users (username, password, email)
					VALUES ('$username', '$password', '$email')", $conn);
			
				if ($result) {
					echo "<script language='javascript'>window.location = 'successful-register.php';</script>";     
				}
			}

			mysql_close($conn);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8" />
	<link rel = "stylesheet" href = "stylesheet.css" />
	<title>endigr | Welcome</title>
</head>
<body>

	<div id="container">
		<div id = "header"> 
			<a href="index.php"></a>
		</div> 

		<div style="position: absolute; top: 7%; left: 69%">
			<a class="index-button" href="login.php" style="color: white;">LOGIN</a>
			<a class="index-button" href="registration.php" style="color: white;">REGISTER</a>
		</div>

		<div id="index-container">
			<div class = "center_description">
				<p style="font-size: 36px; text-transform: uppercase; text-align: right;">Welcome to a new way to display and discuss ideas.</p>
				<p align="right" style="color: #cccccc; font-family: helvetica">Connect and share with people all around the world. 
					<br>
					It's about time we got our point across a modern way. 
					<br>
					<br>
				</p>
			</div>

			<br style="clear: both;" />

			<div class = "sign_up_form">
				<div id="text">
					<strong>Join endigr and map out what matters to you.</strong>
				</div>

				<div>
					<form name="sign_up_input" action="" method="post" onsubmit="">
		                <input type="text" id = "register" name="username" placeholder="USERNAME">
		                	<?php 
		                		echo "<span style=\"color: black; font-size: 12px; text-transform: uppercase;\">" . $userErr . "</span>";
		                	?>
		                <br>
		                <input type="password" id = "register" name="password" placeholder="PASSWORD">
		                	<?php 
		                		echo "<span style=\"color: black; font-size: 12px; text-transform: uppercase;\">" . $passErr . "</span>";
		                	?>
		                <br>
		                <input type="password" id = "register" name="confirm_password" placeholder="CONFIRM PASSWORD">
		                	<?php 
		                		echo "<span style=\"color: black; font-size: 12px; text-transform: uppercase;\">" . $confirmPassErr . "</span>";;
		                	?>
		                <br>
		                <input type="email" id = "register" name="email" placeholder="EMAIL">
		                	<?php 
		                		echo "<span style=\"color: black; font-size: 12px; text-transform: uppercase;\">" . $emailErr . "</span>";
		                	?>
		                <br>
		                <input type="email" id = "register" name="confirm_email" placeholder="CONFIRM EMAIL">
		                	<?php 
		                		echo "<span style=\"color: black; font-size: 12px; text-transform: uppercase;\">" . $confirmEmailErr . "</span>";
		                	?>
		                <br><br>
		                <input style="margin-left: 13px;" type= "submit" id = "auth2" value = "Sign Up" onclick = "">
		            </form>
		        </div>
			</div>
		</div>	
	</div>		

		
	</div>
</body>
</html>

