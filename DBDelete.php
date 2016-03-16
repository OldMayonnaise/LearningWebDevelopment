<?php

	include 'DAO.php';
	$db = openDatabase(); // open the database from the DAO.php

	$rowID = $_POST['rowID'];	
	
	deleteData($db, $rowID);
	
	function deleteData($db, $rowID){
		$sql =<<<EOF
		DELETE from BLOGPOSTS where rowID = $rowID;
EOF;
		$ret = $db->exec($sql); // executes the SQL query
		if(!$ret){
			echo $db->lastErrorMsg();
		} else {
			echo $db->changes(), " Record deleted successfully\n";
		}
		echo "Operation done successfully\n";
	}
	$db->close(); // close the database
	header("Location:indexHome.php"); // where to go next  
	exit();
	


?>