<?php	
	include "config.php";
	include "session.php";

	if(!isset($_SESSION['email']))
	{
		header('Location:login.php');
	}
    $q  = mysql_query("select * from faculty where faculty_id='$_SESSION[fid]'")or die(mysql_error());

    $arr = mysql_fetch_assoc($q);
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
      <a class="navbar-brand">User ID: <?php echo $_SESSION['fid']?> | Email: <?php echo $_SESSION['email']?></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="dashboard.php">Dashboard</a></li>
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
                $id = $_SESSION['fid'];
                $notice_q = mysql_query("SELECT
                                      *
                                    FROM notice,faculty,department where faculty.dept_id=department.dept_id")or die(mysql_error());
               
		$n = mysql_num_rows($notice_q);
		
        echo "<h2 class='white'>Notice</h2>";
		echo "<table border='1' cellpadding=1 class='table table-bordered' style='background-color:black;color:white'><th>Sr. No.</th><th>Notice Name</th>
		<th>Notice Content</th><th>Notice Date</th><th>Valid from</th><th>Valid Till</th>";
		for($i=0;$i<$n;$i++)
		{
			$details = mysql_fetch_assoc($notice_q);
			//print_r($leave_details);

			echo "<tr>";
			echo "<td align='center'>".($i+1)."</td>";
			echo "<td align='center'>$details[notice_name]</td>";
			echo "<td align='center'>$details[notice_content]</td>";
			echo "<td align='center'>$details[notice_date]</td>";
			echo "<td align='center'>$details[notice_from]</td>";
			echo "<td align='center'>$details[notice_to]</td>";
			echo "</tr>";
		}
		echo "</table>";      
          
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
    </div>
</div>
</div>
</body>
</html>