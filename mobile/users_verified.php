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

<h2>Verified users' list</h2>
<?php
include 'login.php';
$query="select * from users where verified='y'";
$res=mysql_query($query);
$count=0;
while ($row=mysql_fetch_assoc($res)) {
$usernametoshow=$row['name'];
echo "<a href='viewuser.php?usn=".$row['usn']."' class='membergrid'>".$usernametoshow."</a>";
$count=$count+1;
}
?>
<div id="showcount">[ Total : <?php echo $count ?> users ]</div>
