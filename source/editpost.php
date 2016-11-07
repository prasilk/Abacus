<html>
<head>
<title>Abacus&#8482 - Edit Post</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>
<body>
<?php include 'top.php'; 
$postid=$_GET['postid'];
$cate=$_GET['cate'];
$itemname=$_GET['name'];
?>
<div id="boxer">
 <div id="omnibar"><a href="viewpost.php?postid=<?php echo $postid; ?>&&cate=<?php echo $cate; ?>" id="omnilink">< Back</a></div>
<h2>Edit Post - <?php echo $itemname; ?></h2>
Posts, well technically cannot be edited. We have reasonable reasons for doing so - one of them is to ensure post authenticity over time. If you forgot to add some information / want to include some other information, we'll create a new field called "Edited" and post whatever you write now over that field. That way, you can sort of edit the post - without risking the post authenticity. If you would badly like to edit something, we recommend you to delete post and repost again. <br><br>

<form action="editpostprocess.php" method="POST" enctype="multipart/formdata">
So what's your edit message<br>
<textarea name="edited" id="otherinfo"></textarea>
<br><br>
Your Password<br>
<input type="hidden" name="postid" value="<?php echo $postid; ?>">
<input type="hidden" name="cate" value="<?php echo $cate; ?>">
<input type="hidden" name="itemname" value="<?php echo $itemname; ?>">
<input type="password" name="passwordinput" id="registerinput"
<?php
if (isset($password)) {
	echo "value='".$password."' >";
} else {
	echo ">";
} ?>
<br><br>

<input type="submit" value="Save Edit" id="pagebutton"><a href="viewpost.php?postid=<?php echo $postid; ?>&&cate=<?php echo $cate; ?>" id="pagebutton">Cancel and return</a><br>
<?php include 'footer.php' ?>
</form>
