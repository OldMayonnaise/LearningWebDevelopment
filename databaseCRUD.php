<?php
/*
* consider creating data access objects for different type of data ie posts data, category data DAO
* creates or opens database - this file itself is the data access object
*/
	//$postDelete = $_POST['postDelete'];

	$postTitle = $_POST['postTitle'];
    $postBody = $_POST['postBody'];                
    date_default_timezone_set('UTC');              
	$dateUpdated = date('l F jS Y');
	$dateCreated = date('l F jS Y');
	$author = 'author';
	$category = 'category';
	$tags = 'tags tags tags';
	
	$db = openDatabase();

	//createTable($db);
	//updateDatabase($db, $postTitle, $postBody, $dateUpdated, $dateCreated, $author, $category, $category, $tags);
	readDatabase($db);	

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
   
   return $db;
}

/*
* creates table within the database function
*/
function createTable($db){
	
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

function readDatabase($db){
	
	$sql =<<<EOF
		SELECT rowid, * from BLOGPOSTS;
EOF;
    
	// to make this work I should add the posts to a collection then reverse it
	$blogPosts = array();
	
	$ret = $db->query($sql); // what is the datatype ret?
	
	$viewContent = "";
	
	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ // I believe this means while there is another row in the array
		
		// start html formatting the following lines
	$viewFormat =
		'<div id="post"><h2>'.$row['postTitle'].'</h2>
		<h3>'.$row['postCategory'].'</h3>		
		<p>'.$row['postBody'].'</p>
		<h4>'.$row['postAuthor'].'</h4>		
		<h4>'.$row['postDateUpdated'].'</h4>		
		<h4>'.$row['postTags'].'</h4>		
		<form action="DBDelete.php" method="post">
		<button name="rowID" type="submit" value="'.$row['rowid'].'">delete</button>
		</form>		
		ID = '.$row['rowid'].'</div><br><br>';		
		
		//echo $viewFormat;
		
		$viewContent = $viewContent . $viewFormat;
		
		/*
		echo '<h2>'.$row['postTitle'].'</h2>'; 
		echo  "<h3>".$row['postCategory']."</h3>";		
		echo "<p>".$row['postBody'] ."</p>";  
		echo "<h4>".$row['postAuthor'] ."</h4>"; 		
		echo  "<h4>".$row['postDateUpdated']."</h4>";		
		echo  "<h4>".$row['postTags']."</h4>";
		
		echo '<form action="DBDelete.php" method="post">
			<button name="rowID" type="submit" value='.$row['rowid'].'>delete</button>
			</form>';
		
		echo "ID = ". $row['rowid'] . "<br>";
		*/
		//echo "postDateCreated = ".$row['postDateUpdated'] ."<br>"; 
		
		/*
		// start html formatting the following lines
		echo "ID = ". $row['rowid'] . "<br>";
		echo "postTitle = ".$row['postTitle'] ."<br>";  
		echo "postBody = ".$row['postBody'] ."<br>";  
		echo "postAuthor = ".$row['postAuthor'] ."<br>";  
		echo "postDateCreated = ".$row['postDateUpdated'] ."<br>"; 
		echo  "postDateUpdated = ".$row['postDateUpdated']."<br>";
		echo  "postCategory = ".$row['postCategory']."<br>";
		echo  "postTags = ".$row['postTags']."<br>";
		*/
		$blogPosts[$row['rowid']] = $ret; // this adds the post array to the blogposts array with the post as the pk	
		  
   }
   return $viewContent;
   //return $blogPosts;
   
   echo "Operation done successfully\n";
   
   $db->close();
   
}

function updateDatabase($db, $postTitle, $postBody, $dateUpdated, $dateCreated, $author, $category, $category, $tags){
	
	 $sql =<<<EOF
      INSERT INTO BLOGPOSTS (postTitle,postBody,postAuthor,postDateCreated,postDateUpdated,postCategory,postTags)
      VALUES ('$postTitle', '$postBody', '$author', '$dateCreated', '$dateUpdated', '$category', '$tags' );     
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
          echo '<br>';
   }
}

function deleteData($db, $rowID){
	 $sql =<<<EOF
      DELETE from BLOGPOSTS where rowID = $rowID;
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
     echo $db->lastErrorMsg();
   } else {
      echo $db->changes(), " Record deleted successfully\n";
   }

   echo "Operation done successfully\n";
   $db->close();

}

//$db->close();

?>