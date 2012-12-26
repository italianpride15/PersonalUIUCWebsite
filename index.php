<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 3.0 License

Name       : Corporate Stuff
Description: A two-column, fixed-width design for 1024x768 screen resolutions.
Version    : 1.0
Released   : 20120513

-->
<?php
include 'Parser.php';

$assignmentList = parse();
?>
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Nathan Pantaleo Website</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
    <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="header">
    <div id="menu">
        <ul>
            <li class="current_page_item"><a href="">Homepage</a></li>
            <li><a href="projects.php">Projects</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
    </div>
    <!-- end #menu -->
    <div id="logo">
        <h1><a href="">nathan pantaleo</a></h1>
        <h2>programming studio</h2>
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

                foreach($assignmentList as $child){
                    if($child->getName() == "Assignment0") {
                        echo "<div class=\"post\">";
                        echo "<h2 class=\"title\"><a href=projects.php?assignment=Assignment0>" . $child->getName() . "</a></h2>";
                        echo "<div class=\"entry\"> <p>" . "This assignment was just a presentation of 400 or more lines of code that we've done in the past to get us comfortable with presenting and also looking at our coding style." ."</p> </div>";
                        echo "</div>";
                    }

                    if($child->getName() == "Assignment1.0") {
                        echo "<div class=\"post\">";
                        echo "<h2 class=\"title\"><a href=projects.php?assignment=Assignment1.0>" . $child->getName() . "</a></h2>";
                        echo "<div class=\"entry\"> <p>" . "This assignment was in Java and dealt with Maze solving." . "</p> </div>";
                        echo "</div>";
                    }
                    
                    if($child->getName() == "Assignment1.1") {
                        echo "<div class=\"post\">";
                        echo "<h2 class=\"title\"><a href=projects.php?assignment=Assignment1.1>" . $child->getName() . "</a></h2>";
                        echo "<div class=\"entry\"> <p>" . "This assignment was in Java and dealt with Maze solving." . "</p> </div>";
                        echo "</div>";
                    }
                    
                    if($child->getName() == "Assignment1.2") {
                        echo "<div class=\"post\">";
                        echo "<h2 class=\"title\"><a href=projects.php?assignment=Assignment1.2>" . $child->getName() . "</a></h2>";
                        echo "<div class=\"entry\"> <p>" . "This assignment was in Java and dealt with Maze solving." . "</p> </div>";
                        echo "</div>";
                    }
                    
                    if($child->getName() == "Assignment1.3") {
                        echo "<div class=\"post\">";
                        echo "<h2 class=\"title\"><a href=projects.php?assignment=Assignment1.3>" . $child->getName() . "</a></h2>";
                        echo "<div class=\"entry\"> <p>" . "This assignment was in Java and dealt with Maze solving." . "</p> </div>";
                        echo "</div>";
                    }
                    
                    if($child->getName() == "Assignment2.0") {
                        echo "<div class=\"post\">";
                        echo "<h2 class=\"title\"><a href=projects.php?assignment=Assignment2.0>" . $child->getName() . "</a></h2>";
                        echo "<div class=\"entry\"> <p>" . "This assignment was in Java and dealt with Maze solving." . "</p> </div>";
                        echo "</div>";
                    }
                    
                    if($child->getName() == "Assignment2.1") {
                        echo "<div class=\"post\">";
                        echo "<h2 class=\"title\"><a href=projects.php?assignment=Assignment2.1>" . $child->getName() . "</a></h2>";
                        echo "<div class=\"entry\"> <p>" . "This assignment was in Java and dealt with Maze solving." . "</p> </div>";
                        echo "</div>";
                    }

                }
            ?>
            </div>
            <!-- end #content -->
            <div id="sidebar">
                <ul>
                    <li>
                        <h1>This Site:</h1><br>
                        <p>This website is a personal website from Nathan Pantaleo. It displays a list of the current projects I have worked on in CS 242 at the University of Illinois. To
                        navigate this site, please click one of the tabs at the top of the page or for quick access to a specific project, click the project name. If you have any questions
                        please email me at npanta2@illinois.edu.</p>
                    </li>
                </ul>
            </div>
            <!-- end #sidebar -->
            <div style="clear: both;">&nbsp;</div>
        </div>
        <!-- end #page -->
    </div>
</div>
<div id="footer-bgcontent">
    <div id="footer">
        <p>&copy; web.engr.illinois.edu/~npanta2/ All rights reserved. Design by <a href="http://www.freecsstemplates.org">FCT</a>. Photos by <a href="http://fotogrph.com/">Fotogrph</a>.</p>
    </div>
    <!-- end #footer -->
</div>
</body>
</html>