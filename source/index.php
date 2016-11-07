<?php
//this deletes all the posts that are older than 21 days
$connection=mysql_connect("localhost","root","");
$selection=mysql_select_db("abacus");
$quarry="DELETE FROM items WHERE dateposted < NOW() - INTERVAL 45 DAY";
$rere=mysql_query($quarry);
?>

<html>
<head>
<title>Abacus&#8482</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include("top.php"); ?>
<div id="boxer">
<div id="omnibar"><center>Abacus helps you create a marketplace for your University. </center></div><br>


<div id="icon_box">
<div id="icon"><a href="buyall.php" id="asda"><img src="all.png" id="mainimg"><br>Everything</a></div>
<div id="icon"><a href="buybooks.php" id="asda"><img src="books.png" id="mainimg"><br>Books</a></div>
<div id="icon"><a href="buyphone.php" id="asda"><img src="phone.png" id="mainimg"><br>Cellphones</a></div>
<div id="icon"><a href="buycomputer.php" id="asda"><img src="computer.png" id="mainimg"><br>Computers</a></div>
<div id="icon"><a href="buyaccessory.php" id="asda"><img src="guitar.png" id="mainimg"><br>Accessories</a></div>
<div id="icon"><a href="buymisc.php" id="asda"><img src="misc.png" id="mainimg"><br>Misc</a></div>
<div id="icon"><a href="freezone.php" id="asda"><img src="free.png" id="mainimg"><br>FREE</a></div>
<div id="icon"><a href="unverified.php" id="asda"><img src="unv.png" id="mainimg"><br>Unverified posts</a></div>
<div id="icon"><a href="sell.php?itemname=&&category=&&itemdesc=&&price=" id="asda"><img src="sell.png" id="mainimg"><br>Sell</a></div>
<div id="icon"><a href="sellfree.php" id="asda"><img src="givefree.png" id="mainimg"><br>Free Giveaway</a></div>
<div id="icon"><a href="users_verified.php" id="asda"><img src="vuser.png" id="mainimg"><br>Verified</div>
<div id="icon"><a href="users_unverified.php" id="asda"><img src="uuser.png" id="mainimg"><br>Unverified</a></div>

<div id="icon"><a href="#" id="asda" target="_blank"><img src="facebook.png" id="mainimg"><br>Facebook Page</a></div>
<div id="icon"><a href="myinfo.php" id="asda"><img src="me.png" id="mainimg"><br>More info</a></div>
<div id="icon"><a href="mod.php" id="asda"><img src="mod.png" id="mainimg"><br>Mod Panel</a></div>
<div id="icon"><a href="news.php" id="asda"><img src="news.png" id="mainimg"><br>News</a></div>
<div id="icon"><a href="search.php" id="asda"><img src="search.png" id="mainimg"><br>Search</a></div>
 <br>
</div>

</div>
</body>

</html>