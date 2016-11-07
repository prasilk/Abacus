<html>
<head>
<title>Abacus&#8482 Verified Users</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include("top.php"); ?>
<div id="boxer">
<div id="omnibar">
<a href="index.php" id="omnilink">Abacus Homepage</a> &gt;<text id="omnilink"> Verified users </text></div>

<?php
include 'login.php';
$query="select * from users where verified='y'";
$res=mysql_query($query);
$count=0;
while ($row=mysql_fetch_assoc($res)) {
$usernametoshow=$row['name'];
$count=$count+1;
}
?>

<h2>Verified users [ Total : <?php echo $count ?> ] </h2>

<?php
include 'login.php';
$query="select * from users where verified='y'";
$res=mysql_query($query);
$count=0;
while ($row=mysql_fetch_assoc($res)) {
$usernametoshow=$row['name'];
$imagelink=$row['imagelink'];

if ($imagelink==NULL) { $imagelink='default.png'; }

echo "<div id='iconp'><a href='viewuser.php?usn=".$row['usn']."'><img src='profilepics/thumb/".$imagelink."' id='profilepic'></a>"."<br>".$usernametoshow."</div>";
$count=$count+1;
}
?>

<br>
<?php require 'footer.php'; ?>
