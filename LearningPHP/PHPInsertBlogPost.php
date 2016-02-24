<?php

        $postTitle = $_POST['postTitle'];
        $postBody = $_POST['postBody'];

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
	  echo '<br>';
   }
   
   $sql =<<<EOF
      CREATE TABLE BLOGPOSTS
      (ID			INT		PRIMARY KEY,
      postTitle 	TEXT 	NOT NULL,
      postBody		TEXT    NOT NULL);      
EOF;

	$ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
	  echo '<br>';
   }
  
   
   $sql =<<<EOF
      INSERT INTO BLOGPOSTS (postTitle,postBody)
      VALUES ('$postTitle', '$postBody');     
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
	  echo '<br>';
   }
   
    $sql =<<<EOF
      SELECT * from BLOGPOSTS;
EOF;

	$pageContents;		
	
      $ret = $db->query($sql);	  
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      echo "ID = ". $row['ID'] . "\n";
	  
      echo "postTitle = ". $row['postTitle'] ."\n";	  
	  $postContents = "<h3>" . $row['postTitle'] . "</h3>";
	  
      echo "postBody = ". $row['postBody'] ."\n";    
	  $postContents = $postContents . "<p>" . $row['postBody'] . "</p>";	  
	  
	  $pageContents = $pageContents . $postContents;
   }
   echo "Operation done successfully\n";
   
   $db->close();
?>


<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title></title>
	   <link rel="styleSheet" type="text/css" href="/CascadingStyleSheets/styleSheet.css" />

  </head>
  <body>
  <div id="header"></div>
    <div id="topnav"></div>
    <div id="sideNav"></div>
    <div id="content"><?php echo $pageContents;?></div>
    <br />
    <br />
    <a href="http://www.tutorialspoint.com/sqlite/sqlite_php.htm">http://www.tutorialspoint.com/sqlite/sqlite_php.htm</a>
  </body>
</html>
