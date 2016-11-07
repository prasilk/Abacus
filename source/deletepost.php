<?php
$postid=$_GET['postid'];
$cate=$_GET['cate'];
$usn=$_GET['usn'];
?>

<html>
<head>
<title>Abacus&#8482 Detelepost</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>
<body>
<?php include("top.php"); ?>
<div id="boxer">
<div id="omnibar">
&lt; <a href="viewpost.php?postid=<?php echo $postid ?>&&cate=<?php echo $cate ?>" id="omnilink">Back</a> </div>

<h2>Delete Post</h2>
Continuing will permanently delete this post. Are you sure? Enter your password to confirm. <br><br>
<form action="deleteprocess.php" method="POST" enctype="multipart/formdata">
Password <input type="password" name="passwordentry" id="registerinput"
<?php
 if (isset($password)) {
	echo "value='".$password."' >";
} else {
	echo ">";
} ?><br><br>
<input type="submit" value="Delete" id="pagebutton">
<input type="hidden" name="refpostid" value="<?php echo $postid ?>">
<input type="hidden" name="usn" value="<?php echo $usn ?>">
<input type="hidden" name="cate" value="<?php echo $cate ?>">
</form>
Or, you can always cancel to go back.<br><br>
<a href="viewpost.php?postid=<?php echo $postid ?>&&cate=<?php echo $cate ?>" id="pagebutton">Cancel</a> <br>
<?php include('footer.php'); ?>