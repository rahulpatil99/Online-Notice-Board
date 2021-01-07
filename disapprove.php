<?php
	include "config.php";
	//print_r($_GET);
	$id = $_GET['id'];

	$q = mysql_query("update faculty set active=0 where faculty_id='$id'")or die(mysql_error());
	echo "<center>faculty Disapproved Successfully</center>";
	header("refresh:3; url=disapprove_faculty.php");
?>