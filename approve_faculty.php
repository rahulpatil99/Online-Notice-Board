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
      <li><a href="dashboard-admin.php">Home</a></li>     
      <li><a href="approve_faculty.php">Faculty Approval</a></li>
      <li><a href="disapprove_faculty.php">Faculty Disapproval</a></li>
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
    <div class="col-sm-12">
        <form method="post" action="">
            Faculty Email: <input type="email" name="email"> 
            <input type="submit" name="search" value="Search" class="btn btn-lg btn-success">
            <input type="submit" name="all" value="Show All" class="btn btn-lg btn-danger">
        </form>        
    </div>
</div>    

<?php
	echo "<h1 class='text-center'>Pending Approvals</h1>";
          
    //print_r($_POST); 
          
    if(isset($_POST['search']))
    {
        search();
    }
    else
    {
        showAll();
    }
          
	function showAll()
    {
    
    $q = mysql_query("select * from	faculty where active=0")or die(mysql_error());
	
	$n = mysql_num_rows($q);
	
	if($n==0)
	{
		echo "<h3 class='text-center white'>No Approval Pending</h3>";
	}
	else
	{
		//[faculty_id] => 3 [name] => a [gender] => male [dob] => 22-10-1998 [email] => a@a.com [mob] => 1234567890 [qualification] => ME [exp-teaching] => 5 [exp-other] => 2 [date-joining] => 13-10-2001 [faculty_type] => 1 [pass] => 900150983cd24fb0d6963f7d28e17f72 [active] => 0 [mobile_id] => a565b82476ca0998
		echo "<table border='1' cellpadding='10' align='center' class='table table-borderd bg-warning'><th>Sr. No.</th><th>Faculty Name</th><th>Deparment</th><th>Approve</th><th>Delete</th>";
		for($i=0;$i<$n;$i++)
		{
			$arr = mysql_fetch_assoc($q);
			echo "<tr>";
			echo "<td>".($i+1)."</td>";
			echo "<td>".$arr['name']."</td>";
			$dept_id = $arr['dept_id'];
			$q1 = mysql_query("select dept_name from department where dept_id ='$dept_id'");
			$dept_name = mysql_fetch_assoc($q1);
			echo "<td>".$dept_name['dept_name']."</td>";
			echo "<td> <a href='approve.php?id=$arr[faculty_id]'>Approve</a>";
			echo "<td> <a href='delete.php?id=$arr[faculty_id]'>Delete</a>";
			echo "</tr>";
		}
		echo "</table>";
    }
    }
          
    function search()
    {
        $q = mysql_query("select * from	faculty where active=0 and email ='$_POST[email]'")or die(mysql_error());
	
	$n = mysql_num_rows($q);
	
	if($n==0)
	{
		echo "<h3 class='text-center white'>No Approval Pending</h3>";
	}
	else
	{
		//[faculty_id] => 3 [name] => a [gender] => male [dob] => 22-10-1998 [email] => a@a.com [mob] => 1234567890 [qualification] => ME [exp-teaching] => 5 [exp-other] => 2 [date-joining] => 13-10-2001 [faculty_type] => 1 [pass] => 900150983cd24fb0d6963f7d28e17f72 [active] => 0 [mobile_id] => a565b82476ca0998
		echo "<table border='1' cellpadding='10' align='center' class='table table-borderd bg-warning'><th>Sr. No.</th><th>Faculty Name</th><th>Deparment</th><th>Approve</th><th>Delete</th>";
		for($i=0;$i<$n;$i++)
		{
			$arr = mysql_fetch_assoc($q);
			echo "<tr>";
			echo "<td>".($i+1)."</td>";
			echo "<td>".$arr['name']."</td>";
			$dept_id = $arr['dept_id'];
			$q1 = mysql_query("select dept_name from department where dept_id ='$dept_id'");
			$dept_name = mysql_fetch_assoc($q1);
			echo "<td>".$dept_name['dept_name']."</td>";
			echo "<td> <a href='approve.php?id=$arr[faculty_id]'>Approve</a>";
			echo "<td> <a href='delete.php?id=$arr[faculty_id]'>Delete</a>";
			echo "</tr>";
		}
		echo "</table>";
    }
    }
          
	
?>
</div>
</body>
</html>