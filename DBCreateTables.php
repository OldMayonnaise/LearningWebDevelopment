<?php

include 'DAO.php';
$db = openDatabase(); // this opens the database from the DAO.php

function createBlogpostsTable($db){
	
	   $sql =<<<EOF
      CREATE TABLE BLOGPOSTS
		(postID           	INT          PRIMARY KEY,     
		postTitle         	TEXT    	 NOT NULL,
        postBody      		VARCHAR	     NOT NULL,
		postAuthor          TEXT  		 NOT NULL,
        postDateCreated     TEXT  		 NOT NULL, 
        postDateUpdated     TEXT  		 NOT NULL,
        postCategory        TEXT  		 NOT NULL,
        postTags         	TEXT  		 NOT NULL);      
EOF;

        $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
          echo '<br>';
   }  
	
}

function createCategoryTable($db){
	
	   $sql =<<<EOF
      CREATE TABLE BLOGPOSTS
		(categoryID           	INT          PRIMARY KEY,
		categoryName         	TEXT    	 NOT NULL);      
EOF;

        $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
          echo '<br>';
   }  
	
}

?>