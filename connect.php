<?php
	// ESTABLISH CONNECTION
	$conn = mysql_connect('localhost', 'root', 'password') or die("Couldn't connect " . mysql_error());

	mysql_select_db('mysql') or die("Couldn't find database " . mysql_error());
?>