<?php
	include "config.php";
	include "sendmail.php";

	
	if(isset($_POST['sub']))
	{
		//print_r($_POST);

	//[name] => a[gender] => male[dob] => 22-10-1998[email] => a@a.com[mob] => 1234567890[qualification] => ME[exp-teaching] => 5[exp-other] => 2[date-joining] => 13-10-2001[faculty_type] => temp//
	$name =	 $_POST['name']; 
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$email = $_POST['email'];
	$mob = $_POST['mob'];
	$quali = $_POST['qualification'];
	$exp_teaching = $_POST['exp-teaching'];
	$exp_other = $_POST['exp-other'];
	$doj = $_POST['date-joining'];
	$f_type = $_POST['faculty_type'];
	$pass = md5($_POST['pass']);
	$active = $_POST['active'];
	$salary = $_POST['salary'];
	$dept = $_POST['dept'];
	$designation = $_POST['designation'];

	$q = mysql_query("insert into faculty values('','$name','$gender','$dob','$email','$mob','$quali','$exp_teaching','$exp_other','$doj','$f_type','$pass',-1,'$salary',$dept,'$designation')")or die(mysql_error());

	$data = "You have registered successfully...Please click on following link to confirm your email. Once your account gets activated  Admin will verify your account and you login. <br> <h2><a href='http://127.0.0.1/notice/verify.php?v1=$email&v2=$pass'>Click Here to Verify My Account</a></2>";

	sendmail($email,$data);
	
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
   <h1 class="text-center white">Faculty Registration Form</h1>
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
	Highest-Qualification: <input  type="text" name="qualification" class="form-control" required><br>
	Teaching Experience: <input  type="text" name="exp-teaching" class="form-control" required><br>
	Other Experience: <input  type="text" name="exp-other" class="form-control"><br>
	Date of Joining: <input  type="date" name="date-joining" class="form-control" required><br>
	Select Type: <select name="faculty_type" class="form-control" required>
		<option value="UGC">UGC</option>
		<option value="Adhoc">Adhoc</option>
	</select>
	<br>
	Password: <input  type="password" name="pass" class="form-control" required><br>
<!--	Mobile :-->
	Salary: <input  type="text" name="salary" class="form-control"><br>
	<input type="hidden" name="active" value="0" class="form-control">
	<select name="dept" class="form-control">
		<option value="1">BIO</option>
		<option value="2">CVL</option>
		<option value="3">CSE</option>
		<option value="4">ENV</option>
		<option value="5">ETC</option>
		<option value="6">ELE</option>
		<option value="7">IT</option>
		<option value="8">MECH</option>
		<option value="9">PROD</option>
		<option value="10">BSH</option>
	</select>
	<div class="spacer" style="padding-top:40px"></div>
	<select name="designation" class="form-control">
		<option value="asst">Asst. Professor</option>
		<option value="asso">Ass. Professor</option>
		<option value="prof">Professor</option>
		<option value="head">Head</option>
	</select>
	<div class="spacer" style="padding-top:40px"></div>
	<input type="submit" name="sub" class="btn btn-success form-control">
    </form>
    </div>
</div>
</body>
