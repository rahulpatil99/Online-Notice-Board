<?php
	include "config.php";
	include "session.php";

	//print_r($_SESSION);
	if(!isset($_SESSION['email']) || isset($_SESSION['id']))
	{
		header("location: login.php");
	}
?>
<html>
    <head>
        <title>Faculty Login</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

<body>
  
<div class="container-fluid">
<div class="row">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Faculty ID: <?php echo $_SESSION['fid']?> | Email: <?php echo $_SESSION['email']?></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="dashboard-head.php">Dashboard</a></li>
      <li class="active"><a href="leave_apply_head.php">Apply Leaves</a></li>
      <li><a href="my_leaves_head.php">My Leaves</a></li>
      <li><a href="view_leave_applications.php">Leave Applications</a></li>
      <li><a href="view_approved_leave_applications.php">Approved Applications</a></li>
      <li><a href="my-entry-exit-logs-head.php">My In/Out Logs</a></li>
      <li><a href="faculty-entry-exit-logs-head.php">Faculty In/Out Logs</a></li>
    </ul>
    <ul class="nav navbar-nav pull-right">
        <li class="pull-right"><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

</div>
        <div class="container-fluid">
        <div class="row">
        <div class="spacer"></div>
        <div class="login-box">
        <h3 class="text-center">Leave Application</h3>
       <form method = "post" action="">
        Leave Reason/Description: <input type="text" name="reason" class="form-control" required>
        <br>
        Leave Type: 
        <select name="leave_type" class="form-control">
            <option value="1">CL</option>
            <option value="2">DL</option>
            <option value="3">ML</option>
            <option value="4">CO</option>
        </select><br>
        Select leave start date:<input type="date" name="startdate" class="form-control"><br>
        Select leave End date:<input type="date" name="enddate" class="form-control"><br>
        <input type="submit" name="sub" class="btn btn-lg btn-success" value="Apply">
        </form>
        
        </div>
        </div>
        </div>
    </div>
    </body>
</html>
<?php
	{
		if(isset($_POST['sub']))
		{
			//print_r($_POST);
			
			$email  = $_SESSION['email'];
			$reason = $_POST['reason'];
			$leave_type = $_POST['leave_type'];
			$start_date = $_POST['startdate'];
			$end_date = $_POST['enddate'];
			
			$date1=date_create($start_date);
			$date2=date_create($end_date);
			
			if($date2<$date1)
			{
				echo "start date should be less that end date";
				return;
			}

			$diff=date_diff($date1,$date2);
			$days = $diff->format('%d');
			$days = $days+1;

			$leave_value_quey  = mysql_query("select leave_value from leave_type where id ='$leave_type'");

			$arr = mysql_fetch_assoc($leave_value_quey);

			$leave_count = $days*$arr['leave_value'];

			$dateofapp = time();

			if($leave_type==1||$leave_type==3)
			{
				$leaves_query = mysql_query("select * from faculty_leaves where faculty_id='$_SESSION[fid]' and leave_type_id= '$leave_type'");

				$n =mysql_num_rows($leaves_query);

				$arr = mysql_fetch_assoc($leaves_query);
				
				//print_r($arr);
            $msg = "";        
			if($n>0)
			{
				if($days<=$arr['leaves'])
				{
				$apply_leave = mysql_query("INSERT INTO leaves VALUES ('','$_SESSION[fid]','$leave_type','$reason',0,'$dateofapp','$start_date','$end_date','$leave_count')")or die(mysql_error());

					$msg = "Successfully Applied for leave";
                    echo "<script>alert('$msg')</script>";
				}
				else
				{
							$msg = "You have insufficient leaves";
                            echo "<script>alert('$msg')</script>";
				}
			}
				else
				{
					$msg = "You dont Have Leaves for this type";
                    echo "<script>alert('$msg')</script>";
					return;
				}
			}
			else
			{
				$apply_leave = mysql_query("INSERT INTO leaves VALUES ('','$_SESSION[fid]','$leave_type','$reason',0,'$dateofapp','$start_date','$end_date','$leave_count')")or die(mysql_error());
				$msg = "Successfully Applied for leave";
                echo "<script>alert('$msg')</script>";
			}
		}
		
	}

?>
