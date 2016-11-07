
<html>
<head>
<title>Abacus&#8482 - Delete Process</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include("top.php"); ?>
<div id="boxer"> 
<div id="omnibar">
<a href="index.php" id="omnilink">< Goto Homepage</a></div>

<?php
$usn=$_POST['usn'];
$password=$_POST['password'];

include 'login.php';

$usn = mysql_real_escape_string($usn);
$password = mysql_real_escape_string($password);

$usn = strip_tags($usn);
$password = strip_tags($password);

$query="select * from users  WHERE usn='".$usn."'";
$res=mysql_query($query);
while ($row=mysql_fetch_assoc($res)) {
$username = $row['name'];
$passwordact = $row['password'];
$imagelink=$row['imagelink'];
}

//flag 1 for error and 0 for no error
$flag=0;
?>
<h2>Log:</h2>
Connected to the database.<br>
USER exists.
<?php
//First let me check if anything is empty
if ($password=="") {
echo "<br>ERROR - Password left blank.";
echo "<br><br><a href='deleteprof.php?viauser=".$usn."&&name=".$username."' id='pagebutton'>Try Again</a><a href='viewuser.php?usn=".$usn."'id = 'pagebutton'>Return to Profile</a>";
$flag=1;
}

if (($password==$passwordact) AND ($flag==0)) {
	$rawimg="profilepics/".$imagelink;
	unlink($rawimg);
	$rawimg2="profilepics/thumb/".$imagelink;
	unlink($rawimg2);
	$query2="delete from users where usn='".$usn."';";
	$res2=mysql_query($query2);
	
	//delete all the posts
	$queryz="select * from items  WHERE postedby='".$usn."'";
	$resz=mysql_query($queryz);
	
	while ($rowz=mysql_fetch_assoc($resz)) {
		$uploaded_image="uploaded_images/".$rowz['imagelink'];
		unlink($uploaded_image);
	}
	
	$query3="delete from items where postedby='".$usn."';";
	$res3=mysql_query($query3);
	
	
	
	echo "<br><h3>Your Account was deleted successfully.</h3>";
	?>
	<br>We're sorry to see you go. :(<br>
	<img src="sad.png"> <br><br>
	<a href="index.php" id="pagebutton">Goto Homepage</a>
	<?php
} 

if (($password!=$passwordact) AND ($flag==0)) {
	echo "<br>ERROR - Wrong password.";
	echo "<br><br><a href='deleteprof.php?viauser=".$usn."&&name=".$username."' id='pagebutton'>Try Again</a><a href='viewuser.php?usn=".$usn."'id = 'pagebutton'>Return to Profile</a>";
}

echo "<br>";
include 'footer.php';
?>
