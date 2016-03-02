<?php

	$rowID = $_POST['rowID'];
	
	include 'databaseCRUD.php';
	
	deleteData($db, $rowID);

	header("Location:index.php");
	  
	exit();
	


?>