<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('test.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
?>

<br>
<br>
<a href="http://www.tutorialspoint.com/sqlite/sqlite_php.htm">http://www.tutorialspoint.com/sqlite/sqlite_php.htm</A>