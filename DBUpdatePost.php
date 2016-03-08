<?php
	
	//include 'DBRead.php';
	
	include 'DAO.php';
	$db = openDatabase(); // open the database from the DAO.php
	
	//updateData($db, $rowID); <- put this in the body
	
	function updateData($db, $rowID){
		$sql =<<<EOF
		SELECT from BLOGPOSTS where rowID = $rowID;
EOF;
		$ret = $db->exec($sql); // executes the SQL query
		if(!$ret){
			echo $db->lastErrorMsg();
		} else {
			echo $db->changes(), " Record deleted successfully\n";
		}
		echo "Operation done successfully\n";
		
		
	}
	$db->close(); // close the database
	header("Location:index.php"); // where to go next  
	exit();

?>
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>Production Book and Notes</title>
    <link rel="styleSheet" type="text/css" href="/CascadingStyleSheets/styleSheetnew.css" />
  </head>
  <body>
		<div id="container">
		<div id="header"><h1>Production Book and Portfolio</h1></div>		
		<div id="topNav">top nav</div>
			<div id="content">	
				<div id="leftSideNav">left side nav</div>		
				<div id="postDiv"><?php	echo readDatabase();?>
				<!-- php update form here -->
				<form action="DBUpdate.php" id="blogPost" method="post">Title: 
				<input type="text" name="postTitle" id="blogPost" value="This Is The Title"/> 
				<input type="submit" name="submit" /></form>
				<textarea rows="4" cols="50" name="postBody" form="blogPost">Enter text here...</textarea></div>
				<div id="rightSideNav">right side nav</div>											
			</div>
		
		<div id="bottomNav">bottom nav</div>
		<div id="footer">footer</div>
		</div>
		<a href="/learningPHP/indexPHP.html">deprecated index</a>
	
  </body>
</html>
