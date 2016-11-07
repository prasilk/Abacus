<html>
<head>
<title>Abacus&#8482 Unverified Users</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include 'top.php'; ?>
<div id="boxer"><div id="omnibar">
<a href="index.php" id="omnilink">Abacus Homepage</a> &gt; Unverified users </div>
<h2>Unverified Users</h2>
<?php
include 'login.php';
$query="select * from users where verified='n'";
$res=mysql_query($query);
$count=0;
while ($row=mysql_fetch_assoc($res)) {
$usernametoshow=$row['name'];
echo "<a href='viewuser.php?usn=".$row['usn']."' class='membergrid'>".$usernametoshow."</a>";
$count=$count+1;
}
?>
<div id="showcount">[ Total : <?php echo $count ?> users ]</div>
