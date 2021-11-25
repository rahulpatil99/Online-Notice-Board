<?php
	include "config.php";
	include "sendmail.php";

	
	if(isset($_POST['sub']))
	{
	$name =	 $_POST['name'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$email = $_POST['email'];
	$mob = $_POST['mob'];
	$class = $_POST['class'];
	$pass = md5($_POST['pass']);
	$dept = $_POST['dept'];

	$q = mysqli_query($con,"insert into student values('','$name','$gender','$dob','$email','$mob','$class','$pass','-1',$dept)")or die(mysql_error());

	$data = "You have registered successfully...Please click on following link to confirm your email. Once your account gets activated  Admin will verify your account and you login. <br> <h2><a href='http://127.0.0.1/notice/verify.php?v1=$email&v2=$pass'>Click Here to Verify My Account</a></2>";

	// sendmail($email,$data);
	
    }
	echo "<a href='index.html' class='white text-center'><h2>Back to Home</h2></a>";
	
?>
<html>
    <head>
        <title>Faculty Login</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
<body>
<div class="container">
   <h1 class="text-center white">Student Registration Form</h1>
   <div class="col-sm-3"></div>
    <div class="col-sm-6" style="background-color:rgba(0,0,0,0.7);padding:40px;border-radius:40px;color:white">
        <form method="post" action="">
	Name:<input  type="text" name="name" class="form-control" required><br>
	<div class="row">
	    Gender: Male: <input type="radio" name="gender" value="male">
	    Female: <input type="radio" name="gender" value="female">
	</div>
	<br>
	Date of Birth:<input  type="date" name="dob" class="form-control" required><br>
	Email: <input  type="email" name="email" class="form-control" required><br>
	Mobile: <input  type="text" name="mob" class="form-control" required><br>
	Select Year: <select name="class" class="form-control" required>
		<option value="FE">FE</option>
		<option value="SE">SE</option>
		<option value="TE">TE</option>
		<option value="BE">BE</option>
	</select>
	<br>
	Password: <input  type="password" name="pass" class="form-control" required><br>
<!--	Mobile :-->
<select name="dept" class="form-control">
		<option value="1">Aeronautical Engineering</option>
		<option value="2">Civil Engineering</option>
		<option value="3">Electronics and communication Engineering</option>
		<option value="4">Electrical Engineering</option>
		<option value="5">Mechanical engineering</option>
		<option value="6">Information Technology</option>
		<option value="7">Production engineering</option>
		<option value="8">Textile Engineering</option>
		<option value="9">Computer Science and Engineering</option>
	</select>
	<div class="spacer" style="padding-top:40px"></div>
	<div class="spacer" style="padding-top:40px"></div>
	<input type="submit" name="sub" class="btn btn-success form-control">
    </form>
    </div>
</div>
</body>
