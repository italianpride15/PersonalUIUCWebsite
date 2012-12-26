<?php
include("wordcensor.php");
			
function getComments($row) {
	
	//display comment info
	echo "<li class='comment'>";
	$row['UserName'] = censorWords($row['UserName']);
	echo "<div class='aut'>".$row['UserName'];
	//censor comment before displaying it
	$row['Comment'] = censorWords($row['Comment']);
	echo "<div class='comment-body'>".$row['Comment']."</div>";
	echo "<div class='timestamp'>".$row['Date']."</div>";
	echo "<a href='#comment_form' class='reply' id='".$row['Index']."'>Reply</a>";
	
	if($row['PRIMARY'] == 0) { echoReply(); }
	
	//select comments and loop through them	
	mysql_select_db("npanta2_comments");
		
	$query = "SELECT * FROM threaded_comments WHERE ParentNode=".$row['Index'];
	$result = mysql_query($query) or die("<br/><br/>".mysql_error());
	if(mysql_num_rows($result)>0)
	{
		echo "<ul>";
		while($row = mysql_fetch_assoc($result)) {
			getComments($row);
		}
		echo "</ul>";
	}
	echo "</li>";

}

function echoReply() {

echo  "<script type='text/javascript'>
			$(function(){
				$(\"a.reply\").click(function() {
					var id = $(this).attr(\"id\");
					$(\"#parent_id\").attr(\"value\", id);
					$(\"#name\").focus();
				});
			});
			</script>";
			}
?>