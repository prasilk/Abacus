
<html>
<head>
<title>Abacus&#8482 - Delete Account</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include("top.php"); ?>
<?php
$name=$_GET['name'];
$usn=$_GET['viauser'];

include 'login.php';
$query="select * from users  WHERE usn='".$usn."'";
$res=mysql_query($query);
while ($row=mysql_fetch_assoc($res)) {
$username = $row['name'];
$password = $row['password'];
}
?>
<div id="boxer">
 <div id="omnibar"><a href="index.php" id="omnilink">Abacus Homepage</a> &gt; <a href="viewuser.php?usn=<?php echo $usn ?>" id="omnilink"><?php echo $name; ?></a> &gt;<text id="omnilink"> Delete Account </text></div>


<h2>Delete Account</h2>
Deleting your Account deletes all your data from the Abacus Server.<br>
Your USN will be free and you can create again later - if you would want to. <br>
This is one-time and after deletion your Account-data cannot be recovered.<br><br>

Are you sure? Enter your password to confirm. <br><br>
<form action="deleteprofprocess.php" method="POST" enctype="multipart/formdata">

<input type="hidden" name="usn" value="<?php echo $usn; ?>">

Password <input type="password" name="password" id="registerinput"><br><br>

<input type="submit" value="Delete Account" id="pagebutton">
</form>
<?php include 'footer.php'; ?>


