<html>
<head>
<title>Abacus&#8482 Login</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>
<body>

<?php 
require 'top.php';
?>

<div id="boxer">

 <div id="omnibar"><a href="index.php" id="omnilink">Homepage</a> &gt; <a href="loginpage.php" id="omnilink">Login</a> &gt <text id="omnilink">Process </text></div>
<center><br><h1>Signing in..</h1>
Connected to the database.
<?php
//get the data
$usn=$_POST['usn'];
$usn=strtoupper($usn);
$password=$_POST['password'];

include 'login.php';

$flag=0;//no error
$passwordact="";
$usntrue=0;

//check for password authenticity
$query="select * FROM users WHERE usn='".$usn."';";
$res=mysql_query($query);

if ($res==FALSE) {
	echo $usn;
	echo "<br>USN you entered does not have an associated Account.";
	$passwordact="";
	$flag=1;
} else {
	while ($row=mysql_fetch_assoc($res)) {
		$username=$row['name'];
		$passwordact=$row['password'];
		$usntrue=1;
	}//end while
}//end else

if (($usn=="") OR ($password=="")) {
	echo "<br>ERROR - One or more fields left empty.";
	$flag=1;
	$passwordact="";
}

if($usntrue!=1) { 
	$flag=1;
	echo "<br>USN : ".$usn." does not have an associated Account.";
}

if (($password==$passwordact) AND ($flag==0)) {
	$_SESSION['usn']=$usn;
	$_SESSION['password']=$password;
	require 'login.php';
	$_SESSION['username']=$username;
	?>

<h2>Signed in successfully. :)</h2>

Reload page to refresh changes. <br><br><br><a href="index.php" id="pagebutton">Reload</a>
<?php 
} elseif (($password!=$passwordact) AND ($flag==0)) {
	echo "<br>ERROR - Password is wrong. ";
	$flag=1;
}//end else

if ($flag==1) {
	echo "<br><br><a href='loginpage.php' id='pagebutton'>Try Again</a>";
} ?>
<br><br>
<?php
include 'footer.php';
?>