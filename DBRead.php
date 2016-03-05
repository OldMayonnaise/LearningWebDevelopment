<?php

include 'DAO.php';
//$db = openDatabase(); // this opens the database from the DAO.php
$blogPosts = array();// this is the array that I will store the blog posts in

function readDatabase(){
	
	$db = openDatabase(); //
	
	$sql =<<<EOF
	SELECT rowid, * from BLOGPOSTS;
EOF;

	$ret = $db->query($sql); // what is the datatype ret?
	
	$viewContent = ""; // see if this works without this variable
	
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
		
		$viewContent = $viewContent . $viewFormat;	
	
		$blogPosts[$row['rowid']] = $ret; // this adds the post array to the blogposts array with the post as the pk	
		  
   }
   return $viewContent;   
   
   echo "Operation done successfully\n";
   
   $db->close();
   
}
?>