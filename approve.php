<?php
    include "config.php";
    
    $id = $_GET['id'];

    $q = mysqli_query($con, "update faculty set active=1 where faculty_id='$id'")or die(mysql_error());
    echo "<script>alert('faculty Approved Successfully')</script>";
    header("refresh:0; url=approve_faculty.php");
