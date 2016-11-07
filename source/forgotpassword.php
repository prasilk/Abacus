<html>
<head>
<title>Abacus&#8482 Recover password</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include 'top.php'; ?>
<div id="boxer"> <div id="omnibar">
<a href="index.php" id="omnilink">Homepage</a> &gt; <a href="loginpage.php?usn=" id="omnilink">Login</a> &gt; <text id="omnilink">Password recovery</text></div>
<center>
<h2>Recover your password </h2>
Password will be sent to your E-Mail mailbox for recovery. <br><br>
<form action="recoverprocess.php" method="POST" enctype="multipart/formdata">
Enter your USN number <br>
<input type="text" name="usn" id="registerinput" autocomplete="off">
<br><br>
CAPTCHA Code <br>
 <?php
$rand=rand(1000,9999);
echo $rand;
?>
<br><br>
Enter CAPTCHA Code <br>
<input type="hidden" name="actual" value="<?php echo $rand; ?>">
<input type="text" id="registerinput" name="humantest" autocomplete="off">
<br><br>

<input type="submit" id="pagebutton" value="Recover Password"><a href="loginpage.php?usn=" id="pagebutton">Cancel and return</a>
<?php include 'footer.php'; ?>
</form>