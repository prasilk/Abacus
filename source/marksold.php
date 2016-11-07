<?php
$postid=$_GET['postid'];
$cate=$_GET['cate'];
$usn=$_GET['usn'];
?>

<html>
<head>
<title>Abacus&#8482 Mark as sold</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>
<body>
<?php include("top.php"); ?>
<div id="boxer"><div id="omnibar">
&lt; <a href="viewpost.php?postid=<?php echo $postid ?>&&cate=<?php echo $cate ?>" id="omnilink">Back</a> </div>
<h2>Mark as sold</h2>
Sold your item? Congrats. <br>Now just enter the password to confirm so that people won't ask for it anymore. <br><br>
<form action="soldprocess.php" method="POST" enctype="multipart/formdata">
Password <input type="password" name="passwordentry" id="registerinput"
<?php
if (isset($password)) {
	echo "value='".$password."' >";
} else {
	echo ">";
} ?>
<br><br>
<input type="hidden" name="refpostid" value="<?php echo $postid ?>">
<input type="hidden" name="usn" value="<?php echo $usn ?>">
<input type="hidden" name="cate" value="<?php echo $cate ?>">
<input type="submit" value="Mark as sold" id="pagebutton"><br><br>
Oops, entered here by mistake? You can always go back.<br><br>
<a href="viewpost.php?postid=<?php echo $postid ?>&&cate=<?php echo $cate ?>" id="pagebutton">Yea sure.</a><br>
<?php include('footer.php'); ?>