<?php
	include "config.php";
	print_r($_GET);
	$id = $_GET['id'];

	$q = mysql_query("delete from faculty where faculty_id='$id'")or die(mysql_error());
	echo "<script>alert('faculty Deleted Successfully')</script>";
	//header('Location: approve_faculty.php');
?>