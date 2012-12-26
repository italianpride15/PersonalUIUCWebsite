<?php
include 'Parser.php';
include("config.php");
include("functions.php");

$assignmentList = parse();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script type='text/javascript' src='jquery-1.8.2.js'></script>
    <script type='text/javascript' src='jquery.pack.js'></script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>CS 242</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
    <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
     <link href="syntaxhighlighter_3.0.83/styles/shThemeDefault.css" rel="stylesheet" type="text/css" />
    <link href="syntaxhighlighter_3.0.83/styles/shCore.css" rel="stylesheet" type="text/css" />
    <script src="syntaxhighlighter_3.0.83/scripts/shCore.js" type="text/javascript"></script>
    <script type="text/javascript" src="syntaxhighlighter_3.0.83/scripts/shBrushJScript.js"></script>
    <script type="text/javascript" src="syntaxhighlighter_3.0.83/scripts/shBrushJava.js"></script>
    <script type="text/javascript" src="syntaxhighlighter_3.0.83/scripts/shBrushPython.js"></script>
</head>
<body>
<div id="header">
    <div id="menu">
        <ul>
            <li><a href="index.php">Homepage</a></li>		<!-- modified 20-22 -->
            <li class="current_page_item"><a href="">Projects</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
    </div>
    <!-- end #menu -->
    <div id="logo">
        <h1><a href="projects.php">projects</a></h1>	<!-- modified -->
    </div>
    <hr />
</div>
<!-- end #header -->
<!-- end #header-wrapper -->
<!-- end #logo -->

