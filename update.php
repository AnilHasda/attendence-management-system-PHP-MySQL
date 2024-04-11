<html>
<head>
<meta name="viewport"content="width=device-width,initial-scale=1">
<style type="text/css">
body{
background:pink;
}
form{
border:2px solid;
padding:30px;
}
</style>
</head>
<body>
<?php
include"connect.php";
$id=$_GET["id"];
$dis="select * from ".$_SESSION["tableName"]." where id=$id";
$disqry=mysqli_query($con,$dis);
$fetch=mysqli_fetch_array($disqry);
$name=$fetch['name'];
?>
<form action=""method="post"class="entry">
<div class="dt"><u><?php echo "date:20".date('y:m:d'); ?></u></div>
Student name<br>
<input type="text"name="name"placeholder="Add new student"autocomplete="off"value="<?php global $name; echo $name; ?>"><br><br>
<input type="submit"name="submit"value="Update">
</form>
<?php
global $id;
if(isset($_POST["submit"])){
$name=$_POST["name"];
$upd="update ".$_SESSION["tableName"]." set name='$name' where id='$id'";
$updqr=mysqli_query($con,$upd);
if($updqr){
echo"<script>alert('data is updated')</script>";
echo"<script>window.location.href='showData.php'</script>";
}
else{
echo"<script>alert('data is not updated')</script>";
}
}
?>
</body>
</html>