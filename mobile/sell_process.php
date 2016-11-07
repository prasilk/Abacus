<html>
<head>
<title>Abacus&#8482 Sell - Process</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include 'top.php'; ?>
<div id="boxer"><div id="omnibar">
<a href="index.php" id="omnilink">Abacus Homepage</a> &gt; <a href="sell.php?itemname=&&category=&&itemdesc=&&price=" id="omnilink">Sell your item</a> &gt; Process </div>
<br><br><b>Log:</b><br><br>
<?php
//flag
$flag=0;
$usncheck=0;
$passcheck=0;

//fetching guys from POST
$itemname=$_POST['itemname'];
$category=$_POST['category'];
$itemdesc=$_POST['itemdesc'];
$price=$_POST['price'];
$usn=$_POST['usn'];
$password=$_POST['password'];

echo "Data received.<br>";

include 'login.php';

//now a little sanitization for newones ;)
$itemname = mysql_real_escape_string($itemname);
$category = mysql_real_escape_string($category);
$itemdesc = mysql_real_escape_string($itemdesc);
$price = mysql_real_escape_string($price);
$usn = mysql_real_escape_string($usn);
$password = mysql_real_escape_string($password);

//strip before you enter the mansion
$itemname = strip_tags($itemname);
$category = strip_tags($category);
$itemdesc = strip_tags($itemdesc);
$price = strip_tags($price);
$usn = strip_tags($usn);
$password = strip_tags($password);

//w-wait the usn is supposed to be capitalized
$usn = strtoupper($usn);

//phew.. low let's build the connection to the heaven
$connection=mysql_connect("localhost","prasilkoirala","Helloworld9898");
$selection=mysql_select_db("abacus");
echo"Connected to the database.";

//let's check if anything is empty
if (($itemname=="") OR ($itemdesc=="") OR ($price=="") OR ($usn=="") OR ($password=="")) {
echo "<br>ERROR - One or more fields left blank, don't do that again.";
echo "<br><br><a href='sell.php?itemname=".$itemname."&&category=".$category."&&itemdesc=".$itemdesc."&&price=".$price."' id='pagebutton'>Got it</a><a href='index.php' id='pagebutton'>I don't want to sell right now.</a>";
$flag=1; //error flag. Everything beneath will get skipped
}

//next process would be to check if the USN is correct
if ($flag==0) {
$query="select * from users";
$res=mysql_query($query);
while ($row=mysql_fetch_assoc($res)) {
$usnavailable=$row['usn'];
if ($usn==$usnavailable) {
echo "<br>Given USN exists in the database. That is good.";
$usncheck=1;
}
}
if ($usncheck==0) {
echo "<br>ERROR - Given USN ".$usn." does not exist in the database.";
echo "<br><br><a href='sell.php?itemname=".$itemname."&&category=".$category."&&itemdesc=".$itemdesc."&&price=".$price."' id='pagebutton'>Try again one more time</a><a href='index.php' id='pagebutton'>Forget about it.</a>";
$flag=1;
}
}//end if at start

//next process is checking if the password entered is correct
if ($flag==0) {
$query2="select * from users where usn='".$usn."';";
$res2=mysql_query($query2);
while ($row=mysql_fetch_assoc($res2)) {
$passwordact=$row['password'];
if ($password==$passwordact) {
echo "<br>Password entered is correct.";
$passcheck=1;
}
}
if ($passcheck==0) {
echo "<br>ERROR - The password you entered for this USN is incorrect.";
echo "<br><br><a href='sell.php?itemname=".$itemname."&&category=".$category."&&itemdesc=".$itemdesc."&&price=".$price."'>Try again one more time</a> | <a href='index.php'>Forget about it.</a>";
$flag=1;
}
}//end of flag at start

//now let's get to the business
if ($flag==0) {
$query2="select * from users where usn='".$usn."';";
$res2=mysql_query($query2);
while ($row=mysql_fetch_assoc($res2)) {
$nameofuser=$row['name'];
$test=$row['verified'];
}
$queryz="insert into items (itemname,category,description,price,postedby,postedby_name,dateposted,usn_verified) values ('$itemname','$category','$itemdesc','$price','$usn','$nameofuser',NOW(),'$test')";
$resz=mysql_query($queryz);
echo "<br><h4>Your post was posted successfully!</h4>";
echo "<br><br><a href='sell.php?itemname=&&category=&&itemdesc=&&price=' id='pagebutton'>Sell another</a><a href='index.php' id='pagebutton'>Go to Homepage</a>";
}
?>
<?php include('footer.php'); ?>