
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>PHP Post Results</title>
  </head>
  <body>
  <?php
        
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        
        echo 'Your full name is ' . $firstName . ' ' . $lastName;
		
		// the following is a Ear Doc ??
		// define the string and use funky characters - not quite sure how it works but give it a shot
		$newString = <<<EOD
		<br>
		The customer's first name is
		$firstName <br/>
		and their last name is
		$lastName<br/>
EOD;

		echo $newString;
        
?>
  </body>
</html>
