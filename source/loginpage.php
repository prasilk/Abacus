<html>
<head>
<title>Abacus&#8482 Login</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>
<body>
<?php require 'top.php'; ?>
<div id="boxer">
 <div id="omnibar"><a href="index.php" id="omnilink">Homepage</a> &gt; <text id="omnilink">Login</text></div>
<center>
<h2>Abacus user-login</h2>
<form action="loginprocess.php" method="POST" enctype="multipart/formdata">
USN <br> <input type="text" name="usn" id="registerinput" autocomplete="off" autofocus="autofocus"> <br><br>

Password <br> <input type="password" name="password" id="registerinput"> <br><br>

<input type="submit" value="Login" id="pagebutton">
 <br><br> <hr id="menuhr"> <br>
Forgot your password? No problem, click here <a href="forgotpassword.php" id="pagebutton">Recover Password</a> <br><br>

Login is optional. The advantage of logging in and using Abacus is that you won't have to enter your USN and password over and over again. Login autofills your USN and/or Password whenever it is necessary. To prevent misuse, make sure that you logout after using Abacus. Login is not recommended while using public computers like Library Computers. This module right now is experimental and might contain bugs. You can report the bugs at abacusnhce@hotmail.com. <br>

<?php include 'footer.php'; ?>
</form>