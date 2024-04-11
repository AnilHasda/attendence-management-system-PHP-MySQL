<?php
session_start();
?>
<html>
<head>
<meta name="viewport"content="width=device-width,initial-scale=1">
<style type="text/css">
body{
}
th,td{
padding:10px;
text-align:center;
}
a{
text-decoration:none;
color:#000;
}
table{
    width:100%;
    border-collapse: collapse;
}
</style>
</head>
<body>
<div class="heading">
<form method="post">
<button><a href="attendence.php">Main</a></button><input type="search"name="data"><input type="submit"name="search"value="search">
</form>
</div>
<table border="1">
<thead><th>s.n</th><th>Name</th><th colspan="2">Actions</th>
</thead>
<tbody>
<?php
include"connect.php";
$query="select * from ".$_SESSION["tableName"];
$res=mysqli_query($con,$query);
$serial=0;
if(isset($_POST['search'])){
    $data=$_POST["data"];
$sq="select * from ".$_SESSION["tableName"]." where name like'%$data%'";
$qr=mysqli_query($con,$sq);
while($fetc=mysqli_fetch_array($qr)){
$serial++;
$idd=$fetc['id'];
?>
<tr><td><?php echo $idd; ?></td><td class="padding"><?php echo $fetc['name']; ?></td><td><a href="update.php?id=<?php echo $idd;?>">U</a></td><td><a href="delete.php?id=<?php echo $idd;?>">D</a></td>
</td></tr>
<?php
}
}
else{
while($fetch=mysqli_fetch_array($res)){
$serial++;
$id=$fetch['id'];
//echo "<script>alert($fetch[2])</script>";
?>
<tr><td><?php echo $id; ?></td><td class="padding"><?php echo $fetch['name']; ?></td><td><a href="update.php?id=<?php echo $id;?>">U</a></td><td><a href="delete.php?id=<?php echo $id;?>">D</a></td>
</td></tr>
<?php
}
}
?>
</tbody>
</table>
</body>
</html>