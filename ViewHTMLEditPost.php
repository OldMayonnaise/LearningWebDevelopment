<?php
	
	$rowID = $_POST['rowID']; // get said post rowID		
	include 'index.php';	
	//include 'DAO.php';
	//$db = openDatabase();
	getPostFromDB($db, $rowID);

	function getDivPost(){
		
		$postHtml = '<form action="DBUpdate.php" id="blogPost" method="post">Title: 
				<input type="text" name="postTitle" id="blogPost" value="This Is The Title"/> 
				<input type="submit" name="submit" /></form>
	<textarea rows="4" cols="50" name="postBody" form="blogPost">$row[postBody]</textarea>';
	}
	
	function getPostFromDB($db, $rowID){
		
		global $db;
		$sql =<<<EOF
		SELECT * from BLOGPOSTS where rowID = $rowID;
EOF;
		$ret = $db->exec($sql); // executes the SQL query
		if(!$ret){
			echo $db->lastErrorMsg();
		} else {
			echo $db->changes(), " Record deleted successfully\n";
		}
		
		print_r($ret);
		echo "Operation done successfully\n";
	}
?>
