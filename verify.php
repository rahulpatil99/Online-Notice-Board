<?php
	include "config.php";

	$email = $_GET['v1'];
	$pass = $_GET['v2'];

	$q  = mysql_query("update faculty set active = 0 where email= '$email' and pass='$pass'")or die(mysql_error());

	echo "<h1>You have confirmed your email-ID successfully..Please wait till Admin Verifies your Account..</h1>";

	header('refresh:5;url=login.php');

	//print_r($_GET);


?>