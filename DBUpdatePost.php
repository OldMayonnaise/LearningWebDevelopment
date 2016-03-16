<?php
	
	//include 'index.php';
	include 'DBRead.php';
	$blogPostRowId = $_GET['blogPostRowId'];
	//$blogPost = getBlogPost($blogPostRowId);
	$view = new UpdatePostView();
	
Class UpdatePostView extends View
{	
	function getPostDiv(){
	global $blogPostRowId;
	$blogPost = getBlogPost($blogPostRowId);
	$viewContent = "";
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

		global $categoriesArray;
		$categoryDropDown = '<select name="categoryID">';
		foreach($categoriesArray as $element){
			$categoryDropDown = $categoryDropDown . '<option value="'.$element['rowid'].'">'.$element['categoryName'].'</option>';
		}
		$categoryDropDown = $categoryDropDown . '</select>';		
	
		$viewContent = $viewContent.'<form action="DBUpdate.php" id="blogPost" method="post">Title: 
			<input type="text" name="postTitle" id="blogPost" value="'.$blogPost['postTitle'].'"/> 
			<input type="submit" name="submit" />'.$categoryDropDown.'</form>			
			<textarea rows="4" cols="50" name="postBody" form="blogPost">'.$blogPost['postBody'].'</textarea>';
	//echo $viewContent;
	return $viewContent;	
}	
}

?>

