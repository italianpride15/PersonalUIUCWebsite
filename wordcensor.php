<?php
	function censorWords($text) {
	
		//select badwords database to censor
        	mysql_select_db("npanta2_badwords");
        	$myQuery = "SELECT `Bad`, `Replace` FROM `word_list`"; //is it even required to prepare this?
        	$result = mysql_query($myQuery);
        	//loop through and if badword is found, replace it with an acceptable word
		while ($row = mysql_fetch_array($result))
		{
			$text = str_ireplace($row['Bad'], $row['Replace'], $text);			
		}
		return $text;
	} 
?>