<?php

	$hostname = "engr-cpanel-mysql.engr.illinois.edu";
	$db_username = "npanta2_nathan";
	$db_password = "DELLDELL";

	$connect = mysql_connect($hostname, $db_username, $db_password) or die("Cannot connect to the database");
	mysql_select_db("npanta2_comments", $connect) or die("Cannot select the database");

?>