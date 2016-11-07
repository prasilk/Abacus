<html>
<head>
<title>Abacus&#8482 - Change Password</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php
$usn=$_GET['viauser'];
include 'login.php';
$query="select * from users  WHERE usn='".$usn."'";
$res=mysql_query($query);
while ($row=mysql_fetch_assoc($res)) {
$username = $row['name'];
$password = $row['password'];
}
?>
<?php include 'top.php'; ?>
<div id="boxer">
 <div id="omnibar"><a href="index.php" id="omnilink">Abacus Homepage</a> &gt; <a href="viewuser.php?usn=<?php echo $usn ?>" id="omnilink">View Profile</a> &gt;<text id="omnilink"> Change Password </text></div>


<h2>Change Password</h2>

<form action="updatepassword.php" method="POST" enctype="multipart/formdata">
<table>
<tr>
<td>Old Password </td><td><input type="password" name="oldpassword" id="registerinput"> </td></tr>
<tr>
<td>New Password </td><td><input type="password" name="newpassword" id="registerinput"> </td></tr>
<td>Retype New Password </td><td><input type="password" name="renewpassword" id="registerinput"> </td></tr></table>
<br>
<input type="submit" value="Change Password" id="pagebutton"><a href="viewuser.php?usn=<?php echo $usn ?>" id="pagebutton">Cancel</a>
<br>
<input type="hidden" name="viauser" value="<?php echo $usn; ?>">
</form>

<?php include 'footer.php'; ?>
