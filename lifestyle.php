<?php
	session_start();
	require("connect.php");
?>

<!doctype html>
<html>
<head>
	<title>endigr | #lifestyle</title>

	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script language="JavaScript" type="text/javascript" src="jquery.js"></script>

</head>

<body>
	<div id="container">
		<div id="header">
			<a href="userhome.php"></a>
		</div>
		<div class="ask">
			<a class="ask-button" href="ask-question.php" style="color: white;">ask a question</a>
		</div>
		<div id="navigation" align="right">
		    <div id="news-fade">
		    	<a href="news.php"></a>
		    </div>

		    <div id="lifestyle-at">
		    	<a href="lifestyle.php"></a>
		    </div>

		    <div id="media-fade">
		    	<a href="media.php"></a>
		    </div>
	    </div>
	    <div id="questions">
	    	<?php 	    	
	    		$result = mysql_query("SELECT * FROM discussions WHERE topic='lifestyle'", $conn);

	    		while($quest=mysql_fetch_assoc($result)) {
					echo "<div id='link'>
							<a href='map.php?questionID=". $quest['questionID'] . "'> " . $quest['question'] . "</a>
						</div>";
				}
	    	?>
	    </div>
	</div>
</body>
</html>