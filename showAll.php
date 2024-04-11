<html>
<head>
<meta name="viewport"content="width=device-width,initial-scale=1">
<style type="text/css">
*{
padding:0;
margin:0;
box-sizing:border-box;
}
body{
background:#FABE44;
color:red;
}
th,td{
text-align:center;
padding:10px 0px 10px 0px;
}
tbody{
margin-top:103px;
}
table{
width:100%;
outline:none;
position:relative;
top:-30;
}
.data{
background:#1791B1;
width:100%;
height:70px;
display:flex;
align-items:center;
}
.result{
position:relative;
width:100%;
height:70px;
top:-60;
left:120;
text-decoration:none;
color:black;
}
a{
text-decoration:none;
margin:20px 20px 0px 0px;
}
button{
height:25px;
width:70px;
background:cyan;
margin:0px 20px 0px 10px;
padding-left:5px;
}
.search{
margin-top:10px;
margin-left:40px;
}
.sear{
height:25px;
outline:none;
}
.present{
background:green;
border-radius:1rem;
text-align:center;
border:none;
}
.absent{
background:red;
color:white;
border-radius:1rem;
text-align:center;
border:none;
}
</style>
</head>
<body>
<form action=""method="POST"class="search">
<input type="search"name="search"class="sear"placeholder="enter name"required><br><br>
<input type="number"name="searchroll"placeholder="Enter Roll number"class="sear"required><br><br>
<input class="sear" type="submit"name="sub"value="search"><br>
<br><details><summary>NOTE</summary>please search,to get a currect data of particular student.</details>
</form><br>
<div class="data"><button><a href="attendence.php">Home</a></button></div>
<table border="1px">
<thead><th>s.n</th><th class="padding">name</th><th class="padding">status</th><th class="padding">date</th>
</thead>
<tbody>
<?php
include"connect.php";
$presentCount=0;
$absentCount=0;
if(isset($_POST["sub"])){
$search=$_POST["search"];
$searchroll=$_POST["searchroll"];
$qry="select * from ".$_SESSION['statusName']." where name like'%$search%' && id=$searchroll";
$sea=mysqli_query($con,$qry);
while($ftc=mysqli_fetch_array($sea)){
?>
<tr><td><?php echo $ftc["id"] ?></td><td class="padding"><?php  echo $ftc['name']; ?></td><td class="padding">
<?php
if($ftc['status']=='present'){
echo"<button class='present'>present</button>";
$presentCount++;
}
else{
$absentCount++;
echo"<button class='absent'>absent</button>";
}
?>
</td><td class="padding"><?php echo $ftc['date']; ?></td></tr>
<?php
}
}
else{
    $query="select * from ".$_SESSION['statusName'];
 $res=mysqli_query($con,$query);
while($fetch=mysqli_fetch_array($res)){
?>
<tr><td><?php echo $fetch['id']; ?></td><td class="padding"><?php  echo $fetch['name'];?></td><td class="padding">
<?php
if($fetch['status']=='present'){
echo"<button class='present'>present</button>";
}
else{
echo"<button class='absent'>absent</button>";
}
?>
</td><td class="padding"><?php echo $fetch['date']; ?></td></tr>
<?php
}
}
?>
<?php
include"connect.php";
$attend="select distinct date from ".$_SESSION['statusName'];
$attendqry=mysqli_query($con,$attend);
$totalAttendance=mysqli_num_rows($attendqry);
echo "<span class='result'>Total Attendance Taken=".$totalAttendance."<br>Total Present=".$presentCount."<br>Total Absent=".$absentCount."</span>";
?>
</tbody>
</table>
</body>
</html>