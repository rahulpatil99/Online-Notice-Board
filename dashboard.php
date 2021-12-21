<?php	
	include "config.php";
	include "session.php";

	if(!isset($_SESSION['email']))
	{
		header('Location:login.php');
	}
    $q  = mysqli_query($con,"select * from faculty where faculty_id='$_SESSION[fid]'")or die(mysql_error());

    $arr = mysqli_fetch_assoc($q);
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

      <li class="active"><a href="dashboard.php">Dashboard</a></li>
      <li><a href="index.html">Home</a></li>
      <li><a href="add_notice.php">Add Notice</a></li>
      <li><a href="view_notice.php">My Notice</a></li>
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
                /*$id = $_SESSION['fid'];
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
		echo "</table>";*/      
          
            ?>
        </div>
        <div class="col-sm-2">
        </div>
    </div>
</div>
<div class="spacer"></div>
<div class="container">
<div class="row">
    <?php
        //print_r($arr);
    ?>
    <div class="col-sm-12">
        <table class="table table-bordered">
        <th colspan="2" class="bg-success"><h2 class="text-center">Faculty Info</h2></th>
        <tr class="bg-warning">
            <td>
                <h3>Name</h3>
            </td>
            <td>
                <h3><?php echo $arr['name'] ?></h3>
            </td>
        </tr>
        <tr class="bg-warning">
            <td>
                <h3>Email</h3>
            </td>
            <td>
                <h3><?php echo $arr['email'] ?></h3>
            </td>
        </tr>
        <tr class="bg-warning">
            <td>
                <h3>Gender</h3>
            </td>
            <td>
                <h3><?php echo $arr['gender'] ?></h3>
            </td>
        </tr>
        <tr class="bg-warning">
            <td>
                <h3>DoB</h3>
            </td>
            <td>
                <h3><?php echo $arr['dob'] ?></h3>
            </td>
        </tr>
        <tr class="bg-warning">
            <td>
                <h3>Mobile</h3>
            </td>
            <td>
                <h3><?php echo $arr['mob'] ?></h3>
            </td>
        </tr>
        <tr class="bg-warning">
            <td>
                <h3>Qualification</h3>
            </td>
            <td>
                <h3><?php echo $arr['qualification'] ?></h3>
            </td>
        </tr>
        <tr class="bg-warning">
            <td>
                <h3>Date of Joining</h3>
            </td>
            <td>
                <h3><?php echo $arr['date_joining'] ?></h3>
            </td>
        </tr>
        <tr class="bg-warning">
            <td>
                <h3>Department</h3>
            </td>
            <td>
                <h3><?php 
                            $q1 = mysqli_query($con,"select dept_name from department where dept_id='$arr[dept_id]'")or die(mysql_error()); 
                            $dept_name = mysqli_fetch_assoc($q1);
                            echo $dept_name['dept_name'];
                    ?>
                </h3>
            </td>
        </tr>    
        </table>
    </div>
</div>
</div>
</body>
</html>