<head>
<title>Abacus&#8482 Moderator Panel</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>
<body>
<?php include("top.php"); ?>
<div id="boxer">
<div id="omnibar"><a href="index.php" id="omnilink">Abacus Homepage</a> &gt; Moderator Panel <br></div>

<h2>Moderator Panel</h2>
<form action="mod_verify.php" method="POST" enctype="multipart/formdata">
<h3>Verify User</h3><br>
USN number <input id="registerinput" name="usn" autocomplete="off"> <br><br>
Mod Passwd <input id="registerinput" name="pass" type="password"> <br><br>
<input type="submit" value="Verify this user" id="menuitem"> <br>
</form>
<?php include('footer.php'); ?>