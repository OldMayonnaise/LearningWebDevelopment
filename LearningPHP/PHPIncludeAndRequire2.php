<?php

//include 'phpincludeandrequireheader.php';

//include 'doesNotExist.php';

require 'doesNotExist.php'; // require kills the rest of the page

echo 'this is var 2 '. $var2;

//another page

?>