<?php	
	include "config.php";
	include "session.php";

	if(!isset($_SESSION['email']))
	{
		header('location:adminlogin.php');
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
      <a class="navbar-brand">Welcome: <?php echo $_SESSION['email']?></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="dashboard-admin.php">Dashboard</a></li>     
      <li><a href="index.html">Home</a></li>
						<li><a href="approve_faculty.php">Faculty Approval</a></li>
						<li><a href="disapprove_faculty.php">Faculty Disapproval</a></li>
						<li><a href="approve_student.php">Student Approval</a></li>
						<li><a href="disapprove_student.php">Student Disapproval</a></li>
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
    <h1 class="text-center">Admin Home</h1>
    <div class="col-sm-12">
    </div>
</div>
</div>

</body>
</html>