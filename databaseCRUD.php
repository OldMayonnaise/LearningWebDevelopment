<?php
/*
* consider creating data access objects for different type of data ie posts data, category data DAO
* creates or opens database 
*/

class BLOGPOST
{
	public $postId;
	public $postTitle;
	public $postBody;
	public $postAuthor;
	public $postDateCreated;
	public $postDateUpdated;
	public $postCategory;
	public $postTags;
}

function openDatabase(){
	
	class MyDB extends SQLite3 // creates the database object that extends sqlite3
   {
      function __construct() // this is actually a constructor
      {
         $this->open('blog.db'); 	// chooses the database to make the database object - this might be a parameter
      }
   }
   
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
          echo '<br>';
   }
}

/*
* creates table within the database function
*/
function createTable(){
	
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

function readDatabase(){
	
	$sql =<<<EOF
		SELECT rowid, * from BLOGPOSTS;
EOF;
    
	// to make this work I should add the posts to a collection then reverse it
	
	$ret = $db->query($sql); // what is the datatype ret?
	
	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ // I believe this means while there is another row in the array
		
		$blogPost = new BLOGPOST();
		$blogPost -> postId = $row['rowID'];
		$blogPost -> postTitle = $row['postTitle'];
		$blogPost -> postBody =$row['postBody'];
		$blogPost -> postAuthor = $row['postAuthor'];
		$blogPost -> postDateCreated = $row['postDateCreated'];
		$blogPost -> postDateUpdated = $row['postDateUpdated'];
		$blogPost -> postCategory = $row['postCategory'];
		$blogPost -> postTags = $row['postTags'];
		
		echo "ID = ". $row['rowID'] . "\n";
		echo "postTitle = ".$row['postTitle'] ."\n";  
		echo "postBody = ".$row['postBody'] ."\n";  
		echo "postAuthor = ".$row['postAuthor'] ."\n";  
		echo "postDateCreated = ".$row['postDateUpdated'] ."\n"; 
		echo  "postDateUpdated = ".$row['postDateUpdated']."\n";
		echo  "postCategory = ".$row['postCategory']."\n";
		echo  "postTags = ".$row['postTags']."\n";
              
   }
   
   echo "Operation done successfully\n";
   
   $db->close();
   
}

function updateDatabase(){
	
}

function deleteData(){
	
}

?>