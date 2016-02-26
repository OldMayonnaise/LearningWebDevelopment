<?php



        $postTitle = $_POST['postTitle'];
        $postBody = $_POST['postBody'];
                
                date_default_timezone_set('UTC');               
                $dateUpdated = date('l F jS Y');
                $dateCreated = date('l F jS Y');
                
                $author = 'author';
                $category = 'category';
                $tags = 'tags tags tags';
                

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
   
   // use php datetime to store dates
        // use an author string as a temp user
        // use temp strings as tags
        // use temp string as category
        
   
   $sql =<<<EOF
      CREATE TABLE BLOGPOSTS
      (ID           INT         PRIMARY KEY,     
      postTitle         TEXT            NOT NULL,
          postBody      VARCHAR         NOT NULL,
          postDateCreated       TEXT    NOT NULL, 
          postDateUpdated       TEXT    NOT NULL,
          postCategory          TEXT    NOT NULL,
          postAuthor            TEXT    NOT NULL);      
EOF;

        $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
          echo '<br>';
   }  
   
   // I need to have all values before I get here
   
   $sql =<<<EOF
      INSERT INTO BLOGPOSTS (postTitle,postBody,postDateCreated,postDateUpdated,postCategory,postAuthor)
      VALUES ('$postTitle', '$postBody', '$dateCreated', '$dateUpdated', '$category', '$author');     
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
          
          // to make this work I should add the posts to a collection then reverse it
    
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
    
        echo "ID = ". $row['ID'] . "\n";
          
    echo "postTitle = ". $row['postTitle'] ."\n";       
                $postContents = "<h2>" . $row['postTitle'] . "</h2>";
                  
        echo "postDateCreated = ". $row['postDateUpdated'] ."\n";
                $postContents = $postContents . "<h3>" . $row['postDateUpdated'] . "</h3>";
          
    echo "postBody = ". $row['postBody'] ."\n";    
                $postContents = $postContents . '<p>'. $row['postBody'] . "</p> "; 

	 
          
        $pageContents = $pageContents . $postContents;
   }
   echo "Operation done successfully\n";
   
   $db->close();

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
		  <?php echo $pageContents;?>
		  <form action="index.php" id="blogPost" method="post">Title: 
		  <input type="text" name="postTitle" id="blogPost" /> 
		  <input type="submit" name="submit" /></form>
		  <textarea rows="4" cols="50" name="postBody" form="blogPost">Enter text here...</textarea>
		</div>
		<div id="rightSideNav"></div>
		<div id="bottomNav"></div>
		<div id="footer"></div>
	
  </body>
</html>
