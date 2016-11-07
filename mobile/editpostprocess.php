<html>
<head>
<title>Abacus&#8482 - Edit Process</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>
<body>
<?php include 'top.php'; 
$postid=$_POST['postid'];
$edited=$_POST['edited'];
$password=$_POST['passwordinput'];
$cate=$_POST['cate'];
$itemname=$_POST['itemname'];
?>
<div id="boxer">
 <div id="omnibar"><a href="editpost.php?postid=<?php echo $postid; ?>&&cate=<?php echo $cate; ?>&&name=<?php echo $itemname; ?>" id="omnilink">< Back</a></div>
<h2>Log:</h2>
Connected to the database.<br>
Record Found.

<?php

require 'login.php';

//preventing SQL injection
$postid=mysql_real_escape_string($postid);
$edited=mysql_real_escape_string($edited);
$password=mysql_real_escape_string($password);
$cate=mysql_real_escape_string($cate);
$itemname=mysql_real_escape_string($itemname);

//preventing HTML injection
$postid = strip_tags($postid);
$edited = strip_tags($edited);
$password = strip_tags($password);
$cate = strip_tags($cate);
$itemname = strip_tags($itemname);

//acquiring usn of person who posted the item
$query="select * from items where item_id='".$postid."';";
$res=mysql_query($query);
while ($row=mysql_fetch_assoc($res)) {
$usn=$row['postedby'];
}

//acquiring the password as per the usn
$query2="select * from users where usn='".$usn."';";
$res2=mysql_query($query2);
while ($row2=mysql_fetch_assoc($res2)) {
$passwordact=$row2['password'];
}

$flag=0; //means no error, flag=1 means that there is an error

//checking for blank fields
if (($edited=="") OR ($password=="")) {
	echo "<br>ERROR - One or more fields left blank.";
	$flag=1;
}

//checking if the password matches and execute query
if (($password==$passwordact) AND ($flag==0)) {
	//add the edit update
	$query3="UPDATE `abacus`.`items` SET edited = '".$edited."' WHERE item_id='".$postid."'; ";
	$res3=mysql_query($query3);
	echo "<h3>Edit information posted successfully!</h3>";
	echo "<br><br><a href='viewpost.php?postid=".$postid."&&cate=".$cate."' id='pagebutton'>View updated post</a>";
}

//showing error message if the password is wrong
if ($password!=$passwordact) {
	echo "<br>Wrong password.";
	$flag=1;
}

//showing try again button for errors
if ($flag==1) {
	echo "<br><br><a href='editpost.php?postid=".$postid."&&cate=".$cate."&&name=".$itemname."' id='pagebutton'>Try Again</a><br>";
}

include 'footer.php';

?>

