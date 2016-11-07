<?php
$username=$_GET['username'];
$phone=$_GET['phone'];
$email=$_GET['email'];
$address=$_GET['address'];
$otherinfo=$_GET['otherinfo'];
?>

<html>
<head>
<title>Register for Abacus</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include("top.php"); ?>
<div id="boxer"> 
<div id="omnibar">
<a href="index.php" id="omnilink">Abacus Homepage</a> &gt; <text id="omnilink">Register </text></div>
<center>
<h2>Register for Abacus </h2>
<form action="newaccount_process.php" method="POST" enctype="multipart/form-data">
<div id="otherinfobox">
<div id="basicinfo">
<table>
<tr>
<td>Username </td><td><input id="registerinput" name="username" autocomplete="off" value="<?php echo $username ?>" autofocus="autofocus"> </td>
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
<td>You're a </td><td><input type="radio" name="gender" autocomplete="off" value="boy" checked="checked"> Boy
<input type="radio" name="gender" autocomplete="off" value="girl"> Girl</td>
</tr>
</table></div>
Other Info (Optional)<br>
<textarea name="otherinfo" id="otherinfo" value="<?php echo $otherinfo ?>"><?php echo $otherinfo ?></textarea>
</div><br><br>
Profile Picture <input type="file" name="image" id="pagebutton"> (Optional / Can add later)
<h4>Enter your USN number and password<br>
# Caution : USN once saved cannot be changed. So double-check your USN before submitting. </h4>
<table>
<tr>
<td>Full USN </td> <td><input id="registerinput" name="usn" autocomplete="off">
&nbsp;&nbsp; Password <input type="password" id="registerinput" name="password" autocomplete="off"> &nbsp;&nbsp; Re-type Password <input type="password" id="registerinput" name="repassword" autocomplete="off"></td></tr>
</table><br><hr><table>
<tr><td>CAPTCHA Code </td><td> 
<?php
$_SESSION['secure'] = rand(1000,9999);
$rand=$_SESSION['secure'];
?>

<img src="captcha.php" /> No captcha? <a href="newaccount.php?username=&&phone=&&email=&&address=&&otherinfo=" id="pagebutton">Refresh</a>
</td></tr>
<tr><td>
Enter CAPTCHA Code </td><td><input type="text" id="registerinput" name="humantest" autocomplete="off"></td>
</table><hr>
<br>
<input type="hidden" name="actual" value="<?php echo $rand; ?>">
<input type="submit" value="Register" id="pagebutton">
<input type="reset" value="Start over" id="pagebutton">
</form><br>
By clicking register, we acknowledge that you have accepted Abacus <a href="terms.php">Terms & Privacy Policy.</a>

<br><br>
<div id="desczone"><center>
Abacus alpha v2.3, 2014 <br>
Prasil Koirala </center></div>
<br><br>