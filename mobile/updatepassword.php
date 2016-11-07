<html>
<head>
<title>Abacus&#8482 Change Password</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>
<body>
<?php include("top.php");
$usn=$_POST['viauser'];
?>
<div id="boxer"><div id="omnibar">
&lt; <a href="viewuser.php?usn=<?php echo $usn ?>" id="omnilink"> Back to Profile</a> </div>
<h2>Log:</h2>
<?php
$oldpassword=$_POST['oldpassword'];
$newpassword=$_POST['newpassword'];
$renewpassword=$_POST['renewpassword'];

$oldpassword = mysql_real_escape_string($oldpassword);
$newpassword = mysql_real_escape_string($newpassword);
$renewpassword = mysql_real_escape_string($renewpassword);

$oldpassword = strip_tags($oldpassword);
$newpassword = strip_tags($newpassword);
$renewpassword = strip_tags($renewpassword);

require 'login.php';

$query="select * from users  WHERE usn='".$usn."'";
$res=mysql_query($query);

while ($row=mysql_fetch_assoc($res)) {
	$username = $row['name'];
	$passwordact = $row['password'];
}

echo "Connected to the database.";
echo "<br>USER exists.<br>";

$flag=0; //means no error flag=1 means that there's an error

if ($oldpassword=="" OR $newpassword=="" OR $renewpassword=="") {
	echo "Fields left black.<br>Terminating Session.";
	$flag=1;
}

if (($oldpassword!=$passwordact) AND ($flag==0)) {
	echo "Old Password entered is wrong.<br>Terminating Session.";
	$flag=1;
}

if (($newpassword!=$renewpassword) AND ($flag==0)) {
	echo "New Password retyped does not match.<br>Terminating Session.";
	$flag=1;
}

if ($flag==0) {
	//password is true and passwords match
	//update the password now
	$query2="UPDATE `abacus`.`users` SET `password` = '".$newpassword."' WHERE `users`.`usn` ='".$usn."';";
	$res2=mysql_query($query2);
	
	echo "<h3>Password updated successfully.</h3>";
	echo "<br>You have been logged out automatically. Please login again if you want to.";
	unset($_SESSION['usn']);
	unset($_SESSION['password']);
	echo "<br><br><a href='viewuser.php?usn=".$usn."' id='pagebutton'>Back to Profile</a>";
}

if ($flag==1) {
	echo "<br><br><a href='changepassword.php?viauser=".$usn."' id='pagebutton'>Try Again</a>";
}

echo "<br>";
include 'footer.php';