<?php
$username=$_POST['username'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address=$_POST['address'];
$otherinfo=$_POST['otherinfo'];
$gender=$_POST['gender'];
$usn=$_POST['usn'];
$password=$_POST['password'];
?>

<html>
<head>
<title>Update Process</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include("top.php"); ?>
<div id="boxer"> 
<div id="omnibar">
<a href="viewuser.php?usn=<?php echo $usn ?>" id="omnilink"> < <?php echo $username."'s"; ?> Profile</a></div>

<h2>Log : </h2>
<?php

include 'login.php';

echo "Data received.<br>";
//now a little sanitization for newones ;)
$username = mysql_real_escape_string($username);
$phone = mysql_real_escape_string($phone);
$email = mysql_real_escape_string($email);
$address = mysql_real_escape_string($address);
$gender = mysql_real_escape_string($gender);
$otherinfo = mysql_real_escape_string($otherinfo);

//sanitization for these guys too
$usn = mysql_real_escape_string($usn);
$password = mysql_real_escape_string($password);

//*strip before you enter the mansion
$username = strip_tags($username);
$phone = strip_tags($phone);
$email = strip_tags($email);
$address = strip_tags($address);
$gender = strip_tags($gender);
$otherinfo = strip_tags($otherinfo);
$usn = strip_tags($usn);
$password = strip_tags($password);

//w-wait the usn is supposed to be capitalized
$usn = strtoupper($usn);

//phew.. low let's build the connection to the heaven

echo"Connected to the database.";

//flag 1 for error and 0 for no error
$flag=0;

//First let me check if anything is empty
if ((($username=="") OR ($phone=="") OR ($email=="") OR ($address=="") OR ($usn=="") OR ($password==""))) {
echo "<br>ERROR - One or more fields left blank, don't do that again.";
echo "<br><br><a href='editprof.php?viauser=".$usn."&&name=".$username."' id='pagebutton'>Got it</a><a href='viewuser.php?usn=".$usn."'id = 'pagebutton'>Return to Profile</a>";
$flag=1;
}

$query2="select * from users where usn='".$usn."';";
$res2=mysql_query($query2);
while ($row2=mysql_fetch_assoc($res2)) {
$passactual=$row2['password'];
}

if (($passactual!=$password) AND ($flag==0)) {
	echo "<br>Password Entered is wrong";
	echo "<br><br><a href='editprof.php?viauser=".$usn."&&name=".$username."' id='pagebutton'>Try Again</a><a href='viewuser.php?usn=".$usn."'id = 'pagebutton'>Return to Profile</a>";
	$flag=1;
} 

if ($flag==0) {
	$query3="UPDATE `abacus`.`users` SET name = '".$username."', phone = '".$phone."', email = '".$email."', address = '".$address."', gender='".$gender."', otherinfo = '".$otherinfo."' WHERE usn='".$usn."'; ";
	$res3=mysql_query($query3);
	echo "<h3>Profile updated successfully!</h3>";
	echo "<br><br><a href='viewuser.php?usn=".$usn."' id='pagebutton'>View Profile</a><a href='index.php' id='pagebutton'>Goto Homepage</a>";
}//end pass check

echo "<br>";
include 'footer.php';
?>