<div id="page">
    <div id="page-bgtop">
        <div id="page-bgbtm">
            <div id="content">
		<?php		
			//print out required information about selected project (e.g. name, date, version, message, files, etc)
			 if($_GET) { //if receiving a get request
			 
			 	$name = $_GET['assignment'];
			 	$assignment = $assignmentList[$name];
			 	echo $assignment->getName() . ":" . "<br>" . "<br>";
			 	echo "- Date: " . $assignment->getDate() . "<br>";
			 	echo "- Version: " . $assignment->getRevision() . "<br>";
			 	echo "- Message: " . $assignment->getMessage() . "<br>";
			 	$files = $assignment->getdirFileData();
			 	foreach($files as $file) {
			 		echo "Name: " . $file->getName() . "<br>";
			 		echo "Version: " . $file->getRevision() . "  Size: " . $file->getSize() . "  Path: " . $file->getPath() . "<br>";
			 		$prev = $file->getPrevVersions();
			 		if($prev != null) {
			 			foreach($prev as $version) {
			 				echo "Version : " . $version->getRevision() . "  Author: " . $version->getAuthor() . "  Message: " . $version->getMsg() . "  Date: " . 
			 				$version->getDate() . "<br>";
			 			}
			 		}			 		
			 	}		 	
			 }		
		?>		
            </div>  
                </div>
            <!-- end #content -->        
            <div id="sidebar">
                <ul>
                    <li>
                        <h1>Projects: </h1>
                            <ul>
                                <form action="" method="GET">	<!-- displays dropdown menu to select assignment -->
                                <br><h2>Select an Assignment:</h2>
                                    <select name="assignment">
                                    <option value="Assignment0">assignment0</option>
                                    <option value="Assignment1.0">assignment1.0</option>
                                    <option value="Assignment1.1">assignment1.1</option>
                                    <option value="Assignment1.2">assignment1.2</option>
                                    <option value="Assignment1.3">assignment1.3</option>
                                    <option value="Assignment2.0">assignment2.0</option>
                                    <option value="Assignment2.1">assignment2.1</option></select>:<br />
                                    <br><input type="submit"/><br><br>
                                    <p> Please select an assignment from the dropdown menu to view all the information about it. Take your time viewing each project and comment in the comment box to let 
                                    me know your thoughts! </p>
                                </form>
                            </ul> 
                            <ul>                          	
                                <br><h2>Select a File:</h2>
                                	<select name="selectedFile" id="selectedFile"> <!-- displays dropdown menu to select a specific file -->
                                	<?php
                                		//populate dropdown menus
                                		if($_GET) { //if receiving a get request
			 
			 				$name = $_GET['assignment'];
			 				$assignment = $assignmentList[$name];
			 				$files = $assignment->getdirFileData();
			 				foreach($files as $file) {
			                                   echo "<option value=\"" . $file->getName() . "\">" . $file->getName() . "</option>";
			 				}
			 				echo "</select>:<br />";
			 			}
                                	?>
                                	<br />
    					<label for="svn_user">Username:</label>   <!-- securely get svn login cred  -->
              				<input type="text" name="svn_user" id='svn_user'/>
               				<br />
                			<br />
    					<label for="password">Password:</label>
                			<input type="password" name="password" id='password'/>
               				
                                	<br><br><button id="button">Enter</button><br><br>               
                            </ul>             
      		    </li>	     		  	
		<script type='text/javascript'> 
			//this script loads svn files asynchronously  
                        $("#button").click(function() {
                           	$("#content").load("getfiles.php",
                           	{
                           	file:$("#selectedFile").val(),
                           	svn_user:$("#svn_user").val(),
                           	password:$("#password").val()
                           	},
                           	function(data, status) { 
                           		
                           		 SyntaxHighlighter.highlight();
                           	   });
                   	 });
    		</script>
		<script type='text/javascript'>
		$(function(){
			/* The following code is executed once the DOM is loaded */
	
			/* This flag will prevent multiple comment submits: */
			var working = false;
	
			/* Listening for the submit event of the form: */
			$("#comment_form").submit(function(e){

 				e.preventDefault();
				if(working) return false;
		
				working = true;
				$("#submit").val("Working..");
				$('span.error').remove();
		
				/* Sending the form fileds to post_comment.php: */
				$.post('post_comment.php',
					$(this).serialize(),
					function(data, status){
						working = false;
						$("#submit").val("Add Comment");	
      						if(status == "success") {
	      						$("#wrapper").load('loopcomments.php', {assignment:$("#assignment").val()});	
	      						$("#name").val("");
	      						$("#comment_body").val("");
	      					        $("#parent_id").val("0");
	      					}				
					});
			});
		});
		</script>

		<style type='text/css'>
		html, body, div, h1, h2, h3, h4, h5, h6, ul, ol, dl, li, dt, dd, p, blockquote,
		pre, form, fieldset, table, th, td { margin: 0; padding: 0; }
		
		body {
		font-size: 14px;
		line-height:1.3em;
		}
		
		a, a:visited {
		outline:none;
		color:#7d5f1e;
		}
		
		.clear {
		clear:both;
		}
		
		#wrapper {
			width: 320px;
			margin:0px;
			padding:0px 0px;
		}
		
		.comment {
			padding:1px;
			border:2px solid #000000;
			margin-top:10px;
			list-style:none;
		}
		
		.aut {
			font-weight:normal;
		}
		
		.timestamp {
			font-size:85%;
			float:right;
		}
		
		#comment_form {
			margin-top:15px;
		}
		
		#comment_form input {
			font-size:1.2em;
			margin:0 0 10px;
			padding:3px;
			display:block;
			width:100%;
		}
		
		#comment_body {
			display:block;
			width:100%;
			height:150px;
		}
		
		#submit_button {
			text-align:center; 
			clear:both;
		}
		</style>
		<div id='wrapper'>
		</div>			
		<form id="comment_form" action="" method='post'>   <!-- displays comment form with Googles CAPTCHA antispam -->
			<label for="name">Name:</label>
			<input type="text" name="name" id='name'/>
			<label for="comment_body">Comment:</label>
			<textarea name="comment_body" id='comment_body'></textarea>
			<input type='hidden' name='parent_id' id='parent_id' value='0'/>
			<input type='hidden' name='assignment' id='assignment' value='<?php echo $name; ?>'>
			<div id='submit_button'>
				<input type="submit" id="submit" value="Add comment"/>
			
			<?php
				//display CAPTCHA
		            	require_once('recaptchalib.php');
		                $publickey = "6LdXLdgSAAAAAG_CZiiFJubYvsQUid_tSh1mwLXw";
		                echo recaptcha_get_html($publickey, null, true);
		        ?>
		</form>
		</div>
		</body>
		</html>
                </ul>
            </div>         
            <!-- end #sidebar -->
            <div style="clear: both;">&nbsp;</div>
      </div>
        <!-- end #page -->
    </div>
</div>
<div id="footer-bgcontent">
<script type='text/javascript'>
//script reloads comments if page is refreshed
$("#wrapper").load("loopcomments.php", {assignment:$("#assignment").val()});
</script>
    <!-- end #footer -->
</div>
</body>
</html>