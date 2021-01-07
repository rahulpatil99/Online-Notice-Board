<?php
	include "config.php";
	include "session.php";

	session_destroy();

	header('Location:index.html');
?>