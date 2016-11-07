<html>
<head>
<title>Abacus&#8482 Giveaway for free</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include 'top.php'; ?>
<div id="boxer"> <div id="omnibar">
<a href="index.php" id="omnilink">Abacus Homepage</a> &gt; Giveaway for Free </div>
<h2>Giveaway for Free</h2>
<form action="sell_process.php" method="POST" enctype="multipart/formdata">
<table>
<tr>
<td>Giveaway what? </td><td><input id="registerinput" name="itemname" autocomplete="off"></td>
</tr>
<tr>
<td>Describe your item </td><td><textarea name="itemdesc" id="otherinfo"></textarea> </td>
</tr>
</table><br>
<hr>
<h3>Login </h3><br>
<table>
<tr><td>USN</td><td><input name="usn" autocomplete="off" id="registerinput"
<?php
if (isset($usn)) {
	echo "value='".$usn."' >";
} else {
	echo ">";
} ?>
</td>
<tr><td>Password</td><td><input type="password" name="password" id="registerinput"
<?php
if (isset($password)) {
	echo "value='".$password."' >";
} else {
	echo ">";
} ?>
</td>
</table><br>You have a kind soul, dear. :)<br><br>
<input type="hidden" name="price" value="0"><input type="hidden" name="category" value="Free">
<input type="submit" value="Giveaway!" id="menuitem"> <input type="reset" value="Start over" id="menuitem"> </form>
<br>
<div id="desczone"><center>
Abacus alpha v2.3, 2014 <br>
Prasil Koirala </center></div>
<br><br>