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
      <a class="navbar-brand">Faculty ID: <?php echo $_SESSION['fid']?> | Email: <?php echo $_SESSION['email']?></a>
    </div>
    <ul class="nav navbar-nav">
              <li><a href="dashboard-head.php">Dashboard</a></li>
              <li><a href="leave_apply_head.php">Apply Leaves</a></li>
              <li><a href="my_leaves_head.php">My Leaves</a></li>
              <li><a href="view_leave_applications.php">Leave Applications</a></li>
              <li><a href="view_approved_leave_applications.php">Approved Applications</a></li>
              <li><a href="my-entry-exit-logs-head.php">My In/Out Logs</a></li>
              <li class="active"><a href="faculty-entry-exit-logs-head.php">Faculty In/Out Logs</a></li>
    </ul>
    <ul class="nav navbar-nav pull-right">
        <li class="pull-right"><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
</div>
<form action="" method='post'>	
    <h2 class="white">Faculty Entry and Exit Logs:</h2>
	Select Faculty <select name="faculty">
		<?php
			$q_faculty = mysql_query("SELECT
									  faculty.faculty_id,
									  faculty.name
									FROM faculty
									WHERE faculty.dept_id = (SELECT
									  faculty.dept_id
									FROM faculty
									WHERE faculty.faculty_id = '$_SESSION[fid]')")or die(mysql_error());
			$n = mysql_num_rows($q_faculty);

			for($i=0;$i<$n;$i++)
			{
				$arr = mysql_fetch_assoc($q_faculty);
				echo "<option value='$arr[faculty_id]'>$arr[name]</option>";
			}
		?>
	</select>
	Select start Date: <input type='date' name='date1' required>
	Select End Date <input type='date' name='date2' required><br>
	<input type='submit' name='incoming' value="Incoming" class='btn btn-lg btn-danger'>
	<input type='submit' name='outgoing' value="Outgoing" class='btn btn-lg btn-success'>
	<input type='submit' name='both' value="Both" class='btn btn-lg btn-warning'>
	<button class='btn btn-lg btn-primary' onclick='window.print()'>Print Record</button>
</form>
<div class="alert alert-warning"><?php echo date("d-M-Y");?></div>
</div>
</body>
</html>

<?php
    
	if(!isset($_SESSION['fid']))
	{
		header('location:login.php');
	}
	else
	{
		if(isset($_POST['incoming']))
		{
		
			//print_r($_POST);
			if(!isset($_POST['faculty']))
			{
				$_POST['faculty']=NULL;
			}
			$date1 = $_POST['date1'];
			$date2 = $_POST['date2'];
			echo "<h4 class='text-center'>Incoming Logs between $date1 and $date2	</h4> ";
			$q1 = mysql_query("SELECT * FROM incoming WHERE fid='$_POST[faculty]' and date BETWEEN '$date1' AND '$date2'")or die(mysql_error());
			$n = mysql_num_rows($q1);
			echo "<table class='table table-bordered bg-primary'><th>Sr. No.</th><th>Date</th><th>Time</th>";
			for($i=0;$i<$n;$i++)
			{
				$arr = mysql_fetch_assoc($q1);
				echo "<tr>";
				echo "<td>".($i+1)."</td><td>$arr[date]</td><td>$arr[time]</td>";
				echo "</tr>";
			}
			echo "</table>";

		}
		else if(isset($_POST['outgoing']))
		{
			//print_r($_POST);
			$date1 = $_POST['date1'];
			$date2 = $_POST['date2'];
			echo "<h4 class='text-center'>Outgoing Logs between $date1 and $date2	</h4> ";
			$q2 = mysql_query("SELECT * FROM outgoing WHERE fid='$_POST[faculty]' and date BETWEEN '$date1' AND '$date2'")or die(mysql_error());
			$n1 = mysql_num_rows($q2);
			echo "<table class='table table-bordered bg-primary'><th>Sr. No.</th><th>Date</th><th>Time</th>";
			for($i=0;$i<$n1;$i++)
			{
				$arr = mysql_fetch_assoc($q2);
				echo "<tr>";
				echo "<td>".($i+1)."</td><td>'$arr[date]'</td><td>$arr[time]</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else if(isset($_POST['both']))
		{
			//print_r($_POST);
			$date1 = $_POST['date1'];
			$date2 = $_POST['date2'];

			echo "<h4 class='text-center'>Incoming Logs between $date1 and $date2	</h4> ";
			$q1 = mysql_query("SELECT * FROM incoming WHERE fid='$_POST[faculty]' and date BETWEEN '$date1' AND '$date2'")or die(mysql_error());
			$n = mysql_num_rows($q1);
			echo "<table class='table table-bordered bg-primary'><th>Sr. No.</th><th>Date</th><th>Time</th>";
			for($i=0;$i<$n;$i++)
			{
				$arr = mysql_fetch_assoc($q1);
				echo "<tr>";
				echo "<td>".($i+1)."</td><td>'$arr[date]'</td><td>$arr[time]</td>";
				echo "</tr>";
			}
			echo "</table>";
		
			$q2 = mysql_query("SELECT * FROM outgoing WHERE fid='$_POST[faculty]' and date BETWEEN '$date1' AND '$date2'")or die(mysql_error());
			$n1 = mysql_num_rows($q2);
			echo "<h4 class='text-center'>Outgoing Logs between $date1 and $date2	</h4> ";
			echo "<table class='table table-bordered bg-primary'><th>Sr. No.</th><th>Date</th><th>Time</th>";
			for($i=0;$i<$n1;$i++)
			{
				$arr = mysql_fetch_assoc($q2);
				echo "<tr>";
				echo "<td>".($i+1)."</td><td>'$arr[date]'</td><td>$arr[time]</td>";
				echo "</tr>";
			}
			echo "</table>";

		}
	}
?>
