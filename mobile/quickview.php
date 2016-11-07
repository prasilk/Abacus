<html>
<head>
<title>Abacus&#8482 Buy - Quickview</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>
<?php
$postid=$_GET['postid'];
include 'login.php';
$query="select * from items where item_id=".$postid.";";
$res=mysql_query($query);
while ($row=mysql_fetch_assoc($res)) {
$itemname=$row['itemname'];
$category=$row['category'];
$description=$row['description'];
$price=$row['price'];
$postedby=$row['postedby'];
$date=$row['dateposted'];
}

?>
<body>
<?php include 'top.php' ?>
<div id="boxer"> <div id="omnibar">
&lt; <a href="viewuser.php?usn=<?php echo $postedby ?>" id="omnilink"> Back</a> </div>

<h2><?php echo $itemname?></h2>
<?php
echo "<b>Price : </b>Rs. ".$price;
echo "<br><b>Posted on : </b>".$date;
echo "<br><b>Category : </b> ".$category;
echo "<br><b>Description : </b> ".$description;
?>
<br><br><a href="#" id="pagebutton">Delete Post</a><a href="#" id="pagebutton">Mark as sold</a> (Button scripts under construction, delete/Mark Sold from the buy list, for now.)
<?php include('footer.php'); ?>
