<?php
	include "config.php";
	//print_r($_GET);
	$id = $_GET['id'];

	$q = mysql_query("update faculty set active=1 where faculty_id='$id'")or die(mysql_error());
	echo "<center>faculty Approved Successfully</center>";
	header("refresh:3; url=approve_faculty.php");
?>