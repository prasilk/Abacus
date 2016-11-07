<html>
<head>
<title>Abacus&#8482 Buy - View Computers</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body><?php include("top.php"); ?>
<div id="boxer"><div id="omnibar">
<a href="index.php" id="omnilink">Abacus Homepage</a> &gt; Buy (Computer) </div>

<?php include("buyleft.php"); ?>
<h2>Browse Computer</h2>
<?php
$count=1;
$connection=mysql_connect("localhost","root","");
$selection=mysql_select_db("abacus");
$query="select * from items WHERE (usn_verified='y' AND category='Computer') order by item_id desc";
$res=mysql_query($query);
while ($row=mysql_fetch_assoc($res)) {
echo "<text id='countbox'>".$count."</text><text id='datebox'>".$row['dateposted']."</text> <a href='viewpost.php?postid=".$row['item_id']."&&cate=Computer' id='buylist'>".$row['itemname']."</a>";
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