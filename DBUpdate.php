<?php

include 'DAO.php';
$db = openDatabase(); // this opens the database from the DAO.php
		
$postTitle = $_POST['postTitle'];
$postBody = $_POST['postBody'];                
date_default_timezone_set('UTC');              
$dateUpdated = date('l F jS Y');
$dateCreated = date('l F jS Y');
$author = 'author';
$category = 'category';
$tags = 'tags tags tags';	
	
updateDatabase($db, $postTitle, $postBody, $dateUpdated, $dateCreated, $author, $category, $category, $tags);

function updateDatabase($db, $postTitle, $postBody, $dateUpdated, $dateCreated, $author, $category, $category, $tags){
	
	$sql =<<<EOF
	INSERT INTO BLOGPOSTS (postTitle,postBody,postAuthor,postDateCreated,postDateUpdated,postCategory,postTags)
	VALUES ('$postTitle', '$postBody', '$author', '$dateCreated', '$dateUpdated', '$category', '$tags' );     
EOF;

	$ret = $db->exec($sql); // executes the SQL statement
	if(!$ret){
		echo $db->lastErrorMsg();
	} else {
		echo "Records created successfully\n";
		echo '<br>';
	}				
}
	
$db->close(); // close the database
header("Location:index.php"); // where to go next
exit();

editBlogPost($rowId){ // consider accessing the row via rowid and postTitle

// here we just need to get one post info
// can I get a class object?
	
}

?>