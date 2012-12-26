<?php
include("config.php");
	/*
	//get info passed from recaptcha
	require_once('recaptchalib.php');
	$privatekey = "6LdXLdgSAAAAAI-n5wVJRZ-xFxPnJE-7a8cBX8cW";
	$resp = recaptcha_check_answer ($privatekey,
        $_SERVER["REMOTE_ADDR"],
        $_POST["recaptcha_challenge_field"],
        $_POST["recaptcha_response_field"]);

	
	if(!$resp->is_valid) {  //happens if CAPTCHA was NOT entered correctly
	    header("location:index.php");
        }
        else { //CAPTCHA was correct!
	*/
		
		//get info from post

		$author = mysql_real_escape_string($_POST['name']);
		$comment_body = mysql_real_escape_string($_POST['comment_body']);
		$parent_id = mysql_real_escape_string($_POST['parent_id']);
		$assignment = mysql_real_escape_string($_POST['assignment']);
		
		//format string
		$author = htmlentities($author);
		$comment_body = htmlentities($comment_body);		
		$author = strip_tags($author);
		$comment_body = strip_tags($comment_body);	
		$author = utf8_decode($author);
		$comment_body = utf8_decode($comment_body);		   
   	
        	$query = "INSERT INTO threaded_comments (UserName, Comment, ParentNode, Assignment) VALUES ('$author', '$comment_body', '$parent_id', '$assignment')";
        	$result = mysql_query($query);
        	
        	if(mysql_affected_rows()==1) {  
        		if($_POST['assignment'] == null) {
        			return "success";
        			//header("location:projects.php");
        		}
        		else {
        			return "success";
        		 	//header("location:projects.php?assignment=" . $_POST['assignment']);  
        		}
		}  
		else {
			return "fail";
			echo "Comment cannot be posted. Please try again.";  
		}  
		
		
    	//}
?>