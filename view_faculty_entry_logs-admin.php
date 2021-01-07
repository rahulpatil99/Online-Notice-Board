<?php
	include "config.php";
	include "session.php";
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
      <a class="navbar-brand">Welcome: <?php echo $_SESSION['email']?></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="dashboard-admin.php">Home</a></li>     
      <li><a href="approve_faculty.php">Faculty Approval</a></li>
      <li><a href="disapprove_faculty.php">Faculty Disapproval</a></li>
      <li><a href="view_faculty_entry_logs-admin.php">Incoming Logs</a></li>
      <li><a href="view_faculty_exit_logs-admin.php">Outgoing Logs</a></li>
      <li><a href="faceenroll/enroll-web.php">Enroll Face</a></li>
      <li><a href="facedetect/detect-web.php">Verify Face</a></li>
    </ul>
    <ul class="nav navbar-nav pull-right">
        <li class="pull-right"><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
</div>
</div>

<form method="post" action="">
	Select dept: <select name="dept">
		<option value="NULL" selected>All</option>
		<?php
			$dept_q = mysql_query("select * from department");
			for($i=1;$i<=10;$i++)
			{
				$arr_dept = mysql_fetch_assoc($dept_q);
				echo "<option value='$arr_dept[dept_id]'>$arr_dept[dept_name]</option>";
			}
		?>
	</select>
	<input type='submit' value='filter' name='sub'>
</form>

<?php
	if(!isset($_SESSION['email']))
	{
		header('location:dashboard-admin.php');
	}
	else
	{
		if(isset($_POST['sub']))
		{
			$dept = $_POST['dept'];
			if($dept==0)
			{
				$logs = mysql_query("SELECT
									  incoming.*,
									  faculty.faculty_id,
									  faculty.name,
									  faculty.dept_id,
									  faculty.designation,
									  faculty.email,
									  department.*
									FROM faculty
									  INNER JOIN department
										ON faculty.dept_id = department.dept_id
									  INNER JOIN incoming
										ON incoming.fid = faculty.faculty_id
									WHERE incoming.fid = faculty.faculty_id AND faculty.dept_id = department.dept_id");
			}
			else
			{
				$logs = mysql_query("SELECT
									  incoming.*,
									  faculty.faculty_id,
									  faculty.name,
									  faculty.dept_id,
									  faculty.designation,
									  faculty.email,
									  department.*
									FROM faculty
									  INNER JOIN department
										ON faculty.dept_id = department.dept_id
									  INNER JOIN incoming
										ON incoming.fid = faculty.faculty_id
									WHERE incoming.fid = faculty.faculty_id AND faculty.dept_id = department.dept_id AND faculty.dept_id = $dept");
			}
			$num = mysql_num_rows($logs);
				echo "<table border='1' class='table table-bordered table-hover' cellpadding=5><th>Sr. No.</th>
				<th>Faculty Name</th>
				<th>Designation</th>
				<th>Department</th>
				<th>Date</th>
				<th>Incoming Time</th>
				";
				for($i=0;$i<$num;$i++)
				{
					$arr = mysql_fetch_assoc($logs);
					$color ='bg-success';
					$time = $arr['time'];
					$time= explode(":",$time);
					if($time[0]>=9 && $time[1]>0)
					{
						$color='bg-danger';
					}
					echo "<tr class='$color'>";
					echo "<td>".($i+1)."</td>";
					echo "<td>$arr[name]</td>";
					echo "<td>$arr[designation]</td>";
					echo "<td>$arr[dept_name]</td>";
					echo "<td>$arr[date]</td>";
					echo "<td>$arr[time]</td>";
					echo "</tr>";
				}
				echo "</table>";
		}
	}
?>
</body>