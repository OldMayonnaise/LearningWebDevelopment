<?php

include 'DAO.php';
$db = openDatabase(); // this opens the database from the DAO.php

/*
*	read blog posts from database
*/
function getBlogPostsArray(){
	
	global $db; // database needs to be openen within the scope of the function if funtion is being called from outside of the file		
	$sql =<<<EOF
	SELECT rowid, * from BLOGPOSTS;
EOF;

	$ret = $db->query($sql); // what is the datatype ret? object of type SQLite3Result			
	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ // I believe this means while there is another row in the array	
		$blogPosts[$row['rowid']] = $row; // this adds the post array to the blogposts array with the post as the pk			  
   }     
	//print_r($blogPosts);
	//echo "Operation done successfully\n";   
	//$db->close();
	return $blogPosts;
}

/*
*	return single blogPost assosiative array object
*/
function getBlogPost($blogPostRowId){
	global $db; // database needs to be openen within the scope of the function if funtion is being called from outside of the file	
	$sql =<<<EOF
	SELECT rowid, * from BLOGPOSTS Where $blogPostRowId = rowid;
EOF;
echo $sql;
	$ret = $db->query($sql); // what is the datatype ret? object of type SQLite3Result			
	$blogPost = $ret->fetchArray(SQLITE3_ASSOC);	
	//print_r($blogPost);
	//echo "Operation done successfully\n";   
	//$db->close();
	return $blogPost;
}

/*
*	return single categories assosiative array object
*/
function getCategoriesArray(){
	global $db;
	$sql =<<<EOF
	SELECT rowid, * from categories;
EOF;

<<<<<<< HEAD
	foreach($blogPosts as $row){
	$viewFormat =
		'<div id="post"><h2>'.$row['postCategory'].' - '.$row['postTitle'].'</h2>						
		<h4>'.$row['postDateUpdated'].' - '.$row['postAuthor'].'</h4>	
		<p>'.$row['postBody'].'</p>			
		<h4>'.$row['postTags'].'</h4>		
		<form action="ViewHTMLEditPost.php" method="post">
		<button name="rowID" type="submit" value="'.$row['rowid'].'">Update</button>
		</form>	
		<form action="DBDelete.php" method="post">
		<button name="rowID" type="submit" value="'.$row['rowid'].'">delete</button>
		</form>	
		ID = '.$row['rowid'].'</div><br><br>';	
		$viewContent = $viewContent . $viewFormat;						
	}
	//echo $viewContent;
	return $viewContent;
=======
	$ret = $db->query($sql); // what is the datatype ret? object of type SQLite3Result			
	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ // fetch assosiative array of columns that make up the row
		$categories[$row['rowid']] = $row; // this adds the post array to the blogposts array with the post as the pk			  
   }	
   //print_r($categories);
   //echo "Operation done successfully\n";     
   //$db->close();
   return $categories;
>>>>>>> workingfromhome
}

?>