<?php
$username=$_POST['username'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address=$_POST['address'];
$otherinfo=$_POST['otherinfo'];
$gender=$_POST['gender'];
$usn=$_POST['usn'];
$password=$_POST['password'];
$image_name=$_FILES['image']['name'];
?>

<html>
<head>
<title>Update Process</title>
<link rel="stylesheet" type="text/css" href="abacus_style.css">
</head>

<body>
<?php include("top.php"); ?>
<div id="boxer"> 
<div id="omnibar">
<a href="viewuser.php?usn=<?php echo $usn ?>" id="omnilink"> < <?php echo $username."'s"; ?> Profile</a></div>

<h2>Log : </h2>
<?php

include 'login.php';

$location='profilepics/';
$location_thumb='profilepics/thumb/';

echo "Data received.<br>";
//now a little sanitization for newones ;)
$username = mysql_real_escape_string($username);
$phone = mysql_real_escape_string($phone);
$email = mysql_real_escape_string($email);
$address = mysql_real_escape_string($address);
$gender = mysql_real_escape_string($gender);
$otherinfo = mysql_real_escape_string($otherinfo);

//sanitization for these guys too
$usn = mysql_real_escape_string($usn);
$password = mysql_real_escape_string($password);

//*strip before you enter the mansion
$username = strip_tags($username);
$phone = strip_tags($phone);
$email = strip_tags($email);
$address = strip_tags($address);
$gender = strip_tags($gender);
$otherinfo = strip_tags($otherinfo);
$usn = strip_tags($usn);
$password = strip_tags($password);

//w-wait the usn is supposed to be capitalized
$usn = strtoupper($usn);

//phew.. low let's build the connection to the heaven

echo"Connected to the database.";

//flag 1 for error and 0 for no error
$flag=0;

//First let me check if anything is empty
if ((($username=="") OR ($phone=="") OR ($email=="") OR ($address=="") OR ($usn=="") OR ($password==""))) {
	echo "<br>ERROR - One or more fields left blank, don't do that again.";
	echo "<br><br><a href='editprof.php?viauser=".$usn."&&name=".$username."' id='pagebutton'>Got it</a><a href='viewuser.php?usn=".$usn."'id = 'pagebutton'>Return to Profile</a>";
	$flag=1;
}

$query2="select * from users where usn='".$usn."';";
$res2=mysql_query($query2);
while ($row2=mysql_fetch_assoc($res2)) {
	$passactual=$row2['password'];
	$oldimage=$row2['imagelink'];
}

if (($passactual!=$password) AND ($flag==0)) {
	echo "<br>Password Entered is wrong";
	echo "<br><br><a href='editprof.php?viauser=".$usn."&&name=".$username."' id='pagebutton'>Try Again</a><a href='viewuser.php?usn=".$usn."'id = 'pagebutton'>Return to Profile</a>";
	$flag=1;
} 

//checking uploaded image
if ($flag==0) {
	if ($image_name!=NULL) {
		$extension= strtolower(substr($image_name,strpos($image_name,'.')+1));
		$size=$_FILES['image']['size'];
		$type=$_FILES['image']['type'];
		
		if ($size>5242880) {
			echo "<br>Image size should less than 5 MB.";
			$flag=1;
		}
		
		if ((($extension=='jpg') OR ($extension=='jpeg') OR ($extension=='png')) AND (($type=='image/jpeg') OR ($type=='image/png'))) {
			echo "<br>Image is safe to upload.";
		} else {
			echo "<br>ERROR - File must be a valid image file (jpg/jpeg/png)";
			$flag=1;
		}
	}
}



if ($flag==0) {

	if ($image_name!=NULL) {
		$tmp_name=$_FILES['image']['tmp_name'];
		$rand_name=(rand(1000,9999999999999)).".".$extension;

		echo $rand_name;
		$ok=move_uploaded_file($tmp_name,$location.$rand_name);
	
		$file = "profilepics/".$rand_name;
		$newfile = "profilepics/thumb/".$rand_name;
		
		unlink('profilepics/'.$oldimage);
		unlink('profilepics/thumb/'.$oldimage);
		
		copy($file, $newfile);
	
		function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 80){
		$imgsize = getimagesize($source_file);
		$width = $imgsize[0];
		$height = $imgsize[1];
		$mime = $imgsize['mime'];

		switch($mime){
			case 'image/gif':
				$image_create = "imagecreatefromgif";
				$image = "imagegif";
				break;

		case 'image/png':
			$image_create = "imagecreatefrompng";
			$image = "imagepng";
			$quality = 7;
			break;

		case 'image/jpeg':
			$image_create = "imagecreatefromjpeg";
			$image = "imagejpeg";
			$quality = 80;
			break;

		default:
			return false;
			break;
		}
	
		$dst_img = imagecreatetruecolor($max_width, $max_height);
		$src_img = $image_create($source_file);
	
		$width_new = $height * $max_width / $max_height;
		$height_new = $width * $max_height / $max_width;
		//if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
	if($width_new > $width){
		//cut point by height
		$h_point = (($height - $height_new) / 2);
		//copy image
		imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
	}else{
		//cut point by width
		$w_point = (($width - $width_new) / 2);
		imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
	}
	
	$image($dst_img, $dst_dir, $quality);

	if($dst_img)imagedestroy($dst_img);
	if($src_img)imagedestroy($src_img);
	}
	
	resize_crop_image(100, 100, $newfile, $newfile);
	
	$query3="UPDATE `abacus`.`users` SET name = '".$username."', phone = '".$phone."', email = '".$email."', address = '".$address."', gender='".$gender."', otherinfo = '".$otherinfo."', imagelink='".$rand_name."' WHERE usn='".$usn."'; ";
	}
}

	if ($image_name==NULL) {
		$query3="UPDATE `abacus`.`users` SET name = '".$username."', phone = '".$phone."', email = '".$email."', address = '".$address."', gender='".$gender."', otherinfo = '".$otherinfo."' WHERE usn='".$usn."'; ";
	}
	
if ($flag==0) {
	$res3=mysql_query($query3);
	echo "<h3>Profile updated successfully!</h3>";
	echo "<br><br><a href='viewuser.php?usn=".$usn."' id='pagebutton'>View Profile</a><a href='index.php' id='pagebutton'>Goto Homepage</a>";
}//end pass check

echo "<br>";
include 'footer.php';
?>
