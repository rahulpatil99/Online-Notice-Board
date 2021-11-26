<?php
    include "config.php";
    $id = $_GET['id'];
    if ($_GET['user']=='student') {
        $q = mysqli_query($con, "delete from student where id='$id'")or die(mysql_error());
        echo "<script>alert('student Deleted Successfully')</script>";

        header("refresh:0; url=approve_student.php");
    } else {
        $q = mysqli_query($con, "delete from faculty  where faculty_id='$id'")or die(mysql_error());
        echo "<script>alert('faculty Deleted Successfully')</script>";
        header("refresh:0; url=approve_faculty.php");
    }
