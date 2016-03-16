<?php	
	
	include 'DBRead.php';
	$blogPostRowId = $_GET["blogPostRowId"]; // what blog post are we looking at? - we need to know this for editing and reading this is an assosiative array
	$categoryID = $_GET["categoryId"]; // what category are we looking at?
	$blogPostsArray = getBlogPostsArray(); // get all the bog posts
	$categoriesArray = getcategoriesArray();
	$postDivFunction = $_GET["postDivFunction"]; // default, post, update // ok how am I going to pass this variable
	//print_r($categoriesArray);
	//print_r($blogPostsArray);
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
				<div id="postDiv"><?php	echo getPostDiv();?></div>
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
	global $categoriesArray; 
	//print_r($categoriesArray);	
	$topNavHTMLString = '';
	// now we iterate over topNavecategoriesArray
	foreach($categoriesArray as $category){
	$topNavHTMLCategory = '<a href="indexHome.php?categoryId='.$category['rowid'].'">'.$category['categoryName'].'</a>';
	$topNavHTMLString = $topNavHTMLString . $topNavHTMLCategory;
	}	
	return $topNavHTMLString;
}

function getLeftSideNavDiv(){	
	// get post titles
	global $blogPostsArray; //= getBlogPostsArray();	
	$leftNavHTMLString = '';
	// now we iterate over topNavecategoriesArray
	foreach($blogPostsArray as $blogPost){
		//echo $blogPost['rowid'];
	$blogPostTitleLink = '<a href="indexHome.php?blogPostRowId='.$blogPost['rowid'].'&postDivFunction=singlePost">'.$blogPost['postTitle'].'</a><br>';
	$leftNavHTMLString = $leftNavHTMLString . $blogPostTitleLink;
	}   
   return $leftNavHTMLString;	
}

function getPostDiv(){	

	global $postDivFunction;
	
	global $categoriesArray;
	$categoryDropDown = '<select name="categoryID">';
	foreach($categoriesArray as $element){
		$categoryDropDown = $categoryDropDown . '<option value="'.$element['rowid'].'">'.$element['categoryName'].'</option>';
	}
	$categoryDropDown = $categoryDropDown . '</select>';
	
	$viewContent = "";
	
	switch ($postDivFunction){		
		case 'singlePost':
			global $blogPostRowId;
			$blogPost = getBlogPost($blogPostRowId);
			
			$viewFormat =
				'<div id="post"><h2>'.$blogPost['postCategory'].' - '.$blogPost['postTitle'].'</h2>						
				<h4>'.$blogPost['postDateUpdated'].' - '.$blogPost['postAuthor'].'</h4>	
				<p>'.$blogPost['postBody'].'</p>			
				<h4>'.$blogPost['postTags'].'</h4>		
				<form action="indexHome.php?postDivFunction=updatePost" method="post">
				<a href="indexHome.php?blogPostRowId='.$blogPost['rowid'].'&postDivFunction=updatePost">Edit Post</a><br>
				<button name="blogPostRowId" type="submit" value="'.$blogPost['rowid'].'">Update</button>
				</form>	
				<form action="DBDelete.php" method="post">
				<button name="blogPostRowId" type="submit" value="'.$blogPost['rowid'].'">delete</button>
				</form>	
				ID = '.$blogPost['rowid'].'</div><br><br>';
				
				$viewContent = $viewContent . $viewFormat;
				
			global $categoryDropDown;
			
			$viewContent = $viewContent.'<form action="DBUpdate.php" id="blogPost" method="post">Title: 
				<input type="text" name="postTitle" id="blogPost" value="This Is The Title"/> 
				<input type="submit" name="submit" />'.$categoryDropDown.'</form>			
				<textarea rows="4" cols="50" name="postBody" form="blogPost">Enter text here...</textarea>';
			//echo $viewContent;
			return $viewContent;
			break;
			
		case 'updatePost':			
			global $blogPostRowId;
			$blogPost = getBlogPost($blogPostRowId);			
			$viewFormat =
				'<div id="post"><h2>'.$blogPost['postCategory'].' - '.$blogPost['postTitle'].'</h2>						
				<h4>'.$blogPost['postDateUpdated'].' - '.$blogPost['postAuthor'].'</h4>	
				<p>'.$blogPost['postBody'].'</p>			
				<h4>'.$blogPost['postTags'].'</h4>		
				<form action="indexHome.php?postDivFunction=updatePost" method="post">
				<a href="indexHome.php?blogPostRowId='.$blogPost['rowid'].'&postDivFunction=updatePost">Edit Post</a><br>
				<button name="blogPostRowId" type="submit" value="'.$blogPost['rowid'].'">Update</button>
				</form>	
				<form action="DBDelete.php" method="post">
				<button name="blogPostRowId" type="submit" value="'.$blogPost['rowid'].'">delete</button>
				</form>	
				ID = '.$blogPost['blogPostRowId'].'</div><br><br>';	
				$viewContent = $viewContent . $viewFormat;	
				
				global $categoryDropDown;	
				
				$viewContent = $viewContent.'<form action="DBUpdate.php" id="blogPost" method="post">Title: 
					<input type="text" name="postTitle" id="blogPost" value="'.$blogPost['postTitle'].'"/> 
					<input type="submit" name="submit" />'.$categoryDropDown.'</form>			
					<textarea rows="4" cols="50" name="postBody" form="blogPost">'.$blogPost['postBody'].'</textarea>';
			//echo $viewContent;
			return $viewContent;		
			break;
		
		default:
			global $blogPostsArray;			
			foreach($blogPostsArray as $row){
				$viewFormat =
				'<div id="post"><h2>'.$row['postCategory'].' - '.$row['postTitle'].'</h2>						
				<h4>'.$row['postDateUpdated'].' - '.$row['postAuthor'].'</h4>	
				<p>'.$row['postBody'].'</p>			
				<h4>'.$row['postTags'].'</h4>		
				<form action="indexHome.php?postDivFunction=updatePost" method="post">
				<a href="indexHome.php?blogPostRowId='.$blogPost['rowid'].'&postDivFunction=updatePost">Edit Post</a><br>
				<!- <button name="rowID" type="submit" value="'.$row['rowid'].'">Update</button> -->
				</form>	
				<form action="DBDelete.php" method="post">
				<button name="blogPostRowId" type="submit" value="'.$row['rowid'].'">delete</button>
				</form>	
				ID = '.$row['blogPostRowId'].'</div><br><br>';	
				$viewContent = $viewContent . $viewFormat;						
			}
			global $categoryDropDown;
			$viewContent = $viewContent.'<form action="DBUpdate.php" id="blogPost" method="post">Title: 
				<input type="text" name="postTitle" id="blogPost" value="This Is The Title"/> 
				<input type="submit" name="submit" />'.$categoryDropDown.'</form>			
				<textarea rows="4" cols="50" name="postBody" form="blogPost">Enter text here...</textarea>';
			//echo $viewContent;
			return $viewContent;			
			break;
	}	
		
}

//$db->close();

?>
