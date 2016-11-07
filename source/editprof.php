
<html>
<head>
<title>Abacus&#8482 - Edit Profile</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include("top.php");

$name=$_GET['name'];
$usn=$_GET['viauser'];

include 'login.php';
$query="select * from users  WHERE usn='".$usn."'";
$res=mysql_query($query);
while ($row=mysql_fetch_assoc($res)) {
$username = $row['name'];
$phone = $row['phone'];
$email = $row['email'];
$address = $row['address'];
$gender = $row['gender'];
$otherinfo = $row['otherinfo'];
}
?>
<div id="boxer">
 <div id="omnibar"><a href="index.php" id="omnilink">Abacus Homepage</a> &gt; <a href="viewuser.php?usn=<?php echo $usn ?>" id="omnilink"><?php echo $name; ?></a> &gt;<text id="omnilink"> Edit Profile </text></div>

<center>
<h2>Edit Profile</h2>

<?php
include('login.php');
?>

<form action="updateprocess.php" method="POST" enctype="multipart/form-data">
<div id="otherinfobox">
<div id="basicinfo">
<table>
<tr>
<td>Username </td><td><input id="registerinput" name="username" autocomplete="off" value="<?php echo $username ?>"> </td>
</tr>
<tr>
<td>Cellphone # </td><td><input id="registerinput" name="phone" autocomplete="off" value="<?php echo $phone ?>"> </td>
</tr>
<tr>
<td>E-mail </td><td><input id="registerinput" name="email" autocomplete="off" value="<?php echo $email ?>"> </td>
</tr>
<tr>
<td>Current Address </td><td><input id="registerinput" name="address" autocomplete="off" value="<?php echo $address ?>"> </td>
</tr>
<tr>
<td>You're a </td><td><input type="radio" name="gender" autocomplete="off" value="boy" <?php if($gender=='boy') { echo "checked='checked'"; }?>> Boy
<input type="radio" name="gender" autocomplete="off" value="girl" <?php if($gender=='girl') { echo "checked='checked'"; } ?>> Girl</td>
</tr>
</table></div>
Other Info (Optional) <br>
<textarea name="otherinfo" id="otherinfo" value="<?php echo $otherinfo ?>"><?php echo $otherinfo ?></textarea> </div><br>

<br><input type="hidden" name="usn" value="<?php echo $usn; ?>"> 

Enter current Password <input type="password" name="password" id="registerinput" <?php
if (isset($password)) {
	echo "value='".$password."' >";
} else {
	echo ">";
} ?>
<br><br>
New Profile Picture <input type="file" name="image" id="pagebutton">
<br><br>
<input type="submit" name="submit" value="Update Profile" id="pagebutton"> <a href="viewuser.php?usn=<?php echo $usn ?>" id="pagebutton">Cancel and Return to Profile</a> </form>

You can't change your username while you're already signed in. If you want to change your username, logout and then change entering Password manually. This might sound subtle but we have no other choice. We'll fix this issue soon but for now, sorry for the hassle - how often do you change your username anyway? :)<br><br>
USN cannot be changed - duh!. To change your password, click here : <a href="changepassword.php?viauser=<?php echo $usn; ?>" id="pagebutton">Change Password</a>

<br>
<?php include('footer.php'); ?>
