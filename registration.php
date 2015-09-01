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
	<title>endigr | Registration</title>
	<meta charset = "utf-8" />

	<style>
	html {
       		background-color: #ffffff;
       		text-transform: uppercase;
			/*opacity: 0.5;*/
       	}   	

		#ll {
			float: left;
			padding-bottom: 25px;
			padding-left: 30px;
			text-decoration: none;
			color: #006ea4;
			font-size: 12px;
		}

		#auth2:active {
			position:relative;
			top:1px;
		}

		#ll:hover {
			color: #CCDAE9;
		}

		#ss {
			padding-top: 120px;
			padding-left: 30px;
			font-size: 14px;
			line-height: 15px;
		}

		#uu {
			font-size: 10px;
			/*line-height: 1px;*/

		}

		#logintext {
			/*text-decoration: none;*/
			color: black;
			text-decoration: none;
		}

		#signuptext {
			font-weight: bold;
			color: black;
		}

		#logintext:hover {
			color: #CCDAE9;
		}

		#register_form {
			width: 800px;

		}
    </style>

</head>
<body>
	<div id="container">
		<div id="header"> 
			<a href="index.php"></a>
		</div> 

		<div class = "sign-up-wrap">
			<div id = "login-title" align="right">
				Register
			</div>
			<div class = "box">
				<form id = "register_form" name="sign_up_input" action = "#" method = "post" onsubmit = ""> 
					<!-- Username -->
					<br>
					<input type="text" id = "input-text" name="username" placeholder="USERNAME" size="40">
					<?php 
                		echo "<span style=\"color: black; font-size: 14px; text-transform: uppercase;\">" . $userErr . "</span>";
                	?>

	            	<!-- Password -->
	            	<br>
	                <input type= "password" id = "input-text" name= "password" placeholder="PASSWORD" value="" size="40">
	                <?php 
                		echo "<span style=\"color: black; font-size: 14px; text-transform: uppercase;\">" . $passErr . "</span>";
                	?>

	                <!-- Confirm Password -->
	                <br>
	                <input type= "password" id = "input-text" name= "confirm_password" placeholder="CONFIRM PASSWORD" value="" size="40">
	                <?php 
	            		echo "<span style=\"color: black; font-size: 14px; text-transform: uppercase;\">" . $confirmPassErr . "</span>";;
	            	?>

	             	<!-- Email -->
	             	<br>
	             	<input type="email" id = "input-text" name="email" placeholder="EMAIL" value="" size="40">
	             	<?php 
                		echo "<span style=\"color: black; font-size: 14px; text-transform: uppercase;\">" . $emailErr . "</span>";
                	?>

	             	<!-- Confirm Email -->
	             	<br>
	             	<input type= "email" id = "input-text" name="confirm_email" placeholder="CONFIRM EMAIL" value="" size="40">
					<?php 
                		echo "<span style=\"color: black; font-size: 14px; text-transform: uppercase;\">" . $confirmEmailErr . "</span>";
                	?>
	                <br>
	                <br>

	                <input type= "submit" style="margin-left: 5px;" id = "auth2" value = "Sign Up" onclick = "">
	            </form>
	        </div>
		</div>	
	</div>
	<!-- </div> -->
</body>
</html>