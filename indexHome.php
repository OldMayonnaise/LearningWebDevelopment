<?php	
	
	include 'DBRead.php';
	$blogPostRowId = $_GET['blogPostRowId']; // what blog post are we looking at? - we need to know this for editing and reading this is an assosiative array
	//$category = $controller->{$_GET['action']}();
	//$topNavCategory // what is the current topNav category - this should be the rowID of the current category
	//$sideNavParentCategory // what is the current sideNav category - this should be the rowID of the current category
	
	
?>
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>Production Book and Notes</title>
    <link rel="styleSheet" type="text/css" href="/CascadingStyleSheets/styleSheetnew.css" />
  </head>
  <body>
		<div id="container">
		<div id="header"><h1>Production Book and Portfolio</h1></div>		
		<div id="topNav"><?php echo getTopNavDiv();?></div>
			<div id="content">	
				<div id="leftSideNav"><?php	echo getLeftSideNavDiv();?></div>		
				<div id="postDiv"><?php	echo getPostDiv();?>
				<!-- php update form here -->
				<form action="DBUpdate.php" id="blogPost" method="post">Title: 
				<input type="text" name="postTitle" id="blogPost" value="This Is The Title"/> 
				<input type="submit" name="submit" /></form>
				<textarea rows="4" cols="50" name="postBody" form="blogPost">Enter text here...</textarea></div>
				<div id="rightSideNav">right side nav</div>											
			</div>
		
		<div id="bottomNav">bottom nav</div>
		<div id="footer">footer</div>
		</div>
		<a href="/learningPHP/indexPHP.html">deprecated index</a>
	
  </body>
</html>
<?php


function getTopNavDiv(){

	$topNaveCategories = getCategories();
   
	$topNavHTMLString = '';
	// now we iterate over topNaveCategories
	foreach($topNaveCategories as $category){
	$topNavHTMLCategory = '<a href="indexHome.php">'.$category['categoryName'].'</a>';
	$topNavHTMLString = $topNavHTMLString . $topNavHTMLCategory;
	}
	//print_r($topNaveCategories);
	return $topNavHTMLString;
}

function getLeftSideNavDiv(){	
	// get post titles
	$blogPosts = getBlogPostsArray();	
	$leftNavHTMLString = '';
	// now we iterate over topNaveCategories
	foreach($blogPosts as $blogPost){
	$blogPostTitleLink = '<a href="indexHome.php?blogPostRowId='.$blogPost['rowid'].'">'.$blogPost['postTitle'].'</a><br>';
	$leftNavHTMLString = $leftNavHTMLString . $blogPostTitleLink;
	}   
   return $leftNavHTMLString;	
}

function getPostDiv(){
	//echo 'getPostDive';
	
	global $blogPostRowId;
	$viewContent = "";
	
	if($blogPostRowId == !null){
		$blogPost = getBlogPost($blogPostRowId);
		$viewFormat =
		'<div id="post"><h2>'.$blogPost['postCategory'].' - '.$blogPost['postTitle'].'</h2>						
		<h4>'.$blogPost['postDateUpdated'].' - '.$blogPost['postAuthor'].'</h4>	
		<p>'.$blogPost['postBody'].'</p>			
		<h4>'.$blogPost['postTags'].'</h4>		
		<form action="DBUpdatePost.php" method="post">
		<button name="rowID" type="submit" value="'.$blogPost['rowid'].'">Update</button>
		</form>	
		<form action="DBDelete.php" method="post">
		<button name="rowID" type="submit" value="'.$blogPost['rowid'].'">delete</button>
		</form>	
		ID = '.$blogPost['rowid'].'</div><br><br>';	
		$viewContent = $viewContent . $viewFormat;						
	} else {		
		$blogPosts = getBlogPostsArray();			
		foreach($blogPosts as $row){
			$viewFormat =
			'<div id="post"><h2>'.$row['postCategory'].' - '.$row['postTitle'].'</h2>						
			<h4>'.$row['postDateUpdated'].' - '.$row['postAuthor'].'</h4>	
			<p>'.$row['postBody'].'</p>			
			<h4>'.$row['postTags'].'</h4>		
			<form action="DBUpdatePost.php" method="post">
			<button name="rowID" type="submit" value="'.$row['rowid'].'">Update</button>
			</form>	
			<form action="DBDelete.php" method="post">
			<button name="rowID" type="submit" value="'.$row['rowid'].'">delete</button>
			</form>	
			ID = '.$row['rowid'].'</div><br><br>';	
			$viewContent = $viewContent . $viewFormat;						
		}
	}
	//echo $viewContent;
	return $viewContent;	
}



// remember to close the database

?>
