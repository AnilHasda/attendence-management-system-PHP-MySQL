<?php
session_start();
if (isset($_SESSION["database"])) {
    $con = mysqli_connect("localhost", "root", "");
    if ($con) {
        $query = "create database ". $_SESSION["database"];
        $cnt = mysqli_query($con, $query);
        if ($cnt) {
            echo '<script>alert("your database has been created");</script>';
            echo "<script>window.location.href='createTable.php'</script>";
        }
    }
} else {
    echo "<script>alret('failed to create database');window.location.href='loginPage.php'</script>";
}
