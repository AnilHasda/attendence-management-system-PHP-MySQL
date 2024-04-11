<?php
if(!isset($_SESSION)){

    session_start();
}
$con=mysqli_connect("localhost","root","",$_SESSION["database"]);
if($con){
//echo"<script>alert('connection successfull');</script>";
}
else{
echo"<script>alert('connection interrupt');</script>";
}
?>