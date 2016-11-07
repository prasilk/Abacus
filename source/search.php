
<html>
<head>
<title>Abacus Search</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include("top.php"); ?>
<div id="boxer"> 
<div id="omnibar">
<a href="index.php" id="omnilink">Abacus Homepage</a> &gt; <text id="omnilink" /> Search </text></div>
<center>
<h2>Abacus&#8482 Search</h2>
Search for Abacus Community or items. Enter the search keyword

<form action="search.php" method="POST" enctype="multipart/form-data"><br>
<input type="text" name="searchterm" id="searchbox" autocomplete="off" autofocus="autofocus"><br><br>
<input type="submit" id="pagebutton" value="Search">
<input type="reset" id="pagebutton" value="Clear">

</center>

<?php

$itemcount=1;
$peoplecount=1;

if ((isset($_POST['searchterm'])) AND ($_POST['searchterm']!="")) {
	$term=$_POST['searchterm'];
	
	$term = mysql_real_escape_string($term);
	$term = strip_tags($term);
	$term = strtoupper($term);
	
	echo "Showing results for - '".$term."'<hr id='menuhr'>";
	
	require 'login.php';
	$query="select * from items where itemname LIKE '%".$term."%';";
	$res=mysql_query($query);
	echo "<div id='searchitem'><h2>Items</h2>";
	while ($row=mysql_fetch_assoc($res)) {
	
		$datenew=date_format(date_create($row['dateposted']), 'Y-m-d');
		
		echo "<text id='countbox'>".$itemcount."</text><text id='datebox'>".$datenew."</text> <a href='viewpost.php?postid=".$row['item_id']."&&cate=All items' id='buylist' target='_blank'>".$row['itemname']."</a>";
		if ($row['imagelink']!="") {
			echo "<text id='imagebox'>IMAGE</text>";
		}
	
		echo " for <b>Rs. ".$row['price']."</b>";

		if ($row['sold']=='y') {
			echo " <text id='soldbox'>SOLD </text>";
		}
		echo "<hr>";
		$itemcount=$itemcount+1;
	}
	echo "</div>";
	
	echo "<div id='searchpeople'><h2>People</h2>";
	$queryz="select * from users where name LIKE '%".$term."%';";
	$resz=mysql_query($queryz);
	$countz=0;
	while ($rowz=mysql_fetch_assoc($resz)) {
	$usernametoshow=$rowz['name'];
	$imagelink=$rowz['imagelink'];

	if ($imagelink==NULL) { $imagelink='default.png'; }

	echo "<div id='iconp'><a href='viewuser.php?usn=".$rowz['usn']."' target='_blank'><img src='profilepics/thumb/".$imagelink."' id='profilepic'></a>"."<br>".$usernametoshow."</div>";
	$countz=$countz+1;

	}//end while
}//end if
