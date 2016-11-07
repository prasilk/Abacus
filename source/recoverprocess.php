<html>
<head>
<title>Abacus&#8482 Recover password</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include 'top.php'; ?>
<div id="boxer"> <div id="omnibar">
<a href="forgotpassword.php" id="omnilink">< Back</a></div>
<center>
<h2>Log</h2>
Connected to the Database.
<br>E-Mail check function initiated.
<?php
require 'login.php';

$actual=$_POST['actual'];
$humantest=$_POST['humantest'];
$usn=$_POST['usn'];

$actual = mysql_real_escape_string($actual);
$humantest = mysql_real_escape_string($humantest);
$usn = mysql_real_escape_string($usn);

$flag=0;//means that it does not have an error
$usntrue=0;

if (($humantest=="") OR ($usn=="")) {
	echo "<br>ERROR : One or more fields left blank.";
	$flag=1;
}

//check for password authenticity
$email="";
$query="select * FROM users WHERE usn='".$usn."';";
$res=mysql_query($query);

if ($res==FALSE) {
	echo $usn;
	echo "<br>This USN number does not have an associated Account.";
	$email="";
	$flag=1;
} else {
	while ($row=mysql_fetch_assoc($res)) {
		$username=$row['name'];
		$email=$row['email'];
		$password=$row['password'];
		$usntrue=1;
	}//end while
}//end else

if (($actual!=$humantest) AND ($flag==0)) {
	echo "<br>CAPTCHA code entered is incorrect.";
	$flag=1;
}

if ($usntrue==0) {
	echo "<br>This USN does not have an associated Account.";
	$flag=1;
}

if (($usntrue==1) AND ($flag==0)) {
	$to = $email;
	$subject = "Abacus password recovery";
	$body = "Hi ".$username.". \n\n Your password for Abacus account is : ".$password." . ";
	$headers = "From: Abacus password recovery <noreply@abacusproject.in>";
	
	if (mail($to, $subject, $body, $headers)) {
		echo "<br>E-mail has been sent to :".$to;
	} else {
		echo "<br>There was a problem sending the E-Mail.";
		$flag=1;
	}//end if
}

if ($flag==1) {
	echo "<br><br><a href='forgotpassword.php' id='pagebutton'>Try again</a>";
}

echo "<br>";

include 'footer.php';

?>