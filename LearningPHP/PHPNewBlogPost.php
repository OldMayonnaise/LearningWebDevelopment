<?php



?>
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
	<link rel="styleSheet" type="text/css" href="/CascadingStyleSheets/styleSheet.css" />
    <title>New Block Post</title>
  </head>
  <body>
    <div id="header"></div>
    <div id="topnav"></div>
    <div id="sideNav"></div>
    <div id="content">
      
	  <br>
	  
	  <form action="PHPInsertBlogPost.php" id="blogPost" method="post">	      
      Title:<input type="Text" name="postTitle" id="blogPost"/>
	  <input type="submit" name="submit" />	  
	  </form>
	  <textarea rows="4" cols="50" name="postBody" form="blogPost">Enter text here...</textarea>
	  
	  
    </div>
  </body>
</html>
