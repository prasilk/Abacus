<html>
<head>
<title>Abacus&#8482 Buy - Viewuser</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>
<?php
$usn=$_GET['usn'];
include 'login.php';
$query2="select * from users where usn='".$usn."';";
$res2=mysql_query($query2);
while ($row2=mysql_fetch_assoc($res2)) {
$name=$row2['name'];
$phone=$row2['phone'];
$email=$row2['email'];
$address=$row2['address'];
$gender=$row2['gender'];
$otherinfo=$row2['otherinfo'];
$usn=$row2['usn'];
$verified=$row2['verified'];
$imagelink=$row2['imagelink'];
}

?>
<body>
<?php include("top.php"); ?>
<div id="boxer"> 
<div id="omnibar">
<a href="index.php" id="omnilink">Abacus Homepage</a> &gt; <text id="omnilink"><?php echo $name; ?> </text></div>

<?php 
if ($verified=='y') {
$message="VERIFIED USER";
} else {
$message="UNVERIFIED USER";
} 

if ($imagelink==NULL) { $imagelink='default.png'; }

?>

<div id="profbox"><img src="profilepics/<?php echo $imagelink ?>" id="profimg"></div>
<h2><?php echo $name." ( ".$message." ) "; ?></h2><hr id="menuhr"><br>
<?php
echo "<b>Phone : </b>".$phone;
echo "<br><b>E-Mail : </b>".$email;
echo "<br><b>Address : </b>".$address;
echo "<br><b>Gender : </b>".$gender;
echo "<br><b>Otherinfo : </b>".$otherinfo;
echo "<br><b>USN : </b>".$usn;
?>
<br><br>
<a href="editprof.php?viauser=<?php echo $usn?>&&name=<?php echo $name ?>" id="pagebutton">Edit Profile</a><a href="deleteprof.php?viauser=<?php echo $usn ?>&&name=<?php echo $name ?>" id="pagebutton">Delete Account</a>
<br><br>
<center>
<h2>Posts</h2><hr id="menuhr"><br>
<?php
$query3="select * from items where postedby='".$usn."'order by item_id desc;";
$res3=mysql_query($query3);
while ($row3=mysql_fetch_assoc($res3)) {
echo "<a href='viewpost.php?postid=".$row3['item_id']."&&cate=All items' id='pagebuttonl'>".$row3['itemname']."</a>";
}
?>
<br>
<?php include('footer.php'); ?>