<?php
    include "config.php";
    $id = $_GET['id'];
    if ($_GET[user]=='student') {
        $q = mysqli_query($con, "update student set active=-1 where id='$id'")or die(mysql_error());
        echo "<script>alert('Student Disapproved Successfully');</script>";
        header("refresh:0; url=disapprove_student.php");
    } else {
        $q = mysqli_query($con, "update faculty set active=-1 where faculty_id='$id'")or die(mysql_error());
        echo "<script>alert('faculty Disapproved Successfully');</script>";
        header("refresh:0; url=disapprove_faculty.php");
    }
