<?php

        include 'databaseCRUD.php';
        //$db = openDatabase();
        //readDatabase($db); 

?>
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>Production Book and Notes</title>
    <link rel="styleSheet" type="text/css" href="/CascadingStyleSheets/3rdTry.css" />
  </head>
  <body>
    <div id="header">
      <h1>Production Book and Portfolio</h1>
    </div>
    <div id="topNav">This is the topNav</div>
    <div id="content">
      <div id="leftSideNav">This is leftSideNav</div>
      <div id="post">
        <?php echo readDatabase($db);?>
        <form action="DBUpdate.php" id="blogPost" method="post">Title: 
        <input type="text" name="postTitle" id="blogPost" value="This Is The Title" /> 
        <input type="submit" name="submit" /></form>
        <textarea rows="4" cols="50" name="postBody" form="blogPost">Enter text here...</textarea>
      </div>
      <div id="rightSideNav">this is rightSideNav</div>
	  <div id="bottomNav">this is bottomNav</div>
    </div>
    
    <div id="footer">This is the footer</div>
    <a href="/learningPHP/indexPHP.html">deprecated index</a>
  </body>
</html>
