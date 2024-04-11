<?php
$server="localhost";
$user="root";
$pass="";
$db="loginsystem";
$con=mysqli_connect($server,$user,$pass,$db);
if($con){
// echo "<script>alert('connection successfull')</script>";
}
else{
echo "<script>alert('connection failed')</script>";
}
?>