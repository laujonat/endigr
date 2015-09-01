<?php
	session_start();
	require("connect.php");

	$topicErr="";

	if (isset($_POST["question"])) {
		$question = mysql_real_escape_string($_POST["question"]);
	}
	
	if (isset($_POST["topic"])) {
		$topic = $_POST["topic"];
	}

	$username = $_SESSION["username"];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valid = true;

		if (empty($topic) || empty($question)) {
			$topicErr = "Please select a topic and enter a question.";
			$valid = false;
		}

		if ($valid) {
			$result = mysql_query("INSERT INTO discussions (question, username, topic) 
				VALUES ('$question', '$username', '$topic')", $conn);
			if ($result) {
				echo "<script language='javascript'>window.location = 'userhome.php';</script>";
			}
			else {
				echo "<script language='javascript'>alert('Question could not be posted!');</script>";
			}
		}
	}

?>

<!doctype html>
<html>
<head>
	<title>endigr | Ask a Question</title>

	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script language="JavaScript" type="text/javascript" src="jquery.js"></script>

</head>

<body>
	<div id="container">
		<div id="header">
			<a href="userhome.php"></a>
		</div>
		<div id="question-box">
			<form name="ask" method="post" onsubmit="">
				<?php
					echo "<span style='font-weight: bold; text-transform: uppercase; position: absolute; top: 45%; left: 11%;'> " . $topicErr . "</span>";
				?>
				<br />
				<input id="ask-question" name="question" type="text" placeholder="start a discussion.." size="54" />
				<input style="position: absolute; top: 65%; left: 12%;" name="topic" type="radio" value="news">
					<span style="text-transform: uppercase; position: absolute; top: 65%; left: 14%;">News</span>

				<input style="position: absolute; top: 65%; left: 22%;" id="ask-question" name="topic" type="radio" value="media">
					<span style="text-transform: uppercase; position: absolute; top: 65%; left: 25%;">Media</span>

				<input style="position: absolute; top: 65%; left: 34%;" id="ask-question" name="topic" type="radio" value="lifestyle">
					<span style="text-transform: uppercase; position: absolute; top: 65%; left: 37%;">Lifestyle</span>

				<input type="submit" value="POST" style="position: absolute; top: 63%; left: 78%" class="submit-button" />
			</form>
		</div>
	</div>
</body>
</html>