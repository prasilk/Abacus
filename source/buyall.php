<html>
<head>
<title>Abacus&#8482 Buy - View all</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include("top.php"); ?>
<div id="boxer">
<div id="omnibar">
<a href="index.php" id="omnilink">Abacus Homepage</a> &gt; <text id="omnilink"> Buy (All items) </text></div>

<?php include("buyleft.php"); ?>

<h2>Browse all items</h2>


<div id="listbox">
<?php
$count=1;
include 'login.php';
$query="select * from items where usn_verified='y' order by item_id desc";
$res=mysql_query($query);
while ($row=mysql_fetch_assoc($res)) {
echo "<text id='countbox'>".$count."</text><text id='datebox'>".$row['dateposted']."</text> <a href='viewpost.php?postid=".$row['item_id']."&&cate=All items' id='buylist'>".$row['itemname']."</a>";
if ($row['imagelink']!="") {
echo "<text id='imagebox'>IMAGE</text>";
}
echo " by ".$row['postedby_name']." for <b>Rs. ".$row['price']."</b> [ ".$row['category']." ]";


if ($row['sold']=='y') {
echo " <text id='soldbox'>SOLD </text>";
}


echo "<hr>";
$count=$count+1;
}
echo "END OF LIST";
?>
<?php include('footer.php'); ?>
</div>
</div>

