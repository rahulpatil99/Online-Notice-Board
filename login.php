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
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="alert alert-info" style="margin-top:50px;">
                    <h1 class="text-center">Online Notice Board</h1>
                </div>
            </div>
            <div class="col-sm-2">
            </div>
        </div>
        <div class="spacer"></div>
        <div class="login-box">
            <form action="" method="post">
            <div class="form-group">
                Email: <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
            Password: <input type="password" name="pass" class="form-control">
            </div>
            
            <input type="submit" name="login" value="login" class="btn btn-lg btn-success">
            
            <input type="reset" name="reset"
            class="btn btn-lg btn-danger">
            </form>
        </div>
        </div>
    </body>
</html>
<?php
	include "config.php";
	include "session.php";

	
	if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$pass = md5($_POST['pass']);
		
		$q = mysqli_query($con,"select * from faculty where email = '$email' and pass='$pass'")or die(mysql_error());
		

		$n = mysqli_num_rows($q);
		$arr = mysqli_fetch_assoc($q);

		if($n>0)
		{
			if($arr['active']!=1)
			{
				header('location:pending_approval_warning.php');
			}
			else
			{
				$_SESSION['email'] = $email;
				$_SESSION['fid'] = $arr['faculty_id'];
				
				if($arr['designation']=="head")
				{
					header('location:dashboard-head.php');
				}
				else
				{
					header('location:dashboard.php');
				}
			}
		}
		else
		{
			echo "<h2 class='text-center'>invalid user</h2>";
		}
	}
?>