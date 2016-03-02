<?php

	include 'databaseCRUD.php';
	//db = $db = openDatabase();
	//readDatabase($db); 

?>
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>Production Book and Notes</title>
    <link rel="styleSheet" type="text/css" href="/CascadingStyleSheets/styleSheet.css" />
  </head>
  <body>  
		<div id="header">
		  <h1>Production Book and Portfolio</h1>
		</div>
		
		<div id="topNav"></div>
		<div id="leftSideNav">Why does this not work?</div>
		<div id="content">
		<a href="/learningPHP/indexPHP.html">deprecated index</a>
		  <?php	echo readDatabase($db);?>
		  <form action="DBUpdate.php" id="blogPost" method="post">Title: 
		  <input type="text" name="postTitle" id="blogPost" value="This Is The Title"/> 
		  <input type="submit" name="submit" /></form>
		  <textarea rows="4" cols="50" name="postBody" form="blogPost">Enter text here...</textarea>
		</div>
		<div id="rightSideNav"></div>
		<div id="bottomNav"></div>
		<div id="footer"></div>
	
  </body>
</html>
