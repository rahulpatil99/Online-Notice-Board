<?php
	include "config.php";
	include "session.php";

	if(!isset($_SESSION['fid']))
	{
		header('location:login.php');
	}
	else
	{
		//print_r($_POST);
		//[faculty_id] => 24 [leave_type_id] => CL [leave_value] => -2
		$faculty_id = $_POST['faculty_id'];
		$leave_type_id = $_POST['leave_type_id'];
		$leave_value = $_POST['leave_value'];
		$leave_id = $_POST['leave_id'];
		//print_r($_POST);
		if($leave_type_id ==1 || $leave_type_id==3)
		{
			echo "cl or ml";
			$q = mysql_query("select leaves from faculty_leaves where faculty_id='$faculty_id' and leave_type_id='$leave_type_id'");
			$arr = mysql_fetch_assoc($q);
			$leaves = $arr['leaves'];
			$leaves = $leaves+$leave_value;
			echo $leaves;
			$q1= mysql_query("update faculty_leaves set leaves = '$leaves' where faculty_id = '$faculty_id' and leave_type_id='$leave_type_id'")or die(mysql_error());
			//print_r($arr);
			//$arr = mysql_fetch_assoc($q1);

			//print_r($arr);
		
		}
		else
		{
			echo "DL/CO";
			$q = mysql_query("select leaves from faculty_leaves where faculty_id='$faculty_id' and leave_type_id=1");
			$arr = mysql_fetch_assoc($q);
			$leaves = $arr['leaves'];
			print_r($arr);
			$leaves = $leaves+$leave_value;
			echo $leaves;
			$q1= mysql_query("update faculty_leaves set leaves = '$leaves' where faculty_id = '$faculty_id' and leave_type_id=1")or die(mysql_error());

			//$arr = mysql_fetch_assoc($q1);

			//print_r($arr);
		}
		$q1 = mysql_query("update leaves set approval_status=1 where faculty_id='$faculty_id' and leave_type='$leave_type_id' and leave_id='$leave_id'")or die(mysql_error()); 
		header('location: dashboard-head.php');
	}

?>