<?php
	include "config.php";
	print_r($_GET);
	$id = $_GET['id'];

	$q = mysql_query("delete from notice where notice_id='$id'")or die(mysql_error());
	echo "<script>alert('faculty Deleted Successfully')</script>";
	header('Location: dashboard-head.php');
?>