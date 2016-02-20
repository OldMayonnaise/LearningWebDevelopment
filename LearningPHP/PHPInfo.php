<?php
	//php goes in here	
	
	// ok so it appears that we are good to use html tags within echo quotations	
	echo '<strong>single quotation marks will only echo out if you append them and we append them with a full stop</strong> <br>';
	echo "double quotation marks allow you to echo out variables";
	
	// it is probably in our best interest to use single quotations to better echo out html tags
	echo '<br> This is another test: <input type="text" name="name" value="test" />';
	
	
	//phpinfo(); // never have this function available on your server
	
		
	
?>

<html>

<form action="postResults.php" method="post">
Please enter your name:<input type="text" name="myName"/><br>
<input type="submit" name="submit"/>

</form>

</html>