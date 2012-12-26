	<?php
	include("functions.php");
	
			echo "<ul>";
			//wrapper function for displaying comments
			require('config.php');
		        $myQuery = "SELECT * FROM threaded_comments WHERE ParentNode = 0 AND Assignment ='" . $_POST['assignment'] . "'";
		        $result = mysql_query($myQuery);
			while($row = mysql_fetch_assoc($result)) {
				getComments($row);
			}
			echo "</ul>";

?>