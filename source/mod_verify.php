
<html>
<head>
<title>Verification Process</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include 'top.php'; ?>
<div id="boxer"> <div id="omnibar">
<a href="mod.php" id="omnilink">Moderator Panel</a> &gt; Verify Process </div><h2>Log:</h2>
<?php
$usn=$_POST['usn'];
$pass=$_POST['pass'];
$flag=0;


include 'login.php';

//sanitization
$usn = strtoupper($usn);
$usn = mysql_real_escape_string($usn);
$pass = mysql_real_escape_string($pass);

if ($pass=="mod3344") {
	$query="UPDATE `abacus`.`users` SET `verified` = 'y' WHERE `users`.`usn` ='".$usn."';";
	$res=mysql_query($query);
	$query2="UPDATE `abacus`.`items` SET `usn_verified` = 'y' WHERE `items`.`postedby` ='".$usn."';";
	$res2=mysql_query($query2);
	echo "<h3>User with USN : ".$usn." verified successfully.</h3>";
	echo "<br><br><a href='mod.php' id='pagebutton'>Verify another user</a><a href='index.php' id='pagebutton'>Exit Moderator Panel</a>";
	$flag=1;
}

if ($flag==0) {
	echo "Moderator password entered is incorrect.";
	echo "<br><br><a href='mod.php' id='pagebutton'>Try Again</a><a href='index.php' id='pagebutton'>Exit Moderator Panel</a>";
}

echo "<br>";
include ('footer.php');	
