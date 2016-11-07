<?php
//fetching guys from POST
$username=$_POST['username'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$otherinfo=$_POST['otherinfo'];
$humantest=$_POST['humantest'];
$actual=$_POST['actual'];
$repassword=$_POST['repassword'];
?>

<html>
<head>
<title>Register for Abacus</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include('top.php'); ?>
<div id="boxer"> <div id="omnibar">
<a href="index.php" id="omnilink">Abacus Homepage</a> &gt; <?php echo "<a href='newaccount.php?username=".$username."&&phone=".$phone."&&email=".$email."&&address=".$address."&&otherinfo=".$otherinfo; ?>' id="omnilink"> Register</a> &gt; Process </div>
<h2>Log:</h2>

<?php
//flag
$flag=0;

//important aka VIP ones
$usn=$_POST['usn'];
$password=$_POST['password'];

include 'login.php';

echo "Data received.<br>";
//now a little sanitization for newones ;)
$username = mysql_real_escape_string($username);
$phone = mysql_real_escape_string($phone);
$email = mysql_real_escape_string($email);
$address = mysql_real_escape_string($address);
$gender = mysql_real_escape_string($gender);
$otherinfo = mysql_real_escape_string($otherinfo);
$actual = mysql_real_escape_string($actual);
$repassword = mysql_real_escape_string($repassword);

//sanitization for these guys too
$usn = mysql_real_escape_string($usn);
$password = mysql_real_escape_string($password);

//*strip before you enter the mansion
$actual = strip_tags($actual);
$repassword = strip_tags($repassword);
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

//First let me check if anything is empty
if ((($username=="") OR ($phone=="") OR ($email=="") OR ($address=="") OR ($usn=="") OR ($password=="") OR ($humantest==""))) {
echo "<br>ERROR - One or more fields left blank, don't do that again.";
echo "<br><br><a href='newaccount.php?username=".$username."&&phone=".$phone."&&email=".$email."&&address=".$address."&&otherinfo=".$otherinfo."' id='pagebutton'>Got it</a><a href='index.php' id='pagebutton'>Goto Homepage</a>";
$flag=1; //this means that there is an error so the following steps will be ignored
}

if (($password!=$repassword) AND ($flag==0)) {
	echo "<br>Passwords do not match.</br>";
	echo "<br><br><a href='newaccount.php?username=".$username."&&phone=".$phone."&&email=".$email."&&address=".$address."&&otherinfo=".$otherinfo."' id='pagebutton'>Try Again</a><a href='index.php' id='pagebutton'>Goto Homepage</a>";
	$flag=1;
}

//humantest
if (($actual!=$humantest) AND ($flag==0)) {
echo "<br>CAPTCHA code entered is incorrect. Try Again";
echo "<br><br><a href='newaccount.php?username=".$username."&&phone=".$phone."&&email=".$email."&&address=".$address."&&otherinfo=".$otherinfo."'id='pagebutton'>Try Again</a><a href='index.php' id='pagebutton'>Nevermind</a>";
$flag=1;
}

//now that the user has filled everything, let's check if there is a duplicate entry for usn
//flag=0 means that there is no error till this step, so it's good to go.
if ($flag==0) {
$query="select * from users";
$res=mysql_query($query);
while ($row=mysql_fetch_assoc($res)) {
$usnavailable=$row['usn']; //if there is any usn that matches the given usn
if ($usn==$usnavailable) { //and if it does,
echo "<br>ERROR - An account with the given USN already exists.";
echo "<br><br><a href='newaccount.php?username=".$username."&&phone=".$phone."&&email=".$email."&&address=".$address."&&otherinfo=".$otherinfo."' id='pagebutton'>Try again</a><a href='userchange.php' id='pagebutton'>My USN was illegitimately used</a>";
$flag=1; //well you can't create duplicate records, that's why.
}//end if for usn available
}//end the res
}//end if for flag

//everything is fine, lets send our fellow to the destination. Happy journey.
if ($flag==0) {
$querysuccess="insert into users (name,phone,email,address,gender,otherinfo,usn,password,date) values ('$username','$phone','$email','$address','$gender','$otherinfo','$usn','$password',NOW())";
$ressuccess=mysql_query($querysuccess);
echo "<br>USN - ".$usn." is unique. That is good.";
echo "<br><h3>Account successfully created.</h3>";
echo "<br><br><a href='viewuser.php?usn=".$usn."' id='pagebutton'>Visit your profile</a><a href='index.php' id='pagebutton'>Go to Homepage</a>";
echo "<br><br>Your account is not verified. If all your given info is correct, your account will be verified. It could take some time depending upon how busy the moderators are. Alternatively, if you want to verify it instantly (in less than 1 hour), send your USN number to +91-9972985261. Make sure that you send the sms with the same phone number that you used to create the account. After verification, you'll get a success sms. (only if you verified by sending sms) <br><br>
Meanwhile, even with your unverified account, you could post. However, it will be posted on the unverified posts page.<br>";
}

?>

<br>
<?php include('footer.php'); ?>




