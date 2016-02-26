<?php

        $postID = $_POST['deleteBlogPost'];
		echo $postID;

   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('blog.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
   
   $sql =<<<EOF
      DELETE from BLOGPOSTS where ID=$postID;
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
     echo $db->lastErrorMsg();
   } else {
      echo $db->changes(), " Record deleted successfully\n";
   }

   echo "Operation done successfully\n";
   $db->close();
?>
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>Delete Post</title>
	
  </head>
  <body>
    	<div id="header">
		  <h1>Production Book and Portfolio</h1>
		</div>		
		<div id="topNav"></div>
		<div id="leftSideNav">Why does this not work?</div>
		<div id="content"><a href="index.php">Back Home</a></div>
		<div id="rightSideNav"></div>
		<div id="bottomNav"></div>
		<div id="footer"></div>
  </body>
</html>
