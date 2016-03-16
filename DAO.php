<?php

function openDatabase(){
	
	class MyDB extends SQLite3 // creates the database object that extends sqlite3
	{
		function __construct() // this is actually a constructor
		{
			$this->open('blog.db'); // chooses the database to make the database object - this might be a parameter
        }
    }
   
	$db = new MyDB();
	
	if(!$db){
		echo $db->lastErrorMsg();
	} else {
		//echo "Opened database successfully\n";
		//echo '<br>';
	}
	
	return $db; // returns database object
}

function closeDatabase($db){
	 $db->close();
};

?>