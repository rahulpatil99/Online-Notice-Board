<?php
	include "config.php";
	include "session.php";

	if(!isset($_SESSION['fid']))
	{
		header('location:login.php');
	}
?>
<html>
    <head>
        <title>Faculty Login</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
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
		  <li class="active"><a href="dashboard-head.php">Dashboard Head</a></li>
		  <li><a href="add_notice_head.php">Add Notice</a></li>
		  <li><a href="view_notice_head.php">View Faculty Notice</a></li>
    </ul>
    <ul class="nav navbar-nav pull-right">
        <li class="pull-right"><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8 text-center white" style="background-color:rgba(0,0,0,0.5);padding:10px;border-radius:10px">
            <h2>Summary</h2>
            <?php
               /* $id = $_SESSION['fid'];
                $late_count_q = mysql_query("SELECT
                                      count(incoming.fid)
                                    FROM incoming
                                      INNER JOIN faculty
                                        ON incoming.fid = faculty.faculty_id
                                    WHERE incoming.fid = '$id' AND incoming.time > CAST('09:00:00' AS time)")or die(mysql_error());
                $late_count = mysql_fetch_array($late_count_q);
                echo "Late Entries till Today: ".$late_count[0];
          
                $leaves_remaining_query = mysql_query("SELECT
								faculty_leaves.faculty_id,
								leave_type.leave_type,
								faculty_leaves.leaves
								FROM faculty_leaves
								INNER JOIN leave_type
								ON faculty_leaves.leave_type_id = leave_type.id
								WHERE faculty_leaves.faculty_id = $_SESSION[fid] AND faculty_leaves.leave_type_id = leave_type.id");
	
		

		$n = mysql_num_rows($leaves_remaining_query);
		
        echo "<h2 class='white'>My Leave Balance</h2>";
		echo "<table border='1' cellpadding=1 class='table table-bordered' style='background-color:black;color:white'><th>Sr. No.</th><th>Leave Type</th><th>Leave Balance</th>";
		for($i=0;$i<$n;$i++)
		{
			$leave_details = mysql_fetch_assoc($leaves_remaining_query);
			//print_r($leave_details);

			echo "<tr>";
			echo "<td align='center'>".($i+1)."</td>";
			echo "<td align='center'>$leave_details[leave_type]</td>";
			echo "<td align='center'>$leave_details[leaves]</td>";
			echo "</tr>";
		}
		echo "</table>";  */    
          
            ?>
        </div>
        <div class="col-sm-2">
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
    <div class="col-sm-12">
        <?php
            /*$fid = $_SESSION['fid'];
            $q_logs = mysql_query("SELECT
                                  incoming.time,
                                  incoming.fid,
                                  department.dept_name,
                                  department.dept_id,
                                  faculty.name,
                                  faculty.email,
                                  faculty.designation
                                FROM faculty
                                  INNER JOIN department
                                    ON faculty.dept_id = department.dept_id
                                  INNER JOIN incoming
                                    ON incoming.fid = faculty.faculty_id
                                WHERE department.dept_id = (SELECT
                                  faculty.dept_id
                                FROM faculty
                                  INNER JOIN department
                                    ON faculty.dept_id = department.dept_id
                                WHERE faculty.faculty_id = '$fid') AND incoming.date = CURDATE()")or die(mysql_error());
                $n = mysql_num_rows($q_logs);
                echo "<h3 class='text-center'>".date("d/m/Y")." Faculty Incoming Logs</h3>";
                echo "<table class='table table-bordered bg-primary'><th>Sr. No.</th><th>Faculty Name</th>
                <th>Email</th><th>Designation</th><th>In Time</th>";
                for($i=0;$i<$n;$i++)
                {
                    $arr = mysql_fetch_assoc($q_logs);
                    $color ='bg-success';
					$time = $arr['time'];
					$time= explode(":",$time);
					if($time[0]>=9 && $time[1]>0)
					{
						$color='bg-danger';
					}
                    echo "<tr class='$color' style='color:black'>";
                    echo "<td>".($i+1)."</td>";
                    echo "<td>".$arr['name']."</td>";
                    echo "<td>".$arr['email']."</td>";
                    echo "<td>".$arr['designation']."</td>";
                    echo "<td>".$arr['time']."</td>";
                    echo "<tr>";
                }
                echo "</table>";*/
        ?>
    </div>    
    </div>
</div>
</body>
</html>