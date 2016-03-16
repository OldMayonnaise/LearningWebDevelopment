<?php

include 'DAO.php';
$db = openDatabase(); // this opens the database from the DAO.php
		
$postTitle = $_POST['postTitle'];
$postBody = $_POST['postBody'];                
date_default_timezone_set('UTC');              
$dateUpdated = date('l F jS Y');
$dateCreated = date('l F jS Y');
$author = 'author';
$categoryID = $_POST['categoryID']; // I need to make these tables again - parentCategory that is an int
$tags = 'tags tags tags';	
	
updateDatabase($db, $postTitle, $postBody, $dateUpdated, $dateCreated, $author, $categoryID, $tags);

function updateDatabase($db, $postTitle, $postBody, $dateUpdated, $dateCreated, $author, $categoryID, $tags){
	
	$sql =<<<EOF
	INSERT INTO BLOGPOSTS (postTitle,postBody,postAuthor,postDateCreated,postDateUpdated,postCategory,postTags)
	VALUES ('$postTitle', '$postBody', '$author', '$dateCreated', '$dateUpdated', '$categoryID', '$tags' );     
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
header("Location:indexHome.php"); // where to go next
exit();

function editBlogPost($rowId){ // consider accessing the row via rowid and postTitle

// here we just need to get one post info
// can I get a class object?
	
}

?>