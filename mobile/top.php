<div id="logodiv">
<img src="abacus_logo.png" id="logoimg"><div id="banner" alt="gogo"><a id="ban" href="index.php">AbacusProject&#8482</a></div>
<?php
session_start();

if (isset($_SESSION['usn'])) {
	$usn=$_SESSION['usn'];
	$password=$_SESSION['password'];
	$username=$_SESSION['username'];
	echo "<a href='logout.php' id='topmenu'>Logout</a>";
	echo "<a href='viewuser.php?usn=".$usn."' id='topmenu'>Hi, ".$username."</a>";
} else {
	echo "<a href='newaccount.php?username=&&phone=&&email=&&address=&&otherinfo=' id='topmenu'>Register</a>";
	echo "<a href='loginpage.php?usn=' id='topmenu'>Login</a>";
}

?>
</div>