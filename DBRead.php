<?php

include 'DAO.php';
$db = openDatabase(); // this opens the database from the DAO.php
//$blogPosts = array();// this is the array that I will store the blog posts in
$blogPosts = readDatabase();

/*
*	read blog posts from database
*/
function readDatabase(){
	
	global $db; // database needs to be openen within the scope of the function if funtion is being called from outside of the file
	
	$sql =<<<EOF
	SELECT rowid, * from BLOGPOSTS;
EOF;

	$ret = $db->query($sql); // what is the datatype ret? object of type SQLite3Result	
		
	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ // I believe this means while there is another row in the array
	
		$blogPosts[$row['rowid']] = $row; // this adds the post array to the blogposts array with the post as the pk			  
   }   
   
   //print_r($blogPosts);
   echo "Operation done successfully\n";   
   $db->close();
	return $blogPosts;
}

/*
*	return blogPosts array object
*/
function getBlogPostsArray(){
	return $blogPosts;
}

/*
*	output blogPosts array to HTML
*/
function readBlogPostsArray(){
	
	global $blogPosts; // <- this was really important - allows me to access blogposts outside of function
	$viewContent = "";
	//print_r($blogPosts);	

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
}



/* function updatePost($rowid){
	
	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ // I believe this means while there is another row in the array
		
		if($rowid==$row['rowid']){
			
		<form action="DBUpdate.php" id="blogPost" method="post">Title: 
				<input type="text" name="postTitle" id="blogPost" value="This Is The Title"/> 
				<input type="submit" name="submit" /></form>
				<textarea rows="4" cols="50" name="postBody" form="blogPost">Enter text here...</textarea>
		
		}
		
		echo $updateForm;
		//return $updateForm;
		
		// start html formatting the following lines
	$viewFormat =
		'<div id="post"><h2>'.$row['postCategory'].' - '.$row['postTitle'].'</h2>						
		<h4>'.$row['postDateUpdated'].' - '.$row['postAuthor'].'</h4>	
		<p>'.$row['postBody'].'</p>			
		<h4>'.$row['postTags'].'</h4>		
		<form action="DBDelete.php" method="post">
		<button name="rowID" type="submit" value="'.$row['rowid'].'">delete</button>
		</form>		
		ID = '.$row['rowid'].'</div><br><br>';		
		
		$viewContent = $viewContent . $viewFormat;	
	
		$blogPosts[$row['rowid']] = $ret; // this adds the post array to the blogposts array with the post as the pk	
		  
   }
} */

?>