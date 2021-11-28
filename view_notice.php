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
              <li><a href="dashboard.php">Dashboard</a></li>
              <li><a href="add_notice.php">Add Notice</a></li>
              <li class="active"><a href="view_notice.php">My Notice</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li class="pull-right"><a href="logout.php">Logout</a></li>
            </ul>
          </div>
        </nav>
        </div>
    </div>
    </body>
</html>

<?php
	include "config.php";
                  
	if(!isset($_SESSION['fid']))
	{
		header('location:login.php');
	}
	else
	{
			$query = mysqli_query($con,"select * from notice where faculty_id='$_SESSION[fid]'");
			//$arr = mysql_fetch_assoc($query);
			
			
			$n = mysqli_num_rows($query);
			
			echo "<table border='1' cellpadding='5' class='table table-hover bg-warning'>
			<tr class='bg-success'>
			<th>Sr. No.</th><th>Notice name</th><th>Notice Content</th><th>Notice Date</th><th>Notice Valid From</th><th>Notice Valid Till</th>
			</tr>";
			for($i=0;$i<$n;$i++)
			{
				$arr = mysqli_fetch_assoc($query);
				echo "<tr>";
				echo "<td>".($i+1)."</td>";
				echo "<td>$arr[notice_name]</td>";
				echo "<td>$arr[notice_content]</td>";
				echo "<td>$arr[notice_date]</td>";
				echo "<td>$arr[notice_from]</td>";
				echo "<td>$arr[notice_to]</td>";
				echo "</tr>";
			}
			//print_r($arr);
			echo "</table>";
	}
?>