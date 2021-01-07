<?php
	include "../session.php";
	if(!isset($_SESSION['email'])||$_SESSION['email']!="admin@gmail.com")
	{
		echo "You can not access this directory";
	}
	else
	{
		header('location:enroll-web.php');
	}

?>