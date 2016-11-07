<html>
<head>
<title>Abacus&#8482 Buy - Viewpost</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>
<?php
$item_id=$_GET['postid'];
$cate=$_GET['cate'];
include 'login.php';
$query="select * from items where item_id=".$item_id.";";
$res=mysql_query($query);
while ($row=mysql_fetch_assoc($res)) {
$itemname=$row['itemname'];
$category=$row['category'];
$description=$row['description'];
$edited=$row['edited'];
$price=$row['price'];
$postedby=$row['postedby'];
$date=$row['dateposted'];
$sold=$row['sold'];
}

?>
<body>
<?php include("top.php"); ?>
<div id="boxer">
<div id="omnibar">
<a href="index.php" id="omnilink">Abacus Homepage</a> &gt; 
<?php
if ($cate=='Books/Notes') { ?><a href="buybooks.php" id="omnilink">Buy (<?php echo $cate; ?>)</a> &gt; <?php echo $itemname?> <?php } ?>
<?php
if ($cate=='All items') { ?><a href="buyall.php" id="omnilink">Buy (<?php echo $cate; ?>)</a> &gt; <?php echo $itemname?> <?php } ?>
<?php
if ($cate=='Cell Phone') { ?><a href="buyphone.php" id="omnilink">Buy (<?php echo $cate; ?>)</a> &gt; <?php echo $itemname?> <?php } ?>
<?php
if ($cate=='Computer') { ?><a href="buycomputer.php" id="omnilink">Buy (<?php echo $cate; ?>)</a> &gt; <?php echo $itemname?> <?php } ?>
<?php
if ($cate=='Accessory') { ?><a href="buyaccessory.php" id="omnilink">Buy (<?php echo $cate; ?>)</a> &gt; <?php echo $itemname?> <?php } ?>
<?php
if ($cate=='Misc') { ?><a href="buymisc.php" id="omnilink">Buy (<?php echo $cate; ?>)</a> &gt; <?php echo $itemname?> <?php } ?>
<?php
if ($cate=='Free') { ?><a href="freezone.php" id="omnilink">Buy (<?php echo $cate; ?>)</a> &gt; <?php echo $itemname?> <?php } ?>

<?php
if ($cate=='unverified') { ?><a href="unverified.php" id="omnilink">Buy (<?php echo $cate; ?>)</a> &gt; <?php echo $itemname?> <?php } ?>
</div>
<h2><?php echo $itemname; if ($sold=='y') {
echo " <text id='soldbox'>SOLD </text>";
}?></h2>
<?php
echo "<b>Price : </b>Rs. ".$price;
echo "<br><b>Posted on : </b>".$date;
echo "<br><b>Category : </b> ".$category;
echo "<br><b>Description : </b> ".$description;

if ($edited!="") {
echo "<br><b>Edit : </b> ".$edited;
}//only printed if edited information exists

?>
<br><br>
<a href="editpost.php?postid=<?php echo $item_id; ?>&&cate=<?php echo $cate; ?>&&name=<?php echo $itemname; ?>" id="pagebutton">Edit Post</a><a href="deletepost.php?postid=<?php echo $item_id ?>&&cate=<?php echo $cate ?>&&usn=<?php echo $postedby ?>" id="pagebutton">Delete Post</a><a href="marksold.php?postid=<?php echo $item_id ?>&&cate=<?php echo $cate ?>&&usn=<?php echo $postedby ?>" id="pagebutton">Mark as sold</a>
<br><br>
<hr>
<h4>Seller details</h4>
<?php
$query2="select * from users where usn='".$postedby."';";
$res2=mysql_query($query2);
while ($row2=mysql_fetch_assoc($res2)) {
$name=$row2['name'];
$phone=$row2['phone'];
$email=$row2['email'];
$address=$row2['address'];
$gender=$row2['gender'];
$otherinfo=$row2['otherinfo'];
$usn=$row2['usn'];
}
echo "<b>Name : </b>".$name;
echo "<br><b>Phone : </b>".$phone;
echo "<br><b>E-Mail : </b>".$email;
echo "<br><b>Address : </b>".$address;
echo "<br><b>Gender : </b>".$gender;
echo "<br><b>Otherinfo : </b>".$otherinfo;
echo "<br><b>USN : </b>".$usn;
?>
<br><br><a href="viewuser.php?usn=<?php echo $usn;?>" id="pagebutton">View complete profile</a>
<?php include('footer.php'); ?>
</div>


