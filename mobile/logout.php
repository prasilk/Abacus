<html>
<head>
<title>Abacus&#8482 Login</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>
<body>
<?php require 'top.php'; ?>
<div id="boxer">
 <div id="omnibar"><a href="index.php" id="omnilink">Homepage</a> &gt; <a href="loginpage.php" id="omnilink">Login</a> &gt <text id="omnilink">Process </text></div>
<center>
<?php 
unset($_SESSION['usn']);
unset($_SESSION['password']);
?>
<br>You're now logged out.<br><br>

Reload page to refresh changes. <br><br><br><a href="index.php" id="pagebutton">Reload</a>
<br><br>
<?php
include 'footer.php';
?>