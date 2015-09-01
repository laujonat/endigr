<?php
	session_start();
	require("connect.php");
?>

<!doctype html>
<html>
<head>
	<title>endigr | Home Page</title>

	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script language="JavaScript" type="text/javascript" src="jquery.js"></script>

</head>

<body>
	<div id="container">
		<div id="header">
			<a href="userhome.php"></a>
		</div>
		<div class="logout">
			<a class="logout-button" href="logout.php" style="color: white;">log out</a>
		</div>
		<div id="navigation" align="right">
		    <div id="news">
		    	<a href="news.php"></a>
		    </div>

		    <div id="lifestyle">
		    	<a href="lifestyle.php"></a>
		    </div>

		    <div id="media">
		    	<a href="media.php"></a>
		    </div>
	    </div>
	    <div id="questions">
	    	<?php 	    	
	    		$result = mysql_query("SELECT * FROM discussions", $conn);
	    		
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