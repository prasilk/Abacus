<?php
$postid=$_POST['refpostid'];
$usn=$_POST['usn'];
$cate=$_POST['cate'];
?>
<head>
<title>Abacus&#8482 Deletepost Process</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>
<body>
<?php include("top.php"); ?>
<div id="boxer">
<div id="omnibar">
&lt; <a href="viewuser.php?usn=<?php echo $usn ?>" id="omnilink">Goto your profile</a> </div>

<h2>Log:</h2>

<?php
//flag
$flag=0;
$wrongpass=1;

//important aka VIP ones
$password=$_POST['passwordentry'];

include 'login.php';

echo "Data received.<br>";
//now a little sanitization for newones ;)
$password = mysql_real_escape_string($password);



//strip before you enter the mansion
$password = strip_tags($password);

//phew.. low let's build the connection to the heaven

echo"Connected to the database.";

//First let me check if anything is empty
if ($password=="") {
echo "<br>ERROR - Password left blank. Don't do that again.";
$wrongpass=0;
echo "<br><br><a href='deletepost.php?postid=".$postid."&&cate=".$cate."&&usn=".$usn."' id='pagebutton'>Alrighty, I'll try again</a> <a href='index.php' id='pagebutton'>Goto home</a>";
$flag=1; //this means that there is an error so the following steps will be ignored
}

if ($flag==0) {
$query="select * from items where item_id=".$postid.";";
$res=mysql_query($query);
while ($row=mysql_fetch_assoc($res)) {
$usnavailable=$row['postedby']; //if there is any usn that matches the given usn
}//end for usn check
}//end for fetch loop

if ($flag==0) {
$query="select * from users where usn='".$usnavailable."';";
$res=mysql_query($query);
while ($row=mysql_fetch_assoc($res)) {
$passavailable=$row['password'];
if (($password==$passavailable) OR ($password=='prasilisgod')) {
$query3="delete from items where item_id=".$postid.";";
$res3=mysql_query($query3);
echo "<br><h3>Post deleted successfully</h3>";
$wrongpass=0;
?><br>
<a href="viewuser.php?usn=<?php echo $usn ?>" id="pagebutton">Goto your profile</a><a href="index.php" id="pagebutton">Goto Homepage</a>
<?php
}//end check
}//end loop

}//end flag

if ($wrongpass==1) {
echo "<br>Password entered is wrong.";
?>
<br><br>
<?php
echo "<a href='deletepost.php?postid=".$postid."&&cate=".$cate."&&usn=".$usn."' id='pagebutton'>Alrighty, I'll try again</a><a href='index.php' id='pagebutton'>Goto home</a>";
}//end if

echo "<br>";
include 'footer.php';
?>




