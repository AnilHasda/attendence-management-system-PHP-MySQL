<?php
session_start();
include'connect.php';
$id=$_GET["id"];
$delete="delete from ".$_SESSION["tableName"]."  where id=$id";
$deleteqry=mysqli_query($con,$delete);
if($deleteqry){
echo"<script>alert('data is deleted')</script>";
echo"<script>window.location.href='showData.php'</script>";
}
?>
