<?php
//this deletes all the posts that are older than 21 days
$connection=mysql_connect("localhost","prasilkoirala","Helloworld9898");
$selection=mysql_select_db("abacus");
$quarry="DELETE FROM items WHERE dateposted < NOW() - INTERVAL 45 DAY";
$rere=mysql_query($quarry);
?>

<html>
<head>
<title>Abacus&#8482 for NHCE</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include("top.php"); ?>
<div id="omnibar"><center>AbacusProject was started with the intention of providing an extension to your college life. We do this by giving you a platform where we have deployed features that can be accessed by anyone, any-time and anywhere. This website just happens to be what we believe - the most effective medium for it. It helps you sell your riffed/redundant items via web-portal. In addition to that, you can explore numerous applications on AbacusApps developed by the Abacus Community. Abacus is free and is for everyone, so help it grow by telling your friends about it. Good Day. <i>- Prasil Koirala (Developer and Project Leader)</i></center></div>
<div id="boxer">
<div id="centerto">
<br><div id="menubox"><center>
<text id="menutext">Main </text><hr>
<a href="apps.php" id="asda"><img src="apps.png" id="mainimg"><br>AbacusApps</a><hr>
<a href="news.php" id="asda"><img src="news.png" id="mainimg"><br>News</a><hr>
<a href="verifyaccount.php" id="asda"><img src="question.png" id="mainimg"><br>Why Join</a><hr>
<a href="help.php" id="asda"><img src="help.png" id="mainimg"><br>Help</a>
</center>
</div>


<center><text id="menutext">Browse</text></center><hr id="menuhr">
<table>
<tr>
<td><a href="buyall.php" id="asda"><img src="all.png" id="mainimg"><br>Everything</a></td>
<td><a href="buybooks.php" id="asda"><img src="books.png" id="mainimg"><br>Books</a></td>
<td><a href="buyphone.php" id="asda"><img src="phone.png" id="mainimg"><br>Cellphones</a></td>
<td><a href="buycomputer.php" id="asda"><img src="computer.png" id="mainimg"><br>Computers</a></td>
<td><a href="buyaccessory.php" id="asda"><img src="guitar.png" id="mainimg"><br>Accessories</a></td>
<td><a href="buymisc.php" id="asda"><img src="misc.png" id="mainimg"><br>Misc</a></td>
<td><a href="freezone.php" id="asda"><img src="free.png" id="mainimg"><br>FREE</a> </td>
<td><a href="unverified.php" id="asda"><img src="unv.png" id="mainimg"><br>Unverified posts</a></td> 
<br></tr></table>

<br>
<div id="menubox_sell"><center>
<text id="menutext">Sell</text><br><br>
<a href="sell.php?itemname=&&category=&&itemdesc=&&price=" id="asda"><img src="sell.png" id="mainimg"><br>Sell</a><hr>
<a href="sellfree.php" id="asda"><img src="givefree.png" id="mainimg"><br>Free Giveaway</a>
</div>

<div id="bigdiv">
<text id="menutext">Community</text>
<table>
<tr>
<td><a href="users_verified.php" id="asda"><img src="vuser.png" id="mainimg"><br>Verified</a></td>
<td><a href="users_unverified.php" id="asda"><img src="uuser.png" id="mainimg"><br>Unverified</a></td>
<td><a href="team.php" id="asda"><img src="team.png" id="mainimg"><br>Mods</a></td>
<td><a href="http://www.reddit.com/r/abacusproject" id="asda"><img src="web.png" id="mainimg"><br>Reddit</a></td>
<td><a href="http://www.facebook.com/abacusproject" id="asda"><img src="web.png" id="mainimg"><br>Facebook</a></td>
<br></tr></table>

<br>
<text id="menutext">Goodies</text>
<table>
<tr>
<td><a href="myinfo.php" id="asda"><img src="me.png" id="mainimg"><br>More info</a> </td>
<td><a href="getinvolved.php" id="asda"><img src="involved.png" id="mainimg"><br>Get involved</a> </td>
<td><a href="fsf.pdf" id="asda"><img src="fsf.png" id="mainimg"><br>FSF Book</a> </td>
<td><a href="mod.php" id="asda"><img src="mod.png" id="mainimg"><br>Mod Panel</a> </td>
<td><a href="mod.php" id="asda"><img src="tux.png" id="mainimg"><br>Source Code</a> </td>
</td></tr>
</table>
</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?>
</div>
</body>

</html>