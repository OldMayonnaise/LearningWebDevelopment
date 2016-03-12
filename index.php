<?php
	
	include 'DBRead.php';
	readBlogPostsArray();

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
				<div id="postDiv"><?php	echo readBlogPostsArray();?>
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
		<a href="/learningPHP/indexPHP.html">deprecated index</a><br>
		<a href="/indexHome.php">new index</a>
	
  </body>
</html>
