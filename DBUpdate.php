<?php

	include 'databaseCRUD.php';
	
	$postTitle = $_POST['postTitle'];
    $postBody = $_POST['postBody'];                
    date_default_timezone_set('UTC');              
	$dateUpdated = date('l F jS Y');
	$dateCreated = date('l F jS Y');
	$author = 'author';
	$category = 'category';
	$tags = 'tags tags tags';
	
	//$db = openDatabase(); // not sure why I dont need this - I am apparently opening this db somewhere else
	
	updateDatabase($db, $postTitle, $postBody, $dateUpdated, $dateCreated, $author, $category, $category, $tags);


?>