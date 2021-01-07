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
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
      <li class="active"><a href="add_notice.php">Add Notice</a></li>
      <li><a href="view_notice.php">My Notice</a></li>
    </ul>
    <ul class="nav navbar-nav pull-right">
        <li class="pull-right"><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

</div>
        <div class="container-fluid">
        <div class="row">
        <div class="login-box">
        <h3 class="text-center">Add Notice</h3>
       <form method = "post" action="">
        Notice Heading <input type="text" name="notice_head" class="form-control" required>
        <br>
        Leave Type: <textArea name="notice_body" class = "form-control" rows="7" required></textArea>
        
        Select from date:<input type="date" name="startdate" class="form-control"><br>
        Select till date:<input type="date" name="enddate" class="form-control"><br>
        <input type="submit" name="sub" class="btn btn-lg btn-success" value="Add Notice">
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
			print_r($_POST);
			
			$email  = $_SESSION['email'];
			$notice_head = $_POST['notice_head'];
			$notice_body = $_POST['notice_body'];
			$start_date = $_POST['startdate'];
			$end_date = $_POST['enddate'];
			
			$date1=date_create($start_date);
			$date2=date_create($end_date);
			
			if($date2<$date1)
			{
				echo "start date should be less that end date";
				return;
			}

			$datepub = date("Y/m/d");
			$fid = $_SESSION['fid'];
			$add_notice = mysql_query("INSERT INTO notice
			 VALUES ('','$notice_head','$notice_body','$datepub','$start_date','$end_date',$fid)")or die(mysql_error());
				$msg = "Successfully Added Notice";
                echo "<script>alert('$msg')</script>";
			}
	}
	

?>
