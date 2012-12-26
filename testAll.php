<?php

include("config.php");
include("wordcensor.php");
	//stuff
	
	require('config.php');
	testTrucateTable();
	testRegularInsert();
	testScriptInsert();
	testInjectionInsert();
	testChildComment();
	
	testFilterUserNameAndComment();
	
	function testTrucateTable() {
	
		mysql_query("TRUNCATE TABLE  `threaded_comments`");
		$result = mysql_query("SELECT * FROM threaded_comments");
		if(mysql_num_rows($result) == 0) {
			echo "Truncate Table...PASSED!" . "<br>";
		}
		else {
			echo "Truncate Table...FAILED!" . "<br>";
		}
	}
	
	function testRegularInsert() {
	
		mysql_query("INSERT INTO threaded_comments (UserName, Comment, ParentNode, Assignment) VALUES ('Nathan', 'is awesome', '0', 'DEFAULT')");
        	if(mysql_affected_rows()==1) {  
        		echo "Regular Insert...PASSED!" . "<br>";
        	}
        	else {
        		echo "Regular Insert...FAILED!" . "<br>";
        	}	
	}
	
	function testScriptInsert() {
	
		mysql_query("INSERT INTO threaded_comments (UserName, Comment, ParentNode, Assignment) VALUES ('EVILSCRIPT', '<script> alert(\"hi\") </script>', '0', 'DEFAULT')");
		$result = mysql_query("SELECT * FROM threaded_comments WHERE UserName = 'EVILSCRIPT'");
		while($row = mysql_fetch_array($result)) {
			if($row['Comment'] == "<script> alert(\"hi\") </script>") {
				echo "Script Insert...PASSED!" . "<br>";
			}
			else {
				echo "Script Insert...FAILED!" . "<br>";
			}
		}		
	}
	
	function testInjectionInsert() {
		mysql_query("INSERT INTO threaded_comments (UserName, Comment, ParentNode, Assignment) VALUES ('EVILINJECTION', 'a\';DROP TABLE theaded_comments;', '0', 'DEFAULT')");
		$result = mysql_query("SELECT * FROM threaded_comments");
		if(mysql_num_rows($result) != 0) {
			echo "Injection Insert...PASSED!" . "<br>";
		}
		else {
			echo "Injection Insert...FAILED!" . "<br>";
		}	
	}
	
	function testParentComment() {
		mysql_query("INSERT INTO threaded_comments (UserName, Comment, ParentNode, Assignment) VALUES ('Parent', 'Comment', '0', 'Assignment0')");
		$result = mysql_query("SELECT * FROM threaded_comments WHERE UserName = 'Parent'");
		while($row = mysql_fetch_array($result)) {
			$parent_id = $row['Index'];
			if($row['UserName'] == "Parent") {
				echo "Parent Comment...PASSED!" . "<br>";
			}
			else {
				echo "Parent Comment...FAILED!" . "<br>";
			}
			return $parent_id;						
		}
	
	}

	function testChildComment() {
		$parent_id = testParentComment();
		mysql_query("INSERT INTO threaded_comments (UserName, Comment, ParentNode, Assignment) VALUES ('Child', 'Comment','" .$parent_id . "', 'Assignment0')");
		$result = mysql_query("SELECT * FROM threaded_comments WHERE Assignment = 'Assignment0'");
		while($row = mysql_fetch_array($result)) {
			if($row['UserName'] == "Child") {
				echo "Child Comment...PASSED!" . "<br>";
				return;;
				
			}
		}
		echo "Child Comment...FAILED!" . "<br>";
	}
	
	function testFilterUserNameAndComment() {
		mysql_query("INSERT INTO threaded_comments (UserName, Comment, ParentNode, Assignment) VALUES ('Fuck', 'Damn', '0', 'DEFAULT')");
		$result = mysql_query("SELECT * FROM threaded_comments WHERE UserName = 'Fuck' AND Comment = 'Damn'");
		while($row = mysql_fetch_assoc($result)) {
			$testUserName = censorWords($row['UserName']);
			$testComment = censorWords($row['Comment']);
			if($testUserName == "flowers" && $testComment == "darn") {
				echo "Filter UserName And Comment...PASSED!" . "<br>";
				break;
			}
			else {
				echo "Filter UserName And Comment...FAILED!" . "<br>";
				break;
			}	
		}
	}



?>